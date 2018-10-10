<?php $__env->startSection('title', 'Recruite Order create'); ?>

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New order</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="<?php echo e(route('order')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="<?php echo e(route('order_create')); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="<?php echo e(URL::previous()); ?>" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <?php echo Form::open(['url' => route('order_store'), 'method' => 'POST']); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">PassPort Date<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="order_date" name="order_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e(old('order_date')); ?>" />
                                        </div>
                                        <?php if($errors->first('order_date')): ?>
                                            <div class="uk-text-danger">Date is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">PassPort Issue  Date<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="order_date" name="issue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo e(old('issue_date')); ?>" />
                                        </div>
                                        <?php if($errors->first('issue_date')): ?>
                                            <div class="uk-text-danger">Date is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Customer<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Customer </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="local_ref" name="customer_id">
                                                <option>Select Customer</option>
                                                <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value=" <?php echo e($value->id); ?> " > <?php echo e($value->display_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('customer_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('customer_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Package<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Package </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select package" id="local_ref" name="package_id">
                                                <option>Select Package</option>
                                                <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value=" <?php echo e($value->id); ?> " > <?php echo e($value->item_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('package_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('package_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Register Serial<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">RegisterSerial </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Serail" id="local_ref" name="registerSerial_id">
                                                <option>Select RegisterSerial</option>
                                                <?php $__currentLoopData = $registerserial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value=" <?php echo e($value->id); ?> " > <?php echo e($value->registerSerial); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                            <?php if($errors->has('registerSerial_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('registerSerial_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="order_pax">Pax <span style="color: red">*</span> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="order_pax">Pax</label>
                                            <input class="md-input" type="text" id="order_pax" onkeyup="checkchar(this)" name="paxid" value="<?php echo e(old('paxid')); ?>" />
                                            <span id="order_pax_msg"></span>
                                            <?php if($errors->has('paxid')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('paxid')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Passport Number<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="passportNumber">Passport Number</label>
                                            <input class="md-input" type="text" id="passportNumber"  name="passportNumber" value="<?php echo e(old('passportNumber')); ?> " />
                                            <?php if($errors->has('passportNumber')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('passportNumber')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Passport Number <br/> (in Bangla)</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="passportNumberbn">Passport Number</label>
                                            <input class="md-input" type="text" id="passportNumberbn"  name="passportNumberbn" value="<?php echo e(old('passportNumberbn')); ?> " />
                                            <?php if($errors->has('passportNumberbn')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('passportNumberbn')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="placeofissue">Place Of Issue</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="placeofissue">Place Of Issue</label>
                                            <input class="md-input" type="text" id="placeofissue"  name="placeofissue" value="<?php echo e(old('placeofissue')); ?> " />
                                            <?php if($errors->has('placeofissue')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('placeofissue')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <hr>

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
    $('#sidebar_recruit_order').addClass('act_item');

    $('#order_pax').on('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            $('#order_pax_msg').text("Not Allowed, only '-' is allowed").css("color", "red");
            return false;
        }else{
            $('#order_pax_msg').text('');
        }
    });

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>