<?php

namespace App\Modules\Completion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Models
use App\Models\Branch\Branch;
use App\Models\Completion\Completion;
use App\Models\Completion\CompletionFile;
use App\Models\Recruit\Recruitorder;
use App\Models\Manpower\Manpower;
use Auth;


class CompletionController extends Controller
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
                return view('completion::completion.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                    ->select('recruitingorder.*')
                    ->get();
                return view('completion::completion.index',compact('id','branch','recruit'));
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
            return view('completion::completion.index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $order=Recruitorder::find($id);
        $manpower = Manpower::where('paxid' , $id)->first();

        if($manpower == Null){
            return back()->with(['alert.message' => 'Manpower doesn\'t exists.' , 'alert.status' => 'danger']);
        }

        return view('completion::completion.create',compact('order'));
    }

    public function store(Request $request,$id)
    {
        $date = date('Y-m-d', strtotime($request->date));
        
        $result=new Completion();
        $result->date                       = $date;
        $result->smart_card_number          = $request->smart_card_number;
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

                        $visa_entry=new CompletionFile();
                        $visa_entry->completion_id=$result->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }


                     return Redirect::route('completion_index')->withInput()->with('alert.status', 'success')
                         ->with('alert.message', 'Completion added successfully!');
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
        $finger=Completion::all();
        foreach ($finger as $value){
            if ($value->paxid==$recruit->id){
                return view('completion::completion.edit',compact('finger','order','recruit'));
            }
        }

        return Redirect::route('completion_create');
    }

    public function update(Request $request, $id)
    {
        $date = date('Y-m-d', strtotime($request->date));
        
        $result=Completion::find($id);
        $result->date                       = $date;
        $result->smart_card_number          = $request->smart_card_number;
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
                            $entry=CompletionFile::find($id);
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

                            $visa_entry = new CompletionFile();
                            $visa_entry->completion_id = $result->id;
                            $visa_entry->title = $title;
                            $visa_entry->img_url = $fileName;
                            $visa_entry->save();
                        }
                    }

                    return Redirect::route('completion_index')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Completion added successfully!');
                }else{
                    if($request->img_id){
                     $t=CompletionFile::whereNotIn('id', $request->img_id)->get();

                      foreach ($t as $value){

                         $image_path = public_path("all_image/$value->img_url");

                       if ( $value->delete()){
                           if(file_exists($image_path))
                           {
                               unlink($image_path);
                           }
                       }
                    }
                    return Redirect::route('completion_index')->withInput()->with('alert.status','success')->with('alert.message', 'Completion updated successfully!');
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
