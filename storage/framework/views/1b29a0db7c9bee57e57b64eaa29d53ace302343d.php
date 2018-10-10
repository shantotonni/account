<?php $__env->startSection('title', 'Finger'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <?php echo $__env->make('inc.customer_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>





            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <?php if(Session::has('alert.status')): ?>
                    <div class="uk-alert uk-alert-<?php echo Session::get('alert.status')=="success"? "success":"warning"; ?>" data-uk-alert>
                        <a href="#" class="uk-alert-close uk-close"></a>
                        <?php echo Session::get('alert.message'); ?>

                    </div>
                <?php endif; ?>

                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">

                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Customer Finger</span></h2>
                            </div>
                        </div>
            <div class="md-card-content">


                <div class="uk-overflow-container uk-margin-bottom">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                        <thead>
                        <tr>
                            <th data-priority="critical">Serial</th>
                            <th data-priority="2">Date</th>
                            <th data-priority="6">Pax Id</th>
                            <th data-priority="6">Number</th>
                            <th data-priority="6">Center Name</th>
                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th data-priority="critical">Serial</th>
                            <th data-priority="2">Date</th>
                            <th data-priority="6">Pax Id</th>
                            <th data-priority="6">Number</th>
                            <th data-priority="6">Center Name</th>
                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                        </tr>
                        </tfoot>

                        <?php 
                            $i=1;
                         ?>

                        <tbody>

                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $recruit->training['received_date']; ?></td>
                                <td><?php echo $recruit->paxid; ?></td>
                                <td><?php echo $recruit->training['number']; ?></td>
                                <td><?php echo $recruit->training['center_name']; ?></td>

                                <?php if($recruit->id==$recruit->training['paxid']): ?>
                                    <td class="uk-text-center">
                                        <a href="<?php echo route('training_edit',$recruit->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                    </td>
                                <?php else: ?>
                                    <td class="uk-text-center">
                                        <a href="<?php echo route('training_create',$recruit->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">+</i></a>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        </tbody>

                    </table>
                </div>
                <ul class="uk-pagination ts_pager">
                    <li data-uk-tooltip title="Select Page">
                        <select class="ts_gotoPage ts_selectize"></select>
                    </li>
                    <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                    <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                    <li><span class="pagedisplay"></span></li>
                    <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                    <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                    <li data-uk-tooltip title="Page Size">
                        <select class="pagesize ts_selectize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
             </div>
         </div>
        </div>
    </div>
    <script>

        function deleterow(link) {
            UIkit.modal.confirm('Are you sure?', function(){
                window.location.href = link;
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>

        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer').addClass('act_item');
        $('.training_finger').addClass('md-bg-blue-grey-100');

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>