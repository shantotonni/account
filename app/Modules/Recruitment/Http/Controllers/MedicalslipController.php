<?php

namespace App\Modules\Recruitment\Http\Controllers;

use App\Models\Formbasis\Formbasis;
use App\Models\MedicalSlipForm\Gamca_file;
use App\Models\MedicalSlipForm\Gamca_Received_submit;
use App\Models\MedicalSlipForm\MedicalSlipForm;
use App\Models\MedicalSlipFormPax\MedicalSlipFormPax;
use App\Models\Recruit\Recruitorder;
use App\Models\Okala\Okala;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use mPDF;

class MedicalslipController extends Controller
{

    public function index(){

        $basis=MedicalSlipForm::all();

//        foreach ($test as $value){
//            echo $value->medicalslipFromSubmit."<br>";
//            echo $value->medicalslipFromPax."<br>";
//        }
 
        //$basis= DB::select("SELECT GROUP_CONCAT(recruitingorder.paxid) as id,medical_slip_form.dateOfApplication ,medical_slip_form_pax.medicalslip_id FROM medical_slip_form JOIN medical_slip_form_pax on medical_slip_form.id= medical_slip_form_pax.medicalslip_id JOIN recruitingorder ON recruitingorder.id= medical_slip_form_pax.recruit_id GROUP BY medical_slip_form_pax.medicalslip_id");

        return view('recruitment::medicalslipform.index',compact('basis'));
    }

    public function create(){
        $order=Recruitorder::all();
        return view('recruitment::medicalslipform.create',compact('order'));
    }

     public function check($recruit,$received)
     {
        if (!$received==''){
            $flug=true;
            foreach ($received as $value)
            {
                if (!in_array($value, $recruit))
                {
                    $flug = false;
                }
            }
            if (!$flug){

                Session::flash('message', 'Passport Received Data and Pax Id not match');
            }
            return $flug;
        }else{
            return false;
        }
     }

