@extends('layouts.main')

@section('title', 'Payment Receive')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('angular')
    <script src="{{url('app/moneyin/invoice/paymentReceive.controller.js')}}"></script>
@endsection

@section('content')
    <div class="uk-grid" ng-controller="PaymentReceiveController">
        <div class="uk-width-large-10-10">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Receive New Payment</span></h2>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('payment_received_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data"]) !!}
                            <div class="user_content">
                                <div class="uk-margin-top">

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Customer Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select
                                                    id="customer_id"
                                                    class="customer_id"
                                                    name="customer_id"
                                                    ng-model="customer_id"
                                                    ng-change="getCustomerInvoice()"
                                                    required>
                                            </select>
                                        </div>
                                    </div>

                                    <div ng-style="{opacity : ((currentPage == 0) && '0.2') || '1'}">

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="amount">Amount</label>
                                            </div>
                                            <div class="uk-width-medium-2-5">
                                                <label for="amount">Enter Amount</label>
                                                <input class="md-input" type="text" id="amount" ng-model="amount" name="amount" ng-readonly="truefalse" ng-keyup="amountReceived()" />
                                                @if($errors->first('amount'))
                                                    <div class="uk-text-danger">Amount is required.</div>
                                                @endif
                                            </div>
                                        </div>
                                    
                                        <div class="uk-grid disabled" data-uk-grid-margin id="disabled">
                                            <div class="uk-width-medium-1-5  uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="payment_date">Payment Date</label>
                                            </div>
                                            <div class="uk-width-medium-2-5">
                                                <label for="payment_date">Select date</label>
                                                <input class="md-input" type="text" id="payment_date" name="payment_date" value="{{ date('d-m-Y') }}"  data-uk-datepicker="{format:'DD-MM-YYYY'}" />
                                            </div>
                                            @if($errors->first('payment_date'))
                                                <div class="uk-text-danger">Date is required.</div>
                                            @endif
                                        </div>

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="payment_mode">Payment Mode</label>
                                            </div>
                                            <div class="uk-width-medium-2-5">
                                                <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Payment Mode" id="payment_mode" name="payment_mode">
                                                    @foreach($payment_modes as $payment_mode)
                                                        @if($payment_mode->id == old('payment_mode' ))
                                                            <option value="{{ $payment_mode->id }}" selected>{{ $payment_mode->mode_name }}</option>
                                                        @else
                                                            <option value="{{ $payment_mode->id }}">{{ $payment_mode->mode_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->first('payment_mode'))
                                                <div class="uk-text-danger">Payment Mode is required.</div>
                                            @endif
                                        </div>

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="deposite_to">Deposite To</label>
                                            </div>
                                            <div class="uk-width-medium-1-5">
                                                <select
                                                        id="account_id"
                                                        class="account_id"
                                                        name="account_id"
                                                        ng-model="account_id"
                                                        ng-change="getAccountType()"
                                                        required>
                                                </select>
                                            </div>
                                            @if($errors->first('account_id'))
                                                <div class="uk-text-danger">Deposite is required.</div>
                                            @endif
                                            <div ng-if="account_type!=3" class="uk-width-medium-2-5" id="show">
                                                <label for="reference">Optional(Cash) Requeired(Undeposited Fund)</label>
                                                <input class="md-input" type="text" id="reference" name="bank_info" />
                                                @if($errors->first('bank_info'))
                                                    <div class="uk-text-danger">Field is required.</div>
                                                @endif
                                            </div>
                                            <div ng-if="account_type!=3" class="uk-width-medium-1-5" id="show2">
                                                <input type="checkbox" checked id="invoice_show" name="invoice_show" />
                                                <label for="switch_demo_1" class="inline-label" id="show_invoice">Show In Invoice</label>
                                                @if($errors->first('invoice_show'))
                                                    <div class="uk-text-danger">Field is required.</div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-5  uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="reference">Reference#</label>
                                            </div>
                                            <div class="uk-width-medium-2-5">
                                                <label for="reference">Enter Reference Number</label>
                                                <input class="md-input" type="text" id="reference" name="reference" ng-model="reference" ng-readonly="truefalse"/>
                                            </div>
                                        </div>
                                    

                                        <div class="uk-grid uk-margin-large-top uk-margin-large-bottom" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <table class="uk-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="uk-text-nowrap">Date</th>
                                                        <th class="uk-text-nowrap">Invoice Number</th>
                                                        <th class="uk-text-nowrap">Invoice Amount</th>
                                                        <th class="uk-text-nowrap">Due Amount</th>
                                                        <th class="uk-text-nowrap">Payment Receive Adjustment</th>
                                                        <th class="uk-text-nowrap">Payment Receive Note</th>
                                                        <th class="uk-text-nowrap">Payment</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr ng-repeat="invoice in invoices track by $index" class="form_section" >
                                                        <td>@{{ invoice.invoice_date }}</td>
                                                        <td>INV-@{{ invoice.invoice_number }}</td>
                                                        <td>@{{ invoice.total_amount }}</td>
                                                        <td>@{{ invoice.due_amount }}</td>
                                                        <td>
                                                            <input type="text" id="payment_receive_adjustment_@{{ $index }}" name="payment_receive_adjustment[]" ng-model="payment_receive_adjustment[$index]" ng-keyup="calculateAdjustment($index)" class="md-input"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="payment_receive_note_@{{ $index }}" name="payment_receive_note[]" ng-model="payment_receive_note[$index]" class="md-input"/>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="invoice_amount_@{{ $index }}" name="invoice_amount[]" ng-model="invoice_amount[$index]" ng-keyup="calculateExcessPayment($index)" class="md-input"/>
                                                        </td>
                                                        <input type="hidden" id="invoice_id_@{{ $index }}" name="invoice_id[]" ng-model="invoice_id[$index]" value="@{{ invoice.id }}">
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3 uk-margin-medium-top"></div>
                                            <div class="uk-width-medium-2-3">
                                                <div class="uk-grid uk-padding-medium" data-uk-grid-margin>
                                                    <div class="uk-width-medium-4-5">
                                                        <label class="uk-float-right">Amount Received: </label>
                                                    </div>
                                                    <div class="uk-width-medium-1-5">
                                                        <label class="uk-float-right">@{{ amount_received }}</label>
                                                    </div>
                                                </div>

                                                <div class="uk-grid uk-padding-medium" data-uk-grid-margin>
                                                    <div class="uk-width-medium-4-5">
                                                        <label class="uk-float-right">Used Amount: </label>
                                                    </div>
                                                    <div class="uk-width-medium-1-5">
                                                        <label class="uk-float-right">@{{ used_amount }}</label>
                                                    </div>
                                                </div>

                                                <div class="uk-grid uk-padding-medium" data-uk-grid-margin>
                                                    <div class="uk-width-medium-4-5">
                                                        <label class="uk-float-right">Excess Amount: </label>
                                                    </div>
                                                    <div class="uk-width-medium-1-5">
                                                        <label class="uk-float-right">@{{ excess_amount }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-2-5">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label for="user_edit_uname_control">Attach Files: </label>
                                                    </div>
                                                    <div class="uk-width-medium-1-1 uk-margin-top">
                                                        <div class="uk-form-file uk-text-primary"
                                                             style="width: 200px; height: 30px; border-color: #ececec; border-style: dotted; text-align: center; ">
                                                            <p style="margin: 4px;">Uplaod File</p>
                                                            <input onchange="uploadLavel()"  id="file_name" name="file1" type="file">
                                                        </div>.
                                                    </div>
                                                    <p id="upload_name"></p>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-3-5">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label for="customer_note">Customer note</label>
                                                        <textarea rows="5" class="md-input" id="customer_note" name="note" ng-model="customer_note" ng-readonly="truefalse"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="uk-grid uk-ma" data-uk-grid-margin>
                                            <div class="uk-width-1-1 uk-float-left">
                                                <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                                <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        function uploadLavel()
        {
            var fullPath = document.getElementById('file_name').value;
            var upload_file_name_ = document.getElementById('upload_name');
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }

                upload_file_name_.innerHTML  = filename;

            }
        }
        $('#sidebar_money_in').addClass('current_section');
        $('#sidebar_payment_recieve').addClass('act_item');
        altair_forms.parsley_validation_config();
    </script>

    <script src="{{ url('admin/bower_components/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pages/forms_validation.js') }}"></script>

@endsection
