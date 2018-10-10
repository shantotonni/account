<?php $__env->startSection('title', 'Recruite Deshboard'); ?>

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
                                        <th>Customer Name</th>
                                        <th>Visa</th>
                                        <th>Okala</th>
                                        <th>Fp & Tranning</th>
                                        <th>Manpower</th>
                                        <th>Flight</th>
                                        <th>Mofa</th>
                                        <th>Musaned</th>
                                        <th>Medical</th>
                                        <th>Visa stamping</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Pax ID</th>
                                        <th>Customer Name</th>
                                        <th>visa</th>
                                        <th>okala</th>
                                        <th>Fp & Tranning</th>
                                        <th>Manpower</th>
                                        <th>Flight</th>
                                        <th>Mofa</th>
                                        <th>Musaned</th>
                                        <th>Medical</th>
                                        <th>Visa stamping</th>
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
                                            <td><?php echo e($value->customer->display_name); ?></td>
                                            <td><?php echo e($value->registerserial->visaNumber); ?></td>
                                            <td><?php echo e($value->paxId['date']); ?></td>
                                            <td><?php echo e($value->ft_pax['assignedDate']); ?></br> <?php echo e($value->ft_pax['receivingDate']); ?></td>
                                            <td><?php echo e($value->mp_pax['issuingDate']); ?> </br><?php echo e($value->mp_pax['receivingDate']); ?></td>
                                            <td><?php echo e($value->flight['flightDate']); ?></td>
                                            <td><?php echo e($value->mofa['mofaDate']); ?></td>
                                            <td><?php echo e($value->musan['issue_date']); ?></td>
                                            <td><?php echo e($value->medical['status']); ?></td>
                                            <td><?php echo e($value->visa['send_date']); ?> <?php echo e($value->visa['return_date']); ?></td>
                                            <td class="uk-text-center">
                                                <a href="#" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                                
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                 </table>

                                <?php echo Form::open(['url' => route('recruitdashboard_search'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

                                <div class="uk-width-1-2">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Activity Log
                                    </h3>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <label>From <span class="req">*</span></label>
                                            <input type="text" name="from_date"  id="from" value="<?php if(isset($from)): ?> <?php echo e($from); ?> <?php endif; ?>" required class="md-input" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                            
                                        </div>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <label>TO <span class="req">*</span></label>
                                            <input type="text" name="to_date"  id="to" value="<?php if(isset($to)): ?> <?php echo e($to); ?> <?php endif; ?>" required class="md-input" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                            
                                        </div>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <button type="submit" onclick="myFunction()" class="md-btn md-btn-primary" >Submit</button>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Okala</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>

                                                                <th><span style="color:green;">Okala Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th><span style="color:green;">Comments</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php $__currentLoopData = $okala; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->date; ?></td>
                                                                    <td><?php echo $value->paxId['paxid']; ?></td>
                                                                    <?php if($value->status==1): ?>
                                                                        <td>OK</td>
                                                                    <?php else: ?>
                                                                        <td>Not OK</td>
                                                                    <?php endif; ?>
                                                                    <td><?php echo $value->comment; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('okala_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="okala_id" value="<?php echo e($value->id); ?>">
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


                                    <h4><span style="color:blue;">Flight</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>

                                                                <th><span style="color:green;">Flight Date</span> </th>
                                                                <th><span style="color:green;">Carrier Name</span></th>
                                                                <th><span style="color:green;">Vendor</span></th>
                                                                <th><span style="color:green;">Paxid</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>

                                                            <tbody>
                                                            <?php $__currentLoopData = $flight; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->flightDate; ?></td>
                                                                    <td><?php echo $value->carrierName; ?></td>
                                                                    <td><?php echo $value->vendor_id; ?></td>
                                                                    <td><?php echo $value->paxid; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('flight_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="flight_id" value="<?php echo e($value->id); ?>">
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Mofa</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Mofa Number</span></th>
                                                                <th><span style="color:green;">Iqama Number</span></th>
                                                                <th><span style="color:green;">Mofa Date</span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            <?php $__currentLoopData = $mofa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->pax_id; ?></td>
                                                                    <td><?php echo $value->mofaNumbe; ?></td>
                                                                    <td><?php echo $value->iqamaNumber; ?></td>
                                                                    <td><?php echo $value->mofaDate; ?></td>
                                                                    <?php if($value->status==1): ?>
                                                                        <td>OK</td>
                                                                    <?php else: ?>
                                                                        <td>Not OK</td>
                                                                    <?php endif; ?>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('mofa_edit',$value->id); ?>"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="<?php echo route('mofa_delete',$value->id); ?>" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue; ">FingerPrint</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Assigned Date</span></th>
                                                                <th><span style="color:green;">Receiving Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Comment</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            <?php $__currentLoopData = $ft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->assignedDate; ?></td>
                                                                    <td><?php echo $value->receivingDate; ?></td>
                                                                    <td><?php echo $value->paxid; ?></td>
                                                                    <td><?php echo $value->comment; ?></td>

                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('fingerprint_edit',$value->id); ?>"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="<?php echo route('fingerprint_delete',$value->id); ?>" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Visaentry</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Date</span></th>
                                                                <th><span style="color:green;">local Reference</span></th>
                                                                <th><span style="color:green;">visaNumber</span></th>
                                                                <th><span style="color:green;">company</span></th>
                                                                <th><span style="color:green;">numberofVisa</span></th>
                                                                <th><span style="color:green;">registerSerial</span></th>
                                                                <th><span style="color:green;">iqamaNumber</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            <?php $__currentLoopData = $visaentry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($value->date); ?></td>
                                                                    <td><?php echo e($value->Contact->company_name); ?></td>
                                                                    <td><?php echo e($value->visaNumber); ?></td>
                                                                    <td><?php echo e($value->Company->name); ?></td>
                                                                    <td><?php echo e($value->numberofVisa); ?></td>
                                                                    <td><?php echo e($value->registerSerial); ?></td>
                                                                    <td><?php echo e($value->iqamaNumber); ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('visa_edit',$value->id); ?>"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="<?php echo route('visa_delete',$value->id); ?>" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Manpower</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Issuing Date</span></th>
                                                                <th><span style="color:green;">Receiving Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Comments</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $manpower; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->issuingDate; ?></td>
                                                                    <td><?php echo $value->receivingDate; ?></td>
                                                                    <td><?php echo $value->paxId['paxid']; ?></td>
                                                                    <td><?php echo $value->comment; ?></td>

                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('manpower_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="manpower_id" value="<?php echo e($value->id); ?>">
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
                                    <h4><span style="color:blue; ">MedicalSlip</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Mrdical centre </span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th><span style="color:green;">Test Date</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $medical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->pax_id; ?></td>
                                                                    <td><?php echo $value->medical_centre; ?></td>
                                                                    <?php if($value->status==1): ?>
                                                                        <td>OK</td>
                                                                    <?php else: ?>
                                                                        <td>Not OK</td>
                                                                    <?php endif; ?>
                                                                    <td><?php echo $value->testdate; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('medicalslip_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="medicalslip_id" value="<?php echo e($value->id); ?>">
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
                                    <h4><span style="color:blue;">Musaned</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Issue Date </span></th>
                                                                <th><span style="color:green;">Company Name</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $musaned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->paxId['paxid']; ?></td>
                                                                    <td><?php echo $value->issue_date; ?></td>
                                                                    <td><?php echo $value->companyId ['name']; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('musaned_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="musaned_id" value="<?php echo e($value->id); ?>">
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

                                    <h4><span style="color:blue; ">VisaStamp</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Sending Date</span></th>
                                                                <th><span style="color:green;">Returning Date </span> </th>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Comment</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $visastamp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->send_date; ?></td>
                                                                    <td><?php echo $value->return_date; ?></td>
                                                                    <td><?php echo $value->pax_id; ?></td>
                                                                    <td><?php echo $value->comment; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('medicalslip_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="medicalslip_id" value="<?php echo e($value->id); ?>">
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
                                    <h4><span style="color:blue;">Document</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Created At</span></th>
                                                                <th><span style="color:green;">Category </span> </th>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Title</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo $value->created_at; ?></td>
                                                                    <td><?php echo $value->Category['categoryName']; ?></td>
                                                                    <td><?php echo $value->pax_id; ?></td>
                                                                    <td><?php echo $value->title; ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('document_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="document_id" value="<?php echo e($value->id); ?>">
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
                                    <h4><span style="color:blue;">RecruitOrder</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Customer</span></th>
                                                                <th><span style="color:green;">Package </span> </th>
                                                                <th><span style="color:green;">Register Serial</span> </th>
                                                                <th><span style="color:green;">Passport Number</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $Rorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($value->customer->company_name); ?></td>
                                                                    <td><?php echo e($value->package->item_name); ?></td>
                                                                    <td><?php echo e($value->registerserial->visaNumber); ?></td>
                                                                    <td><?php echo e($value->passportNumber); ?></td>
                                                                    <td class="uk-text-center">
                                                                        <a href="<?php echo route('order_edit',$value->id); ?>" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="order_id" value="<?php echo e($value->id); ?>">
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>