    public function check2($received,$submitted)
    {
        if (!$submitted=='' && !$received==''){
            $flug=true;
            foreach ($submitted as $value) {
                if (!in_array($value, $received)) {
                    $flug = false;
                }
            }
            if (!$flug){

                Session::flash('message', 'Passport Received Data and Passport Submitted Data not match');
            }
            return $flug;
        }else{
            return false;
        }

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'dateOfApplication' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $recruit_id = $request->recruit_id;
        
//       for($i=0; $i<count($recruit_id);$i++){
//            $okala = Okala::where('paxid' , $recruit_id[$i])->first();
//            $pax=Recruitorder::find($recruit_id[$i]);
//            if(($okala == Null) || ($okala->status == 0 )){
//                return back()->with(['alert.message' => 'Okala pax id '.$pax->paxid.' status not ok.' , 'alert.status' => 'danger']);
//            }
//       }
//

        $input = Input::all();
        $condition = $input['recruit_id'];

        $received_status = isset($input['received_status'])?$input['received_status']:null;
        $submitted_status = isset($input['submitted_status'])?$input['submitted_status']:null;

        $is_valid= $this->check($condition,$received_status,$submitted_status);
        $is_valid2= $this->check2($received_status,$submitted_status);
        

        if ($is_valid && $is_valid2) {

            $medical = new MedicalSlipForm();
            $medical->dateOfApplication = $request->dateOfApplication;
            $medical->country_name = $request->country_name;
            $medical->created_by = Auth::user()->id;
            $medical->updated_by = Auth::user()->id;
            $medical->save();

            if ($medical) {
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

                        $visa_entry=new Gamca_file();
                        $visa_entry->medical_slip_form_id=$medical->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }
                }

                if ($received_status!=null && $submitted_status==null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=null;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();
                    }
                }
                if ($received_status!=null && $submitted_status!=null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=1;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();
                    }
                }

                foreach ($condition as $cond) {
                    $formpax = new MedicalSlipFormPax();
                    $formpax->medicalslip_id = $medical->id;
                    $formpax->recruit_id = $cond;
                    $formpax->save();

                }
                return Redirect::route('medical_slip_form_index')->with('msg', 'data Inserted');
            }
        }elseif($submitted_status==null || ($is_valid && $is_valid2)){

            $medical = new MedicalSlipForm();
            $medical->dateOfApplication = $request->dateOfApplication;
            $medical->country_name = $request->country_name;
            $medical->created_by = Auth::user()->id;
            $medical->updated_by = Auth::user()->id;
            $medical->save();

            if ($medical) {

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

                        $visa_entry=new Gamca_file();
                        $visa_entry->medical_slip_form_id=$medical->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }
                }

                if ($received_status!=null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=null;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();
                    }
                }else{
                    $gamca_receive_submit=new Gamca_Received_submit();
                    $gamca_receive_submit->medical_slip_form_id=$medical->id;
                    $gamca_receive_submit->received_status=null;
                    $gamca_receive_submit->submitted_status=null;
                    $gamca_receive_submit->pax_id=null;
                    $gamca_receive_submit->save();
                }

                foreach ($condition as $cond) {
                    $formpax = new MedicalSlipFormPax();
                    $formpax->medicalslip_id = $medical->id;
                    $formpax->recruit_id = $cond;
                    $formpax->save();

                }
                return Redirect::route('medical_slip_form_index')->with('msg', 'data Inserted');
            }
        }
        else{
            return Redirect::route('medical_slip_form_create')->with('message', 'Sorry Pax ID, Passport Received & Passport Submitted not matched');
        }

        return Redirect::route('medical_slip_form_create')->with('message', 'data not Inserted');

    }

    public function edit($id){

        $rec=Recruitorder::all();

        $immipax=MedicalSlipFormPax::where('medicalslip_id',$id)->get();
        $gamca_receive_submit=Gamca_Received_submit::where('medical_slip_form_id',$id)->get();
        $gamca_receive_submit2=Gamca_Received_submit::where('medical_slip_form_id',$id)
                                                    ->where('submitted_status',1)
                                                    ->get();

        $query=MedicalSlipForm::find($id);

        return view('recruitment::medicalslipform.edit',compact('formpax','rec','query','immipax','gamca_receive_submit','gamca_receive_submit2'));
    }


    public function update(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'recruit_id' => 'required',
            'dateOfApplication' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $input = Input::all();
        $condition = $input['recruit_id'];

        $received_status = isset($input['received_status']) ? $input['received_status'] : null;
        $submitted_status = isset($input['submitted_status']) ? $input['submitted_status'] : null;

        $is_valid = $this->check($condition, $received_status, $submitted_status);
        $is_valid2 = $this->check2($received_status, $submitted_status);

        if ($is_valid && $is_valid2) {

            $medical = MedicalSlipForm::find($id);
            $medical->dateOfApplication = $request->dateOfApplication;
            $medical->country_name = $request->country_name;
            $medical->created_by = Auth::user()->id;
            $medical->updated_by = Auth::user()->id;
            $medical->save();

            if ($medical) {

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

                        $visa_entry=new Gamca_file();
                        $visa_entry->medical_slip_form_id=$medical->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }
                }

                $delete = MedicalSlipFormPax::where('medicalslip_id', $id)->delete();
                $delete = Gamca_Received_submit::where('medical_slip_form_id', $id)->delete();

                if ($received_status!=null && $submitted_status==null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=null;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();

                    }
                }
                if ($received_status!=null && $submitted_status!=null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=1;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();

                    }
                }

                foreach ($condition as $cond) {
                    $formpax = new MedicalSlipFormPax();
                    $formpax->medicalslip_id = $medical->id;
                    $formpax->recruit_id = $cond;
                    $formpax->save();

                }

                return redirect()->route('medical_slip_form_index')->with('msg', 'data Updated');
            }

        }elseif($submitted_status==null || ($is_valid && $is_valid2)){
            $medical = MedicalSlipForm::find($id);
            $medical->dateOfApplication = $request->dateOfApplication;
            $medical->country_name = $request->country_name;
            $medical->created_by = Auth::user()->id;
            $medical->updated_by = Auth::user()->id;
            $medical->save();

            if ($medical) {

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

                        $visa_entry=new Gamca_file();
                        $visa_entry->medical_slip_form_id=$medical->id;
                        $visa_entry->title=$title;
                        $visa_entry->img_url=$fileName;
                        $visa_entry->save();
                    }
                }

                $delete = MedicalSlipFormPax::where('medicalslip_id', $id)->delete();
                $delete = Gamca_Received_submit::where('medical_slip_form_id', $id)->delete();

                if ($received_status!=null){
                    foreach ($received_status as $value){
                        $gamca_receive_submit=new Gamca_Received_submit();
                        $gamca_receive_submit->medical_slip_form_id=$medical->id;
                        $gamca_receive_submit->received_status=1;
                        $gamca_receive_submit->submitted_status=null;
                        $gamca_receive_submit->pax_id=$value;
                        $gamca_receive_submit->save();
                    }
                }else{
                    $gamca_receive_submit=new Gamca_Received_submit();
                    $gamca_receive_submit->medical_slip_form_id=$medical->id;
                    $gamca_receive_submit->received_status=null;
                    $gamca_receive_submit->submitted_status=null;
                    $gamca_receive_submit->pax_id=null;
                    $gamca_receive_submit->save();
                }

                foreach ($condition as $cond) {
                    $formpax = new MedicalSlipFormPax();
                    $formpax->medicalslip_id = $medical->id;
                    $formpax->recruit_id = $cond;
                    $formpax->save();

                }

                return redirect()->route('medical_slip_form_index')->with('msg', 'data Updated');
            }
        }
        return redirect()->back()->with('delete', 'data not Updated');

    }

    public function delete($id){

        $formpax=MedicalSlipForm::find($id);

        if ($formpax->delete()){

            $delete = MedicalSlipFormPax::where('medicalslip_id',$id)->delete();
        }

        return redirect()->back()->with('delete','data Deleted');
    }


    public function download($id){


        $basis= DB::select("SELECT medical_slip_form.dateOfApplication,medical_slip_form.country_name ,recruit_customer.passengerNameBN,recruit_customer.passportNumberBN,medical_slip_form_pax.medicalslip_id,contact.display_name,recruitingorder.passportNumber,recruitingorder.passenger_name FROM medical_slip_form JOIN medical_slip_form_pax on medical_slip_form.id= medical_slip_form_pax.medicalslip_id JOIN recruitingorder ON recruitingorder.id= medical_slip_form_pax.recruit_id JOIN contact ON contact.id= recruitingorder.customer_id JOIN recruit_customer ON recruit_customer.pax_id= recruitingorder.id WHERE medical_slip_form.id= :id",array('id'=>$id));
           // dd($basis);
        $formbasis=Formbasis::first();

        $mpdf = new mPDF('utf-8', 'A4-P');
        $mpdf->SetTitle('My Title');
        $view =  view('recruitment::medicalslipform.medical_slip',compact('basis','formbasis'));
        $mpdf->WriteHTML($view);
        $mpdf->Output('medical_slip-'.Carbon::now().'.pdf','I');
    }
}
