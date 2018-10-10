<?php

namespace App\Modules\Recrutereport\Http\Controllers;

use App\Models\Company\Company;
use App\Models\Flight\Flight;
use App\Models\Okala\Okala;
use App\Models\Branch\Branch;
use App\Models\OrganizationProfile\OrganizationProfile;
use App\Models\MedicalSlip\Medicalslip;
use Auth;

use Carbon\Carbon;
use DateTime;
use App\Models\Recruit\Recruitorder;
use App\Models\Visa\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RreportController extends Controller
{

    public function index()
    {
        return view('recrutereport::index');
    }


    public function vendor()
    {
          /*$rvendor= Flight::all()->groupby('vendor_id')->count('paxid');*/
//         $rvendor=Flight::all();
//         $rvendorUnique=$rvendor->unique('vendor_id')->count('id');
        /*$rvendor=DB::table('flight')->select(count('paxid'),'vendor_id')->groupby('vendor_id')->get();*/
        $rvendor=DB::select('SELECT COUNT(\'paxid\') as paxid,vendor_id FROM flight GROUP BY vendor_id');
        $current_time = Carbon::now()->toDayDateTimeString();
        $start =(new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end =(new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $company=Company::find(1);
        return view('recrutereport::vendor',compact('rvendor','start','end','company'));
    }

    public function vendorList($id)
    {

        $rvendor=Flight::where('vendor_id',$id)->get();
        $current_time = Carbon::now()->toDayDateTimeString();
        $start =(new DateTime($current_time))->modify('-14 day')->format('Y-m-d');
        $end =(new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $flight=Flight::whereBetween('created_at',[$start,$end])->get();
        $company=Company::find(1);
        //return $flight;
        //return $id;
        return view('recrutereport::vendorlist',compact('rvendor','company','start','end','flight'));
    }

     public function vendorSearch(Request $request){
         $rvendor=Flight::all();
         $company=Company::find(1);
         $start = date("Y-m-d",strtotime($request->input('from_date'))).' '.'00:00:00';
         $end = date("Y-m-d",strtotime($request->input('to_date')."+1 day")).' '.'00:00:00';
         $flight=Flight::whereBetween('created_at',[$start,$end])->get();
         //return $flight;
         return view('recrutereport::vendor',compact('rvendor','start','end','flight','company'));

     }
    /*public function ticketvendorSearch($id){
        $rvendor=Flight::all();
        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-30 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');
        $flight=Flight::whereBetween('created_at',[$start,$end])->where('vendor_id',$id)->get();
        return view('recrutereport::vendorlist',compact('rvendor','start','end','flight','company'));
    }**/

    public function company()
    {
        $company_id = [];
        $pax_ids = [];
        $i = 0;
        $paxIds=Recruitorder::all();
        foreach ($paxIds as $paxId)
        {
            $pax_ids[$i] = $paxId->paxid;
            $company_id[$i] = Visa::find($paxId->registerSerial_id)->company_id;

            $i++;
        }
        $max_value=max($company_id);

        $uniqe=array_fill(0, $max_value+1, 0);

        for($i = 0; $i <= $max_value; $i++)
        {
            $uniqe[$company_id[$i]] = $uniqe[$company_id[$i]] + 1;
        }

        /*$data = [];

        for($i = 0; $i < count($uniqe); $i++)
        {
            if($uniqe[$i] != 0)
            {
                $object = array(
                    'company_name'  => Company::find($i)->name,
                    'okala'         => $uniqe[$i],
                );
                return json_encode($object);
            }

        }
        return json_encode($object);*/


        return view('recrutereport::company',compact ('uniqe'));
    }

    public function companyList()
    {

        $visa_list=Visa::all();

         foreach($visa_list as $all)
        {
             $new = $all->Contact->id;
             $order = Recruitorder::where('id' , $new)->first();
            return $order->paxid;
        }
       /* dd($visa_list);*/


        return view('recrutereport::companyList',compact('visa_list'));
    }

    public function visa()
    {
         $visa=Visa::all();
        return view('recrutereport::visa',compact('visa'));
    }
    public function visalist()
    {

        return view('recrutereport::visalist');
    }

    public function customerReport()
    {
        $recruit_order=Recruitorder::where('status' , 1)->orderBy('created_at','desc')->get();

        return view('recrutereport::report.customer_report' , compact('recruit_order'));
    }

    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }

    public function medicalSlipReport()
    {
        $user = Auth::user();
        $branch=Branch::all();
        $OrganizationProfile = OrganizationProfile::first();

        $current_time = Carbon::now()->toDayDateTimeString();
        $start = (new DateTime($current_time))->modify('-7 day')->format('Y-m-d');
        $end = (new DateTime($current_time))->modify('+1 day')->format('Y-m-d');

        $branch_id = session('branch_id');
        
        if($branch_id == 1){
            $medical = Medicalslip::whereBetween('created_at',[$start,$end])->whereHas('paxId' , function($q) use($start,$end){
                $q->where('status' , 1);
            })->get();
        }
        else{

            $medical = Medicalslip::whereBetween('created_at',[$start,$end])->whereHas('paxId' , function($q) use($start,$end,$branch_id){
                $q->where('status' , 1)->whereHas('createdBy',function($p) use($branch_id){
                    $p->where('branch_id' , $branch_id);
                });
            })->get();
        }
        
        return view('recrutereport::report.medical_slip_report',compact('OrganizationProfile','branch', 'start' , 'end' , 'medical' , 'user'));
    }

    public function medicalSlipReportSearch(Request $request)
    {
        $user = Auth::user();
        $branch_id =  $request->branch_id;
        $start =  date('Y-m-d',strtotime($request->from_date));
        $end =  date('Y-m-d',strtotime($request->to_date));

        $branch=Branch::all();
        $OrganizationProfile = OrganizationProfile::first();

        if($user->branch_id == 1){
            if($branch_id == 1){
                $medical = Medicalslip::whereBetween('created_at',[$start,$end])->whereHas('paxId' , function($q) use($start,$end){
                    $q->where('status' , 1);
                })->get();
            }
            else{
            $medical = Medicalslip::whereBetween('created_at',[$start,$end])->whereHas('paxId' , function($q) use($start,$end,$branch_id){
                    $q->where('status' , 1)->whereHas('createdBy',function($p) use($branch_id){
                        $p->where('branch_id' , $branch_id);
                    });
                })->get();
            }
        }
        else{
            $branch_id_2 = $user->branch_id;
            $medical = Medicalslip::whereBetween('created_at',[$start,$end])->whereHas('paxId' , function($q) use($start,$end,$branch_id_2){
                    $q->where('status' , 1)->whereHas('createdBy',function($p) use($branch_id_2){
                        $p->where('branch_id' , $branch_id_2);
                    });
                })->get();
        }

        return view('recrutereport::report.medical_slip_report',compact('OrganizationProfile','branch', 'start' , 'end' , 'medical' , 'user'));
    }
}
