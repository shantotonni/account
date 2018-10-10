<?php

namespace App\Modules\Settings\Http\Controllers\Order\order;

use App\Models\Branch\Branch;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactCategory;
use App\Models\Email\Email;
use App\Models\OrganizationProfile\OrganizationProfile;
use App\Models\Ticket\Ticket_Hotel;
use App\Models\Visa\Ticket\Order\Order;
use App\Models\Visa\Ticket\Order\Ticket_order_tax;
use App\Models\Visa\Ticket\TicketCommission;
use App\Models\Visa\Ticket\TicketTax;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use mPDF;

class PostController extends Controller
{

    public function pending()
    {

        $auth_id = Auth::id();
        $branch_id = session('branch_id');
        $branchs = Branch::orderBy('id','asc')->get();
        $condition = "YEAR(str_to_date(ticketorders.created_at,'%Y-%m-%d')) = YEAR(CURDATE()) AND MONTH(str_to_date(ticketorders.created_at,'%Y-%m-%d')) = MONTH(CURDATE())";

        if($branch_id==1)
        {
            $order = Order::orderBy('ticketorders.created_at','desc')->where('status','=',0)->whereRaw($condition)->get();
            return view('settings::order.order.pending',compact('order','branchs'));
        }
        else
        {
            $order = Order::orderBy('ticketorders.created_at','desc')->select(DB::raw('ticketorders.*'))->where('status','=',0)
                            ->whereRaw($condition)
                            ->select('ticketorders.*')
                            ->join('users','users.id','=','ticketorders.created_by')
                            ->where('users.branch_id',$branch_id)
                            ->get();


            return view('settings::order.order.pending',compact('order','branchs'));
        }

    }
    public function pending_search(Request $request)
    {
        $branchs = Branch::orderBy('id','asc')->get();
        $branch_id =  $request->branch_id;
        $from_date =  date('Y-m-d',strtotime($request->from_date));
        $to_date =  date('Y-m-d',strtotime($request->to_date));
        $order = [];
        if(session('branch_id')==1)
        {
            $branch_id =  $request->branch_id?$request->branch_id:session('branch_id');
        }
        else
        {
            $branch_id = session('branch_id');
        }

        $condition = "str_to_date(ticketorders.created_at, '%Y-%m-%d') between '$from_date' and '$to_date'";
       if($branch_id==1)
       {
          $order = Order::orderBy('ticketorders.created_at','desc')
                            ->select(DB::raw('ticketorders.*'))
                            ->where('status','=',0)
                            ->whereRaw($condition)
                            ->get();

       }
       else
       {
         $order = Order::orderBy('ticketorders.created_at','desc')
                           ->select(DB::raw('ticketorders.*'))
                           ->where('status','=',0)->whereRaw($condition)
                           ->join('users','users.id','=','ticketorders.created_by')
                           ->where('branch_id',$branch_id)
                           ->get();
       }


        return view('settings::order.order.pending',compact('order','branchs','branch_id','from_date','to_date'));
    }
    public function confirmed()
    {
        $auth_id = Auth::id();
        $branch_id = session('branch_id');
        $branchs = Branch::orderBy('id','asc')->get();
        $condition = "YEAR(str_to_date(ticketorders.created_at,'%Y-%m-%d')) = YEAR(CURDATE()) AND MONTH(str_to_date(ticketorders.created_at,'%Y-%m-%d')) = MONTH(CURDATE())";
        if($branch_id==1)
        {
            $order = Order::where('status', '=', 1)->whereRaw($condition)->get();
            return view('settings::order.order.confirmed', compact('order', 'branchs'));
        }
        else
        {
            $order = Order::orderBy('ticketorders.created_at','desc')->select(DB::raw('ticketorders.*'))->where('status','=',1)
                ->whereRaw($condition)
                ->select('ticketorders.*')
                ->join('users','users.id','=','ticketorders.created_by')
                ->where('users.branch_id',$branch_id)
                ->get();
            return view('settings::order.order.confirmed', compact('order', 'branchs'));
        }
    }
    public function confirmed_search(Request $request)
    {
        $branchs = Branch::orderBy('id','asc')->get();
        $branch_id =  $request->branch_id;
        $from_date =  date('Y-m-d',strtotime($request->from_date));
        $to_date =  date('Y-m-d',strtotime($request->to_date));
        $order = [];
        if(session('branch_id')==1)
        {
            $branch_id =  $request->branch_id?$request->branch_id:session('branch_id');
        }
        else
        {
            $branch_id = session('branch_id');
        }
        $condition = "str_to_date(ticketorders.created_at, '%Y-%m-%d') between '$from_date' and '$to_date'";
        if($branch_id==1)
        {
            $order = Order::orderBy('ticketorders.created_at','desc')
                            ->select(DB::raw('ticketorders.*'))
                            ->where('status','=',1)
                            ->whereRaw($condition)
                            ->get();

        }
        else
        {
            $order = Order::orderBy('ticketorders.created_at','desc')
                               ->select(DB::raw('ticketorders.*'))
                               ->where('status','=',1)
                               ->whereRaw($condition)
                               ->join('users','users.id','=','ticketorders.created_by')
                               ->where('branch_id',$branch_id)
                               ->get();
        }


        return view('settings::order.order.confirmed',compact('order','branchs','branch_id','from_date','to_date'));
    }

