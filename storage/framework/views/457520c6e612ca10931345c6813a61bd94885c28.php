<?php $__env->startSection('title', 'Customer Information'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
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



                        <?php echo Form::open(['url' => array('customer/information/update', base64_encode($customer_info->id)), 'method' => 'post', 'class' => 'uk-form-stacked']); ?>

                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-large-10-10">
                                <div class="md-card">

                                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">



                                        <div class="user_heading_content">
                                            <h2 class="heading_b"><span class="uk-text-truncate">Edit Customer Information</span></h2>
                                        </div>
                                    </div>

                                    <div class="user_content">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-1-1 uk-float-right" >
                                                <button type="submit" class="md-btn md-btn-primary" style="float: right">Save</button>

                                            </div>
                                        </div>
                                        <div class="uk-margin-top">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" style="color:royalblue; font-size:25px; font-weight: bold">Pax ID</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">

                                                    <span style="font-size: 25px; color: royalblue; font-weight: bold "> <?php echo e($Rorder->paxid); ?></span>
                                                </div>
                                            </div>
                                            <h3 class="full_width_in_card heading_c">
                                                General info
                                            </h3>

                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="dateOfBirthEN">Date Of Birth (EN)</label>
                                                </div>
                                                <div class="uk-width-2-5">
                                                    <div class="parsley-row">
                                                        <label>Date of Birth</label>
                                                        <input class="md-input" type="text" id="customerb_date" name="dateOfBirthEN" data-uk-datepicker="{format:'DD/MM/YYYY'}" value="<?php echo e($customer_info->dateOfBirthEN); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="first_name">Date Of Birth (BN)</label>
                                                </div>
                                                <div class="uk-width-2-5">
                                                    <div class="parsley-row">
                                                        <label>Date of Birth (BN)</label>
                                                        <input class="md-input" type="text" name="dateOfBirthBN"  value="<?php echo e($customer_info->dateOfBirthBN); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="placeOfBirth">Place Of Birth</label>
                                                </div>
                                                <div class="uk-width-2-5">
                                                    <div class="parsley-row">
                                                        <label>Place Of Birth</label>
                                                        <input class="md-input" type="text" name="placeOfBirth"  value="<?php echo e($customer_info->placeOfBirth); ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="gender">Gender</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">

                                                    <span>

                                                        <input <?php echo e(isEmptyOrNullString($customer_info->gender)||substr(strtoupper($customer_info->gender),0,2)=="MA"? 'checked':''); ?> type="radio" name="gender"  value="male" data-md-icheck />

                                                        <label for="radio_demo_1" class="inline-label">Male</label>
                                                    </span>

                                                    <span>
                                                        <input <?php echo e(substr(strtoupper($customer_info->gender),0,2)=="FE"? "checked":''); ?> type="radio" name="gender" value="female" data-md-icheck />
                                                        <label for="radio_demo_2" class="inline-label">Female</label>
                                                    </span>



                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="addressEN">Address EN </label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="addressEN">AddressEN</label>
                                                    <textarea class="md-input" name="addressEN" id="addressEN" cols="30" rows="4"> <?php echo e($customer_info->addressEN); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="addressBN">Address BN </label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="addressBN">AddressBN</label>
                                                    <textarea class="md-input" name="addressBN" id="addressBN" cols="30" rows="4"> <?php echo e($customer_info->addressBN); ?> </textarea>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="religionEN">Religion EN</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="religionEN">Religion EN</label>
                                                    <input class="md-input" type="text" id="religionEN" name="religionEN" value="<?php echo e($customer_info->religionEN); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="religionBN">Religion BN</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="religionBN">Religion BN</label>
                                                    <input class="md-input" type="text" id="religionBN" name="religionBN" value="<?php echo e($customer_info->religionBN); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="previousNationality">Previous Nationality</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="previousNationality">Previous Nationality</label>
                                                    <input class="md-input" type="text" id="previousNationality" name="previousNationality" value="<?php echo e($customer_info->previousNationality); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="presentNationality">Present Nationality</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="presentNationality">Present Nationality</label>
                                                    <input class="md-input" type="text" id="presentNationality" name="presentNationality" value="<?php echo e($customer_info->presentNationality); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="maritalStatus">Marital Status</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="maritalStatus">Marital Status</label>
                                                    <input class="md-input" type="text" id="maritalStatus" name="maritalStatus" value="<?php echo e($customer_info->maritalStatus); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="group">Group</label>
                                                </div>
                                                <div class="uk-width-medium-2-5">
                                                    <label for="group">Group</label>
                                                    <input class="md-input" type="text" id="group" name="group" value="<?php echo e($customer_info->group); ?>" />
                                                </div>
                                            </div>

                                            <div class="uk-grid">
                                                <div class="uk-width-1-2">
                                                    <h3 class="full_width_in_card heading_c" style="text-transform: uppercase">
                                                       Guardian
                                                    </h3>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="guardianName">Guardian Name</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="guardianName">Guardian Name</label>
                                                            <input class="md-input" type="text" id="guardianName" name="guardianName" value="<?php echo e($customer_info->guardianName); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="guardianFatherName">Father Name</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="guardianFatherName">Guardian FatherName</label>
                                                            <input class="md-input" type="text" id="guardianFatherName" name="guardianFatherName" value="<?php echo e($customer_info->guardianFatherName); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="guardianAddressEN">Guardian AddressEN</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="guardianAddressEN">Guardian AddressEN</label>
                                                            <textarea class="md-input" name="guardianAddressEN" id="guardianAddressEN" cols="30" rows="4"><?php echo e($customer_info->guardianAddressEN); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="guardianReligion">Guardian Religion</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="guardianReligion">GuardianReligion</label>
                                                            <input class="md-input" type="text" id="guardianReligion" name="guardianReligion" value="<?php echo e($customer_info->guardianReligion); ?>" />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="uk-width-1-2">
                                                    <h3 class="full_width_in_card heading_c">
                                                        Family
                                                    </h3>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="motherName">Mother Name</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="motherName">Mother Name</label>
                                                            <input class="md-input" type="text" id="motherName" name="motherName" value=" <?php echo e($customer_info->motherName); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="fatherName">Father Name</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="fatherName">Father Name</label>
                                                            <input class="md-input" type="text" id="fatherName" name="fatherName" value="<?php echo e($customer_info->fatherName); ?>" />
                                                        </div>
                                                    </div>
                                                    <h3 class="full_width_in_card heading_c">
                                                        Reference
                                                    </h3>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="guardianAddressBN">Guardian AddressBN</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="guardianAddressBN">Guardian AddressBN</label>
                                                            <textarea class="md-input" name="guardianAddressEN" id="guardianAddressEN" cols="30" rows="4"><?php echo e($customer_info->guardianAddressEN); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="relationWithCustomer_1">Relation with Customer </label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="relationWithCustomer_1">in english</label>
                                                            <input class="md-input" type="text" id="relationWithCustomer_1" name="relationWithCustomer_1" value="<?php echo e($customer_info->relationWithCustomer_1); ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-4 uk-vertical-align">
                                                            <label class="uk-vertical-align-middle" for="relationWithCustomer_2">Relation with Customer</label>
                                                        </div>
                                                        <div class="uk-width-medium-3-4">
                                                            <label for="relationWithCustomer_2">in Bangla</label>
                                                            <input class="md-input" type="text" id="relationWithCustomer_2" name="relationWithCustomer_2" value="<?php echo e($customer_info->relationWithCustomer_2); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <h3 class="full_width_in_card heading_c">
                                                Professional
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="qualification">Qualification </label>
                                                </div>
                                                <div class="uk-width-3-4">
                                                    <div class="parsley-row">
                                                        <label class="uk-vertical-align-middle" for="qualification">Qualification </label>
                                                        <input class="md-input" type="text" name="qualification"  value="<?php echo e($customer_info->qualification); ?>" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="professionEn">Profession EN</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="professionEn">Profession EN</label>
                                                    <input class="md-input" type="text" id="professionEn" name="professionEn" value="<?php echo e($customer_info->professionEn); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="professionBn">Profession BN</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="professionBn">Profession BN</label>
                                                    <input class="md-input" type="text" id="professionBn" name="professionBn" value="<?php echo e($customer_info->professionBn); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="professionAR">Profession AR</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="professionAR">Profession AR</label>
                                                    <input class="md-input" type="text" id="professionAR" name="professionAR" value="<?php echo e($customer_info->professionAR); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="businessAddressEN">BusinessAddress EN</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="businessAddressEN">BusinessAddress EN</label>
                                                    <textarea class="md-input" name="businessAddressEN" id="businessAddressEN" cols="30" rows="4"><?php echo e($customer_info->businessAddressEN); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="businessAddressBN">BusinessAddress BN</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="businessAddressBN">BusinessAddress BN</label>
                                                    <textarea class="md-input" name="businessAddressBN" id="businessAddressBN" cols="30" rows="4"> <?php echo e($customer_info->businessAddressBN); ?></textarea>
                                                </div>
                                            </div>

                                            <h3 class="full_width_in_card heading_c">
                                               Travels
                                            </h3>

                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="purposeOfTravel">Purpose Of Travel</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="purposeOfTravel">Purpose Of Travel</label>
                                                    <input class="md-input" type="text" id="purposeOfTravel" name="purposeOfTravel" value="<?php echo e($customer_info->purposeOfTravel); ?>" />
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="durationOfStay">	Duration Of Stay</label>
                                                </div>
                                                <div class="uk-width-medium-3-4">
                                                    <label for="durationOfStay">	Duration Of Stay</label>
                                                    <input class="md-input" type="text" id="durationOfStay" name="durationOfStay" value="<?php echo e($customer_info->durationOfStay); ?>" />
                                                </div>
                                            </div>


                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="departureDate">Departure Date</label>
                                                </div>
                                                <div class="uk-width-3-4">
                                                    <div class="parsley-row">
                                                        <label>Departure Date</label>
                                                        <input class="md-input" type="text" id="departureDate" name="departureDate" data-uk-datepicker="{format:'DD/MM/YYYY'}" value="<?php echo e($customer_info->departureDate); ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="arrivalDate">Arrival Date</label>
                                                </div>
                                                <div class="uk-width-3-4">
                                                    <div class="parsley-row">

                                                        <input class="md-input" type="text" name="arrivalDate"  data-uk-datepicker="{format:'DD/MM/YYYY'}" value="<?php echo e($customer_info->arrivalDate); ?>" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="visaAdvice">Visa Advice </label>
                                                </div>
                                                <div class="uk-width-3-4">
                                                    <div class="parsley-row">

                                                        <input class="md-input" type="text" name="visaAdvice"  value="<?php echo e($customer_info->visaAdvice); ?>" />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-4 uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="destination">Destination </label>
                                                </div>
                                                <div class="uk-width-3-4">
                                                    <div class="parsley-row">
                                                        <label class="uk-vertical-align-middle" for="destination">Destination </label>
                                                        <input class="md-input" type="text" name="destination"  value="<?php echo e($customer_info->destination); ?>" />
                                                    <input type="hidden" name="id" value="<?php echo e(base64_encode($customer_info->id)); ?>">
                                                    <input type="hidden" name="pid" value="<?php echo e(base64_encode($Rorder->paxid)); ?>">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-1-1 uk-float-right">
                                                    <button type="submit" class="md-btn md-btn-primary" >Save</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>



            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>



        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_customer').addClass('act_item');
        $('.customer_information').addClass('md-bg-blue-grey-100');
    </script>
    <!-- handlebars.js -->
    <script src="<?php echo e(url('admin/bower_components/handlebars/handlebars.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/custom/handlebars_helpers.min.js')); ?>"></script>

    <!--  invoices functions -->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>