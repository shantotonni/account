<?php $__env->startSection('title', 'Report'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                <div class="uk-width-large-1-3 uk-width-medium-1-2">

                    <h3 class="heading_a"><i class="material-icons">&#xE0AF;</i> Business Overview</h3>
                    <ul class="md-list">

                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="<?php echo e(route('recrutereport_vendor')); ?>"><i class="material-icons">&#xE315;</i>Total Ticket Under Vendors</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="<?php echo e(route('recrutereport_company')); ?>"><i class="material-icons">&#xE315;</i>Total Okala Under Company</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="<?php echo e(route('recrutereport_visa')); ?>"><i class="material-icons">&#xE315;</i>Total Visa Type Under Company</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="<?php echo e(route('recrutereport_customer_report')); ?>"><i class="material-icons">&#xE315;</i>Customer Report</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="<?php echo e(route('recrutereport_medical_slip_report')); ?>"><i class="material-icons">&#xE315;</i>Medical Slip</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
                
                
            </div>
        </div>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scripts'); ?>
            <script type="text/javascript">
                $('#sidebar_recruit').addClass('current_section');
                $('#sidebar_customer_report').addClass('act_item');
            </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>