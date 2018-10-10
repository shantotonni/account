<?php

namespace App\Modules\Mofa\Http\Controllers\mofa;

use App\Models\Branch\Branch;
use App\Models\Mofa\Mofa;
use App\Models\Mofa\Mofa_File;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\Recruit\Recruitorder;
use App\Modules\Mofa\Http\Requests\mofa\CreatePostRequest;
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
                $recruit = Recruitorder::where('status' , 1)->get();
                return view('mofa::mofa.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->select('recruitingorder.*')
                    ->get();
                return view('mofa::mofa.index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->where('recruitingorder.status',1)
                ->select('recruitingorder.*')
                ->get();
            return view('mofa::mofa.index',compact('id','branch','recruit'));

        }
    }


    public function create($id)
    {
        $order= Recruitorder::all();
        $report = Medicalslip::where('pax_id' , $id)->first();

        if(($report == Null) || ($report->status == 0)){
            return back()->with(['alert.message' => 'Report Status is unfit' , 'alert.status' => 'danger']);
        }
        return view('mofa::mofa.create',compact('order','id'));
    }


    public function store(CreatePostRequest $request)
    {
      try{

          $mofa = new Mofa();
          $mofa->pax_id =$request->pax_ref;
          $mofa->mofaNumber =$request->mofa_number;
          $mofa->iqamaNumber =$request->iqamaNumber?$request->iqamaNumber:Null;
          $mofa->mofaDate =$request->mofa_date;
          $mofa->status =$request->status;
          $mofa->comment =$request->comments;

          $mofa->profession =$request->profession;
          $mofa->medical_submit_date =$request->medical_submit_date;

          $mofa->created_by = Auth::id();
          $mofa->updated_by = Auth::id();


          if( $mofa->save())
          {
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

                      $visa_entry=new Mofa_File();
                      $visa_entry->mofa_id=$mofa->id;
                      $visa_entry->title=$title;
                      $visa_entry->img_url=$fileName;
                      $visa_entry->save();
                  }

                  return Redirect::route('mofa')->withInput()->with('alert.status', 'success')
                      ->with('alert.message', 'Mofa added successfully!');
              }

          }else{
              return back()->withInput()->with('alert.status', 'danger')
                  ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
          }
      }catch (\Exception $exception){
          return back()->withInput()->with('alert.status', 'danger')
              ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
      }

    }


    public function edit($id)
    {
        $recruit=Recruitorder::find($id);
        $order=Recruitorder::all();
        $mofa = Mofa::find($id);

        foreach ($order as $value){
            if ($value->id==$mofa->pax_id){
                return view('mofa::mofa.edit',compact('recruit','order','mofa'));
            }
        }
        return Redirect::route('mofa_create',$id);
    }


    public function update(CreatePostRequest $request, $id)
    {
       try{
           $mofa = Mofa::find($id);
           $mofa->pax_id =$request->pax_ref;
           $mofa->mofaNumber =$request->mofa_number;
           $mofa->iqamaNumber =$request->iqamaNumber?$request->iqamaNumber:Null;
           $mofa->mofaDate =$request->mofa_date;
           $mofa->status =$request->status;
           $mofa->comment =$request->comments;

           $mofa->profession =$request->profession;
           $mofa->medical_submit_date =$request->medical_submit_date;

           $mofa->updated_by = Auth::id();
           if( $mofa->save())
           {
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
                           $entry=Mofa_File::find($id);
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

                           $visa_entry = new Mofa_File();
                           $visa_entry->mofa_id = $mofa->id;
                           $visa_entry->title = $title;
                           $visa_entry->img_url = $fileName;
                           $visa_entry->save();
                       }
                   }

                   return Redirect::route('mofa')->withInput()->with('alert.status', 'success')
                       ->with('alert.message', 'Mofa updated successfully!');
               }else{

                   $t=Mofa_File::whereNotIn('id', $request->img_id)->get();

                   foreach ($t as $value){

                       $image_path = public_path("all_image/$value->img_url");

                       if ( $value->delete()){
                           if(file_exists($image_path))
                           {
                               unlink($image_path);
                           }
                       }
                   }
                   return Redirect::route('mofa')->withInput()->with('alert.status', 'success')
                       ->with('alert.message', 'Mofa updated successfully!');
               }

           }else
           {
               return back()->withInput()->with('alert.status', 'danger')
                   ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
           }
       }catch (\Exception $exception){
           return back()->withInput()->with('alert.status', 'danger')
               ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
       }

    }

    public function delete($id)
    {
            $mofa= Mofa::find($id);
            $mofa->delete();
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Visa deleted.');
    }
}
