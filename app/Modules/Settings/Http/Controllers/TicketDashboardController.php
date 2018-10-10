<?php

namespace App\Modules\Settings\Http\Controllers;

use App\Models\Contact\Contact;
use App\Models\Visa\Ticket\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TicketDashboardController extends Controller
{
    public function dashboard(){

        $start= Carbon::today()->format('Y-m-d');
        $end= Carbon::today()->format('Y-m-d');


        $order=Order::whereDate('created_at',$start)->get();

        $total=Order::join('bill','bill.id','=','ticketorders.bill_id')
            ->join('contact','contact.id','=','ticketorders.vendor_id')
            ->select(DB::raw('bill.*,count(ticketorders.bill_id) as total_bill,sum(bill.amount) as total_amount,sum(bill.due_amount) as due_amount,contact.display_name,ticketorders.vendor_id,count(ticketorders.id) as total'))
            ->groupBy('ticketorders.vendor_id')
            ->whereDate('ticketorders.created_at',$start)
            ->get();

        $total2=Contact::join('ticketorders','ticketorders.vendor_id','=','contact.id')
            ->select(DB::raw('count(ticketorders.id) as total,contact.id'))
            ->groupBy('ticketorders.vendor_id')
            ->whereDate('ticketorders.created_at',$start)
            ->get();
       // dd($total2);

        return view('settings::dashboard.index',compact('order','start','total','end','total2'));
    }

    public function filter(Request $request){

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|max:255',
            'to_date' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::route('ticket_dashboard_index')->withErrors($validator);
        }


        $start = date("Y-m-d",strtotime($request->input('from_date')));

        $ends =$request->input('to_date');

        $end = date('Y-m-d',strtotime($ends . "+1 days"));

        $total=Order::join('bill','bill.id','=','ticketorders.bill_id')
            ->join('contact','contact.id','=','ticketorders.vendor_id')
            ->select(DB::raw('bill.*,count(ticketorders.bill_id) as total_bill,sum(bill.amount) as total_amount,sum(bill.due_amount) as due_amount,contact.display_name,ticketorders.vendor_id'))
            ->groupBy('ticketorders.vendor_id')
            ->whereDate('ticketorders.created_at',[$start, $end])
            ->get();

        $total2=Contact::join('ticketorders','ticketorders.vendor_id','=','contact.id')
            ->select(DB::raw('count(ticketorders.id) as total,contact.id'))
            ->groupBy('ticketorders.vendor_id')
            ->whereDate('ticketorders.created_at',[$start, $end])
            ->get();

        $order = Order::whereBetween('created_at', [$start, $end])->get();
        $t= Carbon::today()->format('Y-m-d');
        $end = date('Y-m-d',strtotime($ends . "+0 days"));

        return view('settings::dashboard.index',compact('order','t','total','end','start','total2'));
    }

    public function totalTicketOrderById($id,$start,$end){


        $order=Order::where('vendor_id',$id)
            ->whereDate('created_at',[$start, $end])
            ->get();

        return view('settings::dashboard.index2',compact('order'));

    }


}
