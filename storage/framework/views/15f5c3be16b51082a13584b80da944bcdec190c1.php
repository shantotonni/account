<?php $__env->startSection('title', 'Invoice'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Invoice List</span></h2>
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
                                        <th>Invoice#</th>
                                        <th>Customer Name</th>
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
                                        <th>Invoice#</th>
                                        <th>Customer Name</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                        <th>Balance Due</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $i = 1;?>
                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($invoice->invoice_date))); ?></td>
                                            <td>INV-<?php echo e(str_pad($invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?></td>
                                            <td><?php echo e($invoice->customer->display_name); ?> </td>
                                            <td

                                                <?php if($helper->getPaymentStatus($invoice->id) == "Paid"): ?>
                                                    style="color:green;"
                                                <?php endif; ?>
                                                <?php if($helper->getPaymentStatus($invoice->id) == "Partially Paid"): ?>
                                                    style="color:blue;"
                                                <?php endif; ?>
                                                <?php if($helper->getPaymentStatus($invoice->id) == "Due to Paid"): ?>
                                                    style="color:red;"
                                                <?php endif; ?>
                                                <?php if($helper->getPaymentStatus($invoice->id) == "Draft"): ?>
                                                style="color:green;"
                                                <?php endif; ?>

                                            >
                                                <?php echo e($helper->getPaymentStatus($invoice->id)); ?>

                                            </td>
                                            <td
                                               <?php if( $helper->dueDate($invoice->id) == "Over Date"): ?>
                                                    style="color:red;"
                                               <?php endif; ?>
                                            >
                                                <?php echo e($helper->dueDate($invoice->id)); ?>

                                            </td>
                                            <td><?php echo e($invoice->total_amount); ?></td>
                                            <td>BDT <?php echo e($helper->getDueBalance($invoice->id)); ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo e(route('invoice_show', ['id' => $invoice->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i></a>
                                                <a href="<?php echo e(route('invoice_edit', ['id' => $invoice->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="invoice_id" value="<?php echo e($invoice->id); ?>">
                                                <a href="<?php echo route('invoice_mail_send_view',$invoice->id); ?>"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('invoice_create')); ?>" class="md-fab md-fab-accent branch-create">
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
        $('#sidebar_money_in').addClass('current_section');
        $('#sidebar_invoice').addClass('act_item');
        $('.delete_btn').click(function () {
            var id = $(this).next('.invoice_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this invoice all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/invoice/delete/"+id;
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>