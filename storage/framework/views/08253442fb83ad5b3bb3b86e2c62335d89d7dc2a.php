<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">

    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta content="no" name="msapplication-tap-highlight">

    <link href="<?php echo e(url('admin/assets/img/favicon-16x16.png')); ?>" rel="icon" sizes="16x16" type="image/png">
    <link href="'<?php echo e(url('admin/assets/img/favicon-32x32.png')); ?>" rel="icon" sizes="32x32" type="image/png">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/skins/dropify/css/dropify.css')); ?>">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link href="<?php echo e(url('admin/bower_components/uikit/css/uikit.almost-flat.min.css')); ?>" rel="stylesheet">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo e(url('admin/assets/css/main.min.css')); ?>" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="<?php echo e(url('admin/assets/css/themes/themes_combined.min.css')); ?>" media="all">

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="sidebar_main_open sidebar_main_swipe">

<?php echo $__env->yieldContent('header'); ?>

<?php echo $__env->yieldContent('sidebar'); ?>

<div id="page_content">
    <?php echo $__env->yieldContent('content_header'); ?>
    <div id="page_content_inner">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- common functions -->
<script src="<?php echo e(url('admin/assets/js/common.min.js')); ?>"></script>

<!-- uikit functions -->
<script src="<?php echo e(url('admin/assets/js/uikit_custom.min.js')); ?>"></script>

<!-- altair core functions -->
<script src="<?php echo e(url('admin/assets/js/altair_admin_common.min.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>