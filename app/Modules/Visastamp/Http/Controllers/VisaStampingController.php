<?php

namespace App\Modules\Visastamp\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Visa\Visa;
use App\Models\VisaStamp\VisaStamp;
use App\Models\Recruit\Recruitorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Musaned\Musaned;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class VisaStampingController extends Controller
{

    public function index($id=null)
    {

        $id=$id;

        if (is_null($id))
        {
            if (session('branch_id')==1){
                $branch=Branch::all();
                $recruit = Recruitorder::all();
                return view('visastamp::index',compact('id','branch','recruit'));
            }
            else {

                $branch=Branch::where('id',session('branch_id'))->get();
                $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                    ->where('users.branch_id',session('branch_id'))
                    ->select('recruitingorder.*')
                    ->get();
                return view('visastamp::index',compact('id','branch','recruit'));
            }
        }
        else {

            $branch=Branch::all();
            $recruit = Recruitorder::join('users','recruitingorder.created_by','=','users.id')
                ->where('users.branch_id',$id)
                ->select('recruitingorder.*')
                ->get();
            return view('visastamp::index',compact('id','branch','recruit'));

        }
    }


    public function create()
    {

        $recruit = Recruitorder::all();
        $visa = Visa::all();

        $arr=[];

        foreach ($visa as $value){

            $entry=Recruitorder::join('visaentrys','recruitingorder.registerSerial_id','=','visaentrys.id')
                ->select(DB::raw('visaentrys.numberofVisa-count(recruitingorder.registerSerial_id) as totalserial,visaentrys.*'))
                ->where('recruitingorder.registerSerial_id','=',$value->id)
                ->groupBy('recruitingorder.registerSerial_id')
                ->get();

            $arr[]=$entry;

        }

       // dd($arr);
        return view('visastamp::create',compact('visa','recruit','arr'));

    }

//    public function test(Request $request){
//
//      $result=explode('/');
//
//
//        return response($request->id);
//    }


    public function register_serial_flat($value=[]){

        $data=[];

        if (is_array($value)){
           $pre_item = new RecursiveIteratorIterator(new RecursiveArrayIterator($value));
            foreach ($pre_item as $item){
                $data[]=explode('/',$item);
            }
            return $data;
        }
        return null;
    }


    public function store(Request $request)
    {
        $result = $this->register_serial_flat($request->registerSerial_id);
        $value=count($request->registerSerial_id);

        //$id=$result[0][0];
        $value2=$result[0][1];

        $result2=$value2-$value;
        if ($result2>0) {

            dd('ok');

            if ($request->type == 1) {
                $validator = Validator::make($request->all(), [
                    'pax_id.*' => 'required',
                    'img_url' => 'required',
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'pax_id.*' => 'required',
                    'img_url' => 'required',
                ]);
            }

            if ($validator->fails()) {
                return Redirect::route('visastamp_create')->withErrors($validator)->withInput();
            }

            $input = Input::all();
            $paxIds = $input['pax_id'];

            if ($request->hasFile('img_url')) {

                foreach ($paxIds as $key => $paxId) {

                    $visa = VisaStamp::where('pax_id', $paxId)->first();

                    if (empty($visa)) {

                        if (is_array($request->pax_id[$key])) {
                            $pax = array_keys($request->pax_id[$key])[0];
                            $pax_id = $request->pax_id[$key][$pax];
                        } else {
                            $pax_id = $request->pax_id[$key];
                        }

                        if (is_array($request->eapplication_no[$key])) {
                            $tit = array_keys($request->eapplication_no[$key])[0];
                            $title = $request->eapplication_no[$key][$tit];
                        } else {
                            $title = $request->eapplication_no[$key];
                        }

                        if (is_array($request->img_url[$key])) {
                            $amou = array_keys($request->img_url[$key])[0];
                            $file = $request->img_url[$key][$amou];
                        } else {
                            $file = $request->img_url[$key];
                        }

                        $fileName = uniqid() . '.' . $file->getClientOriginalName();
                        $file->move(public_path('all_image'), $fileName);

                        $visastamp = new VisaStamp();
                        $visastamp->pax_id = $pax_id;
                        $visastamp->send_date = $request->type == 1 ? $input['send_date'] : '';
                        $visastamp->return_date = $request->type == 2 ? $input['return_date'] : '';
                        $visastamp->comment = $request->comment;
                        $visastamp->eapplication_no = $title;
                        $visastamp->img_url = $fileName;
                        $visastamp->created_by = Auth::user()->id;
                        $visastamp->updated_by = Auth::user()->id;
                        $visastamp->save();
                    } else {
                        if (is_array($request->pax_id[$key])) {
                            $pax = array_keys($request->pax_id[$key])[0];
                            $pax_id = $request->pax_id[$key][$pax];
                        } else {
                            $pax_id = $request->pax_id[$key];
                        }

                        if (is_array($request->eapplication_no[$key])) {
                            $tit = array_keys($request->eapplication_no[$key])[0];
                            $title = $request->eapplication_no[$key][$tit];
                        } else {
                            $title = $request->eapplication_no[$key];
                        }

                        if (is_array($request->img_url[$key])) {
                            $amou = array_keys($request->img_url[$key])[0];
                            $file = $request->img_url[$key][$amou];
                        } else {
                            $file = $request->img_url[$key];
                        }

                        $fileName = uniqid() . '.' . $file->getClientOriginalName();
                        $file->move(public_path('all_image'), $fileName);

                        $visa->send_date = $request->type == 1 ? $input['send_date'] : '';
                        $visa->return_date = $request->type == 2 ? $input['return_date'] : '';
                        $visa->comment = $request->comment;
                        $visa->eapplication_no = $title;
                        $visa->img_url = $fileName;
                        $visa->updated_by = Auth::user()->id;
                        $visa->update();
                    }
                }

                return Redirect::route('visastamp')->withInput()->with('alert.status', 'success')
                    ->with('alert.message', 'Visa Stamp Created Successfully!');
            }
        }else{
            return redirect()->back()->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Visa Not Avialable !');
        }
    }


    public function edit($id)
    {
        $visa=VisaStamp::all();
        $recruit=Recruitorder::find($id);
        $order=Recruitorder::all();
        return view('visastamp::edit',compact('visa','recruit','order'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'pax_id' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('visastamp_edit',$id)->withErrors($validator);
        }

        if ($request->hasFile('img_url')){

            $fileName=uniqid(). '.' .$request->img_url->getClientOriginalName();
            $request->img_url->move(public_path('all_image'), $fileName);

            $stamp=VisaStamp::find($id);
            $stamp->pax_id = $request->pax_id;
            $stamp->send_date =$request->send_date;
            $stamp->return_date = $request->return_date;
            $stamp->comment = $request->comment;

            $stamp->eapplication_no=$request->eapplication_no;
            $stamp->img_url=$fileName;

            $stamp->created_by = Auth::user()->id;
            $stamp->updated_by = Auth::user()->id;
            $stamp->update();

            return Redirect::route('visastamp')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Stamp Updated successfully!');
        }else{

            $stamp=VisaStamp::find($id);
            $stamp->pax_id = $request->pax_id;
            $stamp->send_date =$request->send_date;
            $stamp->return_date = $request->return_date;
            $stamp->comment = $request->comment;

            $stamp->eapplication_no=$request->eapplication_no;
            $stamp->created_by = Auth::user()->id;
            $stamp->updated_by = Auth::user()->id;
            $stamp->update();

            return Redirect::route('visastamp')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Stamp Updated successfully!');
        }

 }


    public function delete($id)
    {
        $stamp=VisaStamp::find($id);
        $stamp->delete();
        return redirect()->back()->with('delete','Visastamp Deleted');


    }
}
