<?php $__env->startSection('title'); ?>
   Add Musaned
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
            <form action="<?php echo e(route('musaned_store')); ?>"  method="post" class="uk-form-stacked" id="musaned_store">
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                         <?php echo e(csrf_field()); ?>

                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Add Musaned </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="customer_name">Pax Id <i style="color:red" class="material-icons">stars</i></label>
                                </div>
                                <div class="uk-width-1-4">
                                    <div class="parsley-row">
                                        <select name="paxid" id="paxid" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="select id">
                                            <option value="">Select Customer</option>
                                            <?php $__currentLoopData = $recrut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->paxid; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                        <?php if($errors->has('paxid')): ?>

                                            <span style="color:red; margin: 5px;"><?php echo $errors->first('paxid'); ?></span>

                                        <?php endif; ?>
                                    </div>
                                </div>



                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="customer_name">Issue Date <i style="color:red" class="material-icons">stars</i></label>
                                </div>
                                <div class="uk-width-1-4">
                                    <label for="isssue_date" style="margin-top: -10px;">Issue date</label>
                                    <input class="md-input" type="text" id="isssue_date" name="isssue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    <?php if($errors->has('isssue_date')): ?>

                                        <span style="color:red"><?php echo $errors->first('isssue_date'); ?></span>

                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="customer_name">Company Name</label>
                                </div>
                                <div class="uk-width-1-4">
                                    <div class="parsley-row">
                                        <select name="cpname" id="cpname" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="select id">

                                            <option value="">Select company</option>
                                            <?php $__currentLoopData = $com; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                
                                </div>

                            <div class="uk-grid">
                                <div class="uk-width-medium-1-5 uk-vertical-align">

                                </div>
                                <div class="uk-width-2-5 uk-float-right">
                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_musaned').addClass('act_item');

    </script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>