<?php $__env->startSection('title', 'Add VisaStamping'); ?>

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
            <?php echo Form::open(['url' => route('visastamp_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">New VisaStamp </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                            </div>

                            <div class="uk-width-medium-2-6">
                                <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">


                                    <option <?php if(old('type')==1): ?> selected <?php endif; ?> value="1">Outgoing </option>
                                    <option <?php if(old('type')==2): ?> selected <?php endif; ?> value="2">Incoming </option>
                                </select>
                                <?php if($errors->has('send_date')): ?>
                                    <span style="color:red"><?php echo $errors->first('send_date'); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="uk-grid" id="sending_date">
                            <div class="uk-width-medium-1-5">
                                <label class="uk-vertical-align-middle"  for="start_date">Sending date </label>
                            </div>
                            <div class="uk-width-2-6">

                                <input class="md-input" type="text"  name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">

                            </div>

                        </div>
                        <div class="uk-grid" id="return_date">
                            <div class="uk-width-medium-1-5">

                                <label class="uk-vertical-align-middle" for="start_date">Return date </label>
                            </div>
                            <div class="uk-width-2-6">
                                <label for="start_date">Return date </label>
                                <input class="md-input" type="text"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                <?php if($errors->has('return_date')): ?>
                                    <span style="color:red"><?php echo $errors->first('return_date'); ?></span>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="uk-grid form_section" id="d_form_row">
                            <div class="uk-width-medium-1-5">

                                <label class="uk-vertical-align-middle" for="paxid">PaxId  </label>
                            </div>
                            <div class="uk-width-2-6">
                                <div class="uk-input-group">
                                    <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select PaxId" id="paxid" name="paxid[]">
                                        <option value="">Select Pax Id</option>
                                        <?php $__currentLoopData = $recrut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo $value->id; ?> " selected><?php echo $value->paxid; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('paxid')): ?>
                                        <span style="color:red"><?php echo $errors->first('paxid'); ?></span>
                                    <?php endif; ?>
                                    <div class="uk-width-1-1">
                                        <label for="user_edit_personal_info_control">Comment</label>
                                        <textarea class="md-input" name="comment[]" id="user_edit_personal_info_control" cols="30" rows="4"></textarea>
                                    </div>
                                    <span class="uk-input-group-addon">
                                                <a href="#" class="btnSectionClone" data-section-clone="#d_form_row"><i class="material-icons md-24">&#xE146;</i></a>
                                     </span>
                                </div>
                            </div>

                        </div>

                                </div>
                                <div class="uk-grid" data-uk-grid-margin-bottom>
                                    <div class="uk-width-medium-1-5">

                                    </div>
                                    <div class="uk-width-1-5">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <a href="<?php echo e(url()->previous()); ?>" type="button" class="md-btn md-btn-flat uk-modal-close">Close</a>
                                    </div>
                                </div>
                       <br/>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <script type="text/javascript">

        window.onload=function () {
           document.getElementById("sending_date").style.display = 'none';
           document.getElementById("return_date").style.display = 'block';
            onTypeSelected();
        }
        function onTypeSelected(){
            var type=document.getElementById("type").value;
            if(type==2){

                document.getElementById("sending_date").style.display='none';
                document.getElementById("return_date").style.display='block';
            }
            else{
                document.getElementById("sending_date").style.display='block';
                document.getElementById("return_date").style.display='none';
            }

        }
    </script>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
        <!-- handlebars.js -->
        <script src="<?php echo e(url('admin/bower_components/handlebars/handlebars.min.js')); ?>"></script>
        <script src="<?php echo e(url('admin/assets/js/custom/handlebars_helpers.min.js')); ?>"></script>

        <!--  invoices functions -->
        <script src="<?php echo e(url('admin/assets/js/pages/page_invoices.min.js')); ?>"></script>
        <script type="text/javascript">
            $('#sidebar_recruit').addClass('current_section');
        </script>
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>