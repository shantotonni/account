<?php $__env->startSection('title', 'Account Transaction'); ?>

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
                                        <?php if(Auth::user()->branch_id==1): ?>
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <label for="branch_id" style="margin-left: 10px;">Branch</label>
                                                <select style="padding: 5px; border-top:none; border-left:none; border-right:none; border-bottom:1px solid lightgray"  id="branch_id" name="branch_id">
                                                <!-- <option value="">Account</option> -->
                                                <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option style="z-index: 10002" value="<?php echo e($branch_data->id); ?>"><?php echo e($branch_data->branch_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            </div>
                                        </div>
                                        <?php endif; ?>
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
                                            <div style="margin: 8px 55px;" class="uk-input-group">

                                            <select style="padding: 5px; border-top:none; border-left:none; border-right:none; border-bottom:1px solid lightgray"  id="report_account_id" name="report_account_id">
                                                <option value="">Account</option>
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accountsData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option style="z-index: 10002" value="<?php echo e($accountsData->id); ?>"><?php echo e($accountsData->account_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
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
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Account Transactions</p>
                                <?php if(isset($branch_id)): ?><p><?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> <?php if($branchs->id==$branch_id): ?> <?php echo e($branchs->branch_name); ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></p><?php endif; ?>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e(date('d-m-Y',strtotime($start))); ?>  To <?php echo e(date("d-m-Y",strtotime($end."-1 days"))); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                            <div class="uk-width-1-1">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th class="uk-text-left">DATE</th>
                                        <th class="uk-text-left">ACCOUNT</th>
                                        <th class="uk-text-center">TRANSACTION</th>
                                        <th class="uk-text-center">Type</th>
                                        <th class="uk-text-center">REFERENCE#</th>
                                        <th class="uk-text-center">TRANSACTION#</th>
                                        <th class="uk-text-center">DEBIT</th>
                                        <th class="uk-text-center">CREDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="uk-text-left"><?php echo e(date("d-m-Y", strtotime($start))); ?></td>
                                        <td class="uk-text-left">Opening Balance B/D</td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center">
                                        <?php if($opening_balance < 0): ?>
                                        <?php echo e(abs($opening_balance)); ?>

                                        <?php elseif($opening_balance >= 0): ?>
                                            00
                                        <?php endif; ?>
                                        </td>
                                        <td class="uk-text-center">
                                           
                                            <?php if($opening_balance < 0): ?>
                                            00
                                            <?php elseif($opening_balance >= 0): ?>
                                            <?php echo e(abs($opening_balance)); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    $debit = 0;
                                    $credit = 0;
                                    ?>
                                    <?php $__currentLoopData = $JournalEntry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JournalEntryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr class="uk-table-middle">
                                        <td><?php echo e(date("d-m-Y",strtotime($JournalEntryData->assign_date))); ?></td>
                                        <td><?php echo e($JournalEntryData->account->account_name); ?></td>
                                        <td>
                                        <?php if($JournalEntryData->agent_id): ?>
                                                <?php echo e($JournalEntryData->Agent->display_name); ?>

                                        <?php elseif($JournalEntryData->contact_id): ?>

                                         <?php echo e($JournalEntryData->contact->display_name); ?>

                                        <?php else: ?>

                                        <?php endif; ?>

                                        </td>
                                        <td>
                                        <?php if($JournalEntryData->jurnal_type == 'payment_receive1'): ?>
                                        Invoice Payment
                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_receive2'): ?>
                                        Customer Payment
                                        <?php elseif($JournalEntryData->jurnal_type == 11): ?>
                                            Credit Note
                                        <?php elseif($JournalEntryData->jurnal_type == 12): ?>
                                            Credit Note Payment
                                        <?php elseif($JournalEntryData->jurnal_type == 'invoice'): ?>
                                        Invoice
                                        <?php elseif($JournalEntryData->jurnal_type == 'bill'): ?>
                                            Bill
                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_made1'): ?>
                                          Bill Payment
                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_made2'): ?>
                                        Vendor Payment
                                        <?php elseif($JournalEntryData->jurnal_type == 'sales_commission'): ?>
                                        Sales Commission
                                        <?php elseif($JournalEntryData->jurnal_type == 'journal'): ?>
                                            Manual Journal
                                        <?php elseif($JournalEntryData->jurnal_type == 'bank'): ?>
                                           Bank
                                        <?php elseif($JournalEntryData->jurnal_type =="expense"): ?>
                                                Expense
                                        <?php elseif($JournalEntryData->jurnal_type=="income"): ?>
                                                Income
                                        <?php endif; ?>

                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                        <?php if($JournalEntryData->jurnal_type == 'payment_receive1'): ?>
                                        INV-<?php echo e(str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_receive2'): ?>
                                        PR-<?php echo e(str_pad($JournalEntryData->paymentReceive->pr_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_made2'): ?>
                                        PM-<?php echo e(str_pad($JournalEntryData->paymentMade->pm_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'payment_made1'): ?>
                                        BILL-<?php echo e(str_pad($JournalEntryData->bill->bill_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'sales_commission'): ?>
                                            <?php if(isset($JournalEntryData->SalesCommission->scNumber)): ?>
                                        SC-<?php echo e(str_pad($JournalEntryData->SalesCommission->scNumber, 6, '0', STR_PAD_LEFT)); ?>

                                            <?php elseif(is_null($JournalEntryData->salesComission_id)): ?>
                                            INV-<?php echo e(str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?>

                                            <?php endif; ?>
                                        <?php elseif($JournalEntryData->jurnal_type == 11): ?>
                                            CN-<?php echo e(str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 12): ?>
                                            CN-<?php echo e(str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'invoice'): ?>
                                           <?php if(isset($JournalEntryData->invoice->invoice_number)): ?>
                                           INV-<?php echo e(str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?>

                                           <?php endif; ?>
                                         <?php elseif($JournalEntryData->jurnal_type == 'journal'): ?>
                                            MJ - <?php echo e(str_pad($JournalEntryData->journal->id, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'bill'): ?>
                                            BILL - <?php echo e(str_pad($JournalEntryData->bill->bill_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type == 'bank'): ?>
                                            BANK - <?php echo e(str_pad($JournalEntryData->bank->id, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type =="expense"): ?>
                                          EXP - <?php echo e(str_pad($JournalEntryData->expense->expense_number, 6, '0', STR_PAD_LEFT)); ?>

                                        <?php elseif($JournalEntryData->jurnal_type=="income"): ?>
                                                INC- <?php echo e(str_pad($JournalEntryData->income->income_number, 6, '0', STR_PAD_LEFT)); ?>



                                        <?php endif; ?>
                                        </td>
                                        <td class="uk-text-center">
                                        <?php if($JournalEntryData->debit_credit == 1): ?>
                                        	<?php echo e($JournalEntryData->amount); ?>

                                            <?php 
                                                $debit = $debit+$JournalEntryData->amount;;
                                            ?>
                                        <?php else: ?>
                                        00
                                        <?php endif; ?>
                                        </td>   
                                        <td class="uk-text-center">
                                        	<?php if($JournalEntryData->debit_credit == 0): ?>
                                        	<?php echo e($JournalEntryData->amount); ?>

                                            <?php  
                                                $credit = $credit+$JournalEntryData->amount;
                                            ?>
                                        	<?php else: ?>
                                        	00
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($opening_balance < 0): ?>
                                    <?php $cd_debit = $debit+abs($opening_balance);?>
                                    <?php $cd_credit = $credit;?>
                                    <?php elseif($opening_balance >= 0): ?>
                                    <?php $cd_credit = $credit+abs($opening_balance);?>
                                    <?php $cd_debit = $debit;?>
                                    <?php endif; ?>
                                    <?php $cd_balance = $cd_debit-$cd_credit;?>
                                    <tr>
                                        <td class="uk-text-center"><?php echo e(date("d-m-Y",strtotime($end."-1 days"))); ?></td>
                                        <td class="uk-text-center">Balance C/D</td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center">
                                        
                                        <?php if($cd_balance < 0): ?>
                                        <?php echo e(abs($cd_balance)); ?>

                                        <?php elseif($cd_balance >= 0): ?>
                                        00
                                        <?php endif; ?>
                                        </td>
                                        <td class="uk-text-center">
                                        
                                        <?php if($cd_balance >0): ?>
                                        <?php echo e(abs($cd_balance)); ?>

                                        <?php elseif($cd_balance <= 0): ?>
                                        00
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center">

                                        <?php if($cd_balance < 0): ?>
                                        <?php $debit = $debit+abs($cd_balance); ?>
                                        <?php endif; ?>


                                        <?php if($opening_balance < 0): ?>
                                        <?php $debit = $debit+abs($opening_balance); ?>
                                        <?php endif; ?>

                                        <?php echo e($debit); ?>


                                        </td>
                                        <td class="uk-text-center">

                                        <?php if($cd_balance >= 0): ?>
                                        <?php $credit = $credit+abs($cd_balance); ?>
                                        <?php endif; ?>


                                        <?php if($opening_balance >= 0): ?>
                                        <?php $credit = $credit+abs($opening_balance); ?>
                                        <?php endif; ?>

                                        <?php echo e($credit); ?>


                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
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