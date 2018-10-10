

<?php $__env->startSection('title', 'Access Level'); ?>

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
                        <?php echo $__env->make('inc.my_profile_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Update Account Password</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('my_profile_password_update'), 'method' => 'POST', 'files' => true]); ?>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="old_password" class="uk-vertical-align-middle">Old Password</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="old_password">Old Password</label>
                                        <input class="md-input" type="password" id="old_password" name="old_password"/>
                                        <?php if($errors->first('old_password')): ?>
                                            <div class="uk-text-danger">Old password is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="password" class="uk-vertical-align-middle">Password</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="password">Password</label>
                                        <input class="md-input" type="password" id="password" name="password"/>
                                        <?php if($errors->first('password')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors -> first('password')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="confirm_password" class="uk-vertical-align-middle">Confirm Password</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input class="md-input" type="password" id="password_confirmation" name="password_confirmation"/>
                                        <?php if($errors->first('password_confirmation')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors -> first('password_confirmation')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1 uk-float-right">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
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
    <script type="text/javascript">
        $('#my_profile_account_pass').addClass('md-list-item-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>