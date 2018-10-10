<?php $__env->startSection('title', 'Medical Report'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        #list_table_right tr td:nth-child(1){

            white-space:nowrap;
        }
        #list_table_left , #list_table_right{
           width: 100%;
           padding: 10px;

        }
        #list_table_left tr td, #list_table_right tr td{
              text-align: center;
          }
        #list_table_left tr th, #list_table_right tr th{
           border-bottom: 1px solid black;
           border-top: 1px solid black;
           font-size: 10px;
        }
        #list_table_left tr td:nth-child(1),#list_table_left tr td:last-child,#list_table_left tr th:last-child,#list_table_right tr td:last-child{

            white-space:nowrap;
        }
        @media  print {
            #list_table_left , #list_table_right{
              border:none;
             font-size: 11px !important;

            }
            #list_table_right{
                margin-left: 10px;
            }
            body{
                margin-top: -40px;
            }
            #total, #table_close,#table_open,#list_table_left,#list_table_right{
                font-size: 11px !important;
            }
            .md-card-toolbar{
                display: none;
            }

            #list_table_left tr th:nth-child(5) {
                display: none;
            }
            #list_table_right tr th:nth-child(5) {
                display: none;
            }
            #list_table_left tr td:nth-child(5) {
                display: none;
            }
            #list_table_right tr td:nth-child(5) {
                display: none;
            }

        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="uk-width-medium-10-10 uk-container-center reset-print" >
    <div class="uk-grid uk-grid-collapse" >
        <div class="uk-width-large-10-10" >
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview hidden-print">
                    <div class="md-card-toolbar hidden-print">
                        <div class="md-card-toolbar-actions hidden-print">
                            <i class="md-icon material-icons" id="invoice_print"></i>


                           
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                <?php echo Form::open(['url' => 'recrutereport/medical-slip-report', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Select Date Range and Transaction Type <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>

                                    <?php if($user->branch_id == 1): ?>
                                    <div class="uk-width-large-2-2 uk-width-2-2">
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-building"></i></span>
                                                <select style="width: 90%" id="select_demo_2" name="branch_id" class="md-input" data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                                    <option value="" disabled selected hidden>Select...</option>
                                                    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($all->id == $user->branch_id): ?>
                                                            <option value="<?php echo e($all->id); ?>" selected><?php echo e($all->branch_name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($all->id); ?>"><?php echo e($all->branch_name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="uk-width-large-2-2 uk-width-2-2">
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Form</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e($start?$start:''); ?>">
                                            </div>
                                        </div>
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">To</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e($end?$end:''); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        <button type="submit" name="submit" class="md-btn md-btn-flat md-btn-flat-primary">Search</button>
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
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Medical Slip</p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e(date('d-m-Y', strtotime($start))); ?>  To <?php echo e(date('d-m-Y', strtotime($end))); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid" >
                                
                            <div id="list_table_left_parent" class="uk-width-1-1" style="font-size: 12px;">
                                
                                <table id="list_table_left">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th style="font-size: 10px">Serial</th>
                                        <th style="font-size: 10px">Pax ID</th>
                                        <th style="font-size: 10px">Medical Date</th>
                                        <th style="font-size: 10px">Status</th>
                                        <th style="font-size: 10px">Medical Report Date</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody  >
                                    <?php $i=1; ?>
                                    <?php $__currentLoopData = $medical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>

                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $value->pax_id; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($value->medical_date)); ?></td>
                                            <?php if($value->status === 1): ?>
                                                <td>Fit</td>
                                            <?php elseif($value->status === 0): ?>
                                                <td>Unfit</td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif; ?>
                                            <td><?php echo date('d-m-Y', strtotime($value->medical_report_date)); ?></td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="uk-grid">

                                <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                <p class="uk-text-small"></p>

                        </div>


                        <div class="uk-grid">
                            <div class="uk-width-1-2" style="text-align: left">
                                <p class="uk-text-small uk-margin-bottom">Accounts Signature</p>
                            </div>
                            <div class="uk-width-1-2" style="text-align: right">
                                <p class="uk-text-small uk-margin-bottom">Authorized Signature</p>
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

    $("#invoice_print").click(function(){
       $("#list_table_right").removeClass('uk_table');
       $("#list_table_left").removeClass('uk_table');
    });
    $('#sidebar_reports').addClass('current_section');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>