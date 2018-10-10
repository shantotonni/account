<?php

namespace App\Modules\Conveyancebill\Http\Controllers\ConveyanceBill;

use App\Models\Branch\Branch;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

//Models
use App\Models\ConveyanceBill\ConveyanceBill;
use App\Models\ConveyanceBill\ConveyanceBillList;
use App\Models\OrganizationProfile\OrganizationProfile;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    
    public function index()
    {
        $auth_id = Auth::id();
        $branch_id = session('branch_id');
        $branchs = Branch::orderBy('id','asc')->get();
        $condition = "YEAR(str_to_date(date,'%Y-%m-%d')) = YEAR(CURDATE()) AND MONTH(str_to_date(date,'%Y-%m-%d')) = MONTH(CURDATE())";
        if($branch_id==1)
        {
            $conveyance = ConveyanceBill::whereRaw($condition)->get();
            return view('conveyancebill::conveyanceBill.index' , compact('conveyance','branchs'));
        }
        else
        {
            $conveyance = ConveyanceBill::select(DB::raw('conveyance_bills.*'))->whereRaw($condition)
                                          ->join('users','users.id','=','conveyance_bills.created_by')
                                          ->where('users.branch_id',$branch_id)
                                          ->get();

            return view('conveyancebill::conveyanceBill.index' , compact('conveyance','branchs'));
        }

    }
    public function search(Request $request)
    {
        $branchs = Branch::orderBy('id', 'asc')->get();
        $branch_id = $request->branch_id;
        if(session('branch_id')==1)
        {
            $branch_id =  $request->branch_id?$request->branch_id:session('branch_id');
        }
        else
        {
            $branch_id = session('branch_id');
        }
        $conveyance= [];
        $from_date =   date('Y-m-d', strtotime($request->from_date));
        $to_date =     date('Y-m-d', strtotime($request->to_date));
        $condition =  "str_to_date(date, '%Y-%m-%d') between '$from_date' and '$to_date'";
        if($branch_id==1){
            $conveyance = ConveyanceBill::select(DB::raw('conveyance_bills.*'))->whereRaw($condition)->get();


        }
        else
        {
            $conveyance = ConveyanceBill::select(DB::raw('conveyance_bills.*'))->whereRaw($condition)
                ->join('users','users.id','=','conveyance_bills.created_by')
                ->where('branch_id',$branch_id)
                ->get();

        }

        return view('conveyancebill::conveyanceBill.index' , compact('conveyance','branchs','branch_id','from_date','to_date'));

    }


    public function create()
    {
        return view('conveyancebill::conveyanceBill.create');
    }

    
    public function store(Request $request)
    {
        $arr = [];
        $to = $this->flatten($request->to);
        $from = $this->flatten($request->from);
        $transport = $this->flatten($request->transport);
        $amount = $this->flatten($request->amount);

        $arr['to'] = $to;
        $arr['from'] = $from;
        $arr['transport'] = $transport;
        $arr['amount'] = $amount;

        $conveyance = new ConveyanceBill;

        $conveyance->user_id            = Auth::user()->id;
        $conveyance->date               = $request->date;
        $conveyance->created_by         = Auth::user()->id;
        $conveyance->updated_by         = Auth::user()->id;
        
        $conveyance->save();

        $last = ConveyanceBill::all()->last();

        for($i=0; $i<count($arr['to']);$i++) 
        {

            $list = new ConveyanceBillList;

            $list->conveyance_bill_id       = $last->id;
            $list->from                     = $arr['from'][$i];
            $list->to                       = $arr['to'][$i];
            $list->transport                = $arr['transport'][$i];
            $list->amount                   = $arr['amount'][$i];
            $list->created_by               = Auth::user()->id;
            $list->updated_by               = Auth::user()->id;

            $list->save();
            
        }

        return back()->with('message' , 'Conveyance Bill Insert Successfully');

    }

    function flatten(array $array) 
    {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }
    
    public function show($id)
    {
        $conveyance = ConveyanceBill::find($id);
        $list = ConveyanceBillList::where('conveyance_bill_id' , $id)->get();
        $sum = ConveyanceBillList::where('conveyance_bill_id' , $id)->sum('amount');
        
        return view('conveyancebill::conveyanceBill.show' , compact('conveyance' , 'list' , 'sum'));
    }

    
    public function edit($id)
    {
        $conveyance = ConveyanceBill::find($id);
        $list = ConveyanceBillList::where('conveyance_bill_id' , $id)->get();


        return view('conveyancebill::conveyanceBill.edit' , compact('conveyance' , 'list'));
    }

    
    public function update(Request $request, $id)
    {
        $arr = [];
        $to = $this->flatten($request->to);
        $from = $this->flatten($request->from);
        $transport = $this->flatten($request->transport);
        $amount = $this->flatten($request->amount);

        $arr['to'] = $to;
        $arr['from'] = $from;
        $arr['transport'] = $transport;
        $arr['amount'] = $amount;

        $delete_form = ConveyanceBillList::where('conveyance_bill_id' , $id)->get();

        foreach($delete_form as $all)
        {
            $all->delete();
        }

        for($i=0; $i<count($arr['to']);$i++) 
        {

            $list = new ConveyanceBillList;

            $list->conveyance_bill_id       = $id;
            $list->from                     = $arr['from'][$i];
            $list->to                       = $arr['to'][$i];
            $list->transport                = $arr['transport'][$i];
            $list->amount                   = $arr['amount'][$i];
            $list->created_by               = Auth::user()->id;
            $list->updated_by               = Auth::user()->id;

            $list->save();
            
        }

        return back()->with('message' , 'Conveyance Bill Updated Successfully');

    }

    
    public function destroy($id)
    {
        $information = ConveyanceBill::find($id);

        if($information->delete()){
            return back()->with('message' , 'Conveyance Bill Deleted Successfully');
        }
        else{
            return back()->with('message' , 'Conveyance Bill Update Failed');
        }
    }

    public function checkBy($id)
    {
        $information = ConveyanceBill::find($id);
        return view('conveyancebill::conveyanceBill.check' , compact('information'));
    }

    public function checkByUpdate(Request $request, $id)
    {
        $check_approve = ConveyanceBill::find($id);

        $check_approve->checked_by              = Auth::user()->id;
        $check_approve->comments                = $request->comment;

        $check_approve->update();

        return redirect('conveyancebill/')->with('message' , 'Conveyance Bill Checked Successfully');
    }

    public function approveByUpdate(Request $request, $id, $value)
    {

        $check_approve = ConveyanceBill::find($id);

        if($value == 0)
        {
            $check_approve->approved_by               = Auth::user()->id;
            $check_approve->updated_by                = Auth::user()->id;

            $check_approve->update();

        }
        else
        {
            $check_approve->approved_by               = Null;
            $check_approve->updated_by                = Auth::user()->id;

            $check_approve->update();

        }

        
    }

    public function approvedByChairmanUpdate(Request $request, $id, $value)
    {

        $check_approve = ConveyanceBill::find($id);

        if($value == 0)
        {
            $check_approve->approved_by_chairman                = Auth::user()->id;
            $check_approve->updated_by                          = Auth::user()->id;

            $check_approve->update();
        }
        else
        {
            $check_approve->approved_by_chairman                = Null;
            $check_approve->updated_by                          = Auth::user()->id;

            $check_approve->update();
        }

        return redirect('conveyancebill/')->with('message' , 'Conveyance Bill Approved Successfully');
    }

    public function pdf($id)
    {
        $conveyance = ConveyanceBill::find($id);
        $list = ConveyanceBillList::where('conveyance_bill_id' , $id)->get();
        $sum = ConveyanceBillList::where('conveyance_bill_id' , $id)->sum('amount');
        $OrganizationProfile = OrganizationProfile::find(1);
        $pdf = PDF::loadView('conveyancebill::conveyanceBill.cnbPdf', compact('conveyance' , 'list' , 'sum' , 'OrganizationProfile'));


        return $pdf->stream('invoice.pdf');
    }

    public function myBill()
    {
        $conveyance = ConveyanceBill::where('user_id' , Auth::user()->id)->get();

        return view('conveyancebill::conveyanceBill.my_bill' , compact('conveyance'));
    }
}
