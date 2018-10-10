<?php

namespace App\Modules\Customer\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Contact\Contact;
use App\Models\Document\Category;
use App\Models\Document\Document;
use App\Models\Fingerprint\Fingerprint;
use App\Models\Flight\Flight;
use App\Models\Manpower\Manpower;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\Mofa\Mofa;
use App\Models\Musaned\Musaned;
use App\Models\Okala\Okala;
use App\Models\Recruit\Recruitorder;
use App\Models\VisaStamp\VisaStamp;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
                $recruit = Recruitorder::where('status',1)->get();
                return view('customer::index',compact('id','branch','recruit'));
            }
            else {
                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->where('status',1)
                    ->select('recruitingorder.*')
                    ->get();
                return view('customer::index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->where('status',1)
                ->select('recruitingorder.*')
                ->get();
            return view('customer::index',compact('id','branch','recruit'));

        }
    }

     public function update($id)
    {
       $id = $id;

       $cust=Recruitorder::where('paxid',$id)->first();
       return view('customer::update',compact('cust','id'));
    }

    public function document($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();

       // $document=Document::where('pax_id',$Rorder->id)->get();
        return view('customer::document',compact('document','id','recruit'));
    }

    public function order($id)
    {
        $id=$id;
        $order=Recruitorder::where('paxid',$id)->get();
        return view('customer::order',compact('order','id'));
    }
    public function okala($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::okala',compact('okala','id','recruit'));
    }

    public function gamca($id)
    {
        $id=$id;
        $recruit=Recruitorder::join('medical_slip_form_pax','recruitingorder.id','=','medical_slip_form_pax.recruit_id')
            ->join('medical_slip_form','medical_slip_form_pax.medicalslip_id','=','medical_slip_form.id')
            ->select(DB::raw('recruitingorder.paxid ,medical_slip_form.dateOfApplication,medical_slip_form_pax.medicalslip_id'))
            ->where('recruitingorder.paxid',$id)->first();

        return view('customer::gamca',compact('medical','id','recruit'));
    }

    public function mofa($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::mofa',compact('mofa','id','recruit'));
    }
    public function musaned($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::musaned',compact('musa','id','recruit'));
    }

    public function stamping($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::stamping',compact('stamp','id','recruit'));
    }

    public function finger($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::finger',compact('finger','id','recruit'));
    }
    public function manpower($id){

        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::manpower',compact('mpower','id','recruit'));
    }

    public function report($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::report',compact('flight','id','recruit'));
    }

    public function fitCard($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::fitcard',compact('flight','id','recruit'));
    }
    public function training($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::training',compact('flight','id','recruit'));
    }
    public function completion($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::completion',compact('flight','id','recruit'));
    }
    public function submission($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::submission',compact('flight','id','recruit'));
    }

    public function confirmation($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::confirmation',compact('flight','id','recruit'));
    }

    public function policeClearance($id)
    {
        $id=$id;
        $recruit=Recruitorder::where('paxid',$id)->first();
        return view('customer::police_clearance',compact('flight','id','recruit'));
    }

    public function customerDeshboard($id)
    {
        $id=$id;
        $recruit_order=Recruitorder::where('paxid',$id)->first();
        return view('customer::dashboard',compact('flight','id','recruit_order'));
    }
    public function customerAgent($id)
    {
        $id=$id;
        $recruit_order=Recruitorder::where('paxid',$id)->first();
        $contact=Contact::where('id',$recruit_order->customer_id)->first();
        if ($contact){

            return Redirect::route('contact_view',$contact->id);
        }else{
            return redirect()->back();
        }
    }
}
