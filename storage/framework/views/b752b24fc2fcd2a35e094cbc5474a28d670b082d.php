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
                        <?php echo $__env->make('inc.settings_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Update Organization Profile</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('organization_profile_update'), 'method' => 'POST', 'files' => true]); ?>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="image" class="uk-vertical-align-middle">Logo</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <div class="uk-width-1-1 uk-margin-bottom">
                                            <div class="uk-thumbnail-mini">
                                                <img src="<?php echo e(url('uploads/op-logo/'.$op->logo)); ?>" alt="">
                                            </div>
                                        </div>
                                        <input type="file" id="logo" name="logo"/>
                                        <?php if($errors->first('logo')): ?>
                                            <div class="uk-text-danger">Logo is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="display_name" class="uk-vertical-align-middle">Display Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="display_name">Display Name</label>
                                        <input class="md-input" type="text" id="display_name" name="display_name" value="<?php echo e($op->display_name); ?>"/>
                                        <?php if($errors->first('display_name')): ?>
                                            <div class="uk-text-danger">Display name is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="company_name" class="uk-vertical-align-middle">Company Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="company_name">Company Name</label>
                                        <input class="md-input" type="text" id="company_name" name="company_name" value="<?php echo e($op->company_name); ?>"/>
                                        <?php if($errors->first('company_name')): ?>
                                            <div class="uk-text-danger">Company name is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="street" class="uk-vertical-align-middle">Street</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="street">Street</label>
                                        <input class="md-input" type="text" id="street" name="street" value="<?php echo e($op->street); ?>"/>
                                        <?php if($errors->first('street')): ?>
                                            <div class="uk-text-danger">Street is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="city" class="uk-vertical-align-middle">City</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="city">City</label>
                                        <input class="md-input" type="text" id="city" name="city" value="<?php echo e($op->city); ?>"/>
                                        <?php if($errors->first('city')): ?>
                                            <div class="uk-text-danger">City is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="state" class="uk-vertical-align-middle">State</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="state">State</label>
                                        <input class="md-input" type="text" id="state" name="state" value="<?php echo e($op->state); ?>"/>
                                        <?php if($errors->first('state')): ?>
                                            <div class="uk-text-danger">State is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="country" class="uk-vertical-align-middle">Country</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="country">Country</label>
                                        <input class="md-input" type="text" id="country" name="country" value="<?php echo e($op->country); ?>"/>
                                        <?php if($errors->first('country')): ?>
                                            <div class="uk-text-danger">Country is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="zip_code" class="uk-vertical-align-middle">Zip Code</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="zip_code">Zip Code</label>
                                        <input class="md-input" type="text" id="zip_code" name="zip_code" value="<?php echo e($op->zip_code); ?>"/>
                                        <?php if($errors->first('zip_code')): ?>
                                            <div class="uk-text-danger">Zip code is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="website" class="uk-vertical-align-middle">Website</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="website">Website</label>
                                        <input class="md-input" type="text" id="website" name="website" value="<?php echo e($op->website); ?>"/>
                                        <?php if($errors->first('website')): ?>
                                            <div class="uk-text-danger">Website is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="contact_number" class="uk-vertical-align-middle">Contact Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="contact_number">Contact Number</label>
                                        <input class="md-input" type="text" id="contact_number" name="contact_number" value="<?php echo e($op->contact_number); ?>"/>
                                        <?php if($errors->first('contact_number')): ?>
                                            <div class="uk-text-danger">Contact Number is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="email" class="uk-vertical-align-middle">Email</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="email">Email</label>
                                        <input class="md-input" type="text" id="email" name="email" value="<?php echo e($op->email); ?>"/>
                                        <?php if($errors->first('email')): ?>
                                            <div class="uk-text-danger">Email is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="etin" class="uk-vertical-align-middle">ETIN</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="etin">Etin</label>
                                        <input class="md-input" type="text" id="etin" name="etin" value="<?php echo e($op->etin); ?>"/>
                                        <?php if($errors->first('etin')): ?>
                                            <div class="uk-text-danger">Etin is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="email" class="uk-vertical-align-middle">Vat Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="vat_number">Vat Number</label>
                                        <input class="md-input" type="text" id="vat_number" name="vat_number" value="<?php echo e($op->vat_number); ?>"/>
                                        <?php if($errors->first('vat_number')): ?>
                                            <div class="uk-text-danger">Vat Number is required.</div>
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
        $('#settings_menu_profile').addClass('md-list-item-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>