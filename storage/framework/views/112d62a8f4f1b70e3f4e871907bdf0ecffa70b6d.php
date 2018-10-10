

<?php $__env->startSection('title', 'Chart Of Accounts'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Account</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('account_chart_store'), 'method' => 'POST']); ?>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="account_type_id" class="uk-vertical-align-middle">Account Type <span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="account_type_id" name="account_type_id" data-md-selectize>
                                                <option value="">Select type</option>
                                                <?php $__currentLoopData = $parent_account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_account_type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <optgroup label="<?php echo e($parent_account_type->account_name); ?>">
                                                    <?php $__currentLoopData = $account_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account_type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($account_type->parent_account_type_id == $parent_account_type->id): ?>
                                                    <option value="<?php echo e($account_type->id); ?>"><?php echo e($account_type->account_name); ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </optgroup>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->first('account_type_id')): ?>
                                                <div class="uk-text-danger uk-margin-top">Account type is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="account_name">Account Name <span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="account_name">Account Name</label>
                                            <input class="md-input" type="text" id="account_name" value="<?php echo e(old('account_name')); ?>" name="account_name" />
                                            <?php if($errors->first('account_name')): ?>
                                                <div class="uk-text-danger">Account name is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="account_code">Account Code</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="account_code">Account Code</label>
                                            <input class="md-input" value="<?php echo e(old('account_code')); ?>" type="text" id="account_code" name="account_code" />
                                            <?php if($errors->first('account_code')): ?>
                                                <div class="uk-text-danger">Account code is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="description">Description</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <textarea class="md-input" value="<?php echo e(old('description')); ?>" name="description" id="description" cols="30" rows="4" placeholder="Write description here..."></textarea>
                                            <?php if($errors->first('description')): ?>
                                                <div class="uk-text-danger">Description is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
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
        $('#sidebar_account').addClass('current_section');
        $('#sidebar_account_chart_of_accounts').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>