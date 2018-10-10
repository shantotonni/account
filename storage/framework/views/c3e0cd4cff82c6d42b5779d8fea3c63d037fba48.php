<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
     <?php if(Auth::user()->type==0): ?>
    <div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-grid-margin="" data-uk-sortable="">
        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <span class="peity_orders peity_data">64/100</span>
                            </div>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($total_receivale); ?></span> BDT</h2>
                            <span class="uk-text-muted uk-text-small">Total Receivable</span>

                        </div>
                        <div class="uk-width-1-2" style="text-align: right; border-left: 1px solid darkgray ">
                            <span class="uk-text-muted uk-text-small">Total Due Invoices</span>
                            <h2 class="uk-margin-remove"  ><span class="countUpMe" ><?php echo e($total_invoice); ?></span></h2>


                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <span class="peity_orders peity_data">64/100</span>
                            </div>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($total_payable); ?> </span> BDT</h2>
                            <span class="uk-text-muted uk-text-small">Total Payable</span>

                        </div>
                        <div class="uk-width-1-2" style="text-align: right; border-left: 1px solid darkgray ">
                            <span class="uk-text-muted uk-text-small">Total Due Bills</span>
                            <h2 class="uk-margin-remove"  ><span class="countUpMe" ><?php echo e($total_bill); ?></span></h2>


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div class="uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-grid-margin="" data-uk-sortable="">



        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span>
                    </div>


                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($todayincome); ?></span> BDT</h2>
                    <span class="uk-text-muted uk-text-small">Today Income</span>
                </div>
            </div>
        </div>


        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <span class="peity_orders peity_data">64/100</span>
                    </div>


                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($todayexpense); ?></span> BDT</h2>
                    <span class="uk-text-muted uk-text-small">Today Expense</span>
                </div>
            </div>
        </div>


        <div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span>
                    </div>


                    <h2 class="uk-margin-remove" id="peity_live_text"><?php echo e($cash_in_hand); ?> BDT</h2>
                    <span class="uk-text-muted uk-text-small">Cash in Hand</span>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-grid" data-uk-grid-margin>
        <div style=" width: 23%">
            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-grid-margin="" data-uk-sortable="">





                <div>
                    <div class="md-card">
                        <div class="md-card-content">

                                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                        <span class="peity_orders peity_data">64/100</span>
                                    </div>
                            <br/>

                                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($total_deposit); ?></span> BDT</h2>
                                    <span class="uk-text-muted uk-text-small">Total Deposit Today</span>





                        </div>
                    </div>
                </div>



            </div>

            <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-grid-margin="" data-uk-sortable="">





                <div>
                    <div class="md-card">
                        <div class="md-card-content">

                                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                        <span class="peity_orders peity_data">64/100</span>
                                    </div>
                            <br/>
                                    <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo e($total_withdraw); ?></span> BDT</h2>
                                    <span class="uk-text-muted uk-text-small">Total Withdrawal Today</span>





                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div style="width: 70%">
            <div class="md-card">

                    <div class="md-card">


                            <div class="uk-accordion" id="accor" data-uk-accordion>
                                <h3 class="uk-accordion-title uk-accordion-title-primary">Overdue Receivables</h3>
                                <div class="uk-accordion-content">

                                    <div class="uk-overflow-container">
                                        <table class="uk-table" id="data_table">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Invoice</th>
                                                <th class="uk-text-nowrap">Amount</th>
                                                <th class="uk-text-nowrap">Date</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $overdue_receivable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="uk-table-middle">
                                                <td class="uk-width-3-10 uk-text-nowrap"><a href="<?php echo e(route('invoice_show',$value->id)); ?>">INV- <?php echo e(str_pad($value->invoice_number,6,'0',STR_PAD_LEFT)); ?></a></td>
                                                <td class="uk-width-3-10 uk-text-nowrap"><a href="#"><?php echo e($value->due_amount); ?></a></td>
                                                <td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo e($value->payment_date); ?></span></td>


                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title uk-accordion-title-success">Overdue Payables</h3>
                                <div class="uk-accordion-content">

                                    <div class="uk-overflow-container">
                                        <table class="uk-table" id="data_table_2">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Bill</th>
                                                <th class="uk-text-nowrap">Amount</th>
                                                <th class="uk-text-nowrap">Date</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $overdue_payable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr class="uk-table-middle">
                                                    <td class="uk-width-3-10 uk-text-nowrap"><a href="<?php echo e(route('bill_show',$value->id)); ?>">BILL-<?php echo e(str_pad($value->bill_number,6,'0',STR_PAD_LEFT)); ?></a></td>
                                                    <td class="uk-width-3-10 uk-text-nowrap"><a href="#"><?php echo e($value->due_amount); ?></a></td>
                                                    <td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo e($value->due_date); ?></span></td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title uk-accordion-title-warning">Stock in Today</h3>
                                <div class="uk-accordion-content">


                                    <div class="uk-overflow-container">
                                        <table class="uk-table" id="data_table_3">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Product</th>
                                                <th class="uk-text-nowrap">Count</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $today_stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr class="uk-table-middle">
                                                    <td class="uk-width-3-10 uk-text-nowrap"><a href="#"><?php echo e($value->item->item_name); ?></a></td>
                                                    <td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo e($value->sum); ?></span></td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title uk-accordion-title-danger">Stock out Today</h3>
                                <div class="uk-accordion-content">

                                    <div class="uk-overflow-container">
                                        <table class="uk-table" id="data_table_4">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Product</th>
                                                <th class="uk-text-nowrap">Count</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $today_out_stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr class="uk-table-middle">
                                                    <td class="uk-width-3-10 uk-text-nowrap"><a href="#"><?php echo e($value->item->item_name); ?></a></td>
                                                    <td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo e($value->sum); ?></span></td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h3 class="uk-accordion-title uk-accordion-title-danger md-bg-deep-purple-A400" >Reorder</h3>
                                <div class="uk-accordion-content">
                                    <div class="uk-overflow-container">
                                        <table class="uk-table" id="data_table_5">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Product</th>
                                                <th class="uk-text-nowrap">Count</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $reorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <tr class="uk-table-middle">
                                                    <td class="uk-width-3-10 uk-text-nowrap"><a href="<?php echo e(route('inventory_show',$key)); ?>"><?php echo e($value[1]); ?></a></td>
                                                    <td class="uk-width-2-10 uk-text-nowrap"><span class="uk-badge"><?php echo e($value[0]); ?></span></td>


                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>
        </div>
    </div>

    <div id="page_content_inner">



        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">
                <a style="margin: 10px;" class="md-btn md-btn-warning md-bg-deep-orange-700 md-btn-large md-btn-wave-light md-btn-icon" data-uk-modal="{target:'#modal_default'}" href="javascript:void(0)">
                    <i class="material-icons">note_add</i>
                    Add Reminder
                </a>
            </h3>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a uk-margin-bottom">Reminders From Tomorrow</h3>
                            <div class="scrollbar-inner">




                                <div class="timeline timeline_small uk-margin-bottom" id="reminder-1">
                                    <?php $__currentLoopData = $nextreminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="timeline_item" v-for="item in items">
                                            <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                            <div class="timeline_date">

                                                <?php if(explode(' ',$value->reminddatetime)[0]=="0000-00-00"): ?>
                                                    <?php echo e(explode(' ',$value->created_at)[0]); ?> <span>At <?php echo e(explode(' ',$value->created_at)[1]); ?></span>
                                                <?php else: ?>
                                                    <?php echo e(explode(' ',$value->reminddatetime)[0]); ?> <span>At <?php echo e(explode(' ',$value->reminddatetime)[1]); ?></span>
                                                <?php endif; ?>

                                                <a class="re_delete_btn" onclick="removereminder(this); return false;"  href="<?php echo e(route('dashboard_reminder_destroy',$value->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="rem_id" value="<?php echo e($value->id); ?>">

                                            </div>
                                            <div class="timeline_content">
                                                <?php echo e($value->note); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a uk-margin-bottom">Today</h3>
                            <div class="scrollbar-inner">




                                <div class="timeline timeline_small uk-margin-bottom" id="reminder-1">
                                    <?php $__currentLoopData = $todayreminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="timeline_item" v-for="item in items">
                                            <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                            <div class="timeline_date">


                                                <?php echo e(explode(' ',$value->reminddatetime)[0]); ?> <span>At <?php echo e(explode(' ',$value->reminddatetime)[1]); ?></span>




                                                <a class="re_delete_btn" onclick="removereminder(this); return false;"  href="<?php echo e(route('dashboard_reminder_destroy',$value->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="rem_id" value="<?php echo e($value->id); ?>">

                                            </div>
                                            <div class="timeline_content">
                                                <?php echo e($value->note); ?>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php elseif((Auth::user()->type==1)): ?>
         <div id="page_content_inner">

             <h3 class="heading_b uk-margin-bottom">
                 <a style="margin: 10px;" class="md-btn md-btn-warning md-bg-deep-orange-700 md-btn-large md-btn-wave-light md-btn-icon" data-uk-modal="{target:'#modal_default'}" href="javascript:void(0)">
                     <i class="material-icons">note_add</i>
                     Add Reminder
                 </a>
             </h3>

             <div class="uk-grid" data-uk-grid-margin>
                 <div class="uk-width-1-2">
                     <div class="md-card">
                         <div class="md-card-content">
                             <h3 class="heading_a uk-margin-bottom">Reminders From Tomorrow</h3>
                             <div class="scrollbar-inner">




                                         <div class="timeline timeline_small uk-margin-bottom" id="reminder-1">
                                             <?php $__currentLoopData = $nextreminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                 <div class="timeline_item" v-for="item in items">
                                                     <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                                     <div class="timeline_date">

                                                         <?php if(explode(' ',$value->reminddatetime)[0]=="0000-00-00"): ?>
                                                             <?php echo e(explode(' ',$value->created_at)[0]); ?> <span>At <?php echo e(explode(' ',$value->created_at)[1]); ?></span>
                                                         <?php else: ?>
                                                             <?php echo e(explode(' ',$value->reminddatetime)[0]); ?> <span>At <?php echo e(explode(' ',$value->reminddatetime)[1]); ?></span>
                                                         <?php endif; ?>

                                                         <a class="re_delete_btn" onclick="removereminder(this); return false;"  href="<?php echo e(route('dashboard_reminder_destroy',$value->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                         <input type="hidden" class="rem_id" value="<?php echo e($value->id); ?>">

                                                     </div>
                                                     <div class="timeline_content">
                                                         <?php echo e($value->note); ?>

                                                     </div>
                                                 </div>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                         </div>



                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="uk-width-1-2">
                     <div class="md-card">
                         <div class="md-card-content">
                             <h3 class="heading_a uk-margin-bottom">Today</h3>
                             <div class="scrollbar-inner">




                                 <div class="timeline timeline_small uk-margin-bottom" id="reminder-1">
                                     <?php $__currentLoopData = $todayreminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                         <div class="timeline_item" v-for="item in items">
                                             <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                                             <div class="timeline_date">


                                                     <?php echo e(explode(' ',$value->reminddatetime)[0]); ?> <span>At <?php echo e(explode(' ',$value->reminddatetime)[1]); ?></span>




                                                 <a class="re_delete_btn" onclick="removereminder(this); return false;"  href="<?php echo e(route('dashboard_reminder_destroy',$value->id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                 <input type="hidden" class="rem_id" value="<?php echo e($value->id); ?>">

                                             </div>
                                             <div class="timeline_content">
                                                 <?php echo e($value->note); ?>

                                             </div>
                                         </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </div>



                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">




        var accordion = UIkit.accordion(document.getElementById('accor'), {
            showfirst:false

        });
        $('#data_table_2').DataTable();
        $('#data_table_3').DataTable();
        $('#data_table_4').DataTable();
        $('#data_table_5').DataTable();
        $('#sidebar_dashboard').addClass('current_section');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>