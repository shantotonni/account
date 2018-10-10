@extends('layouts.main')

@section('title', 'Edit Track')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('angular')
    <script src="{{url('app/inventory/product/product.module.js')}}"></script>
    <script src="{{url('app/inventory/product/productEdit.controller.js')}}"></script>
@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile" ng-controller="ProductEditController">
        <div class="uk-width-large-10-10">
            {!! Form::open(['url' => route('track_update', ['id' => $product->id]), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']) !!}                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Edit Track</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <input type="hidden" ng-init="product_id='asdfg'" value="{{$product->id}}" name="product_id">

                                    <div class="uk-grid uk-margin-top" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_name">Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="product_name">Product Name</label>
                                            <input class="md-input" type="text" id="product_name" name="product_name" value="{{$product->product_name}}" required />
                                        </div>
                                        @if($errors->first('product_name'))
                                            <div class="uk-text-danger uk-margin-top">Product Name is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="total_product">Total Product</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="total_product">Total Product</label>
                                            <input class="md-input" type="text" id="total_product" name="total_product" value="{{$product->total_product}}" required />
                                        </div>
                                        @if($errors->first('total_product'))
                                            <div class="uk-text-danger uk-margin-top">Total Product is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_phase">Phase</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="uk-input-group">
                                                <label>Product Phase</label>
                                                <input type="text" class="md-input" value="@{{ phase.product_phase_name }}" name="product_phase[0]" required/>
                                                <span class="uk-input-group-addon">
                                                    <a ng-click="Append()"><i class="material-icons">&#xE147;</i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin ng-repeat="phase in phases track by $index">
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="product_phase">Phase</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="uk-input-group">
                                                <label>Product Phase</label>
                                                <input type="text" class="md-input" value="@{{ phase.product_phase_name }}" name="product_phase[@{{ $index + 1 }}]" required/>
                                                <span class="uk-input-group-addon">
                                                    <a ng-click="Remove($index)"><i class="material-icons">&#xE15C;</i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-right">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#sidebar_inventory').addClass('current_section');
        $('#sidebar_inventory_product').addClass('act_item');
    </script>
@endsection