

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
                                <div style="padding: 5px;margin-bottom: 10px; width: 100%" class="dt_colVis_buttons"></div>
                                <table class="uk-table " style="" cellspacing="0" width="100%" id="saven_table" >
                                    <thead>
                                    <tr>
                                        <th style="width: 4px">#</th>
                                        <th style="width: 4px">#Serial</th>
                                        <th id="reset_width">Pax ID</th>
                                        <th >Passenger Name</th>
                                        <th >Reference</th>
                                        <th >Visa(Bill Number)</th>
                                        <th style="display: none;">Order(Invoice Number)</th>
                                        <th style="display: none;">Okala</th>
                                        <th style="display: none;">Gamca</th>
                                        <th style="display: none;">Report</th>
                                        <th style="display: none;">Mofa</th>
                                        <th style="display: none;">Fit Card</th>
                                        <th style="display: none;">Poice Clearance</th>
                                        <th style="display: none;">Masaned</th>
                                        <th style="display: none;">Visa Stamping</th>
                                        <th style="display: none;">Finger</th>
                                        <th style="display: none;">Training</th>
                                        <th style="display: none;">Manpower</th>
                                        <th style="display: none;">Completion</th>
                                        <th style="display: none;">Flight Submission</th>
                                        <th  style="display: none;">Flight Confirmation</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $i=1;
                                    ?>
                                    <tbody id="saven_table_body">
                                    <?php $__currentLoopData = $Rorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <tr id="toggle_details">
                                            <td style="font-size: 20px; color: #2196f3;width: 50px;">&#43;</td>
                                            <td><?php echo e($i++); ?></td>
                                <td id="col_details">
                                    <?php echo $value->paxid; ?>

                                    <table id="details" style="width: 100%; display: none ;font-size: 11px;">
                                        <tr ><td colspan="4"><button class="md-btn md-btn-warning md-btn-wave-light waves-effect waves-button waves-light" id="hide">Close</button></td></tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>Details</td>

                                        </tr>
                                        <tr>
                                            <td>Order(Invoice Number)</td>
                                            <td>
                                                <?php echo e(date('d-m-Y', strtotime($value->created_at))); ?>

                                                <?php if($value->invoice): ?>
                                                    (<?php echo e($value->invoice->invoice_number); ?>)
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Okala</td>
                                            <td>
                                                <?php if($value->okala): ?>
                                                    <?php if($value->okala->status === 0): ?>
                                                        Not Ok
                                                    <?php elseif($value->okala->status === 1): ?>
                                                        Ok
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Medical Slip</td>
                                            <td>
                                               <?php echo e($value->medicalslipFromPax->last()['dateOfApplication']); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Report</td>
                                            <td>
                                                <?php if($value->medical_slip): ?>
                                                    <?php if($value->medical_slip->status === 0): ?>
                                                        Not Ok
                                                    <?php elseif($value->medical_slip->status === 1): ?>
                                                        Ok
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mofa</td>
                                            <td>
                                                <?php if($value->mofa): ?>
                                                    <?php if($value->mofa->status === 0): ?>
                                                        Not Ok
                                                    <?php elseif($value->mofa->status === 1): ?>
                                                        Ok
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fit Card</td>
                                            <td>
                                                <?php if($value->fitcard): ?>
                                                    <?php echo e($value->fitcard->receive_date); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Poice Clearance</td>
                                            <td>
                                                <?php echo e($value->police?$value->police->submission_date:''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masaned</td>
                                            <td>
                                                <?php echo e($value->musanand?$value->musanand->issue_date:''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Visa Stamping</td>
                                            <td>
                                                <?php echo e($value->visas?$value->visas->send_date:''); ?>

                                                <br><?php echo e($value->visas?$value->visas->return_date:''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Finger</td>
                                            <td>
                                                <?php if($value->finger): ?>
                                                    <?php if($value->finger['bmet_status'] === 0): ?>
                                                        Not Ok
                                                    <?php elseif($value->finger['bmet_status'] === 1): ?>
                                                        Ok
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Training</td>
                                            <td>
                                                <?php echo e($value->training?$value->training->received_date:''); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Manpower</td>
                                            <td>
                                                <?php echo e($value->manpower['issuingDate']); ?> </br><?php echo e($value->manpower['receivingDate']); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Completion</td>
                                            <td>
                                                <?php echo e($value->completion['smart_card_number']); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Flight Submission</td>
                                            <td>
                                                <?php echo e($value->submission['expected_flight_date']); ?><br>
                                                <?php if($value->submission['owner_approval'] === 0): ?>
                                                    Not Ok
                                                <?php elseif($value->submission['owner_approval'] === 1): ?>
                                                    Ok
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Flight Confirmation</td>
                                            <td>
                                                <?php echo e($value->confirmation['date_of_flight']); ?><br>
                                                <?php if($value->confirmation['bill']): ?>
                                                    (BILL-00000<?php echo e($value->confirmation['bill']->bill_number); ?>)
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                                <td><?php echo $value->passenger_name; ?></td>
                                <td ><?php echo e($value->customer['display_name']); ?></td>
                                <td ><?php echo e($value->registerserial['registerSerial']); ?>

                                    <?php if($value->bill): ?>
                                    (BILL-00000<?php echo e($value->bill->bill_number); ?>)
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;"><?php echo e(date('d-m-Y', strtotime($value->created_at))); ?>

                                    <?php if($value->invoice): ?>
                                    (<?php echo e($value->invoice->invoice_number); ?>)
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;">
                                    <?php if($value->okala): ?>
                                        <?php if($value->okala->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->okala->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;"></td>
                                <td style="display: none;">
                                    <?php if($value->medical_slip): ?>
                                        <?php if($value->medical_slip->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->medical_slip->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;">
                                    <?php if($value->mofa): ?>
                                        <?php if($value->mofa->status === 0): ?>
                                            Not Ok
                                        <?php elseif($value->mofa->status === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;">
                                    <?php if($value->fitcard): ?>
                                        <?php echo e($value->fitcard->receive_date); ?>

                                    <?php endif; ?>
                                </td>
                                <td style="display: none;"><?php echo e($value->police?$value->police->submission_date:''); ?></td>
                                <td style="display: none;"><?php echo e($value->musanand?$value->musanand->issue_date:''); ?></td>
                                <td style="display: none;"><?php echo e($value->visas?$value->visas->send_date:''); ?>

                                    <br><?php echo e($value->visas?$value->visas->return_date:''); ?>

                                </td>
                                <td style="display: none;">
                                    <?php if($value->finger): ?>
                                        <?php if($value->finger['bmet_status'] === 0): ?>
                                            Not Ok
                                        <?php elseif($value->finger['bmet_status'] === 1): ?>
                                            Ok
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;"><?php echo e($value->training?$value->training->received_date:''); ?></td>
                                <td style="display: none;"><?php echo e($value->manpower['issuingDate']); ?> </br><?php echo e($value->manpower['receivingDate']); ?></td>
                                <td style="display: none;"><?php echo e($value->completion['smart_card_number']); ?></td>
                                <td style="display: none;"><?php echo e($value->submission['expected_flight_date']); ?><br>
                                    <?php if($value->submission['owner_approval'] === 0): ?>
                                        Not Ok
                                    <?php elseif($value->submission['owner_approval'] === 1): ?>
                                        Ok
                                    <?php endif; ?>
                                </td>
                                <td style="display: none;"><?php echo e($value->confirmation['date_of_flight']); ?><br>
                                    <?php if($value->confirmation['bill']): ?>
                                    (BILL-00000<?php echo e($value->confirmation['bill']->bill_number); ?>)
                                    <?php endif; ?>
                                </td>

                                <td  class="uk-text-center">
                                    <a href="<?php echo e(route('customer_information_edit' , $value->paxid)); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                    
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

    <div class="uk-grid uk-grid-width-medium-1-1" data-uk-grid="{gutter:24}" style="position: relative; margin-left: -24px; height: 414px;">
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 0px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed" style="">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3  class="md-card-toolbar-heading-text">
                        Mofas Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: block;">
                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-large-10-10">

                            <h2 style="background-color: #7CB343;text-align: center;color: white">Mofas Reminder</h2>
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
                </div>
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 73px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Processing Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-10-10">
                            <h2 style="background-color: #7CB343;text-align: center;color: white">Processing Reminder</h2>

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
                                            <tbody id="saven_table">
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
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 146px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Cancelled Orders
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: #7CB343;text-align: center;color: white">Cancelled Orders</h2>

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
            </div>
        </div>
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 219px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Visa Validity Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: dimgrey;text-align: center;color: white">Visa Validity Reminder</h2>

                                <div class="user_content">
                                    <div class="uk-overflow-container uk-margin-bottom">
                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                        <table class="uk-table" cellspacing="0" width="100%" id="fifth_table" >
                                            <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Reference</th>
                                                <th>Visa Number</th>
                                                <th>Visa Category</th>
                                                <th>Left Days</th>
                                                <th>Stamping Left</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Reference</th>
                                                <th>Visa Number</th>
                                                <th>Visa Category</th>
                                                <th>Left Days</th>
                                                <th>Stamping Left </th>
                                            </tr>
                                            </tfoot>
                                            <?php
                                            $i=1;
                                            ?>
                                            <tbody>
                                            <?php $__currentLoopData = $visa_vil_reminder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visa): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($visa->numberofVisa-$visa->RecruitOrder->count()!=0): ?>
                                                    <tr>
                                                        <td><?php echo isset($visa->Company)?$visa->Company->name:''; ?></td>
                                                        <td><?php echo isset($visa->Contact)?$visa->Contact->display_name:''; ?></td>
                                                        <td><?php echo e($visa->visaNumber); ?></td>
                                                        <td>
                                                            <?php if($visa->visa_category_id==1): ?>
                                                                Company Visa(Free)
                                                            <?php endif; ?>
                                                            <?php if($visa->visa_category_id==2): ?>
                                                                Company Visa(Contact)
                                                            <?php endif; ?>
                                                            <?php if($visa->visa_category_id==3): ?>
                                                                Processing Visa
                                                            <?php endif; ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($visa->leftdays); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($visa->numberofVisa-$visa->RecruitOrder->count()); ?>


                                                        </td>

                                                    </tr>
                                                <?php endif; ?>
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
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 292px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle" style="opacity: 1; transform: scale(1);"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                        Visa Stamping Without Payment
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: chocolate;text-align: center;color: white">Visa Stamping Without Payment</h2>

                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="six_table" >
                                        <thead>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Reference</th>
                                            <th>Passenger Name</th>
                                            <th>Visa Stamping Date</th>
                                            <th>Due </th>

                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Reference</th>
                                            <th>Passenger Name</th>
                                            <th>Visa Stamping Date</th>
                                            <th>Due </th>
                                        </tr>
                                        </tfoot>
                                        <?php
                                        $i=1;
                                        ?>
                                        <tbody>
                                        <?php $__currentLoopData = $stamping_without_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stamping): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <tr>
                                                <td><?php echo e($stamping->paxId['paxid']); ?></td>
                                                <td><?php echo e(isset($stamping->paxId->customer->display_name)?$stamping->paxId->customer['display_name']:''); ?></td>

                                                <td><?php echo e($stamping->paxId['passenger_name']); ?></td>
                                                <td>
                                                    <?php echo e($stamping['return_date']); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($stamping->paxId->invoice['due_amount']); ?>

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
        <div data-grid-prepared="true" style="position: absolute; box-sizing: border-box; padding-left: 24px; padding-bottom: 24px; top: 365px; opacity: 1; left: 0px;">
            <div class="md-card md-card-collapsed">
                <div class="md-card-toolbar">
                    <div class="md-card-toolbar-actions">
                        <i class="md-icon material-icons md-card-fullscreen-activate"></i>
                        <i class="md-icon material-icons md-card-toggle"></i>
                        <i class="md-icon material-icons md-card-close"></i>
                    </div>
                    <h3 class="md-card-toolbar-heading-text">
                       Manpower Reminder
                    </h3>
                </div>
                <div class="md-card-content" style="display: none;">

                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-1">
                            <h2 style="background-color: saddlebrown;text-align: center;color: white">Manpower Reminder </h2>

                            <div class="user_content">
                                <div class="uk-overflow-container uk-margin-bottom">
                                    <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                    <table class="uk-table" cellspacing="0" width="100%" id="six_table" >
                                        <thead>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Passenger Name</th>
                                            <th>Ref Name</th>
                                            <th>Fit Card Date</th>
                                            <th>Days Left </th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Pax Id</th>
                                            <th>Passenger Name</th>
                                            <th>Ref Name</th>
                                            <th>Fit Card Date</th>
                                            <th>Days Left </th>
                                        </tr>
                                        </tfoot>

                                        <tbody>
                                        <?php $__currentLoopData = $manpower_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manpower): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <tr>
                                                <td><?php echo e($manpower->pax_Id['paxid']); ?></td>
                                                <td><?php echo e($manpower->pax_Id['passenger_name']); ?></td>
                                                <td><?php echo e($manpower->pax_Id->customer['display_name']); ?></td>
                                                <td><?php echo e($manpower['receive_date']); ?></td>
                                                <td><?php echo e($manpower['leftdays']); ?></td>
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
        $('#second_table').DataTable({
            "pageLength": 50
        });
        $('#third_table').DataTable({
            "pageLength": 50
        });
        $('#fourth_table').DataTable({
            "pageLength": 50
        });
        $('#fifth_table').DataTable({
            "pageLength": 50
        });
        $('#six_table').DataTable({
            "pageLength": 50
        });
        $('#saven_table').DataTable({
            "pageLength": 50
        });

      $("#saven_table_body tr#toggle_details").on("click",function (e) {

          this.cells[0].innerHTML = "&#45;";
          $.each($(this).children(), function( index, value ) {
              if(index==2){
               $(value).css("width","75%").children("table").show();
              }
              if(index==1){
                  $(value).css("width","5%");
              }
              if(index==21){
                  return false;
              }

          });

      } );

        $("button#hide").on("click",function (e) {

           e.stopPropagation();
         $(this).parents("#toggle_details").children(":first").html("&#43;");
         // console.log($(this).children("table").hide());
         $(this).parents("#details").hide();





        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>