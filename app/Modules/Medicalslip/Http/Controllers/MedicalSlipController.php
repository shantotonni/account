<?php

namespace App\Modules\Medicalslip\Http\Controllers;
use App\Models\Branch\Branch;
use App\Models\MedicalSlip\Report_File;
use App\Models\Recruit\Recruitorder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\MedicalSlipFormPax\MedicalSlipFormPax;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class MedicalSlipController extends Controller
{

    public function index($id=null)
    {
        $id=$id;

        if (is_null($id))
        {
            if (session('branch_id')==1){
                $branch=Branch::all();
                $recruit = Recruitorder::where('status' , 1)->get();
                return view('medicalslip::index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('recruitingorder.status',1)
                    ->select('recruitingorder.*')
                    ->get();
                return view('medicalslip::index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->where('recruitingorder.status',1)
                ->select('recruitingorder.*')
                ->get();
            return view('medicalslip::index',compact('id','branch','recruit'));

        }
    }

    public function create($id)
    {
        $pax_id = MedicalSlipFormPax::where('recruit_id' , $id)->first();
        if($pax_id == Null){
            return back()->with(['alert.message' => 'Pax Id not exists in the Gamca module' , 'alert.status' => 'danger']);
        }
        $medical=MedicalSlip::all();
        $recrut=Recruitorder::all();
        return view('medicalslip::create',compact('medical','recrut','id'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'medical_date' => 'required',
            'medical_centre_name' => 'required',

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }

        $medical=new MedicalSlip();
        $medical->pax_id=$request->paxid;
        $medical->medical_date=$request->medical_date;
        $medical->medical_report_date=$request->medical_report_date;
        $medical->medical_centre_name=$request->medical_centre_name;
        $medical->created_by=Auth::user()->id;
        $medical->updated_by=Auth::user()->id;
        $medical->save();

        if( $medical->save())
        {
            return Redirect::route('medicalslip')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Silp created successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Slip cannot be created.');
        }

    }


    public function edit($id)
    {

        $medical=Medicalslip::find($id);
        $recruit=Recruitorder::all();
        $order=Recruitorder::all();

        foreach ($recruit as $value){
            if ($value->id==$medical->pax_id){
                return view('medicalslip::edit',compact('medical','recruit','order'));
            }
        }

        return Redirect::route('medicalslip_create');
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'paxid' => 'required',
            'medical_centre_name' => 'required',
            'medical_date' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('medicalslip_edit',$id)->withErrors($validator);
        }
        $medical=Medicalslip::find($id);
        $medical->pax_id                =$request->paxid;
        $medical->status                =$request->status;
        $medical->medical_centre_name   =$request->medical_centre_name;
        $medical->medical_date          =$request->medical_date;
        $medical->medical_report_date   = $request->medical_report_date;
        $medical->comment               =$request->comment;
        $medical->reason                =$request->reason;
        $medical->medical_visit_date    =$request->medical_visit_date;
        $medical->updated_by            =Auth::user()->id;
        $medical->update();

        if( $medical->update())
        {
             return Redirect::route('medicalslip')->with('alert.status', 'success')
                    ->with('alert.message', 'Medical Silp Updated successfully!!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Slip cannot be Updated.');
        }
    }

    public function delete($id)
    {
        $medical=Medicalslip::find($id);
        $medical->delete();
        return back()->withInput()->with('alert.status', 'danger')
            ->with('alert.message', 'Slip deleted.');
    }
}
