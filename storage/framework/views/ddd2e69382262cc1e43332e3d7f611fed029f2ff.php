<?php $__env->startSection('title', 'Submission Edit'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onsubmit="return myFunc();">
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
                                <h2 class="heading_b"><span class="uk-text-truncate">Edit Submission </span></h2>
                            </div>
                        </div>
                        <div class="md-card">
                            <?php echo Form::open(['url' => route('submission_update',$submission->id), 'method' => 'POST','files' => true]); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Pax Id <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Pax </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Pax" id="local_ref" name="pax_id">
                                                <option>Select Pax</option>
                                                <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php if($value->id ==$submission->pax_id): ?>
                                                    <option selected value=" <?php echo e($value->id); ?> " > <?php echo e($value->paxid); ?> </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('pax_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('pax_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Submission Date <i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="submission_date" value="<?php echo $submission->submission_date; ?>" name="submission_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                        </div>
                                        <?php if($errors->has('submission_date')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors->first('submission_date')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Expected Date of Flight<i style="color:red" class="material-icons">stars</i></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" value="<?php echo $submission->expected_flight_date; ?>" id="expected_flight_date" name="expected_flight_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                        </div>
                                        <?php if($errors->has('expected_flight_date')): ?>
                                            <div class="uk-text-danger"><?php echo e($errors->first('expected_flight_date')); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="comments">Comments</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="comments">Comments</label>
                                            <div class="uk-form-row">
                                                <textarea name="comment" cols="30" rows="4" class="md-input no_autosize" id="comment"><?php echo e($submission->comment); ?></textarea>
                                                <span style="color:red; position: relative; right:-500px" id="validate"></span>
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    
                                        
                                            
                                        
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                     
                                                                 
                                                            
                                                        
                                                    
                                                
                                            
                                        
                                    
                                    <?php $__currentLoopData = $submission->submition_file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                                            <label for="comments">Created By  <?php echo e($submission->createdBy->name); ?></label>
                                            <br/>
                                            <label for="comments">Updated By  <?php echo e($submission->updatedBy->name); ?></label>
                                      </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="comments">Date TIme</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="comments">Created At  <?php echo e($submission->created_at); ?></label>
                                            <br/>
                                            <label for="comments">Updated At  <?php echo e($submission->updated_at); ?></label>
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
    <script type="text/javascript">
        function myFunc(){
            var comment = $("#comment").val();
            
            if(comment == ''){
                $("#validate").html("Comment field is required!");
                return false;
            }
            
        }
        
    </script>
    
    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_submission').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>