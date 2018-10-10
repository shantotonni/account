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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New User</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <?php echo Form::open(['url' => route('user_store'), 'method' => 'POST', 'files' => true]); ?>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="name" class="uk-vertical-align-middle">Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="name">Name</label>
                                        <input class="md-input" type="text" id="name" name="name"/>
                                        <?php if($errors->first('name')): ?>
                                            <div class="uk-text-danger">Name is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="image" class="uk-vertical-align-middle">Profile Picture</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <input type="file" id="image" name="image"/>
                                        <?php if($errors->first('file')): ?>
                                            <div class="uk-text-danger">Image is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="contact" class="uk-vertical-align-middle">Contact</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="contact">Contact</label>
                                        <input class="md-input" type="text" id="contact" name="contact"/>
                                        <?php if($errors->first('contact')): ?>
                                            <div class="uk-text-danger">Contact is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="note" class="uk-vertical-align-middle">Note</label>
                                    </div>
                                    <div class="uk-width-medium-4-5">
                                        <label for="note">Note</label>
                                        <textarea class="md-input" name="note" id="note" cols="30" rows="4"></textarea>
                                        <?php if($errors->first('note')): ?>
                                            <div class="uk-text-danger">Note is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="email" class="uk-vertical-align-middle">Email</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="email">Email</label>
                                        <input class="md-input" type="text" id="email" name="email"/>
                                        <?php if($errors->first('email')): ?>
                                            <div class="uk-text-danger">Email is required.</div>
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
                                            <div class="uk-text-danger"><?php echo e($errors->first('password')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="confirm_password" class="uk-vertical-align-middle">Re-Type Password</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="confirm_password">Re-Type Password</label>
                                        <input class="md-input" type="password" id="confirm_password" name="confirm_password"/>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="branch_id" class="uk-vertical-align-middle">Role</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="role_id" name="role_id" data-md-selectize>
                                            <option value="">Select Role</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <?php if($errors->first('role_id')): ?>
                                            <div class="uk-text-danger uk-margin-top">Role is required.</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label for="branch_id" class="uk-vertical-align-middle">Associated Contact</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select id="contact_id" name="contact_id" data-md-selectize>
                                            <option value="">Select Contact</option>
                                            <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->display_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        
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
        $('#settings_menu_users').addClass('md-list-item-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>