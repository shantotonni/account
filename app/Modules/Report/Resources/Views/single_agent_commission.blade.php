@extends('layouts.admin')
@php
$display_name = $ag['display_name'];
@endphp
@section('title',"Report Agent $display_name")

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection
@section('styles')
    <style>
        @media print {
            a[href]:after {
                content:"" !important;

            }
            a{
                text-decoration: none;
            }
            .uk-table tr td{
                white-space: nowrap;
                padding: 1px 2px;
                border: none !important;
                width:1%;
                font-size: 11px !important;
            }
            .uk-table tr th:last-child, .uk-table tr td:last-child{

            }
            .uk-table tr th:first-child, .uk-table tr td:first-child{
                white-space: nowrap;
                text-align: left !important;


            }
            .uk-table tr th{
                white-space: nowrap;
                padding: 1px 2px;
                border-top: 1px solid black;
                border-bottom: 1px solid black;

                font-size: 11px !important;
            }

            body{
                margin-top: -40px;
            }
        }
    </style>
@endsection
@section('content_header')
    <div id="top_bar">
        <div class="md-top-bar">
            <ul id="menu_top" class="uk-clearfix">
                <li data-uk-dropdown class="uk-hidden-small">
                    <a href="#"><i class="material-icons">&#xE02E;</i><span>Reports</span></a>
                    <div class="uk-dropdown">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li>Business Overview</li>
                            <li><a href="{{route('report_account_profit_loss')}}">Profit and Loss</a></li>
                            <li><a href="{{route('report_account_cash_flow_statement')}}">Cash Flow Statement</a></li>
                            <li><a href="{{route('report_account_balance_sheet')}}">Balance Sheet</a></li>
                            <li>Accountant</li>
                            <li><a href="{{route('report_account_transactions')}}">Account Transactions</a></li>
                            <li><a href="{{route('report_account_general_ledger_search')}}">General Ledger</a></li>
                            <li><a href="{{route('report_account_journal_search')}}">Journal Report</a></li>
                            <li><a href="{{route('report_account_trial_balance_search')}}">Trial Balance</a></li>
                            <li>Sales</li>
                            <li><a href="{{route('report_account_customer')}}">Sales by Customer</a></li>
                            <li><a href="">Sales by Item</a></li>
                            <li><a href="{{route('report_account_item')}}">Product Report</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" >
            <div class="uk-width-large-10-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar hidden-print">
                            <div class="md-card-toolbar-actions ">
                                <i class="md-icon material-icons" id="invoice_print"></i>



                                <!--end  -->
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>

                                </div>
                                <!--coustorm setting modal start -->
                                <div class="uk-modal" id="coustom_setting_modal">
                                    <div class="uk-modal-dialog">
                                        {!! Form::open(['route' =>'report_Sales_by_agent_detailsbydate', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']) !!}
                                        <div class="uk-modal-header">
                                            <h3 class="uk-modal-title">Select Date Range  <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                        </div>

                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">Form</label>
                                                    <input class="md-input" type="hidden"  name="id" value="{{ $id }}" >

                                                    <input class="md-input" type="text" id="uk_dp_1" name="start" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                </div>
                                            </div>
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">To</label>
                                                    <input class="md-input" type="text" id="uk_dp_1" name="end" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="uk-modal-footer uk-text-right">
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                            <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Search</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!--end  -->
                            </div>

                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name"></h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 100%;">

                            <div class="uk-grid" data-uk-grid-margin="">

                                <div class="uk-width-small-5-5 uk-text-center">
                                    <img style="margin-bottom: -20px;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/>
                                    <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large">{{ $OrganizationProfile->company_name }}</p>
                                    <p style="line-height: 5px;" class="heading_b uk-text-success">{{ $ag->display_name }} Sales Commission</p>
                                    <p style="line-height: 5px;" class="uk-text-small">From {{$start}}  To {{$end}}</p>
                                </div>
                            </div>
                            @inject('Invoice', 'App\Lib\Report')
                            <div class="uk-grid ">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th class="uk-text-center">Date </th>
                                            <th class="uk-text-center">Customer Name </th>
                                            <th class="uk-text-center">Invoice/Sales Commission No.  </th>
                                            <th class="uk-text-center">Sales Amount  </th>
                                            <th class="uk-text-center">Total Received  </th>
                                            <th class="uk-text-center">Payable (Debit)</th>
                                            <th class="uk-text-center">Paid (Credit)</th>
                                            <th class="uk-text-center">Balance</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr class="uk-text-upper">
                                            <th class="uk-text-center"> </th>
                                            <th class="uk-text-center"> </th>
                                            <th class="uk-text-center" >Total <i class="material-icons" style="font-size: larger; color: orangered">trending_flat</i></th>
                                            <th class="uk-text-center" id="salesamount"> </th>
                                            <th class="uk-text-center" id="totalrecieve"> </th>
                                            <th class="uk-text-center" id="total_payable"></th>
                                            <th class="uk-text-center" id="paid"></th>
                                            <th class="uk-text-center" id="balance"></th>
                                        </tr>
                                        </tfoot>
                                        <tbody id="single_agent">

                                       @foreach($journal as $value)
                                           <tr class="uk-text-upper">
                                               <td class="uk-text-center">{{ date('Y-m-d',strtotime($value->created_at)) }} </td>
                                               <td class="uk-text-center">{{ $Invoice->Customer($value->invoice['customer_id']) }} </td>
                                               <td class="uk-text-center">{{ $value->invoice_id? "INV-".str_pad($value->invoice->invoice_number,6,'0',STR_PAD_LEFT): "  SC-".str_pad($value->SalesCommission->scNumber,6,'0',STR_PAD_LEFT) }} </td>
                                               <td class="uk-text-center">{{ $value->invoice_id?$value->invoice->total_amount:'0'  }}</td>
                                               <td class="uk-text-center">{{ $value->invoice_id?$value->invoice->total_amount-$value->invoice->due_amount:'0'  }}</td>
                                               <td class="uk-text-center">{{ $value->invoice_id?$value->amount:'0'  }}</td>
                                               <td class="uk-text-center">{{ $value->salesComission_id?$value->SalesCommission->amount:'0' }}</td>
                                               <td class="uk-text-center">Balance</td>
                                           </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                    <p class="uk-text-small">Looking forward for your business.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        window.onload = function () {
           var sum=0;
           var recievesum=0;
           var salessum=0;
            var psum = 0;
            var table = document.getElementById('single_agent');
            var balance = 0;
            for (var r = 0, n = table.rows.length; r < n; r++) {

                recievesum=recievesum+ parseFloat(table.rows[r].cells[4].innerText);
                salessum=salessum+ parseFloat(table.rows[r].cells[3].innerText);
                   sum=sum+ parseFloat(table.rows[r].cells[5].innerText);
                   psum=psum+ parseFloat(table.rows[r].cells[6].innerText);
                   if(r==0){
                       balance = sum-psum;

                       table.rows[r].cells[7].innerText = balance
                   }else{
                       balance = balance + parseFloat(table.rows[r].cells[5].innerText)-parseFloat(table.rows[r].cells[6].innerText);

                       table.rows[r].cells[7].innerText = balance
                   }


            }



            document.getElementById('totalrecieve').innerText = recievesum;
            document.getElementById('salesamount').innerText = salessum;
            document.getElementById('total_payable').innerText = sum;
            document.getElementById('paid').innerText = psum;
            document.getElementById('balance').innerText = balance;

        }
    </script>

    <!-- handlebars.js -->
    <script src="{{ url('admin/bower_components/handlebars/handlebars.min.js')}}"></script>
    <script src="{{ url('admin/assets/js/custom/handlebars_helpers.min.js')}}"></script>

    <!--  invoices functions -->
    <script src="{{ url('admin/assets/js/pages/page_invoices.min.js')}}"></script>
    <script type="text/javascript">
        $('#sidebar_reports').addClass('current_section');
    </script>
@endsection
