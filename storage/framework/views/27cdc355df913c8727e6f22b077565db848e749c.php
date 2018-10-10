<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>

                <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Login to your account</h2>

                <?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Form::open(['url' => 'login', 'method' => 'post']); ?>

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

                    <div class="uk-margin-top">
                        <a class="uk-float-right" href="<?php echo e(url('/password/reset')); ?>">Forgot password?</a>
                        <span class="icheck-inline">
                            <input data-md-icheck id="remember" name="remember" type="checkbox" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="inline-label" for="remember">Stay signed in</label>
                        </span>
                    </div>

                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="<?php echo e(url('/register')); ?>">Create an account</a>
        </div>
    </div>
    
     <div style="text-align:center">
	                <h3>Email: admin@gmail.com</h3>
	                <h3>Password: secret</h3>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>