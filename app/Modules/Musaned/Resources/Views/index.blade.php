@extends('layouts.main')

@section('title', 'Musaned ')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    @if(Session::has('msg'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('msg') !!}
        </div>
    @endif
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
                                <h2 class="heading_b"><span class="uk-text-truncate">Musaned List</span></h2>
                                @if(session('branch_id')==1)
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>

                                                    @foreach($branch as $value)
                                                        @if($value->id==$id)
                                                            <option value="{{ route('musaned',$value->id) }}" selected>{!! $value->branch_name !!}</option>
                                                        @else
                                                            <option value="{{ route('musaned',$value->id) }}">{!! $value->branch_name !!}</option>
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
                                                        <option value="{{ route('musaned',$value->id) }}" selected disabled>{!! $value->branch_name !!}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>


                                        <th>Serial</th>
                                        <th>Pax ID</th>
                                        <th>Issue Date </th>
                                        {{--<th>Company Name</th>--}}
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Pax ID</th>
                                        <th>Issue Date </th>
                                        {{--<th>Company Name</th>--}}
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <?php
                                    $i=1;
                                    ?>
                                    <tbody>
                                    @foreach($recruit as $value)
                                        <tr>

                                            <td>{!! $i++ !!}</td>
                                            <td>{!! $value->paxid !!}</td>
                                            <td>{!! $value->musanand['issue_date'] !!}</td>

                                            @if($value->id==$value->musanand['pax_id'])
                                                <td class="uk-text-center">
                                                    <a href="{!! route('musaned_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                </td>
                                            @else
                                                <td class="uk-text-center">
                                                    <a href="{!! route('musaned_create',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">+</i></a>
                                                </td>
                                            @endif

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

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
        $('#sidebar_musaned').addClass('act_item');
        function deleterow(link) {
            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>
@endsection

