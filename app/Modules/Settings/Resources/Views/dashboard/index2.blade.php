@extends('layouts.admin')

@section('title', 'Ticket Dashboard')

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
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="second_table" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Order Id</th>
                                        <th>Ticket Number</th>
                                        <th>Payable</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Order Id</th>
                                        <th>Ticket Number</th>
                                        <th>Payable</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($order as $value)
                                        <tr>
                                            <td>{!! $value->created_at !!}</td>
                                            <td>{!! $value->order_id !!}</td>
                                            <td>{!! $value->ticket_number !!}</td>
                                            <td>{!! $value->bill['amount'] !!}</td>
                                            <td>{!! ($value->bill['amount'])-($value->bill['due_amount']) !!}</td>
                                            <td>{!! $value->bill['due_amount'] !!}</td>
                                            <td class="uk-text-center">
                                                <a href="{!! route('ticket_Order_edit',$value->id) !!}" class="batch-edit"><i class="material-icons">&#xE417;</i></a>
                                            </td>
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
        $('#sidebar_ticketing').addClass('current_section');
        $('#sidebar_ticket_dashboard').addClass('act_item');
        $('#second_table').DataTable();
    </script>
@endsection

