<?php $__env->startSection('title', 'Update Ticket Tax'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>

                <div class="uk-width-xLarge-10-10  uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate"> Update Ticket Commission</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('ticket_commission_update',$commission->id), 'method' => 'POST', 'files' => true]); ?>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="name" class="uk-vertical-align-middle">Commission Rate (%)</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="commissionRate">Commission Rate</label>
                                        <input class="md-input" type="text" id="commissionRate" name="commissionRate" value="<?php echo e($commission->commissionRate); ?>"/>
                                        <?php if($errors->first('commissionRate')): ?>
                                            <div class="uk-text-danger">Commission Rate is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="contact" class="uk-vertical-align-middle">Commission Tax (%)</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="commissionTax">Amount</label>
                                        <input class="md-input" type="text" id="commissionTax" name="commissionTax" value="<?php echo e($commission->commissionTax); ?>"/>
                                        <?php if($errors->first('commissionTax')): ?>
                                            <div class="uk-text-danger">Commission Tax is required.</div>
                                        <?php endif; ?>
                                    </div>


                                </div>




                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">

                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <div class="uk-width-1-1 uk-float-right">
                                            <button type="submit" class="md-btn md-btn-primary">Update</button>
                                            <a href="<?php echo e(URL::previous()); ?>" >  <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button></a>

                                        </div>
                                    </div>

                                </div>
                                <?php echo Form::close(); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_ticketing').addClass('current_section');

       $('#sidebar_ticket_commission').addClass('act_item');

        $(window).load(function(){
            $("#tiktok").trigger('click');
        })




    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>