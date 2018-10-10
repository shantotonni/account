<?php

namespace App\Modules\Policeclearance\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Models
use App\Models\Branch\Branch;
use App\Models\PoliceClearance\PoliceClearance;
use App\Models\PoliceClearance\PoliceClearanceFile;
use App\Models\Recruit\Recruitorder;
use App\Models\Fitcard\Fit_Card;
use Auth;

class PoliceClearanceController extends Controller
{

    public function index($id=null)
    {
        $id=$id;

        if (is_null($id))
        {
            if (session('branch_id')==1){
                $branch=Branch::all();
                $recruit = Recruitorder::where('status' , 1)->get();
                return view('policeclearance::police.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->select('recruitingorder.*')
                    ->get();
                return view('policeclearance::police.index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->where('recruitingorder.status',1)
                ->select('recruitingorder.*')
                ->get();
            return view('policeclearance::police.index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $order=Recruitorder::find($id);
        $fit_card = Fit_Card::where('pax_id' , $id)->first();

        if($fit_card == Null){
            return back()->with(['alert.message' => 'Fit card does not exists' , 'alert.status' => 'danger']);
        }
        return view('policeclearance::police.create',compact('order'));
    }

    public function store(Request $request,$id)
    {
        $date = date('Y-m-d', strtotime($request->submission_date));
        
        $result=new PoliceClearance();
        $result->submission_date            = $date;
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

                        $visa_entry=new PoliceClearanceFile();
                        $visa_entry->police_clearance_id=$result->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }


                     return Redirect::route('police_clearance_index')->withInput()->with('alert.status', 'success')
                         ->with('alert.message', 'Police Clearance added successfully!');
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
        $finger=PoliceClearance::all();
        foreach ($finger as $value){
            if ($value->paxid==$recruit->id){
                return view('policeclearance::police.edit',compact('finger','order','recruit'));
            }
        }

        return Redirect::route('police_clearance_create',$id);
    }

    public function update(Request $request, $id)
    {
        $date = date('Y-m-d', strtotime($request->submission_date));
        
        $result=PoliceClearance::find($id);
        $result->submission_date            = $date;
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
                            $entry=PoliceClearanceFile::find($id);
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

                            $visa_entry = new PoliceClearanceFile();
                            $visa_entry->police_clearance_id = $result->id;
                            $visa_entry->title = $title;
                            $visa_entry->img_url = $fileName;
                            $visa_entry->save();
                        }
                    }

                    return Redirect::route('police_clearance_index')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Police clearance added successfully!');
                }else{

                    if($request->img_id){
                         $t=PoliceClearanceFile::whereNotIn('id', $request->img_id)->get();
                         
                          foreach ($t as $value){

                             $image_path = public_path("all_image/$value->img_url");

                           if ( $value->delete()){
                               if(file_exists($image_path))
                               {
                                   unlink($image_path);
                               }
                           }
                        }
                        return Redirect::route('police_clearance_index')->withInput()->with('alert.status','success')->with('alert.message', 'Police clearance updated successfully!');
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
