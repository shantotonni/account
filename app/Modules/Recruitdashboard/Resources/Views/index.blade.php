@extends('layouts.main')

@section('title', 'Recruit Deshboard')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    @if(Session::has('msg'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('msg') !!}
        </div>
    @endif




 <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_content">

                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px; width: 100%" class="dt_colVis_buttons"></div>
                                <table class="uk-table " style="" cellspacing="0" width="100%" id="saven_table" >
                                    <thead>
                                    <tr>
                                        <th style="width: 4px">#</th>
                                        <th style="width: 4px">#Serial</th>
                                        <th id="reset_width">Pax ID</th>
                                        <th >Passenger Name</th>
                                        <th >Reference</th>
                                        <th >Visa(Bill Number)</th>
                                        <th style="display: none;">Order(Invoice Number)</th>
                                        <th style="display: none;">Okala</th>
                                        <th style="display: none;">Gamca</th>
                                        <th style="display: none;">Report</th>
                                        <th style="display: none;">Mofa</th>
                                        <th style="display: none;">Fit Card</th>
                                        <th style="display: none;">Poice Clearance</th>
                                        <th style="display: none;">Masaned</th>
                                        <th style="display: none;">Visa Stamping</th>
                                        <th style="display: none;">Finger</th>
                                        <th style="display: none;">Training</th>
                                        <th style="display: none;">Manpower</th>
                                        <th style="display: none;">Completion</th>
                                        <th style="display: none;">Flight Submission</th>
                                        <th  style="display: none;">Flight Confirmation</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $i=1;
                                    ?>
                                    <tbody id="saven_table_body">
                                    @foreach ($Rorder as $value)

                                        <tr id="toggle_details">
                                            <td style="font-size: 20px; color: #2196f3;width: 50px;">&#43;</td>
                                            <td>{{ $i++ }}</td>
                                <td id="col_details">
                                    {!!$value->paxid !!}
                                    <table id="details" style="width: 100%; display: none ;font-size: 11px;">
                                        <tr ><td colspan="4"><button class="md-btn md-btn-warning md-btn-wave-light waves-effect waves-button waves-light" id="hide">Close</button></td></tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>Details</td>

                                        </tr>
                                        <tr>
                                            <td>Order(Invoice Number)</td>
                                            <td>
                                                {{ date('d-m-Y', strtotime($value->created_at)) }}
                                                @if($value->invoice)
                                                    ({{ $value->invoice->invoice_number }})
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Okala</td>
                                            <td>
                                                @if($value->okala)
                                                    @if($value->okala->status === 0)
                                                        Not Ok
                                                    @elseif($value->okala->status === 1)
                                                        Ok
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Medical Slip</td>
                                            <td>
                                               {{ $value->medicalslipFromPax->last()['dateOfApplication'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Report</td>
                                            <td>
                                                @if($value->medical_slip)
                                                    @if($value->medical_slip->status === 0)
                                                        Not Ok
                                                    @elseif($value->medical_slip->status === 1)
                                                        Ok
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mofa</td>
                                            <td>
                                                @if($value->mofa)
                                                    @if($value->mofa->status === 0)
                                                        Not Ok
                                                    @elseif($value->mofa->status === 1)
                                                        Ok
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fit Card</td>
                                            <td>
                                                @if($value->fitcard)
                                                    {{ $value->fitcard->receive_date }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Poice Clearance</td>
                                            <td>
                                                {{ $value->police?$value->police->submission_date:'' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masaned</td>
                                            <td>
                                                {{ $value->musanand?$value->musanand->issue_date:'' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Visa Stamping</td>
                                            <td>
                                                {{ $value->visas?$value->visas->send_date:'' }}
                                                <br>{{ $value->visas?$value->visas->return_date:'' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Finger</td>
                                            <td>
                                                @if($value->finger)
                                                    @if($value->finger['bmet_status'] === 0)
                                                        Not Ok
                                                    @elseif($value->finger['bmet_status'] === 1)
                                                        Ok
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Training</td>
                                            <td>
                                                {{ $value->training?$value->training->received_date:'' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Manpower</td>
                                            <td>
                                                {{$value->manpower['issuingDate']}} </br>{{$value->manpower['receivingDate']}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Completion</td>
                                            <td>
                                                {{ $value->completion['smart_card_number'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Flight Submission</td>
                                            <td>
                                                {{ $value->submission['expected_flight_date'] }}<br>
                                                @if($value->submission['owner_approval'] === 0)
                                                    Not Ok
                                                @elseif($value->submission['owner_approval'] === 1)
                                                    Ok
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Flight Confirmation</td>
                                            <td>
                                                {{ $value->confirmation['date_of_flight'] }}<br>
                                                @if($value->confirmation['bill'])
                                                    (BILL-00000{{ $value->confirmation['bill']->bill_number }})
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                                <td>{!!$value->passenger_name !!}</td>
                                <td >{{ $value->customer['display_name'] }}</td>
                                <td >{{ $value->registerserial['registerSerial'] }}
                                    @if($value->bill)
                                    (BILL-00000{{ $value->bill->bill_number }})
                                    @endif
                                </td>
                                <td style="display: none;">{{ date('d-m-Y', strtotime($value->created_at)) }}
                                    @if($value->invoice)
                                    ({{ $value->invoice->invoice_number }})
                                    @endif
                                </td>
                                <td style="display: none;">
                                    @if($value->okala)
                                        @if($value->okala->status === 0)
                                            Not Ok
                                        @elseif($value->okala->status === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td style="display: none;"></td>
                                <td style="display: none;">
                                    @if($value->medical_slip)
                                        @if($value->medical_slip->status === 0)
                                            Not Ok
                                        @elseif($value->medical_slip->status === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td style="display: none;">
                                    @if($value->mofa)
                                        @if($value->mofa->status === 0)
                                            Not Ok
                                        @elseif($value->mofa->status === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td style="display: none;">
                                    @if($value->fitcard)
                                        {{ $value->fitcard->receive_date }}
                                    @endif
                                </td>
                                <td style="display: none;">{{ $value->police?$value->police->submission_date:'' }}</td>
                                <td style="display: none;">{{ $value->musanand?$value->musanand->issue_date:'' }}</td>
                                <td style="display: none;">{{ $value->visas?$value->visas->send_date:'' }}
                                    <br>{{ $value->visas?$value->visas->return_date:'' }}
                                </td>
                                <td style="display: none;">
                                    @if($value->finger)
                                        @if($value->finger['bmet_status'] === 0)
                                            Not Ok
                                        @elseif($value->finger['bmet_status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td style="display: none;">{{ $value->training?$value->training->received_date:'' }}</td>
                                <td style="display: none;">{{$value->manpower['issuingDate']}} </br>{{$value->manpower['receivingDate']}}</td>
                                <td style="display: none;">{{ $value->completion['smart_card_number'] }}</td>
                                <td style="display: none;">{{ $value->submission['expected_flight_date'] }}<br>
                                    @if($value->submission['owner_approval'] === 0)
                                        Not Ok
                                    @elseif($value->submission['owner_approval'] === 1)
                                        Ok
                                    @endif
                                </td>
                                <td style="display: none;">{{ $value->confirmation['date_of_flight'] }}<br>
                                    @if($value->confirmation['bill'])
                                    (BILL-00000{{ $value->confirmation['bill']->bill_number }})
                                    @endif
                                </td>

                                <td  class="uk-text-center">
                                    <a href="{{ route('customer_information_edit' , $value->paxid) }}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                    {{-- <a href="#" class="batch-edit" data-uk-modal="{target:'#edit_modal{{$data->course_id}}'}"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>--}}
                                </td>
                               </tr>


                                    @endforeach
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                     </div>
                  </div>
  </div>

    <div class="uk-grid uk-grid-width-medium-1-1" data-uk-grid="{gutter:24}" style="position: relative; margin-left: -24px; height: 414px;">
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 0px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed" style="">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3  class="md-card-toolbar-heading-text">
                        Mofas Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: block;">
                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-large-10-10">

                            <h2 style="background-color: #7CB343;text-align: center;color: white">Mofas Reminder</h2>
                                <div class="user_content">
                                    <div class="uk-overflow-container uk-margin-bottom">
                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                        <table class="uk-table" cellspacing="0" width="100%" id="third_table" >
                                            <thead>
                                            <tr>
                                                <th>Pax ID</th>
                                                <th>Passenger Name</th>
                                                <th>Ref Name</th>
                                                <th>Time Left</th>
                                                <th>Report Date</th>
                                                {{--<th class="uk-text-center">Action</th>--}}
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Pax ID</th>
                                                <th>Passenger Name</th>
                                                <th>Ref Name</th>
                                                <th>Time Left</th>
                                                <th>Report Date</th>
                                                {{--<th class="uk-text-center">Action</th>--}}
                                            </tr>
                                            </tfoot>
                                            <?php
                                            $i=1;
                                            ?>
                                            <tbody>
                                            @foreach ($recruit as $value)
                                                <tr>
                                                    <td>{!!$value->paxid  !!}</td>
                                                    <td>{{ $value->passenger_name }}</td>
                                                    <td>{{ $value->display_name }}</td>
                                                    <td>
                                                        <?php

                                                        $my_date = new DateTime($value->medical_report_date);
                                                        $my_date->modify('+3 day');

                                                        $my_date2 = new DateTime(date('Y-m-d'));
                                                        if ($my_date<$my_date2){
                                                            echo '0 Days';
                                                        }else{

                                                            echo $my_date2->diff($my_date)->days.' Days';
                                                        }


                                                        ?>
                                                    </td>
                                                    <td>{{ $value->medical_report_date }}</td>

                                                    {{--<td class="uk-text-center">--}}
                                                    {{--<a href="#" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>--}}
                                                    {{--</td>--}}
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 73px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Processing Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-10-10">
                            <h2 style="background-color: #7CB343;text-align: center;color: white">Processing Reminder</h2>

                                <div class="user_content">
                                    <div class="uk-overflow-container uk-margin-bottom">
                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                        <table class="uk-table" cellspacing="0" width="100%" id="second_table" >
                                            <thead>
                                            <tr>
                                                <th>Pax ID</th>
                                                <th>Passenger Name</th>
                                                <th>Ref Name</th>
                                                <th>Time Left</th>
                                                <th>Fit Card Date</th>
                                                {{--<th class="uk-text-center">Action</th>--}}
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Pax ID</th>
                                                <th>Passenger Name</th>
                                                <th>Ref Name</th>
                                                <th>Time Left</th>
                                                <th>Fit Card Date</th>
                                                {{--<th class="uk-text-center">Action</th>--}}
                                            </tr>
                                            </tfoot>
                                            <?php
                                            $i=1;
                                            ?>
                                            <tbody id="saven_table">
                                            @foreach ($recruit2 as $value)
                                                <tr>

                                                    <td>{!!$value->paxid  !!}</td>
                                                    <td>{{ $value->passenger_name }}</td>
                                                    <td>{{ $value->display_name }}</td>
                                                    <td class="uk-text-center">
                                                        <?php

                                                        $my_date = new DateTime($value->receive_date);
                                                        $my_date->modify('+70 day');

                                                        $my_date2 = new DateTime(date('Y-m-d'));
                                                        if ($my_date<$my_date2){
                                                            echo '0 Days';
                                                        }else{

                                                            echo $my_date2->diff($my_date)->days.' Days';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td>{{$value->receive_date }}</td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 146px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Cancelled Orders
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: #7CB343;text-align: center;color: white">Cancelled Orders</h2>

                                <div class="user_content">
                                    <div class="uk-overflow-container uk-margin-bottom">
                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                        <table class="uk-table" cellspacing="0" width="100%" id="fourth_table" >
                                            <thead>
                                            <tr>
                                                <th>Ref. Name</th>
                                                <th>Cancelled Order</th>
                                                <th>Substitute Order</th>
                                                <th>Last Updated</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Ref. Name</th>
                                                <th>Cancelled Order</th>
                                                <th>Substitute Order</th>
                                                <th>Last Updated</th>
                                            </tr>
                                            </tfoot>
                                            <?php
                                            $i=1;
                                            ?>
                                            <tbody>
                                            @foreach ($cancelled_order as $value)
                                                <tr>
                                                    <td>{!!$value->display_name  !!}</td>
                                                    <td>{{ $value->paxid }} ({{ $value->passenger_name }})</td>
                                                    <td>{{ $value->substitued_order }}</td>
                                                    <td>
                                                        {{ $value->updated_by }}
                                                    </td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 219px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Visa Validity Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: dimgrey;text-align: center;color: white">Visa Validity Reminder</h2>

                                <div class="user_content">
                                    <div class="uk-overflow-container uk-margin-bottom">
                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                        <table class="uk-table" cellspacing="0" width="100%" id="fifth_table" >
                                            <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Reference</th>
                                                <th>Visa Number</th>
                                                <th>Visa Category</th>
                                                <th>Left Days</th>
                                                <th>Stamping Left</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Reference</th>
                                                <th>Visa Number</th>
                                                <th>Visa Category</th>
                                                <th>Left Days</th>
                                                <th>Stamping Left </th>
                                            </tr>
                                            </tfoot>
                                            <?php
                                            $i=1;
                                            ?>
                                            <tbody>
                                            @foreach ($visa_vil_reminder as $visa)
                                                @if($visa->numberofVisa-$visa->RecruitOrder->count()!=0)
                                                    <tr>
                                                        <td>{!!isset($visa->Company)?$visa->Company->name:''  !!}</td>
                                                        <td>{!! isset($visa->Contact)?$visa->Contact->display_name:''  !!}</td>
                                                        <td>{{ $visa->visaNumber }}</td>
                                                        <td>
                                                            @if($visa->visa_category_id==1)
                                                                Company Visa(Free)
                                                            @endif
                                                            @if($visa->visa_category_id==2)
                                                                Company Visa(Contact)
                                                            @endif
                                                            @if($visa->visa_category_id==3)
                                                                Processing Visa
                                                            @endif

                                                        </td>
                                                        <td>
                                                            {{ $visa->leftdays }}
                                                        </td>
                                                        <td>
                                                            {{ $visa->numberofVisa-$visa->RecruitOrder->count() }}

                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 292px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Visa Stamping Without Payment
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: chocolate;text-align: center;color: white">Visa Stamping Without Payment</h2>

                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="six_table" >
                                        <thead>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Reference</th>
                                            <th>Passenger Name</th>
                                            <th>Visa Stamping Date</th>
                                            <th>Due </th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Reference</th>
                                            <th>Passenger Name</th>
                                            <th>Visa Stamping Date</th>
                                            <th>Due </th>
                                        </tr>
                                        </tfoot>
                                        <?php
                                        $i=1;
                                        ?>
                                        <tbody>
                                        @foreach ($stamping_without_payment as $stamping)

                                            <tr>
                                                <td>{{ $stamping->paxId['paxid'] }}</td>
                                                <td>{{ isset($stamping->paxId->customer->display_name)?$stamping->paxId->customer['display_name']:'' }}</td>

                                                <td>{{ $stamping->paxId['passenger_name'] }}</td>
                                                <td>
                                                    {{ $stamping['return_date'] }}
                                                </td>
                                                <td>
                                                    {{ $stamping->paxId->invoice['due_amount'] }}
                                                </td>


                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 365px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                       Manpower Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: saddlebrown;text-align: center;color: white">Manpower Reminder </h2>

                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="six_table" >
                                        <thead>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Passenger Name</th>
                                            <th>Ref Name</th>
                                            <th>Fit Card Date</th>
                                            <th>Days Left </th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Passenger Name</th>
                                            <th>Ref Name</th>
                                            <th>Fit Card Date</th>
                                            <th>Days Left </th>
                                        </tr>
                                        </tfoot>

                                        <tbody>
                                        @foreach ($manpower_payment as $manpower)

                                            <tr>
                                                <td>{{ $manpower->pax_Id['paxid'] }}</td>
                                                <td>{{ $manpower->pax_Id['passenger_name'] }}</td>
                                                <td>{{ $manpower->pax_Id->customer['display_name']}}</td>
                                                <td>{{ $manpower['receive_date']}}</td>
                                                <td>{{ $manpower['leftdays']}}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>









    <script>

     function deleterow(link) {
     UIkit.modal.confirm('Are you sure?', function(){
     window.location.href = link;
       });
   }
    </script>
@endsection

@section('scripts')
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_recruit_dashboard').addClass('act_item');
        $('#second_table').DataTable({
            "pageLength": 50
        });
        $('#third_table').DataTable({
            "pageLength": 50
        });
        $('#fourth_table').DataTable({
            "pageLength": 50
        });
        $('#fifth_table').DataTable({
            "pageLength": 50
        });
        $('#six_table').DataTable({
            "pageLength": 50
        });
        $('#saven_table').DataTable({
            "pageLength": 50
        });

      $("#saven_table_body tr#toggle_details").on("click",function (e) {

          this.cells[0].innerHTML = "&#45;";
          $.each($(this).children(), function( index, value ) {
              if(index==2){
               $(value).css("width","75%").children("table").show();
              }
              if(index==1){
                  $(value).css("width","5%");
              }
              if(index==21){
                  return false;
              }

          });

      } );

        $("button#hide").on("click",function (e) {

           e.stopPropagation();
         $(this).parents("#toggle_details").children(":first").html("&#43;");
         // console.log($(this).children("table").hide());
         $(this).parents("#details").hide();





        });

    </script>
@endsection
