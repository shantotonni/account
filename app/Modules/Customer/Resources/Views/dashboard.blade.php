@extends('layouts.admin')

@section('title', 'Customer Dashboard')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection



@section('content')
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            @include('inc.customer_nav')

            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
           <div class="md-card">
               <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">



                   <div class="user_heading_content">
                       <h2 class="heading_b"><span class="uk-text-truncate">Customer Dashboard</span></h2>
                   </div>
               </div>
             <div class="md-card-content">


                <div class="uk-overflow-container uk-margin-bottom">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
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

                        @php
                            $i=1;
                        @endphp

                        <tbody>


                            <tr>
                                <td>{!! $i++ !!}</td>
                                <td>{!!$recruit_order->paxid !!}</td>
                                <td>{!!$recruit_order->passenger_name !!}</td>
                                <td>{{ $recruit_order->customer['display_name'] }}</td>
                                <td>{{ $recruit_order->registerserial['registerSerial'] }}
                                    @if($recruit_order->bill)
                                        (BILL-00000{{ $recruit_order->bill['bill_number'] }})
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($recruit_order->created_at)) }}
                                    @if($recruit_order->invoice)
                                        ({{ $recruit_order->invoice['invoice_number'] }})
                                    @endif
                                </td>
                                <td>
                                    @if($recruit_order->okala)
                                        @if($recruit_order->okala['status'] === 0)
                                            Not Ok
                                        @elseif($recruit_order->okala['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if($recruit_order->medical_slip)
                                        @if($recruit_order->medical_slip['status'] === 0)
                                            Not Ok
                                        @elseif($recruit_order->medical_slip['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($recruit_order->mofa)
                                        @if($recruit_order->mofa['status'] === 0)
                                            Not Ok
                                        @elseif($recruit_order->mofa['status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($recruit_order->fitcard)
                                        {{ $recruit_order->fitcard['receive_date'] }}
                                    @endif
                                </td>
                                <td>{{ $recruit_order->police?$recruit_order->police->submission_date:'' }}</td>
                                <td>{{ $recruit_order->musanand?$recruit_order->musanand->issue_date:'' }}</td>
                                <td>{{ $recruit_order->visas?$recruit_order->visas->send_date:'' }}
                                    <br>{{ $recruit_order->visas?$recruit_order->visas->return_date:'' }}
                                </td>
                                <td>
                                    @if($recruit_order->finger)
                                        @if($recruit_order->finger['bmet_status'] === 0)
                                            Not Ok
                                        @elseif($recruit_order->finger['bmet_status'] === 1)
                                            Ok
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $recruit_order->training?$recruit_order->training->received_date:'' }}</td>
                                <td>{{$recruit_order->manpower['issuingDate']}} </br>{{$recruit_order->manpower['receivingDate']}}</td>
                                <td>{{ $recruit_order->completion['smart_card_number'] }}</td>
                                <td>{{ $recruit_order->submission['expected_flight_date'] }}<br>
                                    @if($recruit_order->submission['owner_approval'] === 0)
                                        Not Ok
                                    @elseif($recruit_order->submission['owner_approval'] === 1)
                                        Ok
                                    @endif
                                </td>
                                <td>{{ $recruit_order->confirmation['date_of_flight'] }}<br>
                                    @if($recruit_order->confirmation['bill'])
                                        (BILL-00000{{ $recruit_order->confirmation['bill']->bill_number }})
                                    @endif
                                </td>

                                <td class="uk-text-center">
                                    <a href="{{ route('customer_update' , $recruit_order->paxid) }}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                    {{-- <a href="#" class="batch-edit" data-uk-modal="{target:'#edit_modal{{$data->course_id}}'}"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>--}}
                                </td>
                            </tr>


                        </tbody>

                    </table>
                </div>
                <ul class="uk-pagination ts_pager">
                    <li data-uk-tooltip title="Select Page">
                        <select class="ts_gotoPage ts_selectize"></select>
                    </li>
                    <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                    <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                    <li><span class="pagedisplay"></span></li>
                    <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                    <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                    <li data-uk-tooltip title="Page Size">
                        <select class="pagesize ts_selectize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="500">500</option>
                        </select>
                    </li>
                </ul>
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
        $('#sidebar_customer').addClass('act_item');
        $('.customer_mosaned').addClass('md-bg-blue-grey-100');
    </script>
@endsection