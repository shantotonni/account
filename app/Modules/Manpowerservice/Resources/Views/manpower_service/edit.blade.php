@extends('layouts.main')

@section('title', 'Manpower Service create')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-grid">
        <div class="uk-width-large-10-10">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Manpower Service</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('manpower_service_confirmed') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Confirmed</a>
                                        <a href="{{ route('manpower_service_pending') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Pending</a>
                                        <a href="{{ route('manpower_service_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('manpower_service_update',$manpower->id), 'method' => 'POST']) !!}
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_id">Contact Name <span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="contact_id">Customer name</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="contact_id" name="contact_id">
                                                <option>Select Customer</option>
                                                @foreach($contact as $value)
                                                    @if($value->id==$manpower->	contact_id)
                                                    <option value=" {{ $value->id }}" selected> {{ $value->display_name }} </option>
                                                    @else
                                                        <option value=" {{ $value->id }} " > {{ $value->display_name }} </option>
                                                        @endif
                                                @endforeach
                                            </select>
                                            @if($errors->has('contact_id'))
                                                <div class="uk-text-danger">{{ $errors->first('contact_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_id">Vendor Name <span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="contact_id">Vendor name</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer Category" id="vendor_id" name="vendor_id" required>
                                                <option>Select Vendor</option>
                                                @foreach($test as $value)
                                                    @if($value->id==$manpower->	contact_id)
                                                        <option value=" {{ $value->id }}" selected> {{ $value->display_name }} </option>
                                                    @else
                                                        <option value=" {{ $value->id }} " > {{ $value->display_name }} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if($errors->has('contact_id'))
                                                <div class="uk-text-danger">{{ $errors->first('contact_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="first_name">First Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="first_name">First Name</label>
                                            <input class="md-input" type="text" id="first_name"  name="first_name" value="{!! $manpower->first_name !!}" />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="last_name">Last Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="last_name">Last Name</label>
                                            <input class="md-input" type="text" id="last_name"  name="last_name" value="{!! $manpower->last_name !!} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_number">Phone Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="contact_number">Phone Number</label>
                                            <input class="md-input" type="text" id="contact_number"  name="phone" value="{!! $manpower->phone !!} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_number">Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="contact_number">Sector</label>
                                            <input class="md-input" type="text" id="sector"  name="sector" value="{!! $manpower->sector !!}" />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightarrivalDate">Issuing Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightarrivalDate">Issuing Date</label>
                                            <input class="md-input" type="text" id="returnflightarrivalDate" name="issue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{!! $manpower->issue_date !!}" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightarrivalDate">Delivery Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightarrivalDate">Delivery Date</label>
                                            <input class="md-input" type="text" id="returnflightarrivalDate" name="delivery_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{!! $manpower->delivery_date !!}" />
                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Progress Status</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Order id" id="order_id" name="progress_status_id">
                                                <option value="">Progress Status Title</option>
                                                @foreach($progress as $value)
                                                    @if($value->id==$manpower->progress_status_id)
                                                    <option value="{!! $value->id !!}" selected>{!! $value->title !!}</option>
                                                    @else
                                                        <option value="{!! $value->id !!}">{!! $value->title !!}</option>
                                                        @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            @if($manpower->status==1)
                                            <input type="submit" class="md-btn md-btn-primary" value="confirm" name="confirm" />
                                            @else
                                            <input type="submit" class="md-btn md-btn-primary" value="save" name="save" />
                                                @endif

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


        $('#sidebar_ticket_order_new').addClass('act_item');
        $('#sidebar_ticketing').addClass('current_section');
        $(window).load(function(){
            $("#tiktok").trigger('click');
        })
    </script>


@endsection