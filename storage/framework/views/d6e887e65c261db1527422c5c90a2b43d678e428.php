<?php $__env->startSection('title', 'Bank Account'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            <?php echo Form::open(['url' => route('bank_store'), 'method' => 'POST', 'class' => 'user_edit_form','files' => 'true', 'enctype' => "multipart/form-data"]); ?>

                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                    <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create New Bank Info</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Account Type<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="type" name="type" required>
                                                <option value="">Select Account Type</option>
                                                    <option value="Deposit">Deposit</option>
                                                    <option value="Withdrawal">Withdrawal</option>
                                            </select>
                                        </div>
                                        <?php if($errors->first('type')): ?>
                                            <div class="uk-text-danger">Type is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Payment Mode<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup> </label>
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Bank Name" id="bank_name_id" name="payment_mode" required>
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $payment_mode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_mode_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($payment_mode_data->id); ?>"><?php echo e($payment_mode_data->account_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->first('payment_mode')): ?>
                                            <div class="uk-text-danger">Payment Mode is required.</div>
                                        <?php endif; ?>

                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Bank Name<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup>  </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select onchange="bankaccount(this)" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Bank Name" id="bank_name_id" name="bank_name_id" required>
                                                <option value="">Select Bank Name</option>
                                                <?php $__currentLoopData = $bank_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option   value="<?php echo e($bank_name->id); ?>/<?php echo e($bank_name->account_id); ?>"><?php echo e($bank_name->display_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                        <?php if($errors->first('account')): ?>
                                                <div class="uk-text-danger">Account is required.</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="particulars">Particulars<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="particulars"></label>
                                            <input class="md-input" type="text" id="particulars" name="particulars"   required/>
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="date">Date<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="date">Select date</label>
                                            <input class="md-input" type="text" id="date" name="date" value="<?php echo e(Carbon\Carbon::now()->format('d-m-Y')); ?>" data-uk-datepicker="{format:'DD-MM-YYYY'}" required>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="cheque_number">Cheque Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="cheque_number"></label>
                                            <input class="md-input" type="text" id="cheque_number" name="cheque_number"   />
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="total_amount">Total Amount<sup><i style="font-size: 12px; color:red; " class="material-icons">stars</i></sup> </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="total_amount"></label>
                                            <input class="md-input" type="text" id="total_amount" name="total_amount"   required/>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="notes">Notes</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="notes"></label>
                                            <input class="md-input" type="text" id="notes" name="notes"   />
                                        </div>
                             	    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="notes"> File</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <div class="uk-width-1-1">

                                             <input id="form-file" name="file1" type="file">
                                            </div>
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
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        altair_forms.parsley_validation_config();
    </script>
    <script type="text/javascript">

        function bankaccount(name) {
          var id =name.value.split('/')[1];
         // $('#bank_list').hide();
         var index= $('#account').find(":selected").index();
            $("select#account").prop('selectedIndex', 2);
           // console.log(index);


        }


        $('#show_invoice').show();
        $('#bank_info').show();

        $('#bank_name_id').change(function(){
            $( "#bank_name_id option:selected").each(function(){
                if($(this).attr("value")=="3"){
                    $("#show_invoice").hide();
                    $("#bank_info").hide();
                }
                if($(this).attr("value")=="4"){
                    $("#show_invoice").show();
                    $("#bank_info").show();
                }
            });
        }).change();


    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>
    <script type="text/javascript">
        $('#sidebar_bank').addClass('current_section');
        $('#sidebar_bank_bank').addClass('act_item');
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>