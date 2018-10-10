<?php $__env->startSection('title'); ?>
   Edit Medical Slip Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<body onload="onload()">
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <form action="<?php echo e(route('medicalslip_update',$medical->id)); ?>"  method="post" enctype="multipart/form-data">
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <?php echo e(csrf_field()); ?>

                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Edit Medical Slip Report </span></h2>
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
                                            <option value="">Select Customer</option>
                                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if($value->id==$medical->pax_id): ?>
                                                <option selected value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                            <?php endif; ?>
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
                                    <label class="uk-vertical-align-middle" for="customer_name">Status</label>
                                </div>
                                <div class="uk-width-1-4">
                                    <div class="parsley-row">

                                        <div class="dynamic_radio uk-margin-small-top">
                                                <span class="icheck-inline fit">
                                                     <label for="d_form_gender_m" class="inline-label" onclick="fit()">
                                                    <input type="radio" class="fit" name="status" value="1" <?php echo $medical->status==1? 'checked':''; ?> id="status" data-md-icheck required />
                                                   Fit</label>
                                                </span>
                                            <span class="icheck-inline" id="unfit">
                                                 <label for="d_form_gender_f" class="inline-label" onclick="unfit()">
                                                <input  type="radio" name="status" value="0" <?php echo $medical->status==0? 'checked':''; ?>  id="statuss" data-md-icheck required />
                                               Unfit</label>
                                             </span>
                                        </div>
                                    </div>
                                </div>
                             </div>


                            <div class="uk-grid" id="reason">
                                <div class="uk-width-2-4">
                                    <div class="parsley-row" style="margin-left: 200px" >
                                        <input type="text" id="medicalcn" value="<?php echo $medical->reason; ?>" name="reason" class="md-input"  placeholder="Write Reason" />
                                    </div>
                                </div>

                            </div>


                            <div class="uk-grid">
                                <div class="uk-width-1-5">
                                    <label for="medicalcn">Medical Centre Name<span class="req"></span></label>
                                </div>
                                <div class="uk-width-1-4">
                                    <div class="parsley-row">
                                        <input type="text" id="medicalcn" value="<?php echo $medical->medical_centre_name; ?>" name="medical_centre_name" required class="md-input"  />
                                    </div>
                                </div>
                                <?php if($errors->has('medical_centre_name')): ?>

                                    <span style="color:red"><?php echo $errors->first('medical_centre_name'); ?></span>

                                <?php endif; ?>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="start_date">Medical date</label>
                                </div>
                                <div class="uk-width-1-4">

                                    <input class="md-input" type="text" id="test_date" value="<?php echo $medical->medical_date; ?>"  name="medical_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                </div>
                                <?php if($errors->has('medical_date')): ?>

                                    <span style="color:red"><?php echo $errors->first('medical_date'); ?></span>

                                <?php endif; ?>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="start_date">Medical Report date</label>
                                </div>
                                <div class="uk-width-1-4">

                                    <input class="md-input" type="text" id="test_date" value="<?php echo $medical->medical_report_date; ?>"  name="medical_report_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                </div>
                                <?php if($errors->has('medical_report_date')): ?>

                                    <span style="color:red"><?php echo $errors->first('medical_report_date'); ?></span>

                                <?php endif; ?>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="start_date">Medical Center Next Visit date</label>
                                </div>
                                <div class="uk-width-1-4">

                                    <input class="md-input" type="text" id="test_date" value="<?php echo $medical->medical_visit_date; ?>"  name="medical_visit_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                </div>
                                <?php if($errors->has('medical_visit_date')): ?>

                                    <span style="color:red"><?php echo $errors->first('medical_visit_date'); ?></span>

                                <?php endif; ?>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="start_date">Comment</label>
                                </div>
                                <div class="uk-width-1-4">
                                    <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4"> <?php echo $medical->comment; ?> </textarea>
                                </div>
                                <?php if($errors->has('comment')): ?>
                                    <span style="color:red"><?php echo $errors->first('comment'); ?></span>
                                <?php endif; ?>
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
                                                        <input type="text" id="visaType" class="md-input" name="title[]" <?php echo e((!$medical->medical_report)?'required':''); ?>/>
                                                        <br>
                                                        <br>
                                                        <input type="file" class="md-input" name="img_url[]" <?php echo e((!$medical->medical_report)?'required':''); ?>>
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
                            
                            <?php $__currentLoopData = $medical->medical_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="visaType">Upload File</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <div class="uk-grid form_section" id="d_form_row">
                                                    <div class="uk-width-1-1">
                                                        <a href="<?php echo asset('all_image/'); ?>/<?php echo $file->img_url; ?>" style="float:right;" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light" download>Download</a>

                                                        <div class="uk-input-group">
                                                            <label for="visaType">Title</label>
                                                            <input type="text" id="visaType" class="md-input" value="<?php echo $file['title']; ?>"  name="title[<?php echo 'old_'.$file['id']; ?>]" required="1" />
                                                            <br>
                                                            <br>
                                                            <input type="file" class="md-input" name="img_url[<?php echo 'old_'.$file['id']; ?>]">
                                                            <input type="hidden" value="<?php echo $file['id']; ?>" name="img_id[]" >
                                                            <br>
                                                            <?php if($errors->has('img_url')): ?>
                                                                <div class="uk-text-danger"><?php echo e($errors->first('img_url')); ?></div>
                                                            <?php endif; ?>
                                                            <span class="uk-input-group-addon">
                                                                    <a href="#" class="btnSectionRemove"><i class="material-icons md-24"></i></a>
                                                                 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <img src="<?php echo asset('all_image/'); ?>/<?php echo $file->img_url; ?>" alt="...." height="60" width="150"/>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <br>
                            <br>
                            <br>

                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Created By</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle"><?php echo isset($medical->createdBy['name']) ? $medical->createdBy['name']:''; ?></span>
                                </div>
                            </div>
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Updated By</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle"><?php echo isset($medical->updatedBy['name']) ? $medical->updatedBy['name']:''; ?></span>
                                </div>
                            </div>


                            <hr class="uk-grid-divider">
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Created At</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle"><?php echo isset($medical->created_at) ? $medical->created_at:''; ?></span>
                                </div>
                            </div>
                            <div class="uk-grid uk-grid-small">
                                <div class="uk-width-large-1-3">
                                    <span class="uk-text-muted uk-text-small">Updated At</span>
                                </div>
                                <div class="uk-width-large-2-3">
                                    <span class="uk-text-large uk-text-middle"><?php echo isset($medical->updated_at) ? $medical->updated_at:''; ?></span>
                                </div>
                            </div>

                            <br>
                            <br>
                            <hr>
                            <br>
                            <br>

                            <div class="uk-grid">
                                <div class="uk-width-1-1 uk-float-right">
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

    <script>

        function onload() {

            $('#reason').hide();

        }

   function fit() {
       var fit=$('#status').val();
        if (fit==1){
            $('#reason').hide();
        }
   }
   function unfit() {
       var unfit=$('#statuss').val();
       if (unfit==0){
           $('#reason').show();
       }
   }
    </script>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_medical_report').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>