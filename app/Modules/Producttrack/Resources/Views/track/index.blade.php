@extends('layouts.main')

@section('title', 'Product Track')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <h3 class="heading_b uk-margin-bottom">Product Track</h3>

    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-overflow-container uk-margin-bottom">
                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Phase</th>
                        <th>Total</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Phase</th>
                        <th>Total</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        <?php $count = 1; ?>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                @foreach($product->productPhases as $phase) 
                                    @if($phase->status == 0)
                                    <a class="md-btn md-btn-flat md-btn-flat-danger md-btn-wave waves-effect waves-button" href="javascript:void(0)">{{ $phase->product_phase_name }}</a>
                                    @else
                                    <a class="md-btn md-btn-flat md-btn-flat-success md-btn-wave waves-effect waves-button" href="javascript:void(0)">{{ $phase->product_phase_name }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $product->total_product }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>{{ $product->updatedBy->name }}</td>
                            <td class="uk-text-center">
                                <a href="{{ route('product_item_list',['id' => $product->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">&#xE8F4;</i></a>
                                <a href="{{ route('track_edit',['id' => $product->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                <a href="{{ route('track_delete',['id' => $product->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                <a href="{{ route('product_item_add',['id' => $product->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Add Item" class="md-icon material-icons">&#xE147;</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('track_create') }}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#sidebar_inventory').addClass('current_section');
        $('#sidebar_inventory_product').addClass('act_item');
    </script>
@endsection