<?php $__env->startSection('title', 'Visa create'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid">
        <div class="uk-width-large-10-10">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Visa</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="<?php echo e(route('visa')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="<?php echo e(route('visa_create')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="<?php echo e(URL::previous()); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <?php echo Form::open(['url' => route('visa_store'), 'method' => 'POST','files' => true]); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="company_name">Company Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="company_name">Company Name</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Company Name" id="company_name" name="company_name" >
                                                <option>Select Company Name</option>
                                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value=" <?php echo e($value->id); ?> " > <?php echo e($value->name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>

                                            <?php if($errors->has('company_name')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('company_name')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visaType">
                                                <a href="<?php echo route('company_create'); ?>" type="submit" class="sm-btn sm-btn-primary">+ Create Company</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Visa Date <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="visa_date" name="visa_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e(old('visa_date')); ?>" />
                                        </div>
                                        <?php if($errors->first('visa_date')): ?>
                                            <div class="uk-text-danger">Date is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Local Reference <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Local Reference</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Local Refrence" id="local_ref" name="local_ref">
                                                <option>Select Local Reference</option>
                                                <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value=" <?php echo e($value->id); ?> " > <?php echo e($value->display_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('local_ref')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('local_ref')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Visa Issue Date<i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="visa_issue_date">Select date</label>
                                            <input class="md-input" type="text" id="visa_issue_date" name="issue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e(old('issue_date')); ?>" />
                                        </div>
                                        <?php if($errors->has('visa_date')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors->first('visa_date')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visa_number">Visa Number <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <input class="md-input" type="text" id="visa_number" oninput="visaSerial()" name="visa_number" value="<?php echo e(old('visa_number')); ?>" />
                                            <?php if($errors->has('visa_number')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('visa_number')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="numberofvisa">Number Of Visa <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="numberofvisa">Number of Visa</label>
                                            <input class="md-input" type="text" id="numberofvisa"  name="numberofvisa" value="<?php echo e(old('numberofvisa')); ?>" required/>
                                            <?php if($errors->has('numberofvisa')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('numberofvisa')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Destination">Destination</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Destination">Destination</label>
                                            <input class="md-input" type="text" id="Destination"  name="destination" value="<?php echo e(old('destination')); ?> " />

                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Destination">Register Serial <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <input class="md-input" type="text" id="registerSerialvisa" name="registerSerial" value="<?php echo e(old('registerSerial')); ?> " />
                                            <?php if($errors->has('registerSerial')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('registerSerial')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Flag_Number">ID Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="Flag_Number">ID Number</label>
                                            <input class="md-input" type="text" id="Flag_Number"  name="flag_num" value="<?php echo e(old('flag_num')); ?> " />

                                        </div>
                                    </div>

                                    <!-- <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Number</label>
                                            <input class="md-input" type="text" id="iqamaNumber"  name="iqamaNumber" value="<?php echo e(old('iqamaNumber')); ?> " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Sector</label>
                                            <input class="md-input" type="text" id="iqamaSector"   name="iqamaSector" value="<?php echo e(old('iqamaSector')); ?> " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visaType">Visa Type</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="visaType">Visa Type</label>
                                            <input class="md-input" type="text" id="visaType"   name="visaType" value="<?php echo e(old('visaType')); ?> " />

                                        </div>
                                    </div> -->
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visaType">Visa Expired Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="visaType">Visa Expired Date</label>
                                            <input class="md-input" type="text" id="visaType" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="expire_date"/>

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="company_name">Visa Category<i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="company_name">Visa Category</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Company Name" id="company_name" name="visa_category_id" >
                                                <option>Select Visa Category</option>
                                                    <option value="1" >Company Visa (Free)</option>
                                                    <option value="2" >Company Visa (Contact)</option>
                                                    <option value="3" >Processing Visa</option>
                                            </select>

                                            <?php if($errors->has('visa_category_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('visa_category_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                       <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="visaType">Upload File</label>
                                            </div>
                                                <div class="uk-width-medium-2-5">
                                                    <div class="md-card">
                                                        <div class="md-card-content">
                                                            <div class="uk-grid form_section" id="d_form_row">
                                                                <div class="uk-width-1-1">
                                                                    <div class="uk-input-group">
                                                                        <label for="visaType">Title</label>
                                                                        <input type="text" id="visaType" class="md-input"  name="title[]" required="1" />
                                                                        <br>
                                                                        <br>
                                                                        <input type="file" class="md-input" name="img_url[]">
                                                                        <?php if($errors->has('img_url')): ?>
                                                                            <div class="uk-text-danger"><?php echo e($errors->first('img_url')); ?></div>
                                                                        <?php endif; ?>
                                                                        <span class="uk-input-group-addon">
                                                                           <a href="#" class="btnSectionClone" data-section-clone="#d_form_row"><i class="material-icons md-24">&#xE146;</i></a>
                                                                       </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>

                                             <hr>

                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>

        function visaSerial() {
            var value= $('#visa_number').val();
            $('#registerSerialvisa').val(value);

        }

    </script>


    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_recrut_visa').addClass('act_item');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>