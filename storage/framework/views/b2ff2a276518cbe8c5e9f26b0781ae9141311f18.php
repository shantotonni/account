<?php $__env->startSection('title', 'Mofa Edit'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Edit Mofa </span></h2>
                            </div>
                        </div>
                        <div class="md-card">
                            <?php echo Form::open(['url' => route('mofa_update',$mofa->id), 'method' => 'POST','files' => true]); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Mofa Date <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="mofa_date" name="mofa_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e($mofa->mofaDate); ?>" />
                                        </div>
                                        <?php if($errors->first('mofa_date')): ?>
                                            <div class="uk-text-danger">Date is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Pax Id <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Pax </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Pax" id="local_ref" name="pax_ref">
                                                <option>Select Pax</option>
                                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($value->id ==$mofa->pax_id): ?>
                                                    <option selected value=" <?php echo e($value->id); ?> " > <?php echo e($value->paxid); ?> </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('pax_ref')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('pax_ref')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="mofa_number">Mofa Number <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="mofa_number">Mofa Number</label>
                                            <input class="md-input" type="text" id="mofa_number" name="mofa_number" value="<?php echo e($mofa->mofaNumber); ?>" />
                                            <?php if($errors->has('mofa_number')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('mofa_number')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Number</label>
                                            <input class="md-input" type="text" id="iqamaNumber" name="iqamaNumber" value="<?php echo e($mofa->iqamaNumber); ?> " />

                                        </div>
                                    </div> -->

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Profession</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Profession</label>
                                            <input class="md-input" type="text" id="profession" value="<?php echo $mofa->profession; ?>"  name="profession" />
                                            <?php if($errors->has('profession')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('profession')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Medical Center Submit Date <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="mofa_date" value="<?php echo $mofa->medical_submit_date; ?>" name="medical_submit_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                        </div>
                                        <?php if($errors->has('medical_submit_date')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors->first('medical_submit_date')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="status">Status</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <p>
                                                <input <?php echo e($mofa->status==1 ? "checked":''); ?>  value="1" type="radio" name="status" id="status" data-md-icheck />
                                                <label  for="radio_demo_1"  class="inline-label">ok</label>
                                            </p>
                                            <p>
                                                <input <?php echo e($mofa->status==0 ? "checked":''); ?> type="radio" value="0" name="status"  id="status" data-md-icheck />
                                                <label for="status" class="inline-label">not ok</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="comments">Comments</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="comments">Comments</label>
                                            <div class="uk-form-row">
                                                <textarea name="comments" cols="30" rows="4" class="md-input no_autosize"><?php echo e($mofa->comment); ?></textarea>
                                                <?php if($errors->has('comments')): ?>
                                                    <div class="uk-text-danger"><?php echo e($errors->first('comments')); ?></div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <div class="uk-grid main_upload_sec"  data-uk-grid-margin>
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
                                                                <input type="text" id="visaType" class="md-input" name="title[]" />
                                                                <br>
                                                                <br>
                                                                <input type="file" class="md-input" name="img_url[]">
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
                                    <?php $__currentLoopData = $mofa->mofa_file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="uk-grid " data-uk-grid-margin>
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
                                                                    <input id="img_url" type="file" class="md-input" name="img_url[<?php echo 'old_'.$file['id']; ?>]">
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
                                    <br>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="comments">User</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="comments">Created By  <?php echo e($mofa->createdBy->name); ?></label>

                                            <br/>

                                            <label for="comments">Updated By  <?php echo e($mofa->updatedBy->name); ?></label>

                                      </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="comments">Date TIme</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="comments">Created At  <?php echo e($mofa->created_at); ?></label>

                                            <br/>

                                            <label for="comments">Updated At  <?php echo e($mofa->updated_at); ?></label>

                                        </div>
                                    </div>



              <hr>

              <div class="uk-grid uk-ma" data-uk-grid-margin>
                  <div class="uk-width-1-1 uk-float-left">
                      <button type="submit" class="md-btn md-btn-primary" >Update</button>
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
        setInterval(function () {
            var uploadedfile = document.querySelectorAll('#img_url').length;
          //  var old = document.querySelectorAll('.old').length;

            if(uploadedfile>=1){

              $('.main_upload_sec').hide();
              $('.btnSectionRemove').hide();

            }else{
               $('.main_upload_sec').show();
               $('.btnSectionRemove').show();
            }




        },1000);

        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_mofa').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>