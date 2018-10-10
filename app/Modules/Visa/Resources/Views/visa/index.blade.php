@extends('layouts.main')

@section('title', 'All Visa ')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Visa List</span></h2>
                                @if(session('branch_id')==1)
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>

                                                    @foreach($branch as $value)
                                                        @if($value->id==$id)
                                                            <option value="{{ route('visa',$value->id) }}" selected>{!! $value->branch_name !!}</option>
                                                        @else
                                                            <option value="{{ route('visa',$value->id) }}">{!! $value->branch_name !!}</option>
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
                                                        <option value="{{ route('visa',$value->id) }}" selected disabled>{!! $value->branch_name !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                                <a href="{!! route('company_index') !!}" style="margin-top: -40px" class="heading_b pull-right btn btn-success">All Companies</a>

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
                                        <th>Date</th>
                                        <th>local_Reference#</th>
                                        <th>visaNumber</th>
                                        <th>company_id</th>
                                        <th>numberofVisa</th>
                                        <th>leftVisa</th>
                                        <th>registerSerial</th>
                                        <th>idNumber</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>local Reference#</th>
                                        <th>visaNumber</th>
                                        <th>company</th>
                                        <th>numberofVisa</th>
                                        <th>leftVisa</th>
                                        <th>registerSerial</th>
                                        <th>idNumber</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($visa as $value)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->date }}</td>
                                            <td>{{ $value->Contact['display_name'] }}</td>
                                            <td>{{ $value->visaNumber }}</td>
                                            <td>{{ $value->Company['name'] }}</td>
                                            <td>{{ $value->numberofVisa }}</td>
                                            <td>{{ $value->left_visa }}</td>
                                            <td>{{ $value->registerSerial }}</td>
                                            <td>{{ $value->idNum }}</td>
                                            <td class="uk-text-center">

                                                @if($value->bill_id==null)
                                                <a href="{{ route('visa_bill_show', ['id' => $value->bill_id? $value->bill_id:0,'visa'=>$value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="bill" class="material-icons" style="font-size: 30px;color: darkgray">B</i>
                                                </a>
                                                @else
                                                    <a href="{{ route('visa_bill_show', ['id' => $value->bill_id? $value->bill_id:0,'visa'=>$value->id]) }}">
                                                        <i data-uk-tooltip="{pos:'top'}" title="bill" class="material-icons" style="font-size: 30px;color: green">B</i>
                                                    </a>
                                                    @endif

                                                <a href="{{ route('visa_edit', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="visa_id" value="{{ $value->id }}">

                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('visa_create') }}" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
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
        $('#sidebar_recrut_visa').addClass('act_item');
        $('.delete_btn').click(function () {
            var id = $(this).next('.visa_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this Visa all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "{{ route('visa_delete') }}"+"/"+id;
            })
        })
    </script>
@endsection
