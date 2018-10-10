<?php $__env->startSection('title', 'Ticket Hotel List'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="page_content_inner">
        <!-- statistics (small charts) -->
        <div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>

            <form class="form-inline" method="post" action="<?php echo route('ticket_dashboard_filter'); ?>">
                <div class="uk-grid" data-uk-grid-margin="">
                    <div class="uk-width-large-1-4 uk-width-medium-1-1">
                        <div class="uk-input-group">
                            <label for="uk_dp_end">Start Date</label>
                            <input class="md-input" name="from_date" value="<?php echo $start; ?>" data-uk-datepicker="{format:'YYYY-MM-DD'}" type="text" required>
                        </div>
                        <?php if($errors->has('from_date')): ?>
                            <span style="color:red"><?php echo $errors->first('from_date'); ?></span>
                        <?php endif; ?>
                    </div>

                    <?php echo csrf_field(); ?>


                    <div class="uk-width-large-1-4 uk-width-medium-1-1">
                        <div class="uk-input-group">
                            <label for="uk_dp_end">To Date</label>
                            <input class="md-input" name="to_date" value="<?php echo $end; ?>" data-uk-datepicker="{format:'YYYY-MM-DD'}" type="text" required>
                        </div>
                        <?php if($errors->has('to_date')): ?>
                            <span style="color:red"><?php echo $errors->first('to_date'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="uk-width-large-1-4 uk-width-medium-1-1">
                        <div class="uk-width-medium-1-6">
                            <button class="md-btn" type="submit" data-uk-button>Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-2-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable data-uk-grid-margin>
            <div>
                <div class="md-card md-card-hover md-card-overlay" style="height: 80px">
                    <div class="md-card-content">
                        <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                            <?php if(count($order)>0): ?>
                            <h1><?php echo count($order); ?></h1>
                                <?php else: ?>
                                <h1>Empty</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="md-card-overlay-content" style="background: #02A8F3;color: white;font-weight: bold;">
                        <div class="uk-clearfix md-card-overlay-header">
                            <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                            <h3>
                                Total Issued Order
                            </h3>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consectetur.
                    </div>
                </div>
            </div>

            <div>
                <div class="md-card md-card-hover md-card-overlay" style="height: 80px">
                    <div class="md-card-content">
                        <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                            <?php $v=0; ?>
                            <h1>
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                   <?php $v+=$value->invoice['total_amount'] ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                   <?php echo $v; ?>

                            </h1>
                        </div>
                    </div>
                    <div class="md-card-overlay-content" style="background: #D62728;color: white;font-weight: bold;">
                        <div class="uk-clearfix md-card-overlay-header">
                            <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                            <h3>
                                Total Invoice Amount
                            </h3>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consectetur.
                    </div>
                </div>
            </div>

            <div>
                <div class="md-card md-card-hover md-card-overlay" style="height: 80px">
                    <div class="md-card-content">
                        <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                            <?php $v=0; ?>
                            <h1>
                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php $v+=$value->bill['amount'] ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php echo $v; ?>

                            </h1>
                        </div>
                    </div>
                    <div class="md-card-overlay-content" style="background: green;color: white;font-weight: bold;">
                        <div class="uk-clearfix md-card-overlay-header">
                            <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                            <h3>
                                Total Payable
                            </h3>
                        </div>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consectetur.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(Session::has('msg')): ?>
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            <?php echo Session::get('msg'); ?>

        </div>
    <?php endif; ?>
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Passenger Name</th>
                                        <th>Ticket Number</th>

                                        <th>Destination Sector</th>
                                        <th>Invoice Amount</th>
                                        <th>Payable</th>
                                        <th>Status</th>
                                        <th>Vendor</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Passenger Name</th>
                                        <th>Ticket Number</th>
                                        <th>Destination Sector</th>
                                        <th>Invoice Amount</th>
                                        <th>Payable</th>
                                        <th>Status</th>
                                        <th>Vendor</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo $value->created_at; ?></td>
                                            <td><?php echo $value->order_id; ?></td>
                                            <td><?php echo $value->contact['display_name']; ?></td>
                                            <td><?php echo $value['first_name']." ". $value['last_name']; ?></td>
                                            <td><?php echo $value->ticket_number; ?></td>
                                            <td><?php echo $value->departureSector; ?></td>
                                            <td><?php echo $value->invoice['total_amount']; ?></td>
                                            <td><?php echo $value->bill['amount']; ?></td>
                                            <?php if($value->status==0): ?>
                                            <td class="btn btn-danger" style="color: red">Pending</td>
                                            <?php else: ?>
                                                <td class="btn btn-success" style="color: green">Confirm</td>
                                                <?php endif; ?>
                                            <td><?php echo $value->vendor['display_name']; ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo route('ticket_Order_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                            </td>
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

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="second_table" >
                                    <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Total Order</th>
                                        <th>Total Bill</th>
                                        <th>Total Payable</th>
                                        <th>Total Paid</th>
                                        <th>Balance</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Total Order</th>
                                        <th>Total Bill</th>
                                        <th>Total Payable</th>
                                        <th>Total Paid</th>
                                        <th>Balance</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $__currentLoopData = $total; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo $value->display_name; ?></td>
                                            <?php $__currentLoopData = $total2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($value->vendor_id==$item->id): ?>
                                            <td><?php echo $item->total; ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <td><?php echo $value->total_bill; ?></td>
                                            <td><?php echo $value->total_amount; ?></td>
                                            <td><?php echo ($value->total_amount)-($value->due_amount); ?></td>
                                            <td><?php echo $value->due_amount; ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo route('ticket_Order_total_show',[$value->vendor_id,'start'=>$start,'end'=>$end]); ?>" class="batch-edit"><i class="material-icons">&#xE417;</i></a>
                                            </td>
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
        $('#sidebar_ticketing').addClass('current_section');
        $('#sidebar_ticket_dashboard').addClass('act_item');
        $('#second_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>