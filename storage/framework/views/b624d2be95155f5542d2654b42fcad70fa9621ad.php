<?php $__env->startSection('title'); ?>
 Add Medical slip
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
         <form action="<?php echo e(route('medicalslip_store')); ?>"  method="post" class="uk-form-stacked" id="class_store">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                <?php echo e(csrf_field()); ?>

                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Add Medical Slip </span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Pax Id</label>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <select name="paxid" id="paxid" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="select class">
                                                <option value="">Select PAx ID</option>
                                                <?php $__currentLoopData = $recrut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <?php if($errors->has('paxid')): ?>

                                        <span style="color:red"><?php echo $errors->first('paxid'); ?></span>

                                    <?php endif; ?>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="d_form_gender_m">Status</label>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">

                                            <div class="dynamic_radio uk-margin-small-top">
                                                        <span class="icheck-inline">
                                                            <input type="radio" name="status" value="1" id="d_form_gender_m" />
                                                            <label for="d_form_gender_m" class="inline-label">Fit</label>
                                                        </span>
                                                        <span class="icheck-inline">
                                                            <input type="radio" name="status" value="0" id="d_form_gender_f"  />
                                                            <label for="d_form_gender_f" class="inline-label">Unfit</label>
                                                        </span>
                                                   </div>
                                             </div>
                                         </div>
                                     </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5">
                                        <label for="medicalcn">Medical Centre Name </label>
                                    </div>

                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <input type="text" id="medicalcn" name="medicalcn" required class="md-input"  />
                                        </div>
                                    </div>
                                    <?php if($errors->has('medicalcn')): ?>

                                        <span style="color:red">medicalcn Required</span>

                                    <?php endif; ?>
                                </div>


                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5">
                                        <label for="start_date">Test date</label>
                                    </div>
                                    <div class="uk-width-1-4">

                                        <input class="md-input" type="text" id="test_date" name="test_date" value="<?php echo e(date('Y-m-d')); ?>" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                    <?php if($errors->has('test_date')): ?>

                                        <span style="color:red"><?php echo $errors->first('test_date'); ?></span>

                                    <?php endif; ?>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5">
                                        <label for="user_edit_personal_info_control">Comment</label>
                                    </div>
                                    <div class="uk-width-2-5">

                                        <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4"></textarea>
                                    </div>
                                    <?php if($errors->has('comment')): ?>

                                        <span style="color:red"><?php echo $errors->first('comment'); ?></span>

                                    <?php endif; ?>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2 uk-float-right">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <a href="<?php echo e(url()->previous()); ?>" type="button" class="md-btn md-btn-flat uk-modal-close">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>