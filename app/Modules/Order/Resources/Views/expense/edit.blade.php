@extends('layouts.main')

@section('title', 'Recruit Expense ')

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
                        @foreach($Categories->ExpenseSector() as $recruitCategory)
                            <li><a href="{{ route('document_category_search', ['id' => $recruitCategory->id]) }}">{{ $recruitCategory->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            {!! Form::open(['url' => array('order/recruit/expense/update', $recruit->id), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form', 'files' => 'true']) !!}
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                                
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Edit Recruit Expense</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                   
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="category_id" class="uk-vertical-align-middle">Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="contact_category_id" name="sector_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" required>
                                                <option value="">Select Sector</option>
                                                @foreach($sector as $contact_category)

                                                    <option value="{{ $contact_category->id }}" {{ $recruit->expenseSectorid == $contact_category->id ? 'selected="selected"' : '' }}>{{ $contact_category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="contact_category_id" class="uk-vertical-align-middle">Pax Id</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            @php
                                            $k=1;
                                           @endphp
                                            @foreach ($recruit->paxId as $v)

                                                <div class="uk-grid form_section" id="form_row">
                                                    <div class="uk-width-1-1">

                                                        <div class="uk-input-group">

                                                            <select id="pax_id"  name="pax_id[]" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                                                <option value="">Select Pax</option>
                                                                @foreach($pax as $value)
                                                                    @if($v->id==$value->id)
                                                                    <option selected value="{{ $value->id }}">{{ $value->paxid }}</option>
                                                                    @else
                                                                        <option value="{{ $value->id }}">{{ $value->paxid }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>


                                                            <span class="uk-input-group-addon">
                                                          <a href="#" class="btnSectionRemove"><i class="material-icons md-24"></i></a>
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            <div class="uk-grid form_section" id="form_row">
                                                <div class="uk-width-1-1">

                                                    <div class="uk-input-group">

                                                        <select id="pax_id"  name="pax_id[]" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                                            <option value="">Select Pax</option>
                                                            @foreach($pax as $value)
                                                                <option value="{{ $value->id }}">{{ $value->paxid }}</option>
                                                            @endforeach
                                                        </select>


                                                        <span class="uk-input-group-addon">
                                                          <a href="#" class="btnSectionClone" data-section-clone="#form_row"><i class="material-icons md-24"></i></a>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="uk-width-medium-1-2 uk-vertical-align" style="text-align: center;">
                                        <img src="{!! asset('all_image/') !!}/{!! $recruit->img_url !!}" alt="...." height="60" width="150"/>
                                    </div>
                                    <br>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="contact_category_id" class="uk-vertical-align-middle">File</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <input type="file" name="img_url" class="btn btn-success">
                                        </div>
                                    </div>
                                    

                                    <br><br>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="display_name">Created At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            {{ $recruit->created_at }}
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="display_name">Updated At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            {{ $recruit->updated_at }}
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
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_order_expense_accounts').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>
@endsection