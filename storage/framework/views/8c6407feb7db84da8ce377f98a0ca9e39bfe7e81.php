

<?php $__env->startSection('title', 'Lock Transaction'); ?>

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
            <div class="uk-width-xLarge-2-10 uk-width-large-2-10">
                <div class="md-list-outside-wrapper">
                    <?php echo $__env->make('inc.settings_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="md-card">

                    <div class="user_heading">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        </div>
                        <div class="user_heading_content">

                            <h2 class="heading_b"><span class="uk-text-truncate">Update Lock Transaction</span></h2>
                        </div>
                    </div>
                    <div class="user_content">
                        <div class="uk-margin-top">

                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label for="display_name" class="uk-vertical-align-middle">Transaction Status</label>
                                </div>
                                <div class="uk-width-medium-2-5">


                                    <select onchange="lock(this)" name="status" id="select_demo_6" data-md-selectize >

                                        <option <?php echo e($op->status==0?"selected":''); ?> value="0">No Locked</option>
                                        <option <?php echo e($op->status==1?"selected":''); ?> value="1"> Locked</option>
                                    </select>


                                    <?php if($errors->first('status')): ?>
                                    <div class="uk-text-danger">Status is required.</div>
                                    <?php endif; ?>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('admin/assets/js/custom/dropify/dist/js/dropify.min.js')); ?> "></script>

<!--  form file input functions -->
<script src="<?php echo e(asset('admin/assets/js/pages/forms_file_input.min.js')); ?>"></script>
<script type="text/javascript">
    $('#settings_menu_locktransaction').addClass('md-list-item-active');

    function lock(status) {

        window.location.href = "<?php echo e(route('locktransaction_update')); ?>"+"?status="+status.value;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>