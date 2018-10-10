<?php $__env->startSection('title', 'Create NoteSheet Form'); ?>

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
            <?php if(Session::has('msg')): ?>
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <?php echo Session::get('msg'); ?>

                </div>
            <?php endif; ?>
            <?php echo Form::open(['url' => route('note_sheet_update',$note->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create NoteSheet Form</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Date Of Application</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select date</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->applicationDate; ?>" name="applicationDate" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                        <?php if($errors->has('applicationDate')): ?>

                                            <span style="color:red; position: relative; right:-500px"><?php echo $errors->first('applicationDate'); ?></span>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Country Name And Gender</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Country Name</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->countryGender; ?>" name="countryGender">
                                        <?php if($errors->has('countryGender')): ?>

                                            <span style="color:red; position: relative; right:-500px"><?php echo $errors->first('countryGender'); ?></span>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Source Income Tax</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->sourceIncomeTax; ?>" name="sourceIncomeTax">

                                    </div>
                                </div>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Welfare Fee</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Welfare Fee/Person</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->welfareFee; ?>" name="welfareFee">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Pay Order Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select PAy Order Number</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->payOrderNumber; ?>" name="payOrderNumber">
                                    </div>
                                </div>



                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Chalan Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax NA Fee</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->chalanNumber; ?>" name="chalanNumber">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Info Attestation</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Info Attestation</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="<?php echo $note->infoAttestation; ?>" name="infoAttestation">
                                    </div>
                                </div>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Pay Order Date</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Pay Order Date</label>
                                        <input class="md-input" type="text" id="uk_dp_start" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $note->payOrderDate; ?>" name="payOrderDate">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Chalan Date</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Chalan Date</label>
                                        <input class="md-input" type="text" id="uk_dp_start" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="<?php echo $note->chalanDate; ?>" name="chalanDate">
                                    </div>
                                </div>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Certificate Attestation </label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Certificate Attestation</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="certificateAttestation" value="<?php echo $note->certificateAttestation; ?>">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date"> Pay Order Amount</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Pay Order Amount</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="payOrderAmount" value="<?php echo $note->payOrderAmount; ?>">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Chalan Amount</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Chalan Amount</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="chalanAmount" value="<?php echo $note->chalanAmount; ?>">
                                    </div>
                                </div>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-3-5">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                <form action="" data-parsley-validate>
                                                    <?php $__currentLoopData = $immipax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                    <div class="uk-grid uk-grid-medium form_section form_section_separator" id="d_form_section" data-uk-grid-match>
                                                        <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php if($value->id==$item->recruit_id): ?>

                                                        <div class="uk-width-9-10">

                                                            <div class="uk-grid">
                                                                <div class="uk-width-1-1">
                                                                    <div class="parsley-row">
                                                                        <label>Brifing</label>
                                                                        <input type="text" class="md-input" value="<?php echo $item->brifing; ?>" name="brifing[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-grid">
                                                                <div class="uk-width-1-1">
                                                                    <div class="parsley-row">
                                                                        <label>Comment</label>
                                                                        <input type="text" class="md-input" value="<?php echo $item->comment; ?>" name="comment[]">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="uk-grid">
                                                                <div class="uk-width-1-1">
                                                                    <div class="parsley-row">
                                                                        <select id="d_form_select_country" name="recruit_id[]" data-md-selectize required>

                                                                                <option value="<?php echo $value->id; ?>" selected><?php echo $value->paxid; ?></option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="uk-width-1-10 uk-text-center">
                                                            <div class="uk-vertical-align uk-height-1-1">
                                                                <div class="uk-vertical-align-middle">
                                                                    <a href="#" class="btnSectionClone" data-section-clone="#d_form_section"><i class="material-icons md-36">&#xE146;</i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    </div>


                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <br>
                                <br>

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

    <script>
        $('#sidebar_recruit').addClass('current_section');
        $('#sidebar_note_sheet_index').addClass('act_item');
    </script>

    <script>
        altair_forms.parsley_validation_config();
        $(window).load(function(){
            $("#tiktok2").trigger('click');
            $("#ticktok3").trigger('click');
        })
    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>