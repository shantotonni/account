

<?php $__env->startSection('title', 'Reset password'); ?>

<?php $__env->startSection('content'); ?>
    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>

                <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Reset your account password</h2>

                <?php if(session()->has('status')): ?>
                    <div class="uk-alert" data-uk-alert>
                        <a href="" class="uk-alert-close uk-close"></a>
                        <p><?php echo e(session('status')); ?></p>
                    </div>
                <?php endif; ?>

                <?php echo Form::open(['url' => '/password/email', 'method' => 'post']); ?>

                    <div class="uk-form-row">
                        <label for="email">Email</label>
                        <input class="md-input" id="email" name="email" value="<?php echo e(old('email')); ?>" type="text">
                        <?php if($errors->has('email')): ?>
                            <span class="uk-text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Send Password Reset Link</button>
                    </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="<?php echo e(url('/login')); ?>">Back to login page</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>