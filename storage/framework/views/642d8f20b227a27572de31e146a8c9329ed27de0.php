<?php $__env->startSection('title', 'Visa Process Edit'); ?>

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
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Medical</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('Umrah_Medicale_Certificate')); ?>">Medical Cerificate</a></li>

                    </ul>
                </div>
            </li>
            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Police</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('Umrah_Police_Clearence')); ?>">Police Clearence</a></li>

                    </ul>
                </div>
            </li>



        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10" ng-controller="ContactEditController">
            <?php echo Form::open(['url' => array('umrah/visa/processing/update', 1), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form', 'files' => 'true']); ?>

                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">



                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Edit Visa Processing</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3" >
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <h3 class="heading_a" style="background-color: orange; color:ghostwhite; padding: 8px;">Submission Date</h3>
                                                    <div class="uk-grid">
                                                        <div class="uk-width-large-1-1 uk-width-1-1">
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                                <label for="uk_dp_1">Select date</label>
                                                                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <h3 class="heading_a" style="background-color: orange; color:ghostwhite; padding: 8px;">Expected Return Date</h3>
                                                    <div class="uk-grid">
                                                        <div class="uk-width-large-1-1 uk-width-1-1">
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                                <label for="uk_tp_1">Select Date</label>
                                                                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <h3 class="heading_a" style="background-color: orange; color:ghostwhite; padding: 8px;"> Return Date</h3>
                                                    <div class="uk-grid">
                                                        <div class="uk-width-large-1-1 uk-width-1-1">
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                                <label for="uk_tp_1">Select Date</label>
                                                                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-right">
                                            <div class="uk-width-medium-1-2">
                                       <span class="icheck-inline">
                                       Type
                                    </span>
                                    <span class="icheck-inline">
                                        <input name="type" type="radio" name="radio_demo_inline" id="radio_demo_inline_1" data-md-icheck />
                                        <label for="radio_demo_inline_1" class="inline-label">Company</label>
                                    </span>
                                                <span class="icheck-inline">
                                        <input checked name="type" type="radio" name="radio_demo_inline" id="radio_demo_inline_2" data-md-icheck />
                                        <label for="radio_demo_inline_2" class="inline-label">Self</label>
                                    </span>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-right">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            <a href="<?php echo e(route('Umrah_Visa_Processing')); ?>" type="button" class="md-btn md-btn-flat uk-modal-close">Close</a>
                                        </div>

                                    </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#Umrah').addClass('current_section');
        $('#Umrah_Visa_Processing').addClass('act_item');
    </script>>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>