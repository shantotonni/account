<?php

namespace App\Modules\Manpower\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Manpower\Manpower;
use App\Models\Recruit\Recruitorder;
use App\Models\Training\Training;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ManpowerController extends Controller
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
                return view('manpower::manpower.index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->where('recruitingorder.registerSerial_id' , '!=' , Null)
                    ->select('recruitingorder.*')
                    ->get();
                return view('manpower::manpower.index',compact('id','branch','recruit'));
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
            return view('manpower::manpower.index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $order = DB::table("recruitingorder")->select('*')
            ->whereNOTIn('id',function($query){
                $query->select('paxid')->from('manpower');
            })
            ->get();

        $training = Training::where('paxid' , $id)->first();
        if($training == Null){
            return back()->with(['alert.message' => 'Training doesn\'t exists' , 'alert.status' => 'danger']);
        }

        return view('manpower::manpower.create',compact('order','manpower'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'issuingDate' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['paxid'];

        foreach ($condition as $condition) {
            $manpower = new Manpower();
            $manpower->issuingDate = $input['submissionDate'];
            $manpower->comment = $input['comment'];
            $manpower->paxid = $condition;
            $manpower->created_by =Auth::user()->id ;
            $manpower->updated_by =Auth::user()->id ;
            $manpower->save();
        }
        return Redirect::route('manpower_index')->with('create','Manpower Created');
    }

    public function edit($id)
    {
        $manpower=Manpower::all();
        $recruit=Recruitorder::find($id);
        $order=Recruitorder::all();
        return view('manpower::manpower.edit',compact('manpower','order','recruit'));
    }


    public function update(Request $request,$id){

        $manpower=Manpower::find($id);
        $manpower->submissionDate=$request->submissionDate;
        $manpower->comment=$request->comment;
        $manpower->updated_by=Auth::user()->id;
        $manpower->save();

        return Redirect::route('manpower_index')->with('create','Manpower Updated');
    }

    public function delete($id)
    {
        $company=Manpower::find($id);
        $company->delete();
        return Redirect::route('manpower_index')->with('delete','Manpower Deleted');
    }

}
