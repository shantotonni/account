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
<?php $__env->startSection('content'); ?>
<div class="uk-width-medium-10-10 uk-container-center reset-print">
    <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
        <div class="uk-width-large-10-10">
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions hidden-print">
                            <i class="md-icon material-icons" id="invoice_print"></i>

                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#"><i class="material-icons">&#xE916;</i><span>Accountant</span></a>
                                <div class="uk-dropdown" aria-hidden="true">
                                    <li>
                                        <a href="<?php echo e(route('report_account_transactions')); ?>">All Account</a>
                                    </li>
                                    <ul class="uk-nav">
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountsData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('report_account_transactions_account_search',[$accountsData->id])); ?>"><?php echo e($accountsData->account_name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                           
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                <?php echo Form::open(['url' => 'report/account/transactions', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

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
                                        <div class="uk-width-medium-2-2">
                                            <select id="report_account_id" name="report_account_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                                <option style="z-index: 10002px;" value="">Account</option>
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountsData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option style="z-index: 10002" value="<?php echo e($accountsData->id); ?>"><?php echo e($accountsData->account_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
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
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Cash Flow</p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                            <div class="uk-width-1-1">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th>DATE</th>
                                        <th>ACCOUNT</th>
                                        <th>Type</th>
                                        <th>TRANSACTION DETAILS</th>
                                        <th>TRANSACTION#</th>
                                        <th>REFERENCE#</th>
                                        <th class="uk-text-center">DEBIT</th>
                                        <th class="uk-text-center">CREDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $JournalEntry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JournalEntryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr class="uk-table-middle">
                                        <td><?php echo e($JournalEntryData->updated_at->format('d-m-Y')); ?></td>
                                        <td><?php echo e($JournalEntryData->account->account_name); ?></td>
                                        <td>Ali Azam</td>
                                        <td>Invoice</td>
                                        <td>INV-<?php echo e(isset($JournalEntryData->journal->reference)? $JournalEntryData->journal->reference:''); ?></td>
                                        <td>INV-<?php echo e(isset($JournalEntryData->journal->reference)? $JournalEntryData->journal->reference:''); ?></td>
                                        <td class="uk-text-center">
                                        <?php if($JournalEntryData->debit_credit == 1): ?>
                                        	<?php echo e($JournalEntryData->amount); ?>

                                        <?php else: ?>
                                        00
                                        <?php endif; ?>
                                        </td>
                                        <td class="uk-text-center">
                                        	<?php if($JournalEntryData->debit_credit == 0): ?>
                                        	<?php echo e($JournalEntryData->amount); ?>

                                        	<?php else: ?>
                                        	00
                                            <?php endif; ?>
                                        </td>
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
    $('#sidebar_reports').addClass('current_section');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>