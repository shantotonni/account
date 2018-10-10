<?php $__env->startSection('title', 'Medical Slip Form'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('angular'); ?>
    <script src="<?php echo e(url('app/moneyin/invoice/invoice.module.js')); ?>"></script>
    <script src="<?php echo e(url('app/moneyin/invoice/invoice.controller.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            <?php if(Session::has('message')): ?>
                <div class="uk-alert uk-alert-danger" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <?php echo Session::get('message'); ?>

                </div>
            <?php endif; ?>
                
                    
                
            <?php echo Form::open(['url' => route('medical_slip_form_store'),'method' => 'POST','files' => true]); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create Medical Slip Form</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Select Pax ID <span style="color: red">*</span></h3>
                                        <div class="uk-grid">
                                            <div class="uk-width-large-1-2">
                                                <select id="selec_adv_1" name="recruit_id[]" multiple class="pax_id">
                                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Passport Received<span style="color: red"></span></h3>
                                        <div class="uk-grid">
                                            <div class="uk-width-large-1-2">
                                                <select id="selec_adv_3" name="received_status[]" multiple class="pax_id_2">
                                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="md-card">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Passport Submitted<span style="color: red"></span></h3>
                                        <div class="uk-grid">
                                            <div class="uk-width-large-1-2">
                                                <select id="selec_adv_4" name="submitted_status[]" multiple>
                                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Application Date<span style="color: red">*</span></label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select date</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="dateOfApplication">
                                        <?php if($errors->has('dateOfApplication')): ?>
                                            <span style="color:red; position: relative; right:-500px"><?php echo $errors->first('dateOfApplication'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Country Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Country Name</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="country_name">
                                        <?php if($errors->has('country_name')): ?>
                                            <span style="color:red; position: relative; right:-500px"><?php echo $errors->first('country_name'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <br>
                                <!-- <div class="uk-grid" data-uk-grid-margin>
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
                                                            <input type="text" id="visaType" class="md-input"  name="title[]" required="1"/>
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
                                </div> -->

                                <hr>
                                <div class="uk-grid uk-ma" data-uk-grid-margin>
                                    <div class="uk-width-1-1 uk-float-left">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    
        
            
              

            

            

            

                

            

        
        
    

    <script type="text/javascript">
        $(window).load(function(){
            $("#tiktok2").trigger('click');
        })
        $('#sidebar_recruit').addClass('current_section');
        $('#medical_slip_form_index').addClass('act_item');
    </script>

    <script>
        altair_forms.parsley_validation_config();
    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>