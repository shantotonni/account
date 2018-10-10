<?php $__env->startSection('title', 'Access Level'); ?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-2-10">
                <div class="md-list-outside-wrapper">
                    <?php echo $__env->make('inc.settings_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        </div>
                        <div class="user_heading_content">
                            <h2 class="heading_b"><span class="uk-text-truncate">Role List</span></h2>
                        </div>
                    </div>
                    <div class="user_content">
                        <div class="uk-overflow-container uk-margin-bottom">
                            <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                            <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th class="uk-text-center">Action</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th class="uk-text-center">Action</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                <?php $count = 1; ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($count++); ?></td>
                                        <td><?php echo e($role->name); ?></td>
                                        <td>ABC</td>
                                        <td><?php echo e($role->updated_at); ?></td>
                                        <td class="uk-text-center">
                                            <a href="<?php echo e(route('role_edit',['id' => $role->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                            <a href="<?php echo e(route('role_delete',['id' => $role->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Add branch plus sign -->

                        <div class="md-fab-wrapper branch-create">
                            <a id="add_branch_button" href="<?php echo e(route('role_create')); ?>" class="md-fab md-fab-accent branch-create">
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
    <script type="text/javascript">
        $('#settings_menu_roles').addClass('md-list-item-active');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>