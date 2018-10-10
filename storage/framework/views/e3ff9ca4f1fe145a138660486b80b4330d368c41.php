<?php $__env->startSection('title', 'Account Journal'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        @media  print
        {
            .md-card-toolbar{
                display: none;
            }

            table#profit tr td,table#profit tr th{
                font-size: 11px !important;
            }
            .uk-table tr td{
                padding: 1px 0px;
                border: none !important;
                width: 100%;
                font-size: 11px !important;
            }
            .uk-table tr th{
                padding: 1px 2px;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                width: 100%;
                font-size: 11px !important;
            }

            body{
                margin-top: -40px;
            }
        }
    </style>
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
    <div class="uk-grid uk-grid-collapse" >
        <div class="uk-width-large-10-10">
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions hidden-print">
                            <i class="md-icon material-icons" id="invoice_print"></i>

                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#"><i class="material-icons">&#xE916;</i><span>Accountant</span></a>
                                <div class="uk-dropdown" aria-hidden="true">
                                    <ul class="uk-nav">
                                        <li>
                                            <a href="estimates_form.html">Today</a>
                                        </li>
                                        <li>
                                            <a href="#">This Week</a>
                                        </li>
                                        <li>
                                            <a href="#">This Month</a>
                                        </li>
                                        <li>
                                            <a href="">This Quarter</a>
                                        </li>
                                        <li>
                                            <a href="sales_order_form.html">This Year</a>
                                        </li>
                                        <li>
                                            <a href="retainer_invoice_form.html">Yesterday</a>
                                        </li>
                                        <li>
                                            <a href="#">Previous Week</a>
                                        </li>
                                        <li>
                                            <a href="#">Previous Month</a>
                                        </li>
                                        <li>
                                            <a class="uk-text-danger" href="#">Previous Week</a>
                                        </li>
                                        <li>
                                            <a class="uk-text-danger" href="#">Previous Month</a>
                                        </li>
                                        <li>
                                            <a class="uk-text-danger" href="#">Previous Quarter</a>
                                        </li>
                                        <li>
                                            <a class="uk-text-danger" href="#">Previous Year</a>
                                        </li>
                                        <li>
                                            <a class="uk-text-danger" href="#" data-uk-modal="{target:'#coustom_modal'}">Coustom</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--coustorm modal start -->
                            <div class="uk-modal" id="coustom_modal">
                                <div class="uk-modal-dialog">
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Select Date Range <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>
                                    <div class="uk-width-large-10-10 uk-width-10-10">
                                        <div class="uk-width-large-1-2 uk-width-1-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Select date</label>
                                                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-2 uk-width-1-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Select date</label>
                                                <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button data-uk-modal="{target:'#modal_new'}" type="button" class="md-btn md-btn-flat md-btn-flat-primary">Open New Modal</button>
                                    </div>
                                </div>
                            </div>
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                <?php echo Form::open(['url' => 'report/account/journal', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

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
                        
                        <div class="uk-grid" >
                            
                            <div class="uk-width-small-5-5 uk-text-center">
                                <img style="margin-bottom: -20px;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="15" width="71"/>
                                <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large"><?php echo e($OrganizationProfile->company_name); ?></p>
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Journal Report</p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                            <div class="uk-width-1-1">


                            <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journalData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php $credit=0;?>
                                    <?php $debit=0;?>
                                    <?php $i = 0;?>
                            <table class="uk-table">
                            <?php $__currentLoopData = $JournalEntry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JournalEntryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($journalData['journal_type'] == 'invoice'): ?>
                                     <?php if($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->invoice_id): ?>

                                        <?php if($i == 0): ?>
                                        <thead>
                                            <tr class="uk-text-upper">
                                                <th><?php echo e(isset($JournalEntryData->invoice->invoice_date)?$JournalEntryData->invoice->invoice_date:''); ?> INV-<?php echo e(str_pad(isset($JournalEntryData->invoice->invoice_number)?$JournalEntryData->invoice->invoice_number:0, 6, '0', STR_PAD_LEFT)); ?></th>
                                                <th class="uk-text-center">DEBIT</th>
                                                <th class="uk-text-center">CREDIT</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php endif; ?>
                                        <?php $i++;?>
                                        <tr class="uk-table-middle">
                                            <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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
                                     <?php endif; ?>
                                <?php elseif($journalData['journal_type'] == 'paymentreceive1' || $journalData['journal_type'] == 'paymentreceive2'): ?>
                                    <?php if($journalData['journal_id'] == $JournalEntryData->payment_receives_id): ?>
                                            <?php if($i == 0): ?>
                                                <thead>
                                                <tr class="uk-text-upper">
                                                    <th><?php echo e($JournalEntryData->paymentReceive->payment_date); ?> PR-<?php echo e(str_pad($JournalEntryData->paymentReceive->pr_number, 6, '0', STR_PAD_LEFT)); ?></th>
                                                    <th class="uk-text-center">DEBIT</th>
                                                    <th class="uk-text-center">CREDIT</th>
                                                </tr>
                                                </thead>
                                            <?php endif; ?>
                                             <tbody>
                                            <?php $i++;?>

                                            <tr class="uk-table-middle">
                                                <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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
                                    <?php endif; ?>
                                <?php elseif($journalData['journal_type'] == '11' || $journalData['journal_type'] == '12'): ?>
                                    <?php if($journalData['journal_id'] == $JournalEntryData->credit_note_id): ?>
                                        <?php if($i == 0): ?>
                                            <thead>
                                            <tr class="uk-text-upper">
                                                <th><?php echo e($JournalEntryData->creditNote->credit_note_date); ?> CN-<?php echo e(str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)); ?></th>
                                                <th class="uk-text-center">DEBIT</th>
                                                <th class="uk-text-center">CREDIT</th>
                                            </tr>
                                            </thead>
                                        <?php endif; ?>
                                        <tbody>
                                        <?php $i++;?>

                                        <tr class="uk-table-middle">
                                            <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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
                                    <?php endif; ?>
                            <?php elseif($journalData['journal_type'] == 'journal'): ?>
                                <?php if($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->journal_id): ?>

                                        <?php if($i == 0): ?>
                                            <thead>
                                            <tr class="uk-text-upper">
                                                <th><?php echo e($JournalEntryData->journal->date); ?> MJ-<?php echo e(str_pad($JournalEntryData->journal->id, 6, '0', STR_PAD_LEFT)); ?></th>
                                                <th class="uk-text-center">DEBIT</th>
                                                <th class="uk-text-center">CREDIT</th>
                                            </tr>
                                            </thead>
                                        <?php endif; ?>
                                            <tbody>
                                        <?php $i++;?>

                                        <tr class="uk-table-middle">
                                            <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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

                                <?php endif; ?>
                            <?php elseif($journalData['journal_type'] == 'bill'): ?>
                                <?php if($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->bill_id): ?>

                                    <?php if($i == 0): ?>
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th><?php echo e($JournalEntryData->bill->bill_date); ?> BILL-<?php echo e(str_pad(isset($JournalEntryData->bill->bill_number)?$JournalEntryData->bill->bill_number:0, 6, '0', STR_PAD_LEFT)); ?></th>
                                            <th class="uk-text-center">DEBIT</th>
                                            <th class="uk-text-center">CREDIT</th>
                                        </tr>
                                        </thead>
                                    <?php endif; ?>
                                    <tbody>
                                    <?php $i++;?>

                                    <tr class="uk-table-middle">
                                        <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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

                                    <?php endif; ?>
                            <?php elseif($journalData['journal_type'] == 'payment_made'): ?>
                                <?php if($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->payment_made_id): ?>

                                    <?php if($i == 0): ?>
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th><?php echo e($JournalEntryData->paymentMade->payment_date); ?> PM-<?php echo e(str_pad(isset($JournalEntryData->paymentMade->pm_number)?$JournalEntryData->paymentMade->pm_number:0, 6, '0', STR_PAD_LEFT)); ?></th>
                                            <th class="uk-text-center">DEBIT</th>
                                            <th class="uk-text-center">CREDIT</th>
                                        </tr>
                                        </thead>
                                    <?php endif; ?>
                                    <tbody>
                                    <?php $i++;?>

                                    <tr class="uk-table-middle">
                                        <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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

                                    <?php endif; ?>
                                <?php elseif($journalData['journal_type'] == 'expense'): ?>
                                    <?php if($journalData['journal_type'] == $JournalEntryData->jurnal_type && $journalData['journal_id'] == $JournalEntryData->expense_id): ?>

                                        <?php if($i == 0): ?>
                                            <thead>
                                            <tr class="uk-text-upper">
                                                <th><?php echo e($JournalEntryData->expense->date); ?> BILL-<?php echo e(str_pad(isset($JournalEntryData->expense->_id)?$JournalEntryData->expense->_id:0, 6, '0', STR_PAD_LEFT)); ?></th>
                                                <th class="uk-text-center">DEBIT</th>
                                                <th class="uk-text-center">CREDIT</th>
                                            </tr>
                                            </thead>
                                        <?php endif; ?>
                                        <tbody>
                                        <?php $i++;?>

                                        <tr class="uk-table-middle">
                                            <td><?php echo e($JournalEntryData->account->account_name); ?></td>
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

                                        <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                        </table>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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