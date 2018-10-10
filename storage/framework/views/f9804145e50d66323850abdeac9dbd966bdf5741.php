<?php $__env->startSection('title', 'Visa Form'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Visa Forms List</span></h2>
                            </div>
                        </div>

                        <?php 
                            $i=1;
                         ?>

                        <?php $Reference = app('App\Lib\Helpers'); ?>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>

                                        <th>Serial</th>
                                        <th>Pax Id</th>
                                        <th>Created At</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>

                                        <th>Serial</th>
                                        <th>Pax Id</th>
                                        <th>Created At</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $__currentLoopData = $visa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
                                            <td> <?php echo e($value->pax->paxid); ?></td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td class="uk-text-center">

                                                <a href="<?php echo e(route('visaform_agreement_paper', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Paper"   class="md-icon material-icons">layers</i>
                                                </a>
                                                <a href="<?php echo e(route('visaform_work_agreement', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Work Agreement"   class="md-icon material-icons">local_library</i>
                                                </a>

                                                <a href="<?php echo e(route('visaform_print', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Print"  class="md-icon material-icons" style="font-size: 20px;">&#xE8AD;</i>
                                                </a>

                                                <a href="<?php echo e(route('visaform_edit', ['id' => $value->id])); ?>">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons" style="font-size: 20px;">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons" style="font-size: 20px;">&#xE872;</i></a>
                                                <input type="hidden" class="visaform_id" value="<?php echo e($value->id); ?>">

                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo e(route('visaform_create')); ?>" class="md-fab md-fab-accent branch-create">
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
            var id = $(this).next('.visaform_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this Visa form all record will be deleted related to this Visa form",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                if(id){
                    window.location.href = "<?php echo e(route('visaform_destroy')); ?>"+"/"+id;
                }else {
                    window.location.href = "<?php echo e(route('visaform_destroy')); ?>"+"/"+"%00";
                }

            })
        })

        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_visa_form_m').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
            $("#ticktok3").trigger('click');
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>