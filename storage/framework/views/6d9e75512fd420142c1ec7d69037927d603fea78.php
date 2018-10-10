<?php $__env->startSection('title', 'Gamca'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Gamca</span></h2>
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Application Date</th>
                                        <th>Pax Id</th>
                                        <th>Passport Received</th>
                                        <th>Passport Submitted</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Application Date</th>
                                        <th>Pax Id</th>
                                        <th>Passport Received</th>
                                        <th>Passport Submitted</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <?php
//                                        $d=new \App\Lib\Helpers;
                                    $i=1;
                                    ?>

                                    <tbody>
                                    <?php $__currentLoopData = $basis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->dateOfApplication; ?></td>
                                                <td>
                                                    <?php $i=0; ?>
                                                    <?php $__currentLoopData = $value->medicalslipFromPax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($i>0): ?>, <?php endif; ?>
                                                        <?php echo $item->paxid; ?>

                                                        <? $i++; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </td>

                                                <td>
                                                    <?php $i=0; ?>
                                                    <?php $__currentLoopData = $value->gamca_received_submit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($i>0): ?>, <?php endif; ?>
                                                        <?php if($item->received_status): ?>
                                                            <?php echo $item->medicalslipFromPax->paxid; ?>

                                                        <?php endif; ?>
                                                        <? $i++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </td>

                                                <td>
                                                    
                                                    <?php $i=0; ?>
                                                    <?php $__currentLoopData = $value->gamca_received_submit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($i>0): ?>, <?php endif; ?>
                                                        <?php if($item->submitted_status): ?>
                                                            <?php echo $item->medicalslipFromPax->paxid; ?>

                                                        <?php endif; ?>
                                                        <? $i++; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </td>

                                                <td class="uk-text-center">
                                                    <a href="<?php echo route('medical_slip_form_download',$value->id); ?>" class="batch-edit"><i class="material-icons">file_download</i></a>
                                                    <a href="<?php echo route('medical_slip_form_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                    <input type="hidden" class="form_medical_id" value="<?php echo e($value->id); ?>">
                                                </td>
                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="<?php echo route('medical_slip_form_create'); ?>" class="md-fab md-fab-accent branch-create">
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
            var id = $(this).next('.form_medical_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this invoice all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "<?php echo route('medical_slip_form_delete'); ?>"+"/"+id;
            })
        })

        function deleterow(link) {
            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>
    <script type="text/javascript">
        // $(window).load(function(){
        //     $("#sidebar_hrmbb").trigger('click');
        // })
        // $('#sidebar_recruit').addClass('current_section');
        // $('#sidebar_hrmbb').addClass('act_item');

        $('#sidebar_recruit').addClass('current_section');

        $('#medical_slip_form_indexsss').addClass('act_item');

        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>