

<?php $__env->startSection('title', 'All VisaStamp'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('msg')): ?>
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <?php echo Session::get('msg'); ?>

        </div>
    <?php endif; ?>
    <?php if(Session::has('create')): ?>
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <?php echo Session::get('create'); ?>

        </div>
    <?php endif; ?>
    <?php if(Session::has('delete')): ?>
        <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <?php echo Session::get('delete'); ?>

        </div>
    <?php endif; ?>
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
                                <h2 class="heading_b"><span class="uk-text-truncate">Visa Stamp list</span></h2>
                                <?php if(session('branch_id')==1): ?>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>

                                                    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($value->id==$id): ?>
                                                            <option value="<?php echo e(route('visastamp',$value->id)); ?>" selected><?php echo $value->branch_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e(route('visastamp',$value->id)); ?>"><?php echo $value->branch_name; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select id="d_form_select_country" data-md-selectize required>
                                                    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo e(route('visastamp',$value->id)); ?>" selected disabled><?php echo $value->branch_name; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Sending Date</th>
                                        <th>Returning Date</th>
                                        <th>Pax Id</th>
                                        <th>Comment</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Sending Date</th>
                                        <th>Returing Date</th>
                                        <th>Pax Id</th>
                                        <th>Comment</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <?php
                                    $i=1;
                                    ?>

                                    <tbody>
                                    <?php $__currentLoopData = $recruit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $value->visas['send_date']; ?></td>
                                            <td><?php echo $value->visas['return_date']; ?></td>
                                            <td><?php echo $value->paxid; ?></td>
                                            <td><?php echo $value->visas['comment']; ?></td>

                                            <?php if($value->id==$value->visas['pax_id']): ?>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo route('visastamp_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                    <?php if($value->invoice_id===null): ?>
                                                    <a href="<?php echo e(route('order_invoice_show', ['id' => $value->invoice_id?$value->invoice_id:0,'order'=>$value->id])); ?>">
                                                        <i data-uk-tooltip="{pos:'top'}" title="Invoice"class="material-icons" style="font-size: 30px;color: darkgray">I</i>
                                                    </a>
                                                        <?php else: ?>
                                                        <a href="<?php echo e(route('order_invoice_show', ['id' => $value->invoice_id?$value->invoice_id:0,'order'=>$value->id])); ?>">
                                                            <i data-uk-tooltip="{pos:'top'}" title="Invoice"class="material-icons" style="font-size: 30px;color: green">I</i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                           <td></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->
                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('visastamp_create')); ?>" class="md-fab md-fab-accent branch-create">
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
        $('#visa_stamp').addClass('act_item');

        function deleterow(link) {
            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>