<?php $__env->startSection('title', 'Recruite Report'); ?>

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
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-10-10">
        <div class="md-card">
            <div class="user_content">
                <div class="uk-overflow-container uk-margin-bottom">
                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                    <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Pax ID</th>
                            <th>Passenger Name</th>
                            <th>Reference</th>
                            <th>Visa(Bill Number)</th>
                            <th>Order(Invoice Number)</th>
                            <th>Okala</th>
                            <th>Gamca</th>
                            <th>Report</th>
                            <th>Mofa</th>
                            <th>Fit Card</th>
                            <th>Poice Clearance</th>
                            <th>Masaned</th>
                            <th>Visa Stamping</th>
                            <th>Finger</th>
                            <th>Training</th>
                            <th>Manpower</th>
                            <th>Completion</th>
                            <th>Flight Submission</th>
                            <th>Flight Confirmation</th>
                            <th class="uk-text-center">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial</th>
                            <th>Pax ID</th>
                            <th>Passenger Name</th>
                            <th>Reference</th>
                            <th>Visa(Bill Number)</th>
                            <th>Order(Invoice Number)</th>
                            <th>Okala</th>
                            <th>Gamca</th>
                            <th>Report</th>
                            <th>Mofa</th>
                            <th>Fit Card</th>
                            <th>Poice Clearance</th>
                            <th>Masaned</th>
                            <th>Visa Stamping</th>
                            <th>Finger</th>
                            <th>Training</th>
                            <th>Manpower</th>
                            <th>Completion</th>
                            <th>Flight Submission</th>
                            <th>Flight Confirmation</th>
                            <th class="uk-text-center">Action</th>
                        </tr>
                        </tfoot>
                        <?php
                        $i=1;
                        ?>
                        <tbody>
                        <?php $__currentLoopData = $recruit_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $value->paxid; ?></td>
                                <td><?php echo $value->passenger_name; ?></td>
                                <td><?php echo e($value->customer['display_name']); ?></td>
                                <td><?php echo e($value->registerserial['registerSerial']); ?>

                                    <?php if($value->bill): ?>
                                    (BILL-00000<?php echo e($value->bill['bill_number']); ?>)
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?>

                                    <?php if($value->invoice): ?>
                                    (<?php echo e($value->invoice['invoice_number']); ?>)
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->okala): ?>
                                        <?php if($value->okala['status'] === 0): ?>
                                            Not Ok
                                        <?php elseif($value->okala['status'] === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php if($value->medical_slip): ?>
                                        <?php if($value->medical_slip['status'] === 0): ?>
                                            Not Ok
                                        <?php elseif($value->medical_slip['status'] === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->mofa): ?>
                                        <?php if($value->mofa['status'] === 0): ?>
                                            Not Ok
                                        <?php elseif($value->mofa['status'] === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->fitcard): ?>
                                        <?php echo e($value->fitcard['receive_date']); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($value->police?$value->police->submission_date:''); ?></td>
                                <td><?php echo e($value->musanand?$value->musanand->issue_date:''); ?></td>
                                <td><?php echo e($value->visas?$value->visas->send_date:''); ?>

                                    <br><?php echo e($value->visas?$value->visas->return_date:''); ?>

                                </td>
                                <td>
                                    <?php if($value->finger): ?>
                                        <?php if($value->finger['bmet_status'] === 0): ?>
                                            Not Ok
                                        <?php elseif($value->finger['bmet_status'] === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($value->training?$value->training->received_date:''); ?></td>
                                <td><?php echo e($value->manpower['issuingDate']); ?> </br><?php echo e($value->manpower['receivingDate']); ?></td>
                                <td><?php echo e($value->completion['smart_card_number']); ?></td>
                                <td><?php echo e($value->submission['expected_flight_date']); ?><br>
                                    <?php if($value->submission['owner_approval'] === 0): ?>
                                        Not Ok
                                    <?php elseif($value->submission['owner_approval'] === 1): ?>
                                        Ok
                                    <?php endif; ?>    
                                </td>
                                <td><?php echo e($value->confirmation['date_of_flight']); ?><br>
                                    <?php if($value->confirmation['bill']): ?>
                                    (BILL-00000<?php echo e($value->confirmation['bill']->bill_number); ?>)
                                    <?php endif; ?>
                                </td>
                                
                                <td class="uk-text-center">
                                    <a href="<?php echo e(route('customer_update' , $value->paxid)); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                    
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer_report').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>