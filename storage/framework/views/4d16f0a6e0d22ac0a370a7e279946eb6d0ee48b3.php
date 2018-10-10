<?php $__env->startSection('title', 'Report'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        @media  print {
            a[href]:after {
                content:"" !important;

            }
            a{
                text-decoration: none;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($errors->first('from_date') || $errors->first('to_date')): ?>
        <div class="uk-alert uk-alert-warning" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
           Date Range is Required
        </div>
    <?php endif; ?>

<div class="uk-width-medium-10-10 uk-container-center reset-print">
    <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
        <div class="uk-width-large-10-10">
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions hidden-print">
                            <i class="md-icon material-icons" id="invoice_print"></i>


                           
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                <?php echo Form::open(['url' => 'bank/report', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Select Date Range and Transaction Type <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>

                                    <div class="uk-width-large-2-2 uk-width-2-2">
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Form</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" required>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">To</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        <button type="submit"  class="md-btn md-btn-flat md-btn-flat-primary">Search</button>
                                    </div>
                                <?php echo Form::close(); ?>

                                </div>
                            </div>
                            <!--end  -->
                        </div>

                        <h3 class="md-card-toolbar-heading-text large" id="invoice_name"></h3>
                    </div>

                    <div class="md-card-content invoice_content print_bg" style="height: 100%;">
                        
                        <div class="uk-grid" data-uk-grid-margin="">
                            
                            <div class="uk-width-small-5-5 uk-text-center">
                                <img style="margin-bottom: -20px;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="15" width="71"/>
                                <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large"><?php echo e($OrganizationProfile->company_name); ?></p>
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Bank Report</p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                                
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                            <div class="uk-width-1-1">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th>Bank Name</th>
                                        <th>Total Deposit</th>
                                        <th>Total Withdrawal</th>
                                        <th>Total Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $Bankreport = app('App\Lib\BankReport'); ?>
                                    <?php 
                                        $Bankreport->setDate($start,$end);
                                     ?>
                                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_names_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <tr class="uk-table-middle">
                                        <td><a href="<?php echo e(route('bank_report_details',[$bank_names_data->account_name_id,$start,$end])); ?>"><?php echo e($Bankreport->contact($bank_names_data->account_name_id)); ?></a></td>
                                        <td>
                                          <?php echo e($Bankreport->deposit($bank_names_data->account_name_id)); ?>

                                        </td>
                                        <td>
                                            <?php echo e($Bankreport->withdraw($bank_names_data->account_name_id)); ?>

                                        </td>
                                        <td><?php echo e($Bankreport->deposit($bank_names_data->account_name_id) - $Bankreport->withdraw($bank_names_data->account_name_id)); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                <p class="uk-text-small">Looking forward for your business.</p>
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
    <!-- handlebars.js -->
<script src="<?php echo e(url('admin/bower_components/handlebars/handlebars.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/assets/js/custom/handlebars_helpers.min.js')); ?>"></script>

<!--  invoices functions -->
<script src="<?php echo e(url('admin/assets/js/pages/page_invoices.min.js')); ?>"></script>
<script type="text/javascript">
    $('#sidebar_bank').addClass('current_section');
    $('#sidebar_bank_report').addClass('act_item');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>