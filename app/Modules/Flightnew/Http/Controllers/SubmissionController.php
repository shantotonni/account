<?php

namespace App\Modules\Flightnew\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Flightnew\Submission;
use App\Models\Flightnew\Submission_file;
use App\Models\Recruit\Recruitorder;
use App\Models\Completion\Completion;
use App\Models\Recruit_Customer\Recruit_customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class SubmissionController extends Controller
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

                return view('flightnew::submission.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->join('invoices','recruitingorder.invoice_id','=','invoices.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                    ->select('recruitingorder.*')
                    ->get();

                return view('flightnew::submission.index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->join('invoices','recruitingorder.invoice_id','=','invoices.id')
                ->where('users.branch_id',$id)
                ->where('recruitingorder.status',1)
                ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                ->select('recruitingorder.*')
                ->get();


            return view('flightnew::submission.index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $order= Recruitorder::all();
        $completion = Completion::where('paxid' , $id)->first();

        if($completion == Null){
            return back()->with(['alert.message' => 'Completion does not exists.' , 'alert.status' => 'danger']);
        }
        return view('flightnew::submission.create',compact('order','id'));
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'submission_date' => 'required',
                'expected_flight_date' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect::back()->withErrors($validator);
            }

            $submission = new Submission();
            $submission->pax_id =$request->pax_id;
            $submission->submission_date =$request->submission_date;
            $submission->expected_flight_date =$request->expected_flight_date;
            $submission->comment =$request->comment;

            $submission->created_by = Auth::id();
            $submission->updated_by = Auth::id();

            if( $submission->save())
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

                        $visa_entry=new Submission_file();
                        $visa_entry->submission_id=$submission->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }

                    return Redirect::route('submission')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Submission added successfully!');
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
        $submission = Submission::find($id);

        foreach ($order as $value){
            if ($value->id==$submission->pax_id){
                return view('flightnew::submission.edit',compact('recruit','order','submission'));
            }
        }
        return Redirect::route('submission_create',$id);
    }


    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'pax_id' => 'required',
                'submission_date' => 'required',
                'expected_flight_date' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect::back()->withErrors($validator);
            }

            $submission = Submission::find($id);
            $submission->pax_id =$request->pax_id;
            $submission->submission_date =$request->submission_date;
            $submission->expected_flight_date =$request->expected_flight_date;
            $submission->comment =$request->comment;

            $submission->updated_by = Auth::id();

            if( $submission->save())
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
                            $entry=Submission_file::find($id);
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

                            $visa_entry = new Submission_file();
                            $visa_entry->submission_id = $submission->id;
                            $visa_entry->title = $title;
                            $visa_entry->img_url = $fileName;
                            $visa_entry->save();
                        }
                    }

                    return Redirect::route('submission')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Submission updated successfully!');
                }else{

                    if($request->img_id){
                    $t=Submission_file::whereNotIn('id', $request->img_id)->get();

                    foreach ($t as $value){

                        $image_path = public_path("all_image/$value->img_url");

                        if ( $value->delete()){
                            if(file_exists($image_path))
                            {
                                unlink($image_path);
                            }
                        }
                    }
                    return Redirect::route('submission')->withInput()->with('alert.status', 'success')
                        ->with('alert.message', 'Submission updated successfully!');
                }
                else{
                    return back()->withInput()->with('alert.status','danger')->with('alert.message', 'Sorry, something went wrong! Data cannot be update.');
                }
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
        $mofa= Submission::find($id);
        $mofa->delete();
        return back()->withInput()->with('alert.status', 'danger')
            ->with('alert.message', 'Submission deleted.');
    }

    public function ownerApproval($id){
        $recruit=Recruitorder::find($id);
        if($recruit['submission'] != Null){
            if ($recruit->createdBy['type']==0){

                return view('flightnew::submission.approval',compact('recruit'));
            }else{
                return back()->withInput()->with('alert.status', 'danger')
                    ->with('alert.message', 'Owner approval do not access.');
            }
        }
        else{
            return back()->withInput()->with('alert.status', 'danger')
                    ->with('alert.message', 'Owner approval do not access.');
        }
    }

    public function ownerApprovalConfirm($id){

        $submission=Submission::find($id);
        $submission->owner_approval=1;
        $submission->save();

        return Redirect('submission')->with('alert.status', 'success')
            ->with('alert.message', 'Owner Approval Confirmed.');
    }

    public function ownerApprovalNotConfirm($id){

        $submission=Submission::find($id);
        $submission->owner_approval=0;
        $submission->save();

        return back()->withInput()->with('alert.status', 'success')
            ->with('alert.message', 'Owner Approval Not Confirmed.');
    }

}
