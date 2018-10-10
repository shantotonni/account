<?php $__env->startSection('title', 'Bill'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .uk-form-select{
            color:rgba(0, 0, 0, 0.8) !important;
        }
        .styled-select select {
            background: transparent;
            border: none;
            font-size: 18px;
            height: 29px;
            padding: 5px; /* If you add too much padding here, the options won't show in IE */
            width: 90%;

        }

        .styled-select.slate {
            
            height: 34px;
            width: 240px;
            z-index: 10;
        }

        .styled-select.slate select {

            border-bottom: 1px solid #ccc;
            font-size: 16px;
            height: 34px;
            width: 268px;
        }
        .styled-select.slate option{
            font-size: 16pt;

        }
        .slate   { background-color: #ddd; }
        .slate select   { color: #000; }
        @media  screen and (-webkit-min-device-pixel-ratio:0)
        {
            .styled-select.slate {
                background: url(<?php echo e(asset('admin/assets/icons/arrow_down.jpg')); ?>) no-repeat right center;

            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="md-card-toolbar" style="">
                            <div class="md-card-toolbar-actions hidden-print">




                                <!--end  -->
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Custom Setting</span></a>

                                </div>
                                <!--coustorm setting modal start -->
                                <div class="uk-modal" id="coustom_setting_modal">
                                    <div class="uk-modal-dialog">
                                        <?php echo Form::open(['url' => 'bill', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']); ?>

                                        <div class="uk-modal-header">
                                            <h3 class="uk-modal-title">Select Date Range <?php echo e(session('branch_id')==1?"and Branch":''); ?>   <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                        </div>

                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <?php if(session('branch_id')==1): ?>
                                                <div class="uk-width-medium-2-2">
                                                    <div class="uk-input-group">
                                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-building"></i></span>

                                                        <select style="width: 90%" class="styled-select slate"  id="report_account_id" name="branch_id" >

                                                            <?php if(isset($branch_id)): ?>
                                                                <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option <?php echo e(($branch_id==$branch->id)?"selected":''); ?> value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php else: ?>
                                                                <?php $__currentLoopData = $branchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <option  value="<?php echo e($branch->id); ?>"><?php echo e($branch->branch_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                            <?php endif; ?>
                                                        </select>

                                                    </div>
                                                    <br/>
                                                </div>
                                            <?php endif; ?>
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">From</label>
                                                    <input value="<?php echo e(isset($from_date)?$from_date:date('Y-m-d')); ?>" required class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                                </div>
                                            </div>
                                            <div class="uk-width-large-2-2 uk-width-2-2">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                    <label for="uk_dp_1">To</label>
                                                    <input value="<?php echo e(isset($to_date)?$to_date:date('Y-m-d')); ?>" required class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
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
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Bill List</span></h2>
                            </div>
                        </div>

                        <?php
                            $helper = new \App\Lib\Helpers;
                        ?>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Bill#</th>
                                        <th>Order Number</th>
                                        <th>Vendor Name</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th>Balance Due</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Bill#</th>
                                        <th>Oredr Number</th>
                                        <th>Vendor Name</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th>Balance Due</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($bill->bill_date))); ?></td>
                                            <td>BILL-<?php echo e($bill->bill_number); ?></td>
                                            <td><?php echo e($bill->order_number); ?></td>
                                            <td><?php echo e($bill->customer->display_name); ?></td>
                                            <td><?php echo $bill->save?"<span style='color:#7cb342;'>Draft</span>":"Pending"; ?> </td>
                                            <td
                                                    <?php if( $helper->billDueDate($bill->id) == "Over Date"): ?>
                                                    style="color:red;"
                                                    <?php endif; ?>
                                            >
                                                <?php echo e($helper->billDueDate($bill->id)); ?>

                                            </td>
                                            <td><?php echo e($bill->amount); ?></td>
                                            <td><?php echo e($bill->due_amount); ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo e(route('bill_show', ['id' => $bill->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i></a>
                                                <a href="<?php echo e(route('bill_edit', ['id' => $bill->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="bill_id" value="<?php echo e($bill->id); ?>">
                                                <a href="<?php echo route('bill_send_view',$bill->id); ?>"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('bill_create')); ?>" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_bill').addClass('act_item');

        $('.delete_btn').click(function () {
            var id = $(this).next('.bill_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this invoice all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/bill/delete/" + id;
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>