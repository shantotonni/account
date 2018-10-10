<?php $__env->startSection('title', 'Recruit Deshboard'); ?>

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
                                    <?php $__currentLoopData = $Rorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                <td><?php echo $value->paxid; ?></td>
                                <td><?php echo $value->passenger_name; ?></td>
                                <td><?php echo e($value->customer['display_name']); ?></td>
                                <td><?php echo e($value->registerserial['registerSerial']); ?>

                                    <?php if($value->bill): ?>
                                    (BILL-00000<?php echo e($value->bill->bill_number); ?>)
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?>

                                    <?php if($value->invoice): ?>
                                    (<?php echo e($value->invoice->invoice_number); ?>)
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->okala): ?>
                                        <?php if($value->okala->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->okala->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php if($value->medical_slip): ?>
                                        <?php if($value->medical_slip->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->medical_slip->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->mofa): ?>
                                        <?php if($value->mofa->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->mofa->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($value->fitcard): ?>
                                        <?php echo e($value->fitcard->receive_date); ?>

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


    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-5-10">
            <h2 style="background-color: #7CB343;text-align: center;color: white">Mofas Reminder</h2>
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                        <table class="uk-table" cellspacing="0" width="100%" id="third_table" >
                            <thead>
                            <tr>
                                <th>Pax ID</th>
                                <th>Passenger Name</th>
                                <th>Ref Name</th>
                                <th>Time Left</th>
                                <th>Report Date</th>
                                
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Pax ID</th>
                                <th>Passenger Name</th>
                                <th>Ref Name</th>
                                <th>Time Left</th>
                                <th>Report Date</th>
                                
                            </tr>
                            </tfoot>
                            <?php
                            $i=1;
                            ?>
                            <tbody>
                            <?php $__currentLoopData = $recruit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo $value->paxid; ?></td>
                                    <td><?php echo e($value->passenger_name); ?></td>
                                    <td><?php echo e($value->display_name); ?></td>
                                    <td>
                                        <?php

                                            $my_date = new DateTime($value->medical_report_date);
                                            $my_date->modify('+3 day');

                                            $my_date2 = new DateTime(date('Y-m-d'));
                                            if ($my_date<$my_date2){
                                                echo '0 Days';
                                            }else{

                                                echo $my_date2->diff($my_date)->days.' Days';
                                            }


                                        ?>
                                    </td>
                                    <td><?php echo e($value->medical_report_date); ?></td>

                                    
                                        
                                    
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-large-5-10">
            <h2 style="background-color: #7CB343;text-align: center;color: white">Processing Reminder</h2>
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                        <table class="uk-table" cellspacing="0" width="100%" id="second_table" >
                            <thead>
                            <tr>
                                <th>Pax ID</th>
                                <th>Passenger Name</th>
                                <th>Ref Name</th>
                                <th>Time Left</th>
                                <th>Fit Card Date</th>
                                
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Pax ID</th>
                                <th>Passenger Name</th>
                                <th>Ref Name</th>
                                <th>Time Left</th>
                                <th>Fit Card Date</th>
                                
                            </tr>
                            </tfoot>
                            <?php
                            $i=1;
                            ?>
                            <tbody>
                            <?php $__currentLoopData = $recruit2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>

                                    <td><?php echo $value->paxid; ?></td>
                                    <td><?php echo e($value->passenger_name); ?></td>
                                    <td><?php echo e($value->display_name); ?></td>
                                    <td class="uk-text-center">
                                        <?php

                                        $my_date = new DateTime($value->receive_date);
                                        $my_date->modify('+70 day');

                                        $my_date2 = new DateTime(date('Y-m-d'));
                                        if ($my_date<$my_date2){
                                            echo '0 Days';
                                        }else{

                                            echo $my_date2->diff($my_date)->days.' Days';
                                        }

                                        ?>
                                    </td>
                                    <td><?php echo e($value->receive_date); ?></td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-5-10">
            <h2 style="background-color: #7CB343;text-align: center;color: white">Cancelled Orders</h2>
            <div class="md-card">
                <div class="user_content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                        <table class="uk-table" cellspacing="0" width="100%" id="fourth_table" >
                            <thead>
                            <tr>
                                <th>Ref. Name</th>
                                <th>Cancelled Order</th>
                                <th>Substitute Order</th>
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Ref. Name</th>
                                <th>Cancelled Order</th>
                                <th>Substitute Order</th>
                                <th>Last Updated</th>
                            </tr>
                            </tfoot>
                            <?php
                            $i=1;
                            ?>
                            <tbody>
                            <?php $__currentLoopData = $cancelled_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo $value->display_name; ?></td>
                                    <td><?php echo e($value->paxid); ?> (<?php echo e($value->passenger_name); ?>)</td>
                                    <td><?php echo e($value->substitued_order); ?></td>
                                    <td>
                                        <?php echo e($value->updated_by); ?>

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
        $('#sidebar_recruit_dashboard').addClass('act_item');
        $('#second_table').DataTable();
        $('#third_table').DataTable();
        $('#fourth_table').DataTable();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>