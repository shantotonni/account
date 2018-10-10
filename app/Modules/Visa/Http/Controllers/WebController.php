<?php

namespace App\Modules\Visa\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Company\Company;
use App\Models\Contact\Contact;
use App\Models\MoneyOut\Bill;
use App\Models\Visa\Visa;
use App\Models\Visa\Visa_Entry_File;
use App\Models\Recruit\Recruitorder;
use App\Modules\Visa\Http\Requests\CreatePostRequest;
use App\Modules\Visa\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
  {

       public function index($id=null)
        {
           $id=$id;
           if (is_null($id))
           {
               if (session('branch_id')==1){

                   $branch=Branch::all();
                   $visa = Visa::all();
                   
                   foreach($visa as $all){
                    $recruit = Recruitorder::where('registerSerial_id' , $all->id)->count('id');
                    $all->left_visa = ($all->numberofVisa - $recruit);
                   }

                   //dd($visa);
                   return view('visa::visa.index', compact('visa','branch','id'));
               }
               else {

                   $branch=Branch::where('id',session('branch_id'))->get();
                   $visa = Visa::join('users','visaentrys.created_by','=','users.id')
                       ->where('users.branch_id',session('branch_id'))
                       ->select('visaentrys.*')
                       ->get();
                    
                    foreach($visa as $all){
                      $recruit = Recruitorder::where('registerSerial_id' , $all->id)->count('id');
                      $all->left_visa = ($all->numberofVisa - $recruit);
                     }
                   return view('visa::visa.index', compact('visa','branch','id'));
               }
           }
           else {

               $branch=Branch::all();
               $visa = Visa::join('users','visaentrys.created_by','=','users.id')
                   ->where('users.branch_id',$id)
                   ->select('visaentrys.*')
                   ->get();

                foreach($visa as $all){
                    $recruit = Recruitorder::where('registerSerial_id' , $all->id)->count('id');
                    $all->left_visa = ($all->numberofVisa - $recruit);
                   }

               return view('visa::visa.index', compact('visa','branch','id'));
           }
        }

      public function create()
      {
            $contact = Contact::all();
            $company = Company::all();
            $bill = Bill::all();

            return view('visa::visa.create')->with(array('contact'=>$contact,'company'=>$company,'bill'=>$bill));
      }

      public function store(CreatePostRequest $request)
      {
         // dd($request->all());
         try
         {
             $visa =  new Visa();
             $visa->date = $request->visa_date;
             $visa->local_Reference=$request->local_ref;
             $visa->visaNumber=$request->visa_number;
             $visa->visaIssuedate=$request->issue_date;
             $visa->company_id=$request->company_name;
             $visa->numberofVisa=$request->numberofvisa;
             $visa->destination=$request->destination;
             $visa->registerSerial=$request->registerSerial;
             $visa->idNum=$request->flag_num;
             $visa->iqamaNumber= $request->iqamaNumber?$request->iqamaNumber:Null;
             $visa->iqamaSector=$request->iqamaSector?$request->iqamaSector:Null;
             $visa->visaType=$request->visaType?$request->visaType:Null;
             $visa->expire_date = $request->expire_date;
             $visa->visa_category_id = $request->visa_category_id;
             $visa->created_by= Auth::id();
             $visa->updated_by=Auth::id();



             if($visa->save())
             {
              //dd($visa->id);
                 if ($request->hasFile('img_url')){
                    foreach ($request->img_url as $key=>$file){

                        if(is_array($request->title[$key])){
                            $tit=array_keys($request->title[$key])[0];
                            $title= $request->title[$key][$tit];
                        }else{
                            $title= $request->title[$key] ;
                        }

                        if(is_array($request->img_url[$key])){
                            $amou=array_keys($request->img_url[$key])[0];
                            $file= $request->img_url[$key][$amou];
                        }else{
                            $file= $request->img_url[$key] ;
                        }

                        $fileName=uniqid(). '.' .$file->getClientOriginalName();
                        $file->move(public_path('all_image'), $fileName);

                        $visa_entry=new Visa_Entry_File();
                        $visa_entry->visaentrys_id=$visa->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }


                     return Redirect::route('visa')->withInput()->with('alert.status', 'success')
                         ->with('alert.message', 'Visa  added successfully!');
                 }

             }else{
                 return back()->withInput()->with('alert.status', 'danger')
                     ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
            }catch (\Illuminate\Database\QueryException $e){
             return back()->withInput()->with('alert.status', 'danger')
                 ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
         }

       }


    public function edit($id)
    {

        $visa = Visa::find($id);
        $contact = Contact::all();
        $company = Company::all();
        $bill = Bill::all();
        return view('visa::visa.edit')->with(array('contact'=>$contact,'company'=>$company,'bill'=>$bill,'visa'=>$visa));

    }

    public function update(UpdatePostRequest $request,$id)
    {

        try{
            $visa = Visa::find($id);
            $visa->date                 = $request->visa_date;
            $visa->local_Reference      = $request->local_ref;
            $visa->visaNumber           = $request->visa_number;
            $visa->visaIssuedate        = $request->issue_date;
            $visa->company_id           = $request->company_name;
            $visa->numberofVisa         = $request->numberofvisa;
            $visa->destination          = $request->destination;
            $visa->registerSerial       = $request->registerSerial;
            $visa->idNum                = $request->flag_num;
            $visa->iqamaNumber          = $request->iqamaNumber?$request->iqamaNumber:Null;
            $visa->iqamaSector          = $request->iqamaSector?$request->iqamaSector:Null;
            $visa->visaType             = $request->visaType?$request->visaType:Null;
            $visa->expire_date          = $request->expire_date;
            $visa->visa_category_id     = $request->visa_category_id;
            $visa->updated_by           = Auth::id();

            if ($visa->save()) {

                if ($request->hasFile('img_url'))
                {
                    foreach ($request->img_url as $key=>$file)
                    {
                       $index= substr($key, 0, 3 );
                        if ($index =='old')
                        {
                            $fileName = uniqid() . 'st.' . $file->getClientOriginalName();
                            $file->move(public_path('all_image'), $fileName);

                            $id=explode('_',$key)[1];
                            $entry=Visa_Entry_File::find($id);
                            $image_path = public_path("all_image/$entry->img_url");
                            $entry->title=$request->title[$key];
                            $entry->img_url=$fileName;

                               if ($entry->save()){

                                   if(file_exists($image_path))
                                   {
                                       unlink($image_path);
                                   }
                                }

                        }else{

                            if (is_array($request->title[$key])) {
                                $tit = array_keys($request->title[$key])[0];
                                $title = $request->title[$key][$tit];
                            } else {
                                $title = $request->title[$key];
                            }

                            if (is_array($request->img_url[$key])) {
                                $amou = array_keys($request->img_url[$key])[0];
                                $file = $request->img_url[$key][$amou];
                            } else {
                                $file = $request->img_url[$key];
                            }

                            $fileName = uniqid() . '.' . $file->getClientOriginalName();
                            $file->move(public_path('all_image'), $fileName);

                            $visa_entry = new Visa_Entry_File();
                            $visa_entry->visaentrys_id = $visa->id;
                            $visa_entry->title = $title;
                            $visa_entry->img_url = $fileName;
                            $visa_entry->save();
                        }
                    }

                    return Redirect::route('visa')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Visa  added successfully!');
                }else{

                     $t=Visa_Entry_File::whereNotIn('id', $request->img_id)->get();

                      foreach ($t as $value){

                         $image_path = public_path("all_image/$value->img_url");

                       if ( $value->delete()){
                           if(file_exists($image_path))
                           {
                               unlink($image_path);
                           }
                       }
                    }
                    return Redirect::route('visa')->withInput()->with('alert.status','success')->with('alert.message', 'Visa  added successfully!');
                }
            } else {
                return back()->withInput()->with('alert.status','danger')->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');
            }
          }catch (\Exception $e){
            return back()->withInput()->with('alert.status','danger')->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');
         }

    }
    public function delete($id =null)
      {
         try{
           $visa = Visa::find($id);
           $Recruitorder=Recruitorder::where('registerSerial_id',$id)->first();
           if($Recruitorder){
               return back()->withInput()->with('alert.status', 'danger')
                   ->with('alert.message', 'You have order attached with this visa');
           }
           if(!$visa->bill_id)
             {
                 if ( $visa->delete()){
                     $t=Visa_Entry_File::where('visaentrys_id',$id)->get();
                     foreach ($t as $value){

                         $image_path = public_path("all_image/$value->img_url");

                         if ( $value->delete()){
                             if(file_exists($image_path))
                             {
                                 unlink($image_path);
                             }
                         }
                     }

                 return back()->withInput()->with('alert.status', 'danger')
                     ->with('alert.message', 'Visa deleted.');
                  }

             }else
             {
                 return back()->withInput()->with('alert.status', 'alert')
                              ->with('alert.message', 'You have a bill attached with this entry . Please delete bill first');
             }
          }catch (\Exception $e)
           {
                 return back()->withInput()->with('alert.status', 'alert')
                              ->with('alert.message', 'You have a bill attached with this entry . Please delete bill first');
           }
       }

      public function contact(){

        $contact = Contact::all();
        return response($contact);
      }

      public function pdf($id){

          echo base64_decode($id);
      }

  }


