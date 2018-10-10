<?php $__env->startSection('title', 'Estimate'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate"> Estimate </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>

                                        <th>Reference#</th>
                                        <th>Subject </th>
                                        <th>Attn</th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>

                                        <th>Reference#</th>
                                        <th>Subject </th>
                                        <th>Attn</th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $count = 1; ?>
                                    <?php $__currentLoopData = $estimate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($count++); ?></td>
                                            <td><?php echo e(date('d-m-Y', strtotime($value->date))); ?></td>
                                            <td><?php echo e($value->customer->display_name); ?></td>
                                            <td><?php echo e(str_pad($value->estimate_number,6,"0",STR_PAD_LEFT)); ?></td>
                                            <td><?php echo e($value->ref); ?></td>
                                            <td><?php echo e(str_limit($value->subject,20)); ?></td>
                                            <td><?php echo e($value->attn); ?></td>

                                            <td>
                                                <a href="<?php echo e(route('estimateentry_invoice', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Convert To Invoice"  class="md-icon material-icons" >swap_horiz</i>
                                                </a>
                                                <a href="<?php echo e(route('estimate_pdf', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View"  class="md-icon material-icons">picture_as_pdf</i>
                                                </a>
                                                <a href="<?php echo e(route('estimate_print', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View"  class="md-icon material-icons">print</i>
                                                </a>
                                                <a href="<?php echo e(route('estimate_edit', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="estimate_id" value="<?php echo e(route('estimate_destroy',$value->id)); ?>">
                                                <a href="<?php echo route('estimate_mail_send_view',$value->id); ?>"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('estimate_create')); ?>" class="md-fab md-fab-accent branch-create">
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
        $('.delete_btn').click(function () {
            var url = $(this).next('.estimate_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = url;
            })
        })
    </script>
    <script type="text/javascript">
        $('#sidebar_money_in').addClass('current_section');
        $('#sidebar_estimate').addClass('act_item');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>