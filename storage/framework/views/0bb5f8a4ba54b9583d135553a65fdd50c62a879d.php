

<?php $__env->startSection('title', 'Product Track'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h3 class="heading_b uk-margin-bottom">Product Track</h3>

    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-overflow-container uk-margin-bottom">
                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Phase</th>
                        <th>Total</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Phase</th>
                        <th>Total</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        <?php $count = 1; ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($count++); ?></td>
                            <td><?php echo e($product->product_name); ?></td>
                            <td>
                                <?php $__currentLoopData = $product->productPhases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phase): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                                    <?php if($phase->status == 0): ?>
                                    <a class="md-btn md-btn-flat md-btn-flat-danger md-btn-wave waves-effect waves-button" href="javascript:void(0)"><?php echo e($phase->product_phase_name); ?></a>
                                    <?php else: ?>
                                    <a class="md-btn md-btn-flat md-btn-flat-success md-btn-wave waves-effect waves-button" href="javascript:void(0)"><?php echo e($phase->product_phase_name); ?></a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </td>
                            <td><?php echo e($product->total_product); ?></td>
                            <td><?php echo e($product->updated_at); ?></td>
                            <td><?php echo e($product->updatedBy->name); ?></td>
                            <td class="uk-text-center">
                                <a href="<?php echo e(route('product_item_list',['id' => $product->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">&#xE8F4;</i></a>
                                <a href="<?php echo e(route('track_edit',['id' => $product->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                <a href="<?php echo e(route('track_delete',['id' => $product->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                <a href="<?php echo e(route('product_item_add',['id' => $product->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Add Item" class="md-icon material-icons">&#xE147;</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="<?php echo e(route('track_create')); ?>">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('#sidebar_inventory').addClass('current_section');
        $('#sidebar_inventory_product').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>