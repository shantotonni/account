<?php $__env->startSection('title', 'Recruiting Order'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Order List</span></h2>
                            </div>
                        </div>

                        <?php 
                            $i=1;
                         ?>


                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Package</th>
                                        <th>Register Serial</th>
                                        <th>passportNumber</th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Package</th>
                                        <th>Register Serial</th>
                                        <th>passportNumber</th>



                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($value->customer->display_name); ?></td>
                                            <td><?php echo e($value->package->item_name); ?></td>
                                            <td><?php echo e($value->registerserial->visaNumber); ?></td>

                                            <td><?php echo e($value->passportNumber); ?></td>


                                            <td class="uk-text-center">

                                                <a href="<?php echo e(route('order_invoice_show', ['id' => $value->invoice_id?$value->invoice_id:0,'order'=>$value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Invoice"class="material-icons">library_books</i>
                                                </a>
                                                <a href="<?php echo e(route('order_edit', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="order_id" value="<?php echo e($value->id); ?>">

                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('order_create')); ?>" class="md-fab md-fab-accent branch-create">
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


        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_recruit_order').addClass('act_item');


        $('.delete_btn').click(function () {
            var id = $(this).next('.order_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this order all record will be deleted related to this Order",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "<?php echo e(route('order_delete')); ?>"+"/"+id;
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>