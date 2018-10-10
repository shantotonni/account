@extends('layouts.main')

@section('title', 'Recruit Expense')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection
@section('top_bar')
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">


            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Sector</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="{{ route('order_expense_sector_create') }}">Create Sector</a></li>
                        <li><a href="{{ route('order_expense_sector') }}">All Sector </a></li>
                    </ul>
                </div>
            </li>
            @inject('Categories', 'App\Lib\Category')
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Search By Sector</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="{{ route('order_expense_sector') }}">All Sector</a></li>
                        @foreach($Categories->ExpenseSector() as $documentCategory)
                            <li><a href="{{ route('document_category_search', ['id' => $documentCategory->id]) }}">{{ $documentCategory->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile"
         xmlns:color="http://www.w3.org/1999/xhtml">
        <div class="uk-width-large-10-10">
                {!! Form::open(['url' => 'order/recruit/expense/store', 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form', 'files' => 'true']) !!}
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create Recruit Expense</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="contact_category_id" class="uk-vertical-align-middle">Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select name="sector_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                                <option value="">Select Sector</option>
                                                @foreach($sector as $sectors)
                                                <option value="{{ $sectors->id }}">{{ $sectors->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="uk-width-medium-3-5">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <h3 class="heading_a">Select Pax ID <span style="color: red">*</span></h3>
                                                <div class="uk-grid">
                                                    <div class="uk-width-medium-2-2">
                                                        <select id="selec_adv_1" name="recruit_id[]" multiple>
                                                            @foreach($pax as $value)
                                                                <option value="{{ $value->id }}">{{ $value->paxid }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="contact_category_id" class="uk-vertical-align-middle">File</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <input type="file" name="img_url" class="btn btn-success">
                                        </div>
                                    </div>


                                    <br>
                                    <br>

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


    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2();

        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_order_expense_accounts').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>
@endsection