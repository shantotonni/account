<?php $__env->startSection('title', 'Report Profit and loss'); ?>

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
               padding: 1px 0px;
               border-top: 1px solid black;
               border-bottom: 1px solid black;
               width: 100%;
               font-size: 11px !important;
           }

         body{
             margin-top: -60px;
         }

       }
       table#profit thead tr th:nth-child(odd){
               text-align: left;
               font-size: 18px;
               color: black;
           }
       table#profit thead tr th:nth-child(even){
           text-align: right;
           font-size: 18px;
           color: black;
       }
       table#profit tbody tr td:nth-child(odd){
           text-align: left;
           font-size: 14px;

       }

       table#profit tbody tr td:nth-child(even){
           text-align: right;
           font-size: 14px;


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
    <?php $Report = app('App\Lib\Report'); ?>

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
                                        <?php echo Form::open(['url' => 'report/account/profitandloss', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                        <div class="uk-modal-header">
                                            <h3 class="uk-modal-title">Select Date Range and Transaction Type <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                        </div>

                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">Form</label>
                                                    <input required class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                </div>
                                            </div>
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">To</label>
                                                    <input required class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
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

                            <div class="uk-grid"  >

                                <div class="uk-width-small-5-5 uk-text-center">
                                    <p style="line-height: 5px;" class="uk-text-large"> <?php echo e($OrganizationProfile->display_name); ?></p>
                                    <p style="line-height: 5px;" class="heading_b uk-text-success">Profit And Loss</p>
                                    <p style="line-height: 5px;" class="uk-text-small">From <?php echo e($start); ?>  To <?php echo e($end); ?></p>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table id="profit" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper" style="text-align: center">
                                            <th>Account</th>
                                            <th>Total</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                       <tr>
                                           <td colspan="2" style="background-color: lightgray;color:black"> Operating Income</td>

                                       </tr>
                                    <?php $__currentLoopData = $operatingincome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td> <?php echo e($item->account_name); ?></td>
                                           <td> <?php echo e($Report->OperatingincomeTotal($item->id)); ?> </td>
                                       </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td >Total Operating Income</td>
                                           <td style="background-color: lightgray ;color:black;font-size: 18px;"><?php echo e($Report->TotalOperatingincome()); ?></td>
                                       </tr>

                                       <tr>
                                           <td colspan="2" style="background-color: lightgray ;color:black"> Cost Of Goods Sold</td>

                                       </tr>
                                       <?php $__currentLoopData = $costofgoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <tr>
                                               <td> <?php echo e($item->account_name); ?></td>
                                               <td> <?php echo e($Report->CostofGoodTotal($item->id)); ?> </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td >Total Cost Of Goods Sold</td>
                                           <td style="background-color: lightgray ;color:black; font-size: 18px;"><?php echo e($Report->TotalCostofGood()); ?></td>
                                       </tr>
                                       <tr>
                                           <td style="text-align: right; text-transform: uppercase" >Gross Profit</td>
                                           <td style="background-color: lightgray  ;color:black; font-size: 18px;"><?php echo e($Report->TotalOperatingincome()-$Report->TotalCostofGood()); ?></td>
                                       </tr>

                                       <tr>
                                           <td colspan="2" style="background-color: lightgray ;color:black"> Operating Expense</td>

                                       </tr>
                                       <?php $__currentLoopData = $operatingExpense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <tr>
                                               <td> <?php echo e($item->account_name); ?></td>
                                               <td> <?php echo e($Report->OperatingExpenseTotal($item->id)); ?> </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td >Total Operating Expense</td>
                                           <td style="background-color: lightgray ;color:black; font-size: 18px;"><?php echo e($Report->TotalOperatingExpense()); ?></td>
                                       </tr>
                                       <tr>
                                           <td style="text-align: right;text-transform: uppercase">Operating Profit</td>
                                           <td style="background-color: lightgray ;color:black; font-size: 18px;"><?php echo e($Report->TotalOperatingincome()-$Report->TotalCostofGood()-$Report->TotalOperatingExpense()); ?></td>
                                       </tr>

                                       <tr>
                                           <td colspan="2" style="background-color: lightgray ;color:black"> Non Operating Expense/Income</td>

                                       </tr>
                                       <?php $__currentLoopData = $nonoperatingix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <tr>
                                               <td> <?php echo e($item->account_name); ?></td>
                                               <td> <?php echo e($Report->nonoperatingixTotal($item->id)); ?> </td>
                                           </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                       <tr>
                                           <td >Total Operating Expense</td>
                                           <td style="background-color: lightgray ;color:black; font-size: 18px;"><?php echo e($Report->Totalnonoperatingix()); ?></td>
                                       </tr>
                                       <tr>
                                           <td style="text-align: right;text-transform: uppercase">Net Profit /Loss</td>
                                           <td style="background-color: lightgray  ;color:black; font-size: 18px;"><?php echo e($Report->TotalOperatingincome()-$Report->TotalCostofGood()-$Report->TotalOperatingExpense()-$Report->Totalnonoperatingix()); ?></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>