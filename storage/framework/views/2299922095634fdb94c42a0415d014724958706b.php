<!DOCTYPE html>
<!--[if lte IE 9]>
    <html class="lte-ie9" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" ng-app="app">
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

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link href="<?php echo e(url('admin/bower_components/uikit/css/uikit.almost-flat.min.css')); ?>" rel="stylesheet">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo e(url('admin/assets/css/main.css')); ?>" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="<?php echo e(url('admin/assets/css/themes/themes_combined.min.css')); ?>" media="all">

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo e(url('admin/assets/css/custom.css')); ?>" media="all">

    <!-- kendo UI -->
    <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/kendo-ui/styles/kendo.common-material.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(url('admin/bower_components/kendo-ui/styles/kendo.material.min.css')); ?>" id="kendoCSS"/>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.css">

    <style>
        .uk-form-select{
            color:rgba(0, 0, 0, 0.8) !important;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="sidebar_main_open sidebar_main_swipe ">

<?php echo $__env->yieldContent('header'); ?>

<?php echo $__env->yieldContent('sidebar'); ?>

<?php echo $__env->yieldContent('top_bar'); ?>

<div id="page_content">
    <div id="page_content_inner">
        <?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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








<script src="<?php echo e(url('admin/assets/js/pages/page_contact_list.min.js')); ?>"></script>

<!-- datatables -->
<script src="<?php echo e(url('admin/bower_components/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/datatables-buttons/js/dataTables.buttons.js')); ?>"></script>
<script src="<?php echo e(url('admin/assets/js/custom/datatables/buttons.uikit.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/jszip/dist/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/pdfmake/build/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/pdfmake/build/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/datatables-buttons/js/buttons.colVis.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/datatables-buttons/js/buttons.html5.js')); ?>"></script>
<script src="<?php echo e(url('admin/bower_components/datatables-buttons/js/buttons.print.js')); ?>"></script>
<script src="<?php echo e(url('admin/assets/js/custom/datatables/datatables.uikit.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/assets/js/pages/plugins_datatables.js')); ?>"></script>


<script src="<?php echo asset('admin/assets/js/ion.rangeSlider.min.js'); ?>"></script>

<!--  forms advanced functions -->
<script src="<?php echo asset('admin/assets/js/pages/forms_advanced.js'); ?>"></script>


<script src="<?php echo e(url('angular/angular.min.js')); ?>"></script>
<?php echo $__env->yieldContent('angular'); ?>

<script src="<?php echo e(url('admin/assets/js/kendoui_custom.min.js')); ?>"></script>
<!--  kendoui functions -->
<script src="<?php echo e(url('admin/assets/js/pages/kendoui.min.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>