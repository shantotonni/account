<?php $__env->startSection('title', 'Bill'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('angular'); ?>
    <script src="<?php echo e(url('app/moneyout/bill/billEdit.controller.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="uk-grid" ng-controller="BillEditController">
        <div class="uk-width-large-10-10">
            <?php echo Form::open(['url' => route('bill_update',['id' => $bill->id]), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']); ?>

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">

                        <input type="hidden" ng-init="bill_id='asdfg'" value="<?php echo e($bill->id); ?>" name="bill_id" ng-model="bill_id">

                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Edit Bill</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Vendor Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="customer_id">
                                            <option value="">Select Vendor</option>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <option value="<?php echo e($customer->id); ?>" <?php echo e($customer->id == $bill->vendor_id ? 'selected="selected"' : ''); ?>><?php echo e($customer->display_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="bill_number">Bill Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="bill_number">Enter Bill Number</label>
                                        <input class="md-input" type="text" id="bill_number" name="bill_number" value="<?php echo e(str_pad($bill->bill_number, 6, '0', STR_PAD_LEFT)); ?>" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="order_number">Order Number</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="order_number">Enter Order Number</label>
                                        <input class="md-input" type="text" id="order_number" name="order_number" value="<?php echo e($bill->order_number); ?>"/>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="bill_date">Bill Date</label>
                                    </div>
                                    <div clpass="uk-width-medium-2-5">
                                        <label for="bill_date">Select date</label>
                                        <input class="md-input" type="text" id="bill_date" name="bill_date" value="<?php echo e(date("d-m-Y",strtotime($bill->bill_date))); ?>"  data-uk-datepicker="{format:'DD-MM-YYYY'}">
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="due_date">Due Date</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="due_date">Select date</label>
                                        <input class="md-input" type="text" id="due_date" name="due_date" value="<?php echo e(date("d-m-Y",strtotime($bill->due_date))); ?>" data-uk-datepicker="{format:'DD-MM-YYYY'}">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Item Rates Are</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <select
                                                id="item_rates"
                                                class="item_rates"
                                                name="item_rates"
                                                ng-model="item_rates"
                                                ng-change="itemRateAre()"
                                                required>

                                        </select>
                                    </div>
                                </div>

                                <div class="uk-grid uk-margin-large-top uk-margin-large-bottom" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <table class="uk-table">
                                            <thead>
                                            <tr>
                                                <th class="uk-text-nowrap">Item Details</th>
                                                <th class="uk-text-nowrap">Account</th>
                                                <th class="uk-text-nowrap">Quantity</th>
                                                <th class="uk-text-nowrap">Rate</th>
                                                <th class="uk-text-nowrap uk-width-medium-1-6">Tax</th>
                                                <th class="uk-text-nowrap">Amount</th>
                                                <th class="uk-text-nowrap">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr ng-repeat="bill_entry in bill_entries track by $index" class="form_section" id="data_clone">
                                                <td>
                                                    <select id="item_id_{{ $index }}" class="item_id" name="item_id[]" ng-model="item_id" ng-change="getItemRate($index)" required>


                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="account_id_{{ $index }}" class="account_id" name="account_id[]" ng-model="account_id" required>

                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" id="quantity_{{ $index }}" ng-init="quantity[$index]='1'" name="quantity[]" ng-model="quantity[$index]" ng-keyup="calculateBill()" class="md-input" required/>
                                                </td>
                                                <td>
                                                    <input type="text" id="rate_{{ $index }}" name="rate[]" ng-init="rate[$index]='0.00'" ng-model="rate[$index]" ng-keyup="calculateBill()" class="md-input" required/>
                                                </td>
                                                <td>
                                                    <select id="tax_id_{{ $index }}" class="tax_id" name="tax_id[]" ng-model="tax_id" ng-change="calculateBill()" required>


                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" id="amount_{{ $index }}" name="amount[]" ng-init="amount[$index]='0.00'" ng-model="amount[$index]" class="md-input" readonly="readonly" required/>
                                                </td>
                                                <td class="uk-text-right uk-text-middle">
                                                    <i class="material-icons md-36" ng-click="Remove($index)">delete</i>
                                                </td>
                                            </tr>
                                            <tr style="border-bottom: 0px;" class="form_section" id="data_clone">
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td class="uk-text-right uk-text-middle">
                                                            <span class="uk-input-group-addon">
                                                            <a ng-click="Append()"><i class="material-icons">&#xE147;</i></a></span>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-margin-medium-top"></div>
                                    <div class="uk-width-medium-2-3">
                                        <table class="uk-table">
                                            <tbody>
                                            <tr class="form_section">
                                                <td>
                                                    Sub Total
                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    {{ sub_total | number : 2}}
                                                </td>
                                            </tr>

                                            <tr ng-if="tax_total>0" class="form_section">
                                                <td>
                                                    Tax Total
                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    {{ tax_total | number : 2}}
                                                </td>
                                            </tr>
                                            <tr class="form_section">
                                                <th>Total(BDT)</th>
                                                <th></th>
                                                <th>{{ total_amount | number : 2}}</th>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <input type="hidden" ng-model="tax_total" name="tax_total" value="{{ tax_total }}">
                                        <input type="hidden" ng-model="total_amount" name="total_amount" value="{{ total_amount }}">
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
                                                <span>
                                                    <?php if($bill->file_url): ?>
                                                        <a  download href="<?php echo e(url($bill->file_url)); ?>" >downlaod attachment</a>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                            <div class="uk-width-medium-1-1">
                                                <div class="uk-form-file uk-text-primary"
                                                     style="width: 200px; height: 30px; border-color: #ececec; border-style: dotted; text-align: center; ">
                                                    <p style="margin: 4px;">Uplaod File</p>
                                                    <input onchange="uploadLavel()" id="form-file" type="file" name="file1">
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
                                        <?php if($bill->save==1): ?>
                                            <button type="submit" class="md-btn md-btn-primary" name="save">Save</button>
                                        <?php else: ?>
                                            <button type="submit" class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" name="submit">Submit</button>
                                        <?php endif; ?>


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
        $('#sidebar_bill').addClass('act_item');
        altair_forms.parsley_validation_config();
    </script>

    <script src="<?php echo e(url('admin/bower_components/parsleyjs/dist/parsley.min.js')); ?>"></script>
    <script src="<?php echo e(url('admin/assets/js/pages/forms_validation.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>