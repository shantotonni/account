<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>

                <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Create a new account</h2>

                <?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Form::open(['url' => 'register', 'method' => 'post']); ?>

                    <div class="uk-form-row">
                        <label for="name">Name</label>
                        <input class="md-input" id="name" name="name" value="<?php echo e(old('name')); ?>" type="text">
                        <?php if($errors->has('name')): ?>
                            <span class="uk-text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-form-row">
                        <label for="email">Email</label>
                        <input class="md-input" id="email" name="email" value="<?php echo e(old('email')); ?>" type="text">
                        <?php if($errors->has('email')): ?>
                            <span class="uk-text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-form-row">
                        <label for="password">Password</label>
                        <input class="md-input" id="password" name="password" type="password">
                        <?php if($errors->has('password')): ?>
                            <span class="uk-text-danger"><?php echo e($errors->first('password')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-form-row">
                        <label for="password_confirmation">Confirm Password</label>
                        <input class="md-input" id="password_confirmation" name="password_confirmation" type="password">
                        <?php if($errors->has('password_confirmation')): ?>
                            <span class="uk-text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-form-row">
                        <h5 class="uk-text-center">By registering, you agree to the privacy policy and terms of service.</h5>
                    </div>

                    <div class="uk-form-row">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Accept & Continue</button>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="<?php echo e(url('/login')); ?>">Login here</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>