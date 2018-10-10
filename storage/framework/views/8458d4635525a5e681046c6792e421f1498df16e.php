<?php $__env->startSection('title', 'Expense'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('angular'); ?>
    <script src="<?php echo e(url('app/moneyout/bill/bill.module.js')); ?>"></script>
    <script src="<?php echo e(url('app/moneyout/bill/expense.controller.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" ng-controller="ExpenseController">
        <div class="uk-width-large-10-10">
            <?php echo Form::open(['url' => route('expense_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                    <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate">Create New Expense</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="expense_date">Expense Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="expense_date">Select date</label>
                                            <input class="md-input" type="text" id="expense_date" name="expense_date" value="<?php echo e(Carbon\Carbon::now()->format('d-m-Y')); ?>" data-uk-datepicker="{format:'DD-MM-YYYY'}" required>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Expense Account</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="account_id" name="account_id" required>
                                                <option value="">Select Account</option>
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounts): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($accounts->id); ?>"><?php echo e($accounts->account_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="amount">Amount</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="amount">Enter Amount</label>
                                            <input class="md-input" type="text" id="amount" ng-model="amount" name="amount" ng-keyup="calculateTax()" />
                                            <?php if($errors->first('amount')): ?>
                                                <div class="uk-text-danger">Amount is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Select Tax</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select id="tax_id"
                                                    class="tax_id"
                                                    name="tax_id"
                                                    ng-model="tax_id"
                                                    ng-change="calculateTax()" required>

                                            </select>
                                            Tax Amount = {{ total_tax | number : 2}} BDT
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Amount Is</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select
                                                    id="amount_is"
                                                    class="amount_is"
                                                    name="amount_is"
                                                    ng-model="amount_is"
                                                    ng-change="calculateTax()"
                                                    required>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="deposite_to">Paid Through</label>
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <select
                                                    id="paid_through_id"
                                                    class="paid_through_id"
                                                    name="paid_through_id"
                                                    ng-model="paid_through_id"
                                                    ng-change="getAccountType()"
                                                    required>
                                            </select>
                                        </div>
                                        <?php if($errors->first('payment_mode_id')): ?>
                                            <div class="uk-text-danger">Deposite is required.</div>
                                        <?php endif; ?>
                                        <div ng-if="account_type!=3" class="uk-width-medium-2-5" id="show">
                                            <label for="reference">Optional(Cash) Requeired(Undeposited Fund)</label>
                                            <input class="md-input" type="text" id="reference" name="bank_info" />
                                            <?php if($errors->first('bank_info')): ?>
                                                <div class="uk-text-danger">Field is required.</div>
                                            <?php endif; ?>
                                        </div>
                                        <div ng-if="account_type!=3" class="uk-width-medium-1-5" id="show">
                                            <input type="checkbox" checked id="invoice_show" name="invoice_show" />
                                            <label for="switch_demo_1" class="inline-label" id="show_invoice">Show In Invoice</label>
                                            <?php if($errors->first('invoice_show')): ?>
                                                <div class="uk-text-danger">Field is required.</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="customer_name">Vendor Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="customer_id" required>
                                                <option value="">Select Customer</option>
                                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->display_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="reference">Reference#</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="reference">Enter Reference Number</label>
                                            <input class="md-input" type="text" id="reference" name="reference" />
                                        </div>
                                    </div>
                                    

                                    <hr>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <p>Payment Options: Paypal-Payza-Skrill </p>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="user_edit_uname_control">Attach Files: </label>
                                                </div>
                                                <div class="uk-width-medium-1-1">
                                                    <div class="uk-form-file uk-text-primary"
                                                         style="width: 200px; height: 30px; border-color: #ececec; border-style: dotted; text-align: center; ">
                                                        <p style="margin: 4px;">Uplaod File</p>
                                                        <input onchange="uploadLavel()"  id="form-file" type="file" name="file1">
                                                    </div>
                                                </div>
                                                <p id="upload_name"></p>
                                            </div>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <p>Template: 'Standered Template' </p>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-2-3">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label for="customer_note">Customer note</label>
                                                    <textarea class="md-input" id="customer_note" name="customer_note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            <button type="submit" class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" name="submit">Submit</button>
                                            <button type="submit" class="md-btn md-btn-primary" name="save">Save</button>
                                            <a href="<?php echo e(route('expense')); ?>" class="md-btn md-btn-flat uk-modal-close">Close</a>
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
        function uploadLavel()
        {
            var fullPath = document.getElementById('form-file').value;
            var upload_file_name_ = document.getElementById('upload_name');
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }

                upload_file_name_.innerHTML  = filename;

            }
        }
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_expense').addClass('act_item');
        altair_forms.parsley_validation_config();
    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>