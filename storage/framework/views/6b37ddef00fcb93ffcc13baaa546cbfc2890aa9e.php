<?php $__env->startSection('title', 'Header Template'); ?>

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

                                <h2 class="heading_b"><span class="uk-text-truncate">Update HeaderType</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('organization_invoice_header_update'), 'method' => 'POST', 'files' => true]); ?>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="display_name" class="uk-vertical-align-middle">Header Type</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">


                                        <select name="active" id="select_demo_6" data-md-selectize >

                                            <option <?php echo e($op->headerType===0?"selected":''); ?> value="0">Inctive</option>
                                            <option <?php echo e($op->headerType===1?"selected":''); ?> value="1">active</option>
                                        </select>


                                        <?php if($errors->first('headerType')): ?>
                                            <div class="uk-text-danger">Type is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                   <div class="uk-width-medium-1-1">

                                        <div class="md-card">

                                                <h3 style="padding: 5px;" class="heading_a uk-margin-small-bottom">
                                                  Choose Image
                                                </h3>
                                            <input type="file" id="input-file-b" name="logo" class="dropify" data-default-file="<?php echo e(asset($op->file_url)); ?>"/>

                                        </div>

                                    </div>
                                </div>


                                <div class="uk-grid">
                                    <div class="uk-width-1-1 uk-float-right">
                                        <input type="hidden" name="id" value="<?php echo e($op->id); ?>">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <a type="button" href="<?php echo e(redirect()->back()->getTargetUrl()); ?>" class="md-btn md-btn-flat uk-modal-close">Close</a>
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
    <script src="<?php echo e(asset('admin/assets/js/custom/dropify/dist/js/dropify.min.js')); ?> "></script>

    <!--  form file input functions -->
    <script src="<?php echo e(asset('admin/assets/js/pages/forms_file_input.min.js')); ?>"></script>
    <script type="text/javascript">
        $('#settings_menu_header_type').addClass('md-list-item-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>