<?php $__env->startSection('title', 'Contact'); ?>

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
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Contact</span></a>
                <div class="uk-dropdown">
                    <ul class="uk-nav uk-nav-dropdown">
                        <li><a href="<?php echo e(route('contact_create')); ?>">Create Contact</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">All Contact </a></li>
                    </ul>
                </div>
            </li>

            <li data-uk-dropdown class="uk-hidden-small">
                <a href="#"><i class="material-icons">&#xE02E;</i><span>Category</span></a>
                <div class="uk-dropdown uk-dropdown-scrollable">
                    <ul class="uk-nav uk-nav-dropdown">
                        
                        <li><a href="<?php echo e(route('category')); ?>">All Category</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                 <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        
                                         <?php if($contact->profile_pic_url): ?>
                                            <img alt="user avatar" src="<?php echo e(url($contact->profile_pic_url)); ?>">
                                        <?php else: ?>
                                            <img alt="user avatar" src="<?php echo e(url('admin/assets/img/avatars/user.png')); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate"><?php echo e($contact->first_name); ?> <?php echo e($contact->last_name); ?></span></h2>
                                    <h2 class="heading_b"><span class="uk-text-truncate">Display Name : <span style="color: yellow"><?php echo e($contact->display_name); ?></span> </span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <h3 class="full_width_in_card heading_c">
                                        General info
                                    </h3>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label for="category_id" class="uk-vertical-align-middle">Category</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <?php echo e($contact_category); ?>

                                        </div>
                                    </div>
                                    <?php if($contact->agent_id): ?>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="agent_name">Agent Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="agent_name"><?php echo e($contact->agent->display_name); ?></label>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="company_name">Company Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="company_name"><?php echo e($contact->company_name); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="email_address">Email Address</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                           <label class="uk-vertical-align-middle" for="email_address"><?php echo e($contact->email_address); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="skype_name">Skype Name/Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="skype_name"><?php echo e($contact->skype_name); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="contact_number_1">Contact Number</label>
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <label for="phone_number_1"><?php echo e($contact->phone_number_1); ?></label>
                                           
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <label for="phone_number_2"><?php echo e($contact->phone_number_2); ?></label>
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <label for="phone_number_3"><?php echo e($contact->phone_number_3); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="skype_name">Created By</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="skype_name"><?php echo e($contact->createdBy->name); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="skype_name">Created At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="skype_name"><?php echo e($contact->created_at); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="skype_name">Updated By</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="skype_name"><?php echo e($contact->updatedBy->name); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="skype_name">Updated At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="skype_name"><?php echo e($contact->updated_at); ?></label>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <h3 class="full_width_in_card heading_c">
                                                BILLING ADDRESS
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="billing_street">Street</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="billing_street"><?php echo e($contact->billing_street); ?></label>
                                                   
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="billing_city">City</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="billing_city"><?php echo e($contact->billing_city); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="billing_state">State</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="billing_state"><?php echo e($contact->billing_state); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="billing_zip_code">Zip Code</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="billing_zip_code"><?php echo e($contact->billing_zip_code); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="billing_country">Country</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="billing_country"><?php echo e($contact->billing_country); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-1-2">
                                            <h3 class="full_width_in_card heading_c">
                                                SHIPPING ADDRESS
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="shipping_street">Street</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="shipping_street"><?php echo e($contact->shipping_street); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="shipping_city">City</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="shipping_city"><?php echo e($contact->shipping_city); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="shipping_state">State</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="shipping_state"><?php echo e($contact->shipping_state); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="shipping_zip_code">Zip Code</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="shipping_zip_code"><?php echo e($contact->shipping_zip_code); ?></label>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="shipping_country">Country</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="shipping_country"><?php echo e($contact->shipping_country); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="full_width_in_card heading_c">
                                        Other Details
                                    </h3>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
                                                <div>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                        </span>
                                                        <label for="shipping_country"><?php echo e($contact->fb_id); ?></label>
                                                        
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon">
                                                            <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                        </span>
                                                        <label for="shipping_country"><?php echo e($contact->tw_id); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="full_width_in_card heading_c">
                                        Remarks
                                    </h3>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-1-1">
                                            <label for="about">About</label>
                                            <p><?php echo e($contact->about); ?></p>
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
    <script type="text/javascript">
        $('#sidebar_contact').addClass('current_section');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>