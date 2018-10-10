<?php

namespace App\Modules\Recruitdashboard\Http\Controllers;

use App\Models\Document\Document;
use App\Models\Fingerprint\Fingerprint;
use App\Models\Fitcard\Fit_Card;
use App\Models\Flight\Flight;
use App\Models\Manpower\Manpower;
use App\Models\MedicalSlip\Medicalslip;
use App\Models\Mofa\Mofa;
use App\Models\Musaned\Musaned;
use App\Models\Okala\Okala;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visa;
use App\Models\VisaStamp\VisaStamp;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function index()
    {
        $Rorder=Recruitorder::orderBy('created_at','desc')
                              ->get();

        $cancelled_order=Recruitorder::join('contact', 'recruitingorder.customer_id', '=', 'contact.id')
                                     ->where('recruitingorder.status', '=',1)
                                     ->where('recruitingorder.order_status', '=',2)
                                     ->get();

        $recruit=Recruitorder::join('medicalslip', 'recruitingorder.id', '=', 'medicalslip.pax_id')
                              ->leftjoin('mofas','recruitingorder.id', '=', 'mofas.pax_id')
                              ->join('contact', 'recruitingorder.customer_id', '=', 'contact.id')
                              ->select(DB::raw('recruitingorder.passenger_name ,recruitingorder.paxid,medicalslip.medical_report_date,contact.display_name'))
                              ->where('recruitingorder.status', '=',1)
                              ->where('medicalslip.status', '=',1)
                              ->where('mofas.status', '=',0)
                              ->orWhere('mofas.status', '=',null)
                              ->get();

        $recruit2=       Recruitorder::join('fit_card', 'recruitingorder.id', '=', 'fit_card.pax_id')
                                     ->leftjoin('confirmations','recruitingorder.id', '=', 'confirmations.pax_id')
                                     ->join('contact', 'recruitingorder.customer_id', '=', 'contact.id')
                                     ->select(DB::raw('recruitingorder.passenger_name ,recruitingorder.paxid,fit_card.receive_date,contact.display_name'))
                                     ->where('recruitingorder.status', '=',1)
                                     ->where('fit_card.receive_date', '!=',null)
                                     ->where('confirmations.date_of_flight', '=',null)
                                     ->get();

        $visa_vil_reminder = Visa::with('RecruitOrder')
                                   ->VisaValidityReminder()
                                   ->select(DB::raw('visaentrys.*,datediff(visaentrys.expire_date,CURDATE()) as leftdays'))
                                   ->get();

        $stamping_without_payment = VisaStamp::with('paxId')
                                               ->ReturnDateNotNull()
                                               ->EappilicationNotNull()
                                               ->DueAmountNotZero()
                                               ->get();

        $manpower_payment = Fit_Card::with('pax_Id')
                                      ->SelectDaysLeft()
                                      ->PaxStatus()
                                      ->RecieveDateNotNull()
                                      ->ManpowerRecieveDateNotNull()
                                      ->get();

       return view('recruitdashboard::index',compact('okala','flight','mofa','ft','medical','visastamp','Rorder','document','manpower','musaned','visaentry','recruit','recruit2','cancelled_order','visa_vil_reminder','stamping_without_payment','manpower_payment'));
    }



//
//    public function search(Request $request)
//    {
//        /*$current_time = Carbon::now()->toDayDateTimeString();*/
//        $from=date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
//        $to =date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
//        $okala=Okala::whereBetween('created_at',[ $from,$to])->get();
//        $flight=Flight::whereBetween ('created_at',[ $from,$to])->get();
//        $mofa=Mofa::whereBetween ('created_at',[ $from,$to])->get();
//        $ft=Fingerprint::whereBetween ('created_at',[ $from,$to])->get();
//        $visaentry=Visa::whereBetween ('created_at',[ $from,$to])->get();
//        $manpower=Manpower::whereBetween ('created_at',[ $from,$to])->get();
//        $musaned=Musaned::whereBetween ('created_at',[ $from,$to])->get();
//        $medical=Medicalslip::whereBetween ('created_at',[ $from,$to])->get();
//        $visastamp=VisaStamp::whereBetween ('created_at',[ $from,$to])->get();
//        $document=Document::whereBetween ('created_at',[ $from,$to])->get();
//        $Rorder=Recruitorder::whereBetween ('created_at',[ $from,$to])->get();
//        //return $okala;
//        return view('recruitdashboard::index',compact('okala','flight','mofa','visaentry','Rorder','medical','visastamp','document','musaned','manpower','from','ft','to'));
//    }


}