<?php if(session()->has('alert.message')): ?>
    <div class="uk-alert uk-alert-<?php echo e(session('alert.status')); ?>" data-uk-alert>
        <a href="" class="uk-alert-close uk-close"></a>
        <p><?php echo e(session('alert.message')); ?></p>
    </div>
<?php endif; ?>