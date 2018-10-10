<?php $__env->startSection('title', 'Visa Form'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Visa Form</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="<?php echo e(route('visaform')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="<?php echo e(route('visaform_create')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="<?php echo e(URL::previous()); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <?php echo Form::open(['url' => route('visaform_store'), 'method' => 'POST']); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Pax Id</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="paxid"> Pax Id </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select paxid" id="paxid" name="paxid" required="">
                                                <option>Select Pax Id </option>
                                                <?php $__currentLoopData = $pax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>" > <?php echo e($value->paxid); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('paxid')): ?>
                                                <br/>
                                                <div class="uk-text-danger"><?php echo e($errors->first('paxid')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="so">S/O</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="so"> S/O </label>
                                            <input class="md-input" type="text" id="so" name="so"  value="<?php echo e(old('so')); ?>" />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bulk">Form Bulk info</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                    <div class="uk-grid uk-grid-medium form_section " id="bulk" data-uk-grid-match>
                                        <div class="uk-width-9-10">
                                            <div class="uk-grid">
                                                <div class="uk-width-1-2">
                                                    <div class="parsley-row">
                                                        <label> Name</label>
                                                        <input type="text" class="md-input" name="name[]" >
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-2">
                                                    <div class="parsley-row">
                                                        <label>Gender</label>
                                                        <input type="text" list="genderlist" class="md-input" name="gender[]" >
                                                        <datalist id="genderlist">
                                                            <option value="Male">
                                                            <option value="Female">
                                                            <option value="Gay">

                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-2">
                                                    <div class="parsley-row">
                                                        <label>Date of Birth</label>
                                                        <input class="md-input" type="text" id="visa_date" name="dateofBirth[]" data-uk-datepicker="{format:'DD/MM/YYYY'}" value="<?php echo e(old('dateofBirth')); ?>" />
                                                    </div>
                                                </div>
                                                <div class="uk-width-1-2">
                                                    <div class="parsley-row">
                                                        <label>Relationship</label>
                                                        <input type="text" class="md-input" name="relationship[]" autocomplete="on" >
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="uk-width-1-10 uk-text-center">
                                            <div class="uk-vertical-align uk-height-1-1">
                                                <div class="uk-vertical-align-middle">
                                                    <a href="#" class="btnSectionClone" data-section-clone="#bulk"><i class="material-icons md-36">&#xE146;</i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="form_section_separator"/>
                                    </div>
                                    </div>

                                      </div>

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Office Date</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="officeDate"> Office Date </label>
                                            <input class="md-input" type="text" id="officeDate" name="officeDate" data-uk-datepicker="{format:'DD/MM/YYYY'}" value="<?php echo e(old('officeDate')); ?>" />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Authorization</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="authorization"> Authorization </label>
                                            <input class="md-input" type="text" id="authorization" name="authorization"  value="<?php echo e(old('authorization')); ?>" />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="footerNumber">Footer Number</label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label for="footerNumber"> Footer Number </label>
                                            <input class="md-input" type="text" id="footerNumber" name="footerNumber"  value="<?php echo e(old('footerNumber')); ?>" />

                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bulk">Visa Agreement </label>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <div class="uk-grid uk-grid-medium form_section " id="agreement" data-uk-grid-match>
                                                <div class="uk-width-9-10">
                                                    <div class="uk-grid">
                                                        <div class="uk-width-1-2">

                                                            <div class="uk-form-row">
                                                                <p for="agreementEn">Agreement (EN) </p>
                                                                <textarea id="agreementEn" name="agreementEn[]" cols="40" rows="7" class="md-input "><?php echo e(old('agreementEn')); ?></textarea>
                                                                <?php if($errors->has('agreementEn')): ?>
                                                                    <div class="uk-text-danger"><?php echo e($errors->first('agreementEn')); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="uk-width-1-2">

                                                            <div class="uk-form-row">
                                                                <p for="agreementAr">Agreement (AR)</p>
                                                                <textarea id="agreementAr" name="agreementAr[]" cols="40" rows="7" class="md-input"><?php echo e(old('agreementAr')); ?></textarea>
                                                                <?php if($errors->has('agreementAr')): ?>
                                                                    <div class="uk-text-danger"><?php echo e($errors->first('agreementAr')); ?></div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>


                                                <div class="uk-width-1-10 uk-text-center">
                                                    <div class="uk-vertical-align uk-height-1-1">
                                                        <div class="uk-vertical-align-middle">
                                                            <a href="#" class="btnSectionClone" data-section-clone="#agreement"><i class="material-icons md-36">&#xE146;</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





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
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_visa_form_m').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
            $("#ticktok3").trigger('click');
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>