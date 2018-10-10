@extends('layouts.main')

@section('title', 'Recruite Report')

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
                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                    <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Pax ID</th>
                            <th>Passenger Name</th>
                            <th>Reference</th>
                            <th>Visa(Bill Number)</th>
                            <th>Order(Invoice Number)</th>
                            <th>Okala</th>
                            <th>Gamca</th>
                            <th>Report</th>
                            <th>Mofa</th>
                            <th>Fit Card</th>
                            <th>Poice Clearance</th>
                            <th>Masaned</th>
                            <th>Visa Stamping</th>
                            <th>Finger</th>
                            <th>Training</th>
                            <th>Manpower</th>
                            <th>Completion</th>
                            <th>Flight Submission</th>
                            <th>Flight Confirmation</th>
                            <th class="uk-text-center">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial</th>
                            <th>Pax ID</th>
                            <th>Passenger Name</th>
                            <th>Reference</th>
                            <th>Visa(Bill Number)</th>
                            <th>Order(Invoice Number)</th>
                            <th>Okala</th>
                            <th>Gamca</th>
                            <th>Report</th>
                            <th>Mofa</th>
                            <th>Fit Card</th>
                            <th>Poice Clearance</th>
                            <th>Masaned</th>
                            <th>Visa Stamping</th>
                            <th>Finger</th>
                            <th>Training</th>
                            <th>Manpower</th>
                            <th>Completion</th>
                            <th>Flight Submission</th>
                            <th>Flight Confirmation</th>
                            <th class="uk-text-center">Action</th>
                        </tr>
                        </tfoot>
                        <?php
                        $i=1;
                        ?>
                        <tbody>
                        @foreach ($recruit_order as $value)
                            <tr>
                                <td>{!! $i++ !!}</td>
                                <td>{!!$value->paxid !!}</td>
                                <td>{!!$value->passenger_name !!}</td>
                                <td>{{ $value->customer['display_name'] }}</td>
                                <td>{{ $value->registerserial['registerSerial'] }}
                                    @if($value->bill)
                                    (BILL-00000{{ $value->bill['bill_number'] }})
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}
                                    @if($value->invoice)
                                    ({{ $value->invoice['invoice_number'] }})
                                    @endif
                                </td>
                                <td>
                                    @if($value->okala)
                                        @if($value->okala['status'] === 0)
                                            Not Ok
                                        @elseif($value->okala['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if($value->medical_slip)
                                        @if($value->medical_slip['status'] === 0)
                                            Not Ok
                                        @elseif($value->medical_slip['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($value->mofa)
                                        @if($value->mofa['status'] === 0)
                                            Not Ok
                                        @elseif($value->mofa['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($value->fitcard)
                                        {{ $value->fitcard['receive_date'] }}
                                    @endif
                                </td>
                                <td>{{ $value->police?$value->police->submission_date:'' }}</td>
                                <td>{{ $value->musanand?$value->musanand->issue_date:'' }}</td>
                                <td>{{ $value->visas?$value->visas->send_date:'' }}
                                    <br>{{ $value->visas?$value->visas->return_date:'' }}
                                </td>
                                <td>
                                    @if($value->finger)
                                        @if($value->finger['bmet_status'] === 0)
                                            Not Ok
                                        @elseif($value->finger['bmet_status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $value->training?$value->training->received_date:'' }}</td>
                                <td>{{$value->manpower['issuingDate']}} </br>{{$value->manpower['receivingDate']}}</td>
                                <td>{{ $value->completion['smart_card_number'] }}</td>
                                <td>{{ $value->submission['expected_flight_date'] }}<br>
                                    @if($value->submission['owner_approval'] === 0)
                                        Not Ok
                                    @elseif($value->submission['owner_approval'] === 1)
                                        Ok
                                    @endif    
                                </td>
                                <td>{{ $value->confirmation['date_of_flight'] }}<br>
                                    @if($value->confirmation['bill'])
                                    (BILL-00000{{ $value->confirmation['bill']->bill_number }})
                                    @endif
                                </td>
                                
                                <td class="uk-text-center">
                                    <a href="{{ route('customer_update' , $value->paxid) }}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
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

@endsection

@section('scripts')
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer_report').addClass('act_item');
    </script>
@endsection
