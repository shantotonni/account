<?php

namespace App\Modules\Training\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Models
use App\Models\Branch\Branch;
use App\Models\Training\Training;
use App\Models\Training\TrainingFile;
use App\Models\Recruit\Recruitorder;
use App\Models\Fingerprint\Fingerprint;
use Auth;

class TrainingController extends Controller
{

    public function index($id=null)
    {
        $id=$id;

        if (is_null($id))
        {
            if (session('branch_id')==1){
                $branch=Branch::all();
                $recruit = Recruitorder::where('status' , 1)
                ->where('registerSerial_id' , '!=' , Null)
                ->get();
                return view('training::training.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                    ->select('recruitingorder.*')
                    ->get();
                return view('training::training.index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->where('recruitingorder.status',1)
                ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                ->select('recruitingorder.*')
                ->get();
            return view('training::training.index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $order=Recruitorder::find($id);
        $finger = Fingerprint::where('paxid' , $id)->first();

        if(($finger == Null) || ($finger->bmet_status == 0)){
            return back()->with(['alert.message' => 'Finger BMET status is not ok.' , 'alert.status' => 'danger']);
        }
        return view('training::training.create',compact('order'));
    }

    public function store(Request $request,$id)
    {
        $date = date('Y-m-d', strtotime($request->received_date));
        
        $result=new Training();
        $result->received_date              = $date;
        $result->number                     = $request->number;
        $result->center_name                = $request->center_name;
        $result->comment                    = $request->comment;
        $result->paxid                      = $id;
        $result->created_by                 = Auth::user()->id;
        $result->updated_by                 = Auth::user()->id;

        if($result->save()){
            //dd($result->id);
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

                        $visa_entry=new TrainingFile();
                        $visa_entry->training_id=$result->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }


                     return Redirect::route('training_index')->withInput()->with('alert.status', 'success')
                         ->with('alert.message', 'Training added successfully!');
                 }
        }

        else{
                 return back()->withInput()->with('alert.status', 'danger')
                     ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
            }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $recruit=Recruitorder::find($id);
        $order=Recruitorder::all();
        $finger=Training::all();
        foreach ($finger as $value){
            if ($value->paxid==$recruit->id){
                return view('training::training.edit',compact('finger','order','recruit'));
            }
        }

        return Redirect::route('training_create',$id);
    }

    public function update(Request $request, $id)
    {
        $date = date('Y-m-d', strtotime($request->received_date));

        $result=Training::find($id);
        $result->received_date              = $date;
        $result->number                     = $request->number;
        $result->center_name                = $request->center_name;
        $result->comment                    = $request->comment;
        $result->updated_by                 = Auth::user()->id;

        if($result->update())
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
                            $entry=TrainingFile::find($id);
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

                            $visa_entry = new TrainingFile();
                            $visa_entry->training_id = $result->id;
                            $visa_entry->title = $title;
                            $visa_entry->img_url = $fileName;
                            $visa_entry->save();
                        }
                    }

                    return Redirect::route('training_index')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Finger print  added successfully!');
                }else{

                    if($request->img_id){
                     $t=TrainingFile::whereNotIn('id', $request->img_id)->get();

                      foreach ($t as $value){

                         $image_path = public_path("all_image/$value->img_url");

                       if ( $value->delete()){
                           if(file_exists($image_path))
                           {
                               unlink($image_path);
                           }
                       }
                    }
                    return Redirect::route('training_index')->withInput()->with('alert.status','success')->with('alert.message', 'Finger print updated successfully!');
                    }
                    else{
                        return back()->withInput()->with('alert.status','danger')->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');
                    }
                }
        }

        else {
                return back()->withInput()->with('alert.status','danger')->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');
            }
    }

    public function destroy($id)
    {
        //
    }
}
