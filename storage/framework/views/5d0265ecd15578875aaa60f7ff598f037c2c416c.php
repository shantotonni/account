<?php $__env->startSection('title', 'Edit Training'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            <?php if(Session::has('msg')): ?>
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <?php echo Session::get('msg'); ?>

                </div>
            <?php endif; ?>
            <?php echo Form::open(['url' => route('training_update',$recruit->training->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Edit Training</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Pax Id <i style="color:red" class="material-icons">stars</i></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="paxid" readonly>
                                            <option value="">Select Pax Id</option>
                                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php if($value->id == $recruit->training->paxid): ?>
                                                    <option value="<?php echo $value->id; ?>" selected><?php echo $value->paxid; ?></option>
                                                
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <?php if($errors->has('paxid')): ?>

                                            <span style="color:red; position: relative; right:-500px"><?php echo $errors->first('paxid'); ?></span>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Received Date</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select date</label>
                                        <input class="md-input" type="text" id="uk_dp_1" name="received_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $recruit->training->received_date; ?>">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Number</label>
                                        <input class="md-input" type="text" name="number" value="<?php echo $recruit->training->number; ?>">
                                        
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="invoice_date">Center Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="invoice_date">Select Name</label>
                                            <input class="md-input" type="text" name="center_name" value="<?php echo $recruit->training->center_name; ?>">
                                            
                                        </div>
                                    </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_number">Comments </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_number"></label>
                                        <textarea type="text" name="comment" class="md-input" cols="4" rows="4" id="comment"><?php echo $recruit->training->comment; ?></textarea>



                                    </div>
                                </div>

                                
                                        
                                            
                                        
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                     
                                                                 
                                                            
                                                        
                                                    
                                                
                                            
                                        
                                    

                                <?php $__currentLoopData = $recruit->training->trainingFile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                                                                <input type="text" id="visaType" class="md-input" value="<?php echo $file['title']; ?>"  name="title[<?php echo 'old_'.$file['id']; ?>]" />
                                                                <br>
                                                                <br>
                                                                <input type="file" class="md-input" name="img_url[<?php echo 'old_'.$file['id']; ?>]">
                                                                <input type="hidden" value="<?php echo $file['id']; ?>" name="img_id[]" >
                                                                <br>

                                                                
                                                                    
                                                                 
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


                                <hr class="uk-grid-divider">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Created By</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle"><?php echo isset($recruit->createdBy['name']) ? $recruit->createdBy['name']:''; ?></span>
                                    </div>
                                </div>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Updated By</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle"><?php echo isset($recruit->updatedBy['name']) ? $recruit->updatedBy['name']:''; ?></span>
                                    </div>
                                </div>


                                <hr class="uk-grid-divider">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Created At</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle"><?php echo isset($recruit->created_at) ? $recruit->created_at:''; ?></span>
                                    </div>
                                </div>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Updated At</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle"><?php echo isset($recruit->updated_at) ? $recruit->updated_at:''; ?></span>
                                    </div>
                                </div>

                                <hr>


                                <div class="uk-grid uk-ma" data-uk-grid-margin>

                                    <div class="uk-width-2-5 uk-float-left">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
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
    <script type="text/javascript">
        function myFunc(){
            var comment = $("#comment").val();

            if(comment == ''){
                $("#validate").html("Comment field is required!");
                return false;
            }

        }

    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_training').addClass('act_item');
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
        altair_forms.parsley_validation_config();
    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>