<?php $__env->startSection('title', 'Report'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content_header'); ?>
    <div id="top_bar">
        <div class="md-top-bar">
            <ul id="menu_top" class="uk-clearfix">
                <li data-uk-dropdown class="uk-hidden-small">
                    <a href="#"><i class="material-icons">&#xE02E;</i><span>Reports</span></a>
                    <div class="uk-dropdown">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li>Business Overview</li>
                            <li><a href="<?php echo e(route('report_account_profit_loss')); ?>">Profit and Loss</a></li>
                            <li><a href="<?php echo e(route('report_account_cash_flow_statement')); ?>">Cash Flow Statement</a></li>
                            <li><a href="<?php echo e(route('report_account_balance_sheet')); ?>">Balance Sheet</a></li>
                            <li>Accountant</li>
                            <li><a href="<?php echo e(route('report_account_transactions')); ?>">Account Transactions</a></li>
                            <li><a href="<?php echo e(route('report_account_general_ledger_search')); ?>">General Ledger</a></li>
                            <li><a href="<?php echo e(route('report_account_journal_search')); ?>">Journal Report</a></li>
                            <li><a href="<?php echo e(route('report_account_trial_balance_search')); ?>">Trial Balance</a></li>
                            <li>Sales</li>
                            <li><a href="<?php echo e(route('report_account_customer')); ?>">Sales by Customer</a></li>
                            <li><a href="">Sales by Item</a></li>
                            <li><a href="<?php echo e(route('report_account_item')); ?>">Product Report</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
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
          table tr td:first-child{
              color:red;

              white-space: nowrap;
          }

        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="uk-width-medium-10-10 uk-container-center reset-print">
    <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
        <div class="uk-width-large-10-10">
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview">
                    <div class="md-card-toolbar hidden-print">
                        
                        <div class="md-card-toolbar-actions "> 
                            <div style="float: left;">
                                
                                <div class="">
                                    <select data-md-selectize data-uk-tooltip="{pos:'top'}" title="Select Customer" id="contactcategory_id" name="contactcategory_id">
                                        <option value="">Choose Contact Type</option>

                                        <?php $__currentLoopData = $ContactCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contactcategory): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if(isset($id)&& $contactcategory->id==$id): ?>
                                                <option value="<?php echo e($contactcategory->id); ?>" selected><?php echo e($contactcategory->contact_category_name); ?> </option>
                                            <?php endif; ?>
                                            <option value="<?php echo e($contactcategory->id); ?>"><?php echo e($contactcategory->contact_category_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        
                                    </select>
                                    <input type="" name="" value="<?php if(isset($start)): ?><?php echo e($start); ?><?php endif; ?>" class="hidden" id="start" style="display: none">
                                    <input type="" name="" value="<?php if(isset($end)): ?><?php echo e($end); ?><?php endif; ?>" class="hidden" id="end" style="display: none;">
                                    <input type="" name="" value="<?php if(isset($date)): ?><?php echo e($date); ?><?php endif; ?>" class="hidden" id="date_check" style="display: none;">
                                </div>
                            </div>
                            <i class="md-icon material-icons" id="invoice_print"></i>


                           
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                <?php echo Form::open(['url' => 'report/account/customer', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Select Date Range and Transaction Type <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>

                                    <div class="uk-width-large-2-2 uk-width-2-2">
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Form</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">To</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <input type="" name="id" value="<?php if(isset($id)): ?><?php echo e($id); ?><?php endif; ?>" style="display: none;">
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
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Sales By Customer</p>
                                <p style="line-height: 5px; font-size: 12px;" >
                                    (This report include data from invoice, payment received, credit note)

                                </p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e(date('d-m-Y',strtotime($start))); ?>  To <?php echo e(date('d-m-Y',strtotime($end))); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                            <div class="uk-width-1-1">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th class="uk-text-center">Customer</th>

                                        <th class="uk-text-center">Total Sales</th>

                                        <th class="uk-text-center">Total Credit Amount</th>
                                        <th class="uk-text-center">Total Refund</th>


                                        <th class="uk-text-center">Total Excess Payment</th>
                                        <th class="uk-text-center">Total Received</th>
                                        <th class="uk-text-center">Total Due</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $total_sales=0; $total_cr_amount=0;$total_refund=0; $total_excess_payment=0;$total_receives=0;$due=0;
                                     ?>
                                    <?php $__currentLoopData = $customerReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerReportData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                     <?php 

                                          $total_sales = $total_sales+$customerReportData['total_sales'];
                                          $total_cr_amount+=$customerReportData['total_cr_amount'];

                                          $total_refund+=$customerReportData['total_refund'];

                                          $total_excess_payment+=$customerReportData['total_excess_payment'];

                                          $total_receives+=$customerReportData['total_receives'];

                                           $due+=$customerReportData['due'];

                                      ?>

                                    <tr class="uk-table-middle">
                                        <td class="uk-text-center"><a href="<?php echo e(route('report_account_customer_id',[$customerReportData['customer_id']])); ?>"><?php echo e($customerReportData['display_name']); ?></a></td>

                                        <td class="uk-text-center"><?php echo e($customerReportData['total_sales']); ?></td>

                                        <td class="uk-text-center"><?php echo e(isset($customerReportData['total_cr_amount'])?$customerReportData['total_cr_amount']:'0'); ?></td>
                                        <td class="uk-text-center"><?php echo e($customerReportData['total_refund']); ?></td>

                                        <td class="uk-text-center"><?php echo e($customerReportData['total_excess_payment']); ?></td>

                                        <td class="uk-text-center"><?php echo e($customerReportData['total_receives']); ?></td>
                                        <td class="uk-text-center"><?php echo e($customerReportData['due']); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <tr class="uk-table-middle">
                                        <td class="uk-text-center">Total <span style="color:darkred;font-size: 20px;">→</span></td>

                                        <td class="uk-text-center"><?php echo e($total_sales); ?></td>

                                        <td class="uk-text-center"><?php echo e($total_cr_amount); ?></td>
                                        <td class="uk-text-center"><?php echo e($total_refund); ?></td>

                                        <td class="uk-text-center"><?php echo e($total_excess_payment); ?></td>

                                        <td class="uk-text-center"><?php echo e($total_receives); ?></td>
                                        <td class="uk-text-center"><?php echo e($due); ?></td>
                                    </tr>
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
    $('#sidebar_reports').addClass('current_section');
</script>
<script type="text/javascript">
    $('#contactcategory_id').on('change',function(){
        var contactcategory_id = $('#contactcategory_id option:selected').val();
        var start = $('#start').val();
        // alert(start);
        var end = $('#end').val();
        // alert(end);
        var date_check = $('#date_check').val();
        // alert(date_check);
        if(contactcategory_id == '')
        {
            var address = "/report/account/customer";
        }
        else if(date_check==1){
            var address = "/report/account/customer/category/filter/"+start+'/'+end+'/'+contactcategory_id;
        }
        else
        {
            var address = "/report/account/customer/category/filter/"+contactcategory_id;
        }
        window.location=address;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>