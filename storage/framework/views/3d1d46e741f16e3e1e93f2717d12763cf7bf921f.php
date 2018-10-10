<?php $__env->startSection('title', 'Conveyance Bill'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('top_bar'); ?>
<div id="top_bar">
    <div class="md-top-bar">
        <ul id="menu_top" class="uk-clearfix">
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Inventory</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('inventory_create')); ?>">Create Inventory</a></li>
                        <li><a href="<?php echo e(route('inventory')); ?>">All Inventory</a></li>
                    </ul>
                </div>
            </li>

            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Category</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        
                        <li><a href="<?php echo e(route('inventory_category')); ?>">All Category</a></li>
                    </ul>
                </div>
            </li>
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="<?php echo e(route('stock_create')); ?>"><i class="material-icons">&#xE02E;</i><span>Add Stock</span></a>
            </li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(Session::has('message')): ?>
    <div class="uk-alert uk-alert-success" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        <?php echo e(Session::get('message')); ?>

    </div>
<?php endif; ?>
    <div id="page_content">
        <div id="page_content_inner">

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-4-5">
                    <div class="md-card">
                        <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create New Item</span></h2>
                                </div>
                            </div>
                        <div class="md-card-content">
                            <?php echo Form::open(['url' => route('cnb_store'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']); ?>

                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="parsley-row">
                                            <label>Date</label>
                                            <input type="text" class="md-input" name="date" id="uk_dp_1" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid uk-grid-medium form_section form_section_separator" id="d_form_section" data-uk-grid-match>

                                    <div class="uk-width-9-10">
                                        
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <label>From</label>
                                                    <input type="text" class="md-input" name="from[]">
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <label>To</label>
                                                    <input type="text" class="md-input" name="to[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <div class="parsley-row">
                                                    <label>Transport</label>
                                                    <input type="text" class="md-input" name="transport[]">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <div class="parsley-row">
                                                    <label>Amount</label>
                                                    <input type="number" class="md-input" name="amount[]">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="uk-width-1-10 uk-text-center">
                                        <div class="uk-vertical-align uk-height-1-1">
                                            <div class="uk-vertical-align-middle">
                                                <a href="#" class="btnSectionClone" data-section-clone="#d_form_section"><i class="material-icons md-36">&#xE146;</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <button type="submit" href="#" class="md-btn md-btn-primary">Submit</button>
                                    </div>
                                </div>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- google web fonts -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_cnb_add').addClass('act_item');

        $(window).load(function(){
            $("#tiktok6").trigger('click');
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>