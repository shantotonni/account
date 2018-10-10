<?php $__env->startSection('title', 'Submission'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Submission List</span></h2>
                                <?php if(session('branch_id')==1): ?>
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <div class="parsley-row">
                                                <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                                    <option value="">Select Branch...</option>
                                                    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($value->id==$id): ?>
                                                            <option value="<?php echo e(route('submission',$value->id)); ?>" selected><?php echo $value->branch_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e(route('submission',$value->id)); ?>"><?php echo $value->branch_name; ?></option>
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
                                                        <option value="<?php echo e(route('submission',$value->id)); ?>" selected disabled><?php echo $value->branch_name; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
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
                                        <th>Pax Id</th>
                                        <th>Submission Date</th>
                                        <th>Flight Date</th>
                                        <th>Due-Amount</th>
                                        <th class="uk-text-center">Action</th>
                                        <th class="uk-text-center">Owner Approval</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Pax Id</th>
                                        <th>Submission Date</th>
                                        <th>Flight Date</th>
                                        <th>Due-Amount</th>
                                        <th class="uk-text-center">Action</th>
                                        <th class="uk-text-center">Owner Approval</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $__currentLoopData = $recruit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($value->paxid); ?></td>
                                            <td><?php echo e($value->submission['submission_date']); ?></td>
                                            <td><?php echo e($value->submission['expected_flight_date']); ?></td>
                                            <td><?php echo e($value->invoice['due_amount']); ?></td>

                                            <?php if($value->id==$value->submission['pax_id']): ?>
                                                <td class="uk-text-center">
                                                    <?php if($value->newflight): ?>
                                                    <a title="flight pdf" href="<?php echo route('flight_card_pdf',$value->id); ?>" class="batch-edit"><i class="material-icons">&#xE415;</i></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo route('submission_edit',$value->submission['id']); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                </td>
                                            <?php else: ?>
                                                <td class="uk-text-center">

                                                    <?php if($value->newflight): ?>
                                                    <a title="flight pdf" href="<?php echo route('flight_card_pdf',$value->id); ?>" class="batch-edit"><i class="material-icons">&#xE415;</i></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo route('submission_create',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">+</i></a>
                                                </td>
                                            <?php endif; ?>

                                            <?php if($value->submission['owner_approval']==1): ?>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo route('owner_approval',$value->id); ?>" class="batch-edit"><i class="material-icons" style="color: green">&#xE913;</i></a>
                                                </td>
                                                <?php elseif($value->submission['owner_approval']===0): ?>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo route('owner_approval',$value->id); ?>" class="batch-edit"><i class="material-icons" style="color: red">&#xE913;</i></a>
                                                </td>
                                               <?php elseif($value->submission['owner_approval']==null): ?>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo route('owner_approval',$value->id); ?>" class="batch-edit"><i class="material-icons" style="color: darkgray">&#xE913;</i></a>
                                                </td>
                                            <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_submission').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })

        $('.delete_btn').click(function () {
            var id = $(this).next('.mofa_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this Mofa all record will be deleted related to this MOFA",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "<?php echo e(route('fit_card_delete')); ?>"+"/"+id;
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>