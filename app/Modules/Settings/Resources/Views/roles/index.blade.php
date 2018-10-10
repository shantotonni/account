@extends('layouts.main')

@section('title', 'Access Level')

@section('header')
@include('inc.header')
@endsection

@section('sidebar')
@include('inc.sidebar')
@endsection

@section('content')

<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-2-10">
                <div class="md-list-outside-wrapper">
                    @include('inc.settings_menu')
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        </div>
                        <div class="user_heading_content">
                            <h2 class="heading_b"><span class="uk-text-truncate">Role List</span></h2>
                        </div>
                    </div>
                    <div class="user_content">
                        <div class="uk-overflow-container uk-margin-bottom">
                            <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                            <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th class="uk-text-center">Action</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th class="uk-text-center">Action</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>ABC</td>
                                        <td>{{ $role->updated_at }}</td>
                                        <td class="uk-text-center">
                                            <a href="{{ route('role_edit',['id' => $role->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                            <a class="delete_btn" href="#"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                            <input type="" name="" id="role_id" value="{{$role->id}}" class="hidden">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Add branch plus sign -->

                        <div class="md-fab-wrapper branch-create">
                            <a id="add_branch_button" href="{{ route('role_create') }}" class="md-fab md-fab-accent branch-create">
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
    <script type="text/javascript">
        $('#settings_menu_roles').addClass('md-list-item-active');
    </script>
    <script>
        $('.delete_btn').click(function () {
            var id = $(this).next('#role_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this invoice all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/settings/roles/delete/"+id;
            })
        })
    </script>
@endsection