<?php $__env->startSection('title', 'All Customer'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
            <div class="uk-width-large-10-10">
                <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                    <div class="user_heading_content">
                        <h2 class="heading_b"><span class="uk-text-truncate">Customer</span></h2>
                        <?php if(session('branch_id')==1): ?>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <div class="parsley-row">
                                        <select onchange="location = this.value;" id="d_form_select_country" data-md-selectize required>
                                            <option value="">Select Branch...</option>

                                            <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($value->id==$id): ?>
                                                    <option value="<?php echo e(route('customer',$value->id)); ?>" selected><?php echo $value->branch_name; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e(route('customer',$value->id)); ?>"><?php echo $value->branch_name; ?></option>
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
                                                <option value="<?php echo e(route('customer',$value->id)); ?>" selected disabled><?php echo $value->branch_name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-content">

                        <div class="uk-margin-bottom">
                            <a href="#" class="md-btn uk-margin-right" id="printTable">Print Table</a>
                            <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                                <button class="md-btn">Columns <i class="uk-icon-caret-down"></i></button>
                                <div class="uk-dropdown">
                                    <ul class="uk-nav uk-nav-dropdown" id="columnSelector"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="uk-overflow-container uk-margin-bottom">
                            <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="data_table">
                                <thead>
                                <tr>
                                    <th data-priority="critical">Serial</th>
                                    <th data-priority="2">PaxID</th>
                                    <th data-priority="6">Passenger Name</th>
                                    <th data-priority="6">Passport Number</th>
                                    <th data-priority="1">Contact Number</th>
                                    <th data-priority="2">Reference Name</th>
                                    <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th data-priority="critical">Serial</th>
                                    <th data-priority="2">PaxID</th>
                                    <th data-priority="6">Passenger Name</th>
                                    <th data-priority="6">Passport Number</th>
                                    <th data-priority="1">Contact Number</th>
                                    <th data-priority="2">Reference Name</th>
                                    <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                                </tr>
                                </tfoot>
                                <?php
                                $i=1;
                                ?>
                                <tbody>
                                <tr>
                                    <?php $__currentLoopData = $recruit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $value->paxid; ?></td>
                                        <td><?php echo $value->passenger_name; ?></td>
                                        <td><?php echo $value->passportNumber; ?></td>
                                        <td><?php echo $value->customer['phone_number_1']; ?></td>
                                        <!-- <td><?php echo $value->customer['first_name']; ?></td> -->
                                        <td><?php echo $value->customer['display_name']; ?></td>
                                    <td class="uk-text-center">
                                        <a href="<?php echo e(route('customer_update',$value->paxid)); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                       
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer').addClass('act_item');
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>