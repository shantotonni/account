@extends('layouts.main')
@section('title')
    VisaStamp
@endsection

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection


@section('content')

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <form action="{{ route('visastamp_update',$recruit->visas['id']) }}" method="post" enctype="multipart/form-data" class="uk-form-stacked" id="user_edit_form">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                {{ csrf_field() }}
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Edit VisaStamp</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                                    </div>

                                    <div class="uk-width-medium-2-6">
                                        <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                            <option value="1">Outgoing</option>
                                            <option value="2">Incoming</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" id="sending_date">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Sending date</label>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <label for="start_date">Sending date </label>
                                        <input class="md-input" type="text" value="{!! $recruit->visas['send_date']  !!}" name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>

                                </div>

                                <div class="uk-grid" id="return_date">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Return date</label>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <label for="start_date">Return date </label>
                                        <input class="md-input" type="text" value="{!! $recruit->visas['return_date'] !!}"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>

                                <div class="uk-grid" id="return_date">
                                    <div class="uk-width-medium-1-5">
                                        <label class="uk-vertical-align-middle" for="start_date">Comments </label>
                                    </div>
                                    <div class="uk-width-2-6">
                                        <label for="start_date">Comments</label>
                                        <textarea name="comment" id="" cols="10" rows="5" class="md-input">{!! $recruit->visas['comment'] !!}</textarea>
                                        @if($errors->has('return_date'))
                                            <span style="color:red">{!!$errors->first('return_date')!!}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" id="return_date">
                                    <div class="uk-width-medium-1-5">
                                        <label class="uk-vertical-align-middle" for="start_date">Upload</label>
                                    </div>
                                    <div class="uk-width-2-6">
                                        <input class="md-input" type="file"  name="img_url">
                                    @if($errors->has('img_url'))
                                            <span style="color:red">{!!$errors->first('img_url')!!}</span>
                                        @endif
                                    </div>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <img src="{!! asset('all_image/') !!}/{!! $recruit->visas['img_url'] !!}" alt="...." height="60" width="150"/>
                                    </div>
                                </div>

                                <div class="uk-grid" id="return_date">
                                    <div class="uk-width-medium-1-5">
                                        <label class="uk-vertical-align-middle" for="start_date">Application No</label>
                                    </div>
                                    <div class="uk-width-2-6">
                                        <input class="md-input" type="text"  name="eapplication_no" value="{!! $recruit->visas['eapplication_no'] !!}">
                                        @if($errors->has('eapplication_no'))
                                            <span style="color:red">{!!$errors->first('eapplication_no')!!}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Pax Id</label>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <select id="select_demo_1" class="md-input" name="pax_id">
                                                    <option value="" disabled selected hidden>Select...</option>
                                                    @foreach($order as $value)
                                                        @if($value->id==$recruit->visas['pax_id'])
                                                            <option  selected value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                            @else
                                                            <option value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                        @endif
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
                                    <div class="uk-width-1-1 uk-float-right">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        window.onload=function () {
            $('#sending_date').show();
            $('#return_date').hide();
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