    public function create()
    {

        $test=Contact::where('contact_category_id',1)
            ->orWhere('contact_category_id',2)
            ->orWhere('contact_category_id',3)
            ->orWhere('contact_category_id',4)
            ->orWhere('contact_category_id',5)
            ->orWhere('contact_category_id',6)
            ->get();

        $commition=TicketCommission::first();
        $contact = Contact::all();
        $ticket_tax=TicketTax::all();
        $ticket_hotel=Ticket_Hotel::all();
        return view('settings::order.order.create',compact('contact','ticket_tax','ticket_hotel','commition','test'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('ticket_Order_create')->withErrors($validator);
        }

        $order = Order::all();

        if (count($order) > 0) {
            $order = Order::orderBy('id', 'desc')->first();
            $order_id =explode('-',$order['order_id'])[1];
            $order_id=$order_id+1;
            $t = str_pad($order_id, 6, '0', STR_PAD_LEFT);
            $input = Input::all();
            $title = $input['title'];
            $amount = $input['amount'];

            if ($request->taxOnCommission==''){
                $comitiontax=TicketCommission::first();
                $ticketComition=$comitiontax->commissionTax;
                $totalamount=0;
                $bdAmount=0;
                $utAmount=0;

                foreach ($title as $key=>$value){

                    if(is_array($request->title[$key])){
                        $tit=array_keys($request->title[$key])[0];
                        $title= $request->title[$key][$tit];
                    }else{
                        $title= $request->title[$key] ;
                    }
                    if(is_array($request->amount[$key])){
                        $amou=array_keys($request->amount[$key])[0];
                        $amount= $request->amount[$key][$amou];
                        $totalamount=$totalamount+$amount;
                    }else{
                        $amount= $request->amount[$key];
                        $totalamount=$totalamount+$amount;

                    }
                    if (trim(strtoupper($title))=='BD'){
                        $bdAmount=$amount;
                    }
                    if (trim(strtoupper($title))=='UT'){
                        $utAmount=$amount;
                    }
                }

                $totalFare=$request->fareAmount ? $request->fareAmount:null;

                $comitionTax=$ticketComition/100;

                $finalValue=(($totalFare+$totalamount)-($bdAmount+$utAmount))*$comitionTax;

               // dd($finalValue);

                if (isset($request->save)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id ='SO-'.$t;

                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 0;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission = $finalValue;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;

                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->save();
                        if ($order) {
                            $input = Input::all();
                            $title = $input['title'];
                            $amount = $input['amount'];

                            foreach ($title as $key=>$cond) {

                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {
                        dd($ex);
                    }
                } elseif (isset($request->confirm)) {

                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id = 'SO-'.$t;

                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 1;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission =$finalValue;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->saveOrFail();
                        if ($order) {
                            $input = Input::all();
                            $title = $input['title'];
                            $amount = $input['amount'];
                            foreach ($title as $key=>$cond) {
                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {

                        return back()->withInput()->with('alert.status', 'danger')
                            ->with('alert.message', 'Data Not saved!');
                    }
                }
            }else{

                if (isset($request->save)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id ='SO-'.$t;

                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 0;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission =$request->taxOnCommission;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->save();
                        if ($order) {
                            foreach ($title as $key=>$cond) {
                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {
                        dd($ex);
                    }
                } elseif (isset($request->confirm)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id = 'SO-'.$t;
                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 1;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission =$request->taxOnCommission;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->saveOrFail();
                        if ($order) {
                            foreach ($title as $key=>$cond) {
                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {

                        return back()->withInput()->with('alert.status', 'danger')
                            ->with('alert.message', 'Data Not saved!');
                    }
                }

            }

        }

        //Count Else

        else{

            $input = Input::all();
            $title = $input['title'];
            $amount = $input['amount'];

            if ($request->taxOnCommission==''){
                $comitiontax=TicketCommission::first();
                $ticketComition=$comitiontax->commissionTax;
                $totalamount=0;
                $utAmount=0;
                $bdAmount=0;

                foreach ($title as $key=>$value){

                    if(is_array($request->title[$key])){
                        $tit=array_keys($request->title[$key])[0];
                        $title= $request->title[$key][$tit];
                    }else{
                        $title= $request->title[$key] ;
                    }
                    if(is_array($request->amount[$key])){
                        $amou=array_keys($request->amount[$key])[0];
                        $amount= $request->amount[$key][$amou];
                        $totalamount=$totalamount+$amount;
                    }else{
                        $amount= $request->amount[$key];
                        $totalamount=$totalamount+$amount;
                    }

                    if ($title=='BD'){
                        $bdAmount=$amount;
                    }
                    if ($title=='UT'){
                        $utAmount=$amount;
                    }
                }
                $totalFare=$request->fareAmount;
                $comitionTax=$ticketComition/100;
                $finalValue=(($totalFare+$totalamount)-($bdAmount+$utAmount))*$comitionTax;

                if (isset($request->save)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id ='SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);

                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 0;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission = $finalValue;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->save();
                        if ($order) {
                            $input = Input::all();
                            $title = $input['title'];
                            $amount = $input['amount'];
                            foreach ($title as $key=>$cond) {

                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                        }
                    } catch (\Illuminate\Database\QueryException $ex) {
                        dd($ex);
                    }
                } elseif (isset($request->confirm)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id = 'SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);;
                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 1;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission =$finalValue;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->saveOrFail();

                        if ($order) {
                            $input = Input::all();
                            $title = $input['title'];
                            $amount = $input['amount'];
                            foreach ($title as $key=>$cond) {

                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {

                        return back()->withInput()->with('alert.status', 'danger')
                            ->with('alert.message', 'Data Not saved!');
                    }
                }
            }

            else{
                if (isset($request->save)) {
                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id ='SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);;
                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 0;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission = $request->taxOnCommission;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->save();
                        if ($order) {

                            foreach ($title as $key=>$cond) {
                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_pending')->with('save', 'Pending Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {
                        dd($ex);
                    }
                } elseif (isset($request->confirm)) {

                    try {
                        $order = new Order();
                        $order->contact_id = $request->contact_id;
                        $order->gdsType = $request->gdsType;
                        $order->pnr = $request->pnr;
                        $order->first_name = $request->first_name;
                        $order->last_name = $request->last_name;
                        $order->contact_number = $request->contact_number;
                        $order->ticket_number = $request->ticket_number;
                        $order->pnrcreationDate = $request->pnrcreationDate;
                        $order->recordLocator = $request->recordLocator;
                        $order->departureflightCode = $request->departureflightCode;
                        $order->departureflightClass = $request->departureflightClass;
                        $order->departureDate = $request->departureDate;
                        $order->departureFrom = $request->departureFrom;
                        $order->arriveTo = $request->arriveTo;
                        $order->departureTime = $request->departureTime;
                        $order->arrivalTime = $request->arrivalTime;
                        $order->returnflightCode = $request->returnflightCode;
                        $order->returnflightbookingClass = $request->returnflightbookingClass;
                        $order->returnflightDate = $request->returnflightDate;
                        $order->returnflightFrom = $request->returnflightFrom;
                        $order->returnflightTo = $request->returnflightTo;
                        $order->returnflightdepartureTime = $request->returnflightdepartureTime;
                        $order->returnflightarrivalDate = $request->returnflightarrivalDate;
                        $order->issuetimeLimit = $request->issuetimeLimit;
                        $order->documentNumber = $request->documentNumber;
                        $order->order_id = 'SO-'.str_pad(1, 6, '0', STR_PAD_LEFT);;

                        $order->issuDate = $request->issuDate;
                        $order->departureSector = $request->departureSector;
                        $order->returnSector = $request->returnSector;
                        $order->adultPassenger = $request->adultPassenger;
                        $order->childPassenger = $request->childPassenger;
                        $order->infantPassenger = $request->infantPassenger;
                        $order->hotel_note = $request->hotel_note;
                        $order->status = 1;
                        $order->fareAmount = $request->fareAmount;
                        $order->commissionRate = $request->commissionRate;
                        $order->taxOnCommission = $request->taxOnCommission;
                        $order->ticket_hotel_id = $request->ticket_hotel_id ? $request->ticket_hotel_id : null;
                        $order->vendor_id = $request->vendor_id;
                        $order->created_by = Auth::id();
                        $order->updated_by = Auth::id();
                        $order->saveOrFail();

                        if ($order) {
                            foreach ($title as $key=>$cond) {
                                if(is_array($request->title[$key])){
                                    $tit=array_keys($request->title[$key])[0];
                                    $title= $request->title[$key][$tit];
                                }else{
                                    $title= $request->title[$key] ;
                                }
                                if(is_array($request->amount[$key])){
                                    $amou=array_keys($request->amount[$key])[0];
                                    $amount= $request->amount[$key][$amou];
                                }else{
                                    $amount= $request->amount[$key] ;
                                }
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                            return Redirect::route('ticket_Order_confirmed')->with('save', 'Confirmed Data saved!');
                        }

                    } catch (\Illuminate\Database\QueryException $ex) {

                        return back()->withInput()->with('alert.status', 'danger')
                            ->with('alert.message', 'Data Not saved!');
                    }
                }

            }
        }

    }


    public function edit($id)
    {
        $test=Contact::where('contact_category_id',1)
            ->orWhere('contact_category_id',2)
            ->orWhere('contact_category_id',3)
            ->orWhere('contact_category_id',4)
            ->orWhere('contact_category_id',5)
            ->orWhere('contact_category_id',6)
            ->get();

        $order_pax=Ticket_order_tax::where('ticket_order_id',$id)->get();
        //dd($order_pax);
        $ticket_tax=TicketTax::all();
        $ticket_hotel=Ticket_Hotel::all();
        $order = Order::find($id);
        //dd($order);
        $contact = Contact::all();
        return view('settings::order.order.edit',compact('order','contact','ticket_tax','ticket_hotel','order_pax','test'));
    }


    public function update(Request $request,$id)
    {

           $input = Input::all();
            $title = $input['title'];
            $amount = $input['amount'];

        if ($request->taxOnCommission==''){
            $comitiontax=TicketCommission::first();
            $ticketComition=$comitiontax->commissionTax;
            $totalamount=0;
            $utAmount=0;
            $bdAmount=0;

            $input = Input::all();
            $title = $input['title'];
            $amount = $input['amount'];

                 foreach ($title as $key => $value) {

                     if (is_array($request->title[$key])) {
                         $tit = array_keys($request->title[$key])[0];
                         $title = $request->title[$key][$tit];
                     } else {
                         $title = $request->title[$key];

                     }
                     if (is_array($request->amount[$key])) {
                         $amou = array_keys($request->amount[$key])[0];
                         $amount = $request->amount[$key][$amou];
                         $totalamount = $totalamount + $amount;

                     } else {

                         $amount = $request->amount[$key];
                         $totalamount = $totalamount + (double)$amount;

                     }
                     if (trim(strtoupper($title)) == 'BD') {
                         $bdAmount = $amount;

                     }
                     if (trim(strtoupper($title)) == 'UT') {
                         $utAmount = $amount;

                     }
                 }

                $totalFare=$request->fareAmount ? $request->fareAmount:null;
                $comitionTax=$ticketComition/100;
                $finalValue=(($totalFare+$totalamount)-($bdAmount+$utAmount))*$comitionTax;

            if ($request->submit!='Save'){

                try{
                    $order = Order::find($id);
                    $order->contact_id =$request->contact_id;
                    $order->gdsType =$request->gdsType;
                    $order->pnr =$request->pnr;
                    $order->first_name =$request->first_name;
                    $order->last_name =$request->last_name;
                    $order->contact_number =$request->contact_number;
                    $order->ticket_number =$request->ticket_number;
                    $order->pnrcreationDate =$request->pnrcreationDate;
                    $order->recordLocator =$request->recordLocator;
                    $order->departureflightCode =$request->departureflightCode;
                    $order->departureflightClass =$request->departureflightClass;
                    $order->departureDate =$request->departureDate;
                    $order->departureFrom =$request->departureFrom;
                    $order->arriveTo =$request->arriveTo;
                    $order->departureTime =$request->departureTime;
                    $order->arrivalTime =$request->arrivalTime;
                    $order->returnflightCode =$request->returnflightCode;
                    $order->returnflightbookingClass =$request->returnflightbookingClass;
                    $order->returnflightDate =$request->returnflightDate;
                    $order->returnflightFrom =$request->returnflightFrom;
                    $order->returnflightTo =$request->returnflightTo;
                    $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                    $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                    $order->issuetimeLimit =$request->issuetimeLimit;
                    $order->documentNumber =$request->documentNumber;

                    $order->issuDate =$request->issuDate;
                    $order->departureSector =$request->departureSector;
                    $order->returnSector =$request->returnSector;
                    $order->adultPassenger =$request->adultPassenger;
                    $order->childPassenger =$request->childPassenger;
                    $order->infantPassenger =$request->infantPassenger;
                    $order->hotel_note =$request->hotel_note;
                    $order->status =1;
                    $order->fareAmount =$request->fareAmount;
                    $order->commissionRate =$request->commissionRate;
                    $order->taxOnCommission =$finalValue;
                    $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                    $order->vendor_id =$request->vendor_id;
                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->save();
                    if ($order){
                        $input = Input::all();
                        $title = $input['title'];
                        $amount = $input['amount'];
                        $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                        foreach ($title as $key=>$cond) {
                            if(is_array($request->title[$key])){
                                $tit=array_keys($request->title[$key])[0];
                                $title= $request->title[$key][$tit];
                            }else{
                                $title= $request->title[$key] ;
                            }
                            if(is_array($request->amount[$key])){
                                $amou=array_keys($request->amount[$key])[0];
                                $amount= $request->amount[$key][$amou];
                            }else{
                                $amount= $request->amount[$key] ;
                            }
                            if (!empty($title) && !empty($amount)){
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                        }

                        return Redirect::route('ticket_Order_confirmed')->with('up', 'Confirmed Data Update!');
                    }

                }catch (\Illuminate\Database\QueryException $ex){

                    return back()->withInput()->with('alert.status', 'danger')
                        ->with('alert.message', 'Not saved!');
                }
            }elseif($request->submit!='Save & Confirm'){
                try{
                    $order  = Order::find($id);;
                    $order->contact_id =$request->contact_id;
                    $order->gdsType =$request->gdsType;
                    $order->pnr =$request->pnr;
                    $order->first_name =$request->first_name;
                    $order->last_name =$request->last_name;
                    $order->contact_number =$request->contact_number;
                    $order->ticket_number =$request->ticket_number;
                    $order->pnrcreationDate =$request->pnrcreationDate;
                    $order->recordLocator =$request->recordLocator;
                    $order->departureflightCode =$request->departureflightCode;
                    $order->departureflightClass =$request->departureflightClass;
                    $order->departureDate =$request->departureDate;
                    $order->departureFrom =$request->departureFrom;
                    $order->arriveTo =$request->arriveTo;
                    $order->departureTime =$request->departureTime;
                    $order->arrivalTime =$request->arrivalTime;
                    $order->returnflightCode =$request->returnflightCode;
                    $order->returnflightbookingClass =$request->returnflightbookingClass;
                    $order->returnflightDate =$request->returnflightDate;
                    $order->returnflightFrom =$request->returnflightFrom;
                    $order->returnflightTo =$request->returnflightTo;
                    $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                    $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                    $order->issuetimeLimit =$request->issuetimeLimit;
                    $order->documentNumber =$request->documentNumber;

                    $order->issuDate =$request->issuDate;
                    $order->departureSector =$request->departureSector;
                    $order->returnSector =$request->returnSector;
                    $order->adultPassenger =$request->adultPassenger;
                    $order->childPassenger =$request->childPassenger;
                    $order->infantPassenger =$request->infantPassenger;
                    $order->hotel_note =$request->hotel_note;
                    $order->status =0;
                    $order->fareAmount =$request->fareAmount;
                    $order->commissionRate =$request->commissionRate;
                    $order->taxOnCommission =$finalValue;
                    $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                    $order->vendor_id =$request->vendor_id;
                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->saveOrFail();

                    if ($order){
                        $input = Input::all();
                        $title = $input['title'];
                        $amount = $input['amount'];
                        $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                        foreach ($title as $key=>$cond) {

                            if(is_array($request->title[$key])){
                                $tit=array_keys($request->title[$key])[0];
                                $title= $request->title[$key][$tit];
                            }else{
                                $title= $request->title[$key] ;
                            }

                            if(is_array($request->amount[$key])){
                                $amou=array_keys($request->amount[$key])[0];
                                $amount= $request->amount[$key][$amou];
                            }else{
                                $amount= $request->amount[$key] ;
                            }

                            if (!empty($title) && !empty($amount)){

                            }

                            if (!empty($title) && !empty($amount)){
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }

                        }
                        return Redirect::route('ticket_Order_pending')->with('update', 'Pending Data Update!');
                    }

                }catch (\Illuminate\Database\QueryException $ex){
                    dd($ex);
                }
            }


        }else{

            if ($request->submit!='Save'){

                try{
                    $order = Order::find($id);
                    $order->contact_id =$request->contact_id;
                    $order->gdsType =$request->gdsType;
                    $order->pnr =$request->pnr;
                    $order->first_name =$request->first_name;
                    $order->last_name =$request->last_name;
                    $order->contact_number =$request->contact_number;
                    $order->ticket_number =$request->ticket_number;
                    $order->pnrcreationDate =$request->pnrcreationDate;
                    $order->recordLocator =$request->recordLocator;
                    $order->departureflightCode =$request->departureflightCode;
                    $order->departureflightClass =$request->departureflightClass;
                    $order->departureDate =$request->departureDate;
                    $order->departureFrom =$request->departureFrom;
                    $order->arriveTo =$request->arriveTo;
                    $order->departureTime =$request->departureTime;
                    $order->arrivalTime =$request->arrivalTime;
                    $order->returnflightCode =$request->returnflightCode;
                    $order->returnflightbookingClass =$request->returnflightbookingClass;
                    $order->returnflightDate =$request->returnflightDate;
                    $order->returnflightFrom =$request->returnflightFrom;
                    $order->returnflightTo =$request->returnflightTo;
                    $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                    $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                    $order->issuetimeLimit =$request->issuetimeLimit;
                    $order->documentNumber =$request->documentNumber;

                    $order->issuDate =$request->issuDate;
                    $order->departureSector =$request->departureSector;
                    $order->returnSector =$request->returnSector;
                    $order->adultPassenger =$request->adultPassenger;
                    $order->childPassenger =$request->childPassenger;
                    $order->infantPassenger =$request->infantPassenger;
                    $order->hotel_note =$request->hotel_note;
                    $order->status =1;
                    $order->fareAmount =$request->fareAmount;
                    $order->commissionRate =$request->commissionRate;
                    $order->taxOnCommission =$request->taxOnCommission;
                    $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                    $order->vendor_id =$request->vendor_id;
                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->save();
                    if ($order){
                        $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                        foreach ($title as $key=>$cond) {

                            if(is_array($request->title[$key])){
                                $tit=array_keys($request->title[$key])[0];
                                $title= $request->title[$key][$tit];
                            }else{
                                $title= $request->title[$key] ;
                            }

                            if(is_array($request->amount[$key])){
                                $amou=array_keys($request->amount[$key])[0];
                                $amount= $request->amount[$key][$amou];
                            }else{
                                $amount= $request->amount[$key] ;
                            }

                            if (!empty($title) && !empty($amount)){
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }
                        }

                        return Redirect::route('ticket_Order_confirmed')->with('up', 'Confirmed Data Update!');
                    }

                }catch (\Illuminate\Database\QueryException $ex){

                    return back()->withInput()->with('alert.status', 'danger')
                        ->with('alert.message', 'Not saved!');
                }
            }elseif($request->submit!='Save & Confirm'){
                try{
                    $order  = Order::find($id);;
                    $order->contact_id =$request->contact_id;
                    $order->gdsType =$request->gdsType;
                    $order->pnr =$request->pnr;
                    $order->first_name =$request->first_name;
                    $order->last_name =$request->last_name;
                    $order->contact_number =$request->contact_number;
                    $order->ticket_number =$request->ticket_number;
                    $order->pnrcreationDate =$request->pnrcreationDate;
                    $order->recordLocator =$request->recordLocator;
                    $order->departureflightCode =$request->departureflightCode;
                    $order->departureflightClass =$request->departureflightClass;
                    $order->departureDate =$request->departureDate;
                    $order->departureFrom =$request->departureFrom;
                    $order->arriveTo =$request->arriveTo;
                    $order->departureTime =$request->departureTime;
                    $order->arrivalTime =$request->arrivalTime;
                    $order->returnflightCode =$request->returnflightCode;
                    $order->returnflightbookingClass =$request->returnflightbookingClass;
                    $order->returnflightDate =$request->returnflightDate;
                    $order->returnflightFrom =$request->returnflightFrom;
                    $order->returnflightTo =$request->returnflightTo;
                    $order->returnflightdepartureTime =$request->returnflightdepartureTime;
                    $order->returnflightarrivalDate =$request->returnflightarrivalDate;
                    $order->issuetimeLimit =$request->issuetimeLimit;
                    $order->documentNumber =$request->documentNumber;

                    $order->issuDate =$request->issuDate;
                    $order->departureSector =$request->departureSector;
                    $order->returnSector =$request->returnSector;
                    $order->adultPassenger =$request->adultPassenger;
                    $order->childPassenger =$request->childPassenger;
                    $order->infantPassenger =$request->infantPassenger;
                    $order->hotel_note =$request->hotel_note;
                    $order->status =0;
                    $order->fareAmount =$request->fareAmount;
                    $order->commissionRate =$request->commissionRate;
                    $order->taxOnCommission =$request->taxOnCommission;
                    $order->ticket_hotel_id =$request->ticket_hotel_id?$request->ticket_hotel_id:null;
                    $order->vendor_id =$request->vendor_id;

                    $order->created_by = Auth::id();
                    $order->updated_by = Auth::id();
                    $order->saveOrFail();

                    if ($order){
                        $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                        foreach ($title as $key=>$cond) {

                            if(is_array($request->title[$key])){
                                $tit=array_keys($request->title[$key])[0];
                                $title= $request->title[$key][$tit];
                            }else{
                                $title= $request->title[$key] ;
                            }

                            if(is_array($request->amount[$key])){
                                $amou=array_keys($request->amount[$key])[0];
                                $amount= $request->amount[$key][$amou];
                            }else{
                                $amount= $request->amount[$key] ;
                            }

                            if (!empty($title) && !empty($amount)){
                                $data=array(
                                    'title'=>$title,
                                    'amount'=>$amount,
                                    'ticket_order_id' => $order->id,
                                );
                                Ticket_order_tax::insert($data);
                            }

                        }
                        return Redirect::route('ticket_Order_pending')->with('update', 'Pending Data Update!');
                    }

                }catch (\Illuminate\Database\QueryException $ex){
                    dd($ex);
                }
            }


        }

    }

    public function destroy($id,$bill=null,$invoice=null){

        $bill=$bill;

        $invoice=$invoice;

        if ($bill && $invoice){

            return redirect()->back()->with('del','You have a Bill/Invoice attached with this order.Pleas delete the bill/invoice first');

        }

        elseif ($bill){
            return redirect()->back()->with('del','You have a Bill attached with this order.Pleas delete the bill first');

        }

        elseif ($invoice){
            return redirect()->back()->with('del','You have a Invoice attached with this order.Pleas delete the Invoice first');

        }else{

            $order=Order::find($id);
            if ($order->status==1){
                if ($order->delete()){

                    $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                }
                return redirect()->back()->with('del','Confirmed Data Deleted');

            }else{

                if ($order->delete()){

                    $delete = Ticket_order_tax::where('ticket_order_id',$id)->delete();
                }
                return redirect()->back()->with('del','Pending Data Deleted');
            }

        }


    }

    public function pendinUpdate($id){

        $order=Order::find($id);
        if ($order->ststus==0){
            $order->status=1;
            $order->save();
            return Redirect::route('ticket_Order_confirmed')->with('alert.status', 'success')
                ->with('alert.message', 'Pending data Confirmed  successfully!');

        }

    }

    public function orderPdf($id){

        $logo=OrganizationProfile::first();
        //dd($logo);

        $order=Order::find($id);
        //dd($order);
        $t = str_pad($order->order_id, 6, '0', STR_PAD_LEFT);
        $pdf = PDF::loadView('settings::order.order.orderPdf',compact('logo','order','t'));
        return $pdf->stream('invoice.pdf');

    }


    public function orderMail($id){

        $order=Order::find($id);

        return view('settings::order.order.mailForm',compact('order'));


    }

    public function orderMailStore(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'email_address' => 'required',
            'subject' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $order=Order::find($id);
        $t = str_pad($order->order_id, 6, '0', STR_PAD_LEFT);
        $logo=OrganizationProfile::first();
        $pdf = PDF::loadView('settings::order.order.orderPdf',compact('logo','order','t'));
        $path=uniqid().'.pdf';
        $filename = public_path('path/'.$path);
        $pdf->save($filename);



        config(['mail.from.name' => $logo->display_name]);
        $email=new Email();
        $email->to=$request->email_address;
        $email->subject=$request->subject;
        $email->details=$request->details;
        $email->file=$path;
        $email->created_by=Auth::user()->id;
        $email->updated_by=Auth::user()->id;
        $email->save();

        Mail::send('settings::order.order.mail',array('order'=>$order,'logo'=>$logo,'t'=>$t,'email'=>$email),function($messeg) use ($pdf){

            $messeg->to(Input::get('email_address'))->subject(Input::get('subject'));

            $messeg->attachData($pdf->output(), "Ticket_Order.pdf");

        });

        return redirect()->back()->with('msg','Email was sent successfully.Pleas Check your Email');

    }


    public function SendMailShow(){

        try{
            $start = date('Y-m-01');
            $end= date("Y-m-t", strtotime($start) ) ;
            $email=Email::whereBetween('created_at',array($start,$end))->orderBy('created_at','asc')->get();
            return view('settings::order.order.ShowSendEmail',compact('email','start','end'));
        }catch (\Exception $ex){
            return back()->with('msg','something wrong');
        }


    }

    public function SendMailShowbyfilter(Request $request){

        try{
            $start = $request->from_date;
            $end= $request->to_date;
            $email=Email::whereBetween('created_at',array($start,$end))->orderBy('created_at','asc')->get();
            return view('settings::order.order.ShowSendEmail',compact('email','start','end'));
        }catch (\Exception $ex){
            return back()->with('msg','something wrong');
        }


    }

    public function SendMailShowPerID($id){

        try{
            $email=Email::find($id);
            return view('settings::order.order.ShowSendEmailPerID',compact('email'));
        }catch (\Exception $ex){
            return back()->with('msg','something wrong');
        }


    }


}
