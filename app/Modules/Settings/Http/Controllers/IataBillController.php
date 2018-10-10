<?php

namespace App\Modules\Settings\Http\Controllers;

use App\Models\Contact\Contact;
use App\Models\Visa\Ticket\Order\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use mPDF;

class IataBillController extends Controller
{


    public function bill(){

            return view('settings::bill.bill');
    }

    public function find_bill(Request $request){

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|max:255',
            'to_date' => 'required',
        ]);
        if ($validator->fails())
        {
           return Redirect::route('ticket_bill_index')->withErrors($validator);
        }

        $start = date("Y-m-d",strtotime($request->input('from_date')));
        $end =   date("Y-m-d",strtotime($request->input('to_date')));

        $order = Order::whereBetween('issuDate', [$start, $end])
                                   ->get();

        $ita=[];
        foreach ($order as $item)
        {
            if($item->vendor->display_name=='IATA')
            {
                $ita[]=$item;
            }
        }


        $mpdf = new mPDF('utf-8', 'A4-L');
        $view =  view('settings::bill.billing_pdf',compact('order','ita'));
        $mpdf->WriteHTML($view);
        $mpdf->Output();

    }
}
