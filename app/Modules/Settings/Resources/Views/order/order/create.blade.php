@extends('layouts.main')

@section('title', 'Ticket Order create')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Ticket Order</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('ticket_Order_confirmed') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Confirmed</a>
                                        <a href="{{ route('ticket_Order_pending') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Pending</a>
                                        <a href="{{ route('ticket_Order_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('ticket_Order_store'), 'method' => 'POST']) !!}
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
                                                    <option value=" {{ $value->id }} " > {{ $value->display_name }} </option>
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
                                                    <option value=" {{ $value->id }} " > {{ $value->display_name }} </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('contact_id'))
                                                <div class="uk-text-danger">{{ $errors->first('contact_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="pnr">PNR</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="pnr">PNR here</label>
                                            <textarea type="text" name="pnr" id="pnr" class="md-input" cols="4" rows="4"></textarea>
                                            @if($errors->has('pnr'))

                                                <span style="color:red; position: relative; right:-500px">{!!$errors->first('pnr')!!}</span>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="first_name">First Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="first_name">First Name</label>
                                            <input class="md-input" type="text" id="first_name"  name="first_name" value="{{ old('first_name')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="last_name">Last Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="last_name">LastName</label>
                                            <input class="md-input" type="text" id="last_name"  name="last_name" value="{{ old('last_name')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_number">Contact Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="contact_number">Contact Number</label>
                                            <input class="md-input" type="text" id="contact_number"  name="contact_number" value="{{ old('contact_number')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="ticket_number">Ticket Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="ticket_number">Ticket Number</label>
                                            <input class="md-input" type="text" id="ticket_number"  name="ticket_number" value="{{ old('ticket_number')}} " />

                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="pnrcreationDate">PNR Creation Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="pnrcreationDate">Select date</label>
                                            <input class="md-input" type="text" id="pnrcreationDate" name="pnrcreationDate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('issue_date')}}" />
                                        </div>
                                        @if($errors->has('pnrcreationDate'))
                                            <div class="uk-text-danger">{{ $errors->first('pnrcreationDate') }}</div>
                                        @endif
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="recordLocator">Record Locator</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="recordLocator">Record Locator</label>
                                            <input class="md-input" type="text" id="recordLocator"  name="recordLocator" value="{{ old('recordLocator')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="departureflightCode">Departure Flight Code</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="departureflightCode">Departure Flight Code</label>
                                            <input class="md-input" type="text" id="departureflightCode"  name="departureflightCode" value="{{ old('departureflightCode')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="departureflightClass">Departure Flight Class</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="departureflightClass">Departure Flight Class</label>
                                            <input class="md-input" type="text" id="departureflightClass"  name="departureflightClass" value="{{ old('departureflightClass')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="departureDate">Departure Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="departureDate">Departure Date</label>
                                            <input class="md-input" type="text" id="departureDate" name="departureDate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('departureDate')}}" />
                                        </div>
                                        @if($errors->has('departureDate'))
                                            <div class="uk-text-danger">{{ $errors->first('departureDate') }}</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="departureFrom">Departure From</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="departureFrom">Departure From</label>
                                            <input class="md-input" type="text" id="departureFrom"  name="departureFrom" value="{{ old('departureFrom')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="arriveTo">Arrive To</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="arriveTo">Arrive To</label>
                                            <input class="md-input" type="text" id="arriveTo"  name="arriveTo" value="{{ old('arriveTo')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="departureTime">Departure Time</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="departureTime">Departure Time</label>
                                            <input class="md-input" type="text" id="departureTime" id="uk_tp_1" data-uk-timepicker name="departureTime" />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="arrivalTime">Arrival Time</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="arrivalTime">Arrival Time</label>
                                            <input class="md-input" type="text" id="arrivalTime"  name="arrivalTime" value="{{ old('arrivalTime')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Destination">Return Flight Code</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="registerSerial">Return Flight Code</label>
                                            <input class="md-input" type="text" id="returnflightCode"  name="returnflightCode" value="{{ old('returnflightCode')}} " />
                                            @if($errors->has('returnflightCode'))
                                                <div class="uk-text-danger">{{ $errors->first('returnflightCode') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightbookingClass">Return Flight Booking Class</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightbookingClass">Return Flight Booking Class</label>
                                            <input class="md-input" type="text" id="returnflightbookingClass"  name="returnflightbookingClass" value="{{ old('returnflightbookingClass')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightDate">Return Flight Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightDate">Return Flight Date</label>
                                            <input class="md-input" type="text" id="returnflightDate" name="returnflightDate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('returnflightDate')}}" />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightFrom">Return Flight From</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightFrom">Return Flight From</label>
                                            <input class="md-input" type="text" id="returnflightFrom"   name="returnflightFrom" value="{{ old('returnflightFrom')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightTo">Return Flight To</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightTo">Return Flight To</label>
                                            <input class="md-input" type="text" id="returnflightTo"   name="returnflightTo" value="{{ old('returnflightTo')}} " />

                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightdepartureTime">Return Flight Departure Time</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label style="margin-top: -20px" for="returnflightdepartureTime">Return Flight Departure Time</label>
                                            <input class="md-input" type="text" id="returnflightdepartureTime" id="uk_tp_1" data-uk-timepicker   name="returnflightdepartureTime"  />

                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightarrivalDate">Return Flight Arrival Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightarrivalDate">Return Flight Arrival Date</label>
                                            <input class="md-input" type="text" id="returnflightarrivalDate" name="returnflightarrivalDate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('returnflightarrivalDate')}}" />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="issuetimeLimit">Issue Time Limit</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="issuetimeLimit">Issue Time Limit</label>
                                            <input class="md-input" type="text" id="issuetimeLimit"   name="issuetimeLimit" value="{{ old('issuetimeLimit')}} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Document Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Document Number</label>
                                            <input class="md-input" type="text" id="documentNumber"   name="documentNumber" value="{{ old('documentNumber')}} " />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="returnflightarrivalDate">Issue Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="returnflightarrivalDate">Issue Date</label>
                                            <input class="md-input" type="text" id="returnflightarrivalDate" name="issuDate" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('returnflightarrivalDate')}}" />
                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Departure Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Departure Sector</label>
                                            <input class="md-input" type="text" id="documentNumber"   name="departureSector" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Return Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Return Sector</label>
                                            <input class="md-input" type="text" id="documentNumber"   name="returnSector" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Adult Passenger </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Adult Pasenger</label>
                                            <input class="md-input" type="number" id="adultPassenger"   name="adultPassenger" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Child Pasenger </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Child Pasenger</label>
                                            <input class="md-input" type="number" id="adultPassenger"   name="childPassenger" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Infant Pasenger </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Infant Pasenger</label>
                                            <input class="md-input" type="number" id="adultPassenger"   name="infantPassenger" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Hotel Note</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Hotel Note</label>
                                            <input class="md-input" type="text" id="adultPassenger"   name="hotel_note" value="{{ old('documentNumber')}} " />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Fare Amount</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Fare Amount</label>
                                            <input class="md-input" type="number" id="adultPassenger" name="fareAmount" />
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Commission Rate</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Commission Rate</label>
                                            <input class="md-input" type="number" id="adultPassenger" required value="{!! isset($commition->commissionRate)?$commition->commissionRate:'' !!}" name="commissionRate"/>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="documentNumber">Tax On Commission</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="documentNumber">Tax On Commission</label>
                                            <input class="md-input" type="number" id="adultPassenger" name="taxOnCommission"/>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Hotel Title</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Order id" id="order_id" name="ticket_hotel_id">
                                                <option value="">Select Hotel Title</option>
                                                @foreach($ticket_hotel as $value)
                                                    <option value="{!! $value->id !!}">{!! $value->title !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-3-5">
                                            <h4>Ticket Tax:</h4>
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <form action="" data-parsley-validate>
                                                        <div class="uk-grid uk-grid-medium form_section form_section_separator" id="d_form_section" data-uk-grid-match>

                                                            <div class="uk-width-9-10">
                                                                <div class="uk-grid">
                                                                    <div class="uk-width-1-1">
                                                                        <div class="parsley-row">
                                                                            <label>Title</label>
                                                                            <input type="text" class="md-input" name="title[]" required>
                                                                            @if($errors->has('title'))
                                                                                <div class="uk-text-danger">{{ $errors->first('title') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="uk-grid">
                                                                    <div class="uk-width-1-1">
                                                                        <div class="parsley-row">
                                                                            <label>Amount</label>
                                                                            <input type="text" class="md-input" name="amount[]" required>
                                                                            @if($errors->has('amount'))
                                                                                <div class="uk-text-danger">{{ $errors->first('amount') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-width-1-10 uk-text-center">
                                                                <div class="uk-vertical-align uk-height-1-1">
                                                                    <div class="uk-vertical-align-middle">
                                                                        <a href="#" class="btnSectionClone" data-section-clone="#d_form_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            <input type="submit" class="md-btn md-btn-primary" value="confirm" name="confirm" />
                                            <input type="submit" class="md-btn md-btn-primary" value="Save" name="save" />

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