<?php $__env->startSection('title', 'Recruite Order create'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <body onload="load()">


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
                            <?php echo Form::open(['url' => route('order_store'), 'method' => 'POST','files' => true]); ?>

                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <!-- <div class="uk-grid" data-uk-grid-margin>
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
                                    </div> -->
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
                                            <label class="uk-vertical-align-middle" for="Local">Local Reference<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Local Reference </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="local_ref" name="customer_id">
                                                <option>Select Local Reference</option>
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
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Passenger Name<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="passportNumber">Passenger Name</label>
                                            <input class="md-input" type="text" id="passenger_name"  name="passenger_name" value="<?php echo e(old('passenger_name')); ?> " />
                                            <?php if($errors->has('passenger_name')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('passenger_name')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid hidden" data-uk-grid-margin style="visibility: hidden">
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Order Status<span style="color: red">*</span></label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Order Status</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" class="order_image" id="local_ref" onchange="orderimage()" name="order_status">
                                                    <option>Select Order Status</option>
                                                    <option value="1" >Completed</option>
                                                    <option value="2" >Cancelled</option>
                                            </select>
                                            <?php if($errors->has('customer_id')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('customer_id')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin id="substitued_order">
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="passportNumber">Substitued Order</label>
                                            <input class="md-input" type="text" id="substitued_order"  name="substitued_order" value="<?php echo e(old('passenger_name')); ?> " />
                                            <?php if($errors->has('substitued_order')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('substitued_order')); ?></div>
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
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="order_pax">Pax <span style="color: red">*</span> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <input class="md-input" type="text" id="order_pax" onkeyup="checkchar(this)" name="paxid" />
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
                                            <input class="md-input" type="text" id="passportNumber" oninput="input()" name="passportNumber" value="<?php echo e(old('passportNumber')); ?> " />
                                            <?php if($errors->has('passportNumber')): ?>
                                                <div class="uk-text-danger"><?php echo e($errors->first('passportNumber')); ?></div>
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
                                                                <input type="text" id="visaType" class="md-input"  name="title[]" required="1" />
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
                                    </div>

                                    <hr>
                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            <input type="submit" class="md-btn md-btn-primary" name="submit" value="Submit">
                                            <input type="submit" class="md-btn md-btn-primary" name="save" value="Add More Details">
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

            function load() {
                $('#substitued_order').hide();
            }
            function orderimage() {

                var selectOption = $('.order_image').val();

                if (selectOption == 1) {

                    $('#substitued_order').hide();
                }

                if (selectOption == 2) {

                    $('#substitued_order').show();
                }

            }

            function input() {
                var value= $('#passportNumber').val();
                $('#order_pax').val(value);

            }



    $('#sidebar_recruit').addClass('current_section');
    $('#sidebar_recruit_order').addClass('act_item');

    $('#order_pax').on('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        // if (!regex.test(key)) {
        //     event.preventDefault();
        //     $('#order_pax_msg').text("Not Allowed, only '-' is allowed").css("color", "red");
        //     return false;
        // }else{
        //     $('#order_pax_msg').text('');
        // }
        if (!regex.test(key) && !/[\b]/.test(key)) {
            event.preventDefault();
            $('#order_pax_msg').text("Not Allowed, only '-' is allowed").css("color", "red");
            return false;
        }else{
            $('#order_pax_msg').text('');
        }
    });


</script>
    </body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>