
@extends('layouts.admin')

@section('title', 'Add VisaStamping')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection
@section('content')
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            @if(Session::has('msg'))
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {!! Session::get('msg') !!}
                </div>
            @endif
            {!! Form::open(['url' => route('visastamp_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">New VisaStamp </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                            </div>

                            <div class="uk-width-medium-2-6">
                                <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                    <option @if(old('type')==1) selected @endif value="1">Outgoing </option>
                                    <option @if(old('type')==2) selected @endif value="2">Incoming </option>
                                </select>
                                @if($errors->has('send_date'))
                                    <span style="color:red">{!!$errors->first('send_date')!!}</span>
                                @endif
                            </div>
                        </div>
                        <div class="uk-grid" id="sending_date">
                            <div class="uk-width-medium-1-5">
                                <label class="uk-vertical-align-middle"  for="start_date">Sending date </label>
                            </div>
                            <div class="uk-width-2-6">
                                <label for="start_date">Sending date </label>
                                <input class="md-input" type="text"  name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">

                            </div>

                        </div>
                        <div class="uk-grid" id="return_date">
                            <div class="uk-width-medium-1-5">
                                <label class="uk-vertical-align-middle" for="start_date">Return date </label>
                            </div>
                            <div class="uk-width-2-6">
                                <label for="start_date">Return date </label>
                                <input class="md-input" type="text"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                @if($errors->has('return_date'))
                                    <span style="color:red">{!!$errors->first('return_date')!!}</span>
                                @endif
                            </div>
                        </div>

                            <div class="uk-grid" id="return_date">
                                <div class="uk-width-medium-1-5">
                                    <label class="uk-vertical-align-middle" for="start_date">Comments </label>
                                </div>
                                <div class="uk-width-2-6">
                                    <label for="start_date">Comments</label>
                                    <textarea name="comment" id="" cols="10" rows="5" class="md-input"></textarea>
                                    @if($errors->has('return_date'))
                                        <span style="color:red">{!!$errors->first('return_date')!!}</span>
                                    @endif
                                </div>
                            </div>
                      </div>



                        {{--<div class="uk-grid" data-uk-grid-margin>--}}

                            {{--<div class="uk-width-medium-1-5 uk-vertical-align">--}}
                                {{--<label class="uk-vertical-align-middle" for="Local">Register Serial<span style="color: red">*</span></label>--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-medium-2-5">--}}
                                {{--<label for="Local">RegisterSerial </label>--}}
                                {{--<select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Serail" id="local_ref" name="registerSerial_id">--}}
                                    {{--<option>Select RegisterSerial</option>--}}
                                    {{--@foreach($registerserial as $value)--}}
                                        {{--<option value=" {{ $value->id }} " > {{ $value->registerSerial }} </option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        <div class="uk-grid" data-uk-grid-margin style="padding-left: 100px">
                            <div class="uk-width-medium-3-5">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <form action="" data-parsley-validate>
                                            <div class="uk-grid uk-grid-medium form_section form_section_separator" id="d_form_section" data-uk-grid-match>

                                                <div class="uk-width-9-10">
                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="parsley-row">
                                                                <label>Eapplication No</label>
                                                                <input type="text" class="md-input" name="eapplication_no[]"  required>
                                                                @if($errors->has('eapplication_no'))
                                                                    <div class="uk-text-danger">{{ $errors->first('eapplication_no') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="uk-grid" data-uk-grid-margin>
                                                                <div class="uk-width-medium-1-1">
                                                                    <select required id="select_demo_1" class="md-input" name="pax_id[]">
                                                                        <option value="" disabled selected hidden>Select Pax ...</option>
                                                                            @foreach($recruit as $value)
                                                                                <option value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    @if($errors->has('pax_id'))
                                                                        <div class="uk-text-danger">{{ $errors->first('pax_id') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="uk-grid" data-uk-grid-margin>
                                                                <div class="uk-width-medium-1-1">
                                                                    <select required id="select_demo_1" class="md-input data" onchange="myFunction()" name="registerSerial_id[]">
                                                                        <option value="" disabled selected hidden>Select Register Serial...</option>
                                                                        @foreach($arr as $value)
                                                                            @if($value[0]['totalserial']>0)
                                                                            <option value="{!! $value[0]['id'] !!}/{!! $value[0]['totalserial'] !!}">{!! $value[0]['registerSerial'] !!}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    @if($errors->has('registerSerial_id'))
                                                                        <div class="uk-text-danger">{{ $errors->first('registerSerial_id') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-1">
                                                            <div class="parsley-row">
                                                                <input type="file" class="md-input" name="img_url[]" required>
                                                                @if($errors->has('img_url'))
                                                                    <div class="uk-text-danger">{{ $errors->first('img_url') }}</div>
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
                                <div class="uk-grid" data-uk-grid-margin-bottom>
                                    <div class="uk-width-medium-1-5">

                                    </div>
                                    <div class="uk-width-1-5">
                                        <button type="submit" id="ttttt" class="md-btn md-btn-primary" >Submit</button>
                                        <a href="{{ url()->previous() }}" type="button" class="md-btn md-btn-flat uk-modal-close">Close</a>
                                    </div>
                                </div>
                       <br/>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>


    {{--<script>--}}

        {{--function myFunction() {--}}

           {{--var totalserial=$('.totalserial').val();--}}
           {{--var data=$('.data').val();--}}

            {{--$.ajax({--}}
                {{--type: "post",--}}
                {{--url: "{!! route('visastamp_test') !!}",--}}
                {{--data: {id: data},--}}
                {{--success: function (data) {--}}

                    {{--console.log(data);--}}
                {{--}--}}
            {{--});--}}

        {{--}--}}

    {{--</script>--}}



    <script>
        $( "#customer_id" ).clone().prependTo( "#customer_id" );
    </script>

    <script>
        var main_node=document.getElementById('repeat0');
        var i=0;
        function addrow() {
            console.log(i);
            var clo=main_node.cloneNode(true);
            clo.id="repeat" + (++i);
            main_node.parentNode.appendChild(clo);
        }

        window.onload=function () {
            $('#sending_date').show();
            $('#return_date').hide();
            // document.getElementById("sending_date").style.display = 'none';
            // document.getElementById("return_date").style.display = 'block';
        }
        function onTypeSelected(){
            var type=document.getElementById("type").value;
            if(type==2){

                document.getElementById("sending_date").style.display='none';
                document.getElementById("return_date").style.display='block';
            }
            else{
                document.getElementById("sending_date").style.display='block';
                document.getElementById("return_date").style.display='none';
            }

        }
    </script>


@endsection


