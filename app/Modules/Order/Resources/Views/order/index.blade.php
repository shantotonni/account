@extends('layouts.main')

@section('title', 'All Customer')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            @if(Session::has('msg'))
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {!! Session::get('msg') !!}
                </div>
            @endif
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">All Customer</span></h2>
                              @if(session('branch_id')==1)
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="parsley-row">
                                            <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                <option value="">Select Branch...</option>

                                                @foreach($branch as $value)
                                                    @if($value->id==$id)
                                                <option value="{{ route('order',$value->id) }}" selected>{!! $value->branch_name !!}</option>
                                                    @else
                                                        <option value="{{ route('order',$value->id) }}">{!! $value->branch_name !!}</option>
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
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>

                                                    @foreach($branch as $value)
                                                        @if($value->id==$id)
                                                            <option value="{{ route('order',$value->id) }}" selected>{!! $value->branch_name !!}</option>
                                                        @else
                                                            <option value="{{ route('order',$value->id) }}">{!! $value->branch_name !!}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                  @endif

                                <a href="{!! route('order_archive_index') !!}" style="margin-top: -40px" class="heading_b pull-right btn btn-success">All Archived</a>
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
                                        <th>Serial</th>
                                        <th>Pax Id</th>
                                        <th>Passenger Name</th>
                                        <th>passport Number</th>
                                        <th>Register Serial</th>
                                        <th>Contact Number</th>
                                        <th>Referance Name</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Pax Id</th>
                                        <th>Passenger Name</th>
                                        <th>passport Number</th>
                                        <th>Register Serial</th>
                                        <th>Contact Number</th>
                                        <th>Referance Name</th>
                                        <th width="15%" class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($order as $value)

                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->paxid }}</td>
                                            <td>{{ $value->passenger_name }}</td>
                                            <td>{{ $value->passportNumber }}</td>
                                            <td>{{ $value->registerserial['registerSerial'] }}</td>
                                            <td>{{ $value->recruit_customer['contact_number'] }}</td>
                                            <td>{{ $value->customer['display_name'] }}</td>

                                            <td style="width: 15%" class="uk-text-center">


                                                @if($value->order_file->count())
                                                <select class="md-input" onchange="window.open(this.value,'_blank');"  data-uk-tooltip="{pos:'top'}" title="Select Order File">
                                                    <option value=""></option>
                                                  @foreach($value->order_file as $file)
                                                      <option value="{{ route('order_download',$file->id?$file->id:0) }}">{{ $file->title }}</option>
                                                  @endforeach

                                                </select>
                                                @endif
                                                <a href="{{route('customer_dashboard',$value->paxid)}}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                                <a href="{{ route('order_edit', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn hidden"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="order_id" value="{{ $value->id }}">
                                                <a href="{!! route('order_archive',$value->id) !!}"><i  title="Archive" class="material-icons">&#xE149;</i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->
                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('order_create') }}" class="md-fab md-fab-accent branch-create">
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
        $('#sidebar_recruit_order').addClass('act_item');

        $('.delete_btn').click(function () {
            var id = $(this).next('.order_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this order all record will be deleted related to this Order",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "{{ route('order_delete') }}"+"/"+id;
            })
        })
    </script>
@endsection
