@extends('layouts.main')

@section('title', 'Submission')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Submission List</span></h2>
                                @if(session('branch_id')==1)
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>
                                                    @foreach($branch as $value)
                                                        @if($value->id==$id)
                                                            <option value="{{ route('submission',$value->id) }}" selected>{!! $value->branch_name !!}</option>
                                                        @else
                                                            <option value="{{ route('submission',$value->id) }}">{!! $value->branch_name !!}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select id="d_form_select_country" data-md-selectize required>
                                                    @foreach($branch as $value)
                                                        <option value="{{ route('submission',$value->id) }}" selected disabled>{!! $value->branch_name !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>

                        @php
                            $i=1;
                        @endphp

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pax Id</th>
                                        <th>Submission Date</th>
                                        <th>Flight Date</th>
                                        <th>Due-Amount</th>
                                        <th class="uk-text-center">Action</th>
                                        <th class="uk-text-center">Owner Approval</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Pax Id</th>
                                        <th>Submission Date</th>
                                        <th>Flight Date</th>
                                        <th>Due-Amount</th>
                                        <th class="uk-text-center">Action</th>
                                        <th class="uk-text-center">Owner Approval</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($recruit as $value)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->paxid }}</td>
                                            <td>{{ $value->submission['submission_date'] }}</td>
                                            <td>{{ $value->submission['expected_flight_date'] }}</td>
                                            <td>{{ $value->invoice['due_amount'] }}</td>

                                            @if($value->id==$value->submission['pax_id'])
                                                <td class="uk-text-center">
                                                    @if($value->newflight)
                                                    <a title="flight pdf" href="{!! route('flight_card_pdf',$value->id) !!}" class="batch-edit"><i class="material-icons">&#xE415;</i></a>
                                                    @endif
                                                    <a href="{!! route('submission_edit',$value->submission['id']) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                </td>
                                            @else
                                                <td class="uk-text-center">

                                                    @if($value->newflight)
                                                    <a title="flight pdf" href="{!! route('flight_card_pdf',$value->id) !!}" class="batch-edit"><i class="material-icons">&#xE415;</i></a>
                                                    @endif
                                                    <a href="{!! route('submission_create',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">+</i></a>
                                                </td>
                                            @endif

                                            @if($value->submission['owner_approval']==1)
                                                <td class="uk-text-center">
                                                    <a href="{!! route('owner_approval',$value->id) !!}" class="batch-edit"><i class="material-icons" style="color: green">&#xE913;</i></a>
                                                </td>
                                                @elseif($value->submission['owner_approval']===0)
                                                <td class="uk-text-center">
                                                    <a href="{!! route('owner_approval',$value->id) !!}" class="batch-edit"><i class="material-icons" style="color: red">&#xE913;</i></a>
                                                </td>
                                               @elseif($value->submission['owner_approval']==null)
                                                <td class="uk-text-center">
                                                    <a href="{!! route('owner_approval',$value->id) !!}" class="batch-edit"><i class="material-icons" style="color: darkgray">&#xE913;</i></a>
                                                </td>
                                            @endif

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
@endsection

@section('scripts')
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_submission').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })

        $('.delete_btn').click(function () {
            var id = $(this).next('.mofa_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this Mofa all record will be deleted related to this MOFA",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "{{ route('fit_card_delete') }}"+"/"+id;
            })
        })
    </script>
@endsection
