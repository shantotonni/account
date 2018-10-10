<?php $__env->startSection('title', 'Report'); ?>

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
<?php $__env->startSection('content_header'); ?>
    <div id="top_bar" class="hidden-print">
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
                                <?php echo Form::open(['url' => 'report/cashbook', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

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
                        
                        <div class="uk-grid" data-uk-grid-margin="">
                            
                            <div class="uk-width-small-5-5 uk-text-center">
                                <img style="margin-bottom: -20px;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="15" width="71"/>
                                <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large"><?php echo e($OrganizationProfile->company_name); ?></p>
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Cash Book</p>
                                <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                            </div>
                        </div>
                        <div class="uk-grid" >
                                 <div class="uk-width-1-2">
                                    <table id="table_open" style="width: 100%">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th></th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td class="uk-text-center" >Opening Balance</td>

                                            <td class="uk-text-center" >
                                            <?php if($total_cash_inhand == 0): ?>
                                            00
                                            <?php elseif($total_cash_inhand > 0): ?>
                                            <?php echo e($total_cash_inhand); ?>

                                            <?php elseif($total_cash_inhand < 0): ?>
                                            (<?php echo e(abs($total_cash_inhand)); ?>)
                                            <?php endif; ?>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td class="uk-text-center" >Debit</td>

                                            <td class="uk-text-center" ><?php echo e($total_cash_inhand_debit); ?></td>

                                        </tr>
                                        <tr>

                                            <td class="uk-text-center" >Credit</td>

                                            <td class="uk-text-center" >
                                            <?php if($total_cash_inhand_credit == 0): ?>
                                            00
                                            <?php elseif($total_cash_inhand_credit > 0): ?>
                                            <?php echo e($total_cash_inhand_credit); ?>

                                            <?php elseif($total_cash_inhand_credit < 0): ?>
                                            (<?php echo e(abs($total_cash_inhand_credit)); ?>)
                                            <?php endif; ?>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="uk-width-1-2">
                                    <table id="table_close" style="width: 100%">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th></th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td class="uk-text-center" >Cash In Hand</td>

                                            <td class="uk-text-center" >
                                            <?php $ccih = $current_cash_in_hand+$total_cash_inhand; ?>
                                            <?php if($ccih == 0): ?>
                                            00
                                            <?php elseif($ccih > 0): ?>
                                            <?php echo e($ccih); ?>

                                            <?php elseif($ccih < 0): ?>
                                            (<?php echo e(abs($ccih)); ?>)
                                            <?php endif; ?>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <div id="list_table_left_parent" class="uk-width-1-2" style="font-size: 12px;">
                                
                                <table id="list_table_left">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th style="font-size: 10px">DATE</th>
                                        <th style="font-size: 10px">Particulars</th>
                                        <th style="font-size: 10px">TRANSACTION#</th>
                                        <th style="font-size: 10px">DETAILS</th>
                                        <th style="font-size: 10px">TYPE</th>
                                        <th style="font-size: 10px" class="uk-text-center">DEBIT</th>
                                    </tr>
                                    </thead>
                                    <tbody  >
                                    <?php 
                                    $debit = 0;
                                    $credit = 0;
                                    ?>


                                    <?php $__currentLoopData = $JournalEntrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JournalEntryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <?php if($JournalEntryData->debit_credit == 1): ?>
                                        <tr class="uk-table-middle">
                                            <td><?php echo e(date('d-m-Y',strtotime($JournalEntryData->assign_date))); ?></td>
                                            <td>
                                                 <?php if($JournalEntryData->bank_id): ?>
                                                       <?php echo e($JournalEntryData->bank['particulars']); ?>

                                                 <?php elseif($JournalEntryData->income_id): ?>
                                                     <?php echo e($JournalEntryData->income->account['account_name']); ?>

                                                <?php elseif($JournalEntryData->payment_receives_id): ?>
                                                     <?php echo e($JournalEntryData->paymentReceive['reference']); ?>

                                                <?php elseif($JournalEntryData->credit_note_refunds_id): ?>

                                                  <?php echo e($JournalEntryData->creditNoteRefund['reference']); ?>

                                                <?php elseif($JournalEntryData->expense_id): ?>
                                                    <?php echo e($JournalEntryData->expense->account['account_name']); ?>

                                                <?php elseif($JournalEntryData->payment_made_id): ?>
                                                    <?php echo e($JournalEntryData->paymentMade['reference']); ?>

                                                <?php elseif($JournalEntryData->journal_id): ?>
                                                    <?php echo e($JournalEntryData['note']); ?>

                                                <?php elseif($JournalEntryData->salesComission_id): ?>
                                                    <?php echo e($JournalEntryData->SalesCommission['CustomerNote']); ?>

                                                 <?php endif; ?>
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
                                            <td>

                                                <?php if($JournalEntryData->agent_id ): ?>
                                                    <?php echo e($JournalEntryData->Agent->display_name); ?>

                                                <?php elseif($JournalEntryData->contact_id): ?>

                                                    <?php echo e($JournalEntryData->contact->display_name); ?>

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
                                            <td class="uk-text-center">
                                            <?php if($JournalEntryData->debit_credit == 1): ?>
                                            	<?php echo e($JournalEntryData->amount); ?>

                                                <?php
                                                    $debit = $debit+$JournalEntryData->amount;
                                                ?>
                                            <?php else: ?>
                                            00
                                            <?php endif; ?>
                                            </td>  
                                        </tr>
                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                   
                                    </tbody>
                                </table>
                            </div>
                            <div id="list_table_right_parent" class="uk-width-1-2"  style="font-size:12px;">
                                <table  id="list_table_right" >
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th style="font-size: 10px">DATE</th>
                                        <th style="font-size: 10px">Particulars</th>
                                        <th style="font-size: 10px">TRANSACTION#</th>
                                        <th style="font-size: 10px"> DETAILS</th>
                                        <th style="font-size: 10px">TYPE</th>
                                        <th style="font-size: 10px" class="">CREDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                    <?php $__currentLoopData = $JournalEntrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JournalEntryData): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($JournalEntryData->debit_credit == 0): ?>
                                    <tr class="uk-table-middle">
                                        <td><?php echo e(date('d-m-Y',strtotime($JournalEntryData->assign_date))); ?></td>
                                        <td>
                                            <?php if($JournalEntryData->bank_id): ?>
                                                <?php echo e($JournalEntryData->bank['particulars']); ?>

                                            <?php elseif($JournalEntryData->income_id): ?>
                                                <?php echo e($JournalEntryData->income->account['account_name']); ?>

                                            <?php elseif($JournalEntryData->payment_receives_id): ?>
                                                <?php echo e($JournalEntryData->paymentReceive['reference']); ?>

                                            <?php elseif($JournalEntryData->credit_note_refunds_id): ?>

                                                <?php echo e($JournalEntryData->creditNoteRefund['reference']); ?>

                                            <?php elseif($JournalEntryData->expense_id): ?>
                                                <?php echo e($JournalEntryData->expense->account['account_name']); ?>

                                            <?php elseif($JournalEntryData->payment_made_id): ?>
                                                <?php echo e($JournalEntryData->paymentMade['reference']); ?>

                                            <?php elseif($JournalEntryData->journal_id): ?>
                                                <?php echo e($JournalEntryData['note']); ?>


                                            <?php elseif($JournalEntryData->salesComission_id): ?>
                                                <?php echo e($JournalEntryData->SalesCommission['CustomerNote']); ?>

                                            <?php endif; ?>
                                        </td>
                                        
                                        <td>
                                            <?php if($JournalEntryData->jurnal_type == 'payment_receive1'): ?>
                                                INV-<?php echo e(str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?>

                                            <?php elseif($JournalEntryData->jurnal_type == 'payment_receive2'): ?>
                                                PR-<?php echo e(str_pad($JournalEntryData->paymentReceive->id, 6, '0', STR_PAD_LEFT)); ?>

                                            <?php elseif($JournalEntryData->jurnal_type == 'payment_made2'): ?>
                                                PM-<?php echo e(str_pad($JournalEntryData->paymentMade->id, 6, '0', STR_PAD_LEFT)); ?>

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
                                        <td style="text-align: center">
                                            <?php if($JournalEntryData->agent_id): ?>

                                                <?php echo e($JournalEntryData->Agent->display_name); ?>

                                            <?php elseif($JournalEntryData->contact_id): ?>

                                                <?php echo e($JournalEntryData->contact->display_name); ?>

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
                                        <?php endif; ?>



                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="uk-width-1-1">
                                <table id="total" class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style="">Total</td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style=""><?php echo e($debit); ?></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style="">Total</td>
                                        <td class="uk-text-center" style=""><?php echo e($credit); ?></td>
                                    </tr>
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