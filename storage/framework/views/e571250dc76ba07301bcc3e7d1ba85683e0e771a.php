<?php $__env->startSection('title', 'Bill'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('app/moneyout/bill/bill.module.js')); ?>"></script>
    <script src="<?php echo e(url('app/moneyout/bill/bill.excessPayment.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

    <style>



        #table_center th,td{
            border-bottom-color: black !important;
        }
        table#info{
            font-size: 12px !important;
            line-height: 2px;
            border: 1px solid black !important;
            min-width: 200px;
            float:right;
        }
        table#info tr td{
            border: 1px solid black !important;
        }
        table#info tr{
            padding: 0px;
            border: 1px solid black !important;
        }
        @media  print {
            body {

                margin-top: -100px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside">

                        <li class="heading_list">Recent Bills</li>

                        <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('bill_show', ['id' => $bill_data->id])); ?>" class="md-list-content">
                                <span class="md-list-heading uk-text-truncate"><?php echo e($bill_data->customer->display_name); ?> <span class="uk-text-small uk-text-muted"><?php echo e(date('d-m-Y',strtotime($bill_data->bill_date))); ?></span></span>
                                <span class="uk-text-small uk-text-muted">BILL-<?php echo e($bill_data->bill_number); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="<?php echo e(route('bill')); ?>">See All</a>
                        </li>

                    </ul>
                </div>
            </div>

            <?php
            $helper = new \App\Lib\Helpers;
            ?>

            <div class="uk-width-large-8-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">

                                <span  style="display: none;" id="loaded_n_total"></span>
                                <span id="status"></span> <progress id="progressBar" value="0" max="100" style="float: left;margin-right: 15px; margin-top: 10px; height: 20px;width:300px; display: none;"></progress>
                                <div  style="float: left;margin-right: 15px; height: 14px;" class="uk-form-file md-btn md-btn-wave-light">
                                    Upload file
                                    <input name="file1" id="file1" type="file" onchange="uploadFile()">
                                </div>
                                <?php if($bill->save==1): ?>
                                    <a  href="<?php echo route('bill_update_mark',$bill->id); ?>" id="popup" style="float: left;margin-right: 15px" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">Mark as Open</a>
                                <?php endif; ?>
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="<?php echo e(route('bill_edit', ['id' => $bill->id])); ?>">Edit</a>
                                            </li>
                                            <?php if($bill->file_url): ?>
                                                <li>
                                                    <a download href="<?php echo e(url($bill->file_url)); ?>">Attach File</a>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <a class="uk-text-danger" href="">Delete</a>
                                            </li>
                                            <li>
                                                <a disabled  href="#">Use Excess Payment</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">BILL-<?php echo e($bill->bill_number); ?></h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 301px;">
                            <?php echo $__env->make('inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php $theader = app('\App\Lib\TemplateHeader'); ?>
                            <?php if($theader->getBanner()->headerType): ?>
                                <div class="" style="text-align: center;">

                                    <img src="<?php echo e(asset($theader->getBanner()->file_url)); ?>">
                                </div>
                            <?php else: ?>
                                <div class="uk-grid" data-uk-grid-margin style="text-align: center;">
                                    <h1 style="width: 100%; text-align: center;"><img style="text-align: center;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="15" width="71"/> <?php echo e($OrganizationProfile->company_name); ?></h1>
                                </div>
                                <div class="" style="text-align: center;">

                                    <p><?php echo e($OrganizationProfile->street); ?>,<?php echo e($OrganizationProfile->city); ?>,<?php echo e($OrganizationProfile->state); ?>,<?php echo e($OrganizationProfile->country); ?></p>

                                    <p style="margin-top: -17px;"><?php echo e($OrganizationProfile->email); ?>,<?php echo e($OrganizationProfile->contact_number); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="uk-grid" data-uk-grid-margin>
                                
                                <div class="uk-width-5-5" style="font-size: 12px;">
                                    <div class="uk-grid">
                                        <h2 style="text-align: center; width: 90%;" class="">BILL</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># BILL-<?php echo e(str_pad($bill->bill_number, 6, '0', STR_PAD_LEFT)); ?> <br/> <b><?php echo e($bill->save?"Draft":''); ?></b></p>

                                    </div>
                                </div>
                                
                            </div>
                            <input type="hidden" name="invoice_id">

                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Bill From:</span>
                                        <address>
                                            <p><strong><?php echo e($bill->customer->display_name); ?></strong></p>
                                            <?php if(!empty($bill->customer->company_name) && !empty($bill->customer->phone_number_1)): ?>
                                            <p>
                                                <?php echo e($bill->customer->company_name); ?>,
                                                <?php echo e($bill->customer->phone_number_1); ?>

                                            </p>
                                            <?php endif; ?>
                                            <p>Billing Address-
                                                <?php if(!empty($bill->customer->billing_street)): ?>
                                                <?php echo e($bill->customer->billing_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->billing_city)): ?>
                                                <?php echo e($bill->customer->billing_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->billing_state)): ?>
                                                <?php echo e($bill->customer->billing_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->billing_zip_code)): ?>
                                                <?php echo e($bill->customer->billing_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($bill->customer->billing_country); ?>

                                            </p>
                                            <p>Shipping address-
                                                <?php if(!empty($bill->customer->shipping_street)): ?>
                                                <?php echo e($bill->customer->shipping_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->shipping_city)): ?>
                                                <?php echo e($bill->customer->shipping_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->shipping_state)): ?>
                                                <?php echo e($bill->customer->shipping_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($bill->customer->shipping_zip_code)): ?>
                                                <?php echo e($bill->customer->shipping_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($bill->customer->shipping_country); ?>

                                            </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2">
                                    <p style="text-align: right; width: 99%; margin: 0; padding: 0;" class="uk-text-small uk-margin-right-remove">Balance Due</p>
                                    <h2 style="text-align: right; width: 99%;" class="uk-margin-top-remove">BDT <?php echo e($bill->due_amount); ?></h2>
                                    <table id="info" class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-right no-border-bottom">Bill Date :</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($bill->bill_date); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-right no-border-bottom">Due Date :</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($bill->due_date); ?></td>
                                        </tr>
                                        <?php if(isset($bill->Recruit)): ?>
                                            <tr style="white-space:nowrap; line-height: 10px;">
                                                <td class="uk-text-right "> Passenger Name</td>
                                                <td style="white-space:nowrap; text-align: right"><?php echo strlen($bill->Recruit->first_name)>25?$bill->Recruit->first_name."<br/>":$bill->Recruit->first_name." "; ?> <?php echo e($bill->Recruit->last_name); ?> </td>
                                            </tr>

                                            <tr >
                                                <td class="uk-text-right " style="word-wrap: break-word"> Ticket Number</td>
                                                <td class="uk-text-right "><?php echo e($bill->Recruit->ticket_number); ?></td>
                                            </tr>
                                         <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table id="table_center" border="1" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th class="uk-text-right">Qty</th>
                                            <th class="uk-text-right">Rate</th>
                                            <th class="uk-text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $bill_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td>1</td>
                                            <td><?php echo e($bill_entry->item->item_name); ?></td>
                                            <td class="uk-text-right"><?php echo e($bill_entry->quantity); ?></td>
                                            <td class="uk-text-right"><?php echo e($bill_entry->rate); ?></td>
                                            <td class="uk-text-right"><?php echo e($bill_entry->amount); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Sub Total</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($sub_total); ?></td>
                                        </tr>
                                        <?php if($bill->total_tax>0): ?>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Tax</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($bill->total_tax); ?></td>
                                        </tr>
                                        <?php endif; ?>

                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Total</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($bill->amount); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">Balance Due</td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">BDT <?php echo e($bill->due_amount); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2" style="text-align: left">
                                    <p class="uk-text-small uk-margin-bottom">Customer Signature</p>
                                </div>
                                <div class="uk-width-1-2" style="text-align: right">
                                    <p class="uk-text-small uk-margin-bottom">Company Representative</p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <p class="uk-text-small uk-margin-bottom">Looking forward for your business.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-print">
                    <div class="uk-margin-large-top">
                        <h2 class="heading_b">Payment Made</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Date</th>
                                            <th class="uk-text-right">Payment#</th>
                                            <th class="uk-text-right">Reference#</th>
                                            <th class="uk-text-right">Payment Mode</th>
                                            <th class="uk-text-right">Amount</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $payment_made_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_made_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="uk-table-middle">
                                                <td><?php echo e($payment_made_entry->paymentMade->payment_date); ?></td>
                                                <td class="uk-text-right">Payment</td>
                                                <td class="uk-text-right"><?php echo e($payment_made_entry->paymentMade->reference); ?></td>
                                                <td class="uk-text-right"><?php echo e($payment_made_entry->paymentMade->paymentMode->mode_name); ?></td>
                                                <td class="uk-text-right">BDT <?php echo e($payment_made_entry->amount); ?></td>
                                                <td class="uk-text-center">
                                                    <a href="<?php echo e(route('payment_made_edit', ['id' => $payment_made_entry->payment_made_id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                    <input type="hidden" class="payment_made_entry_id" value="<?php echo e($payment_made_entry->id); ?>">
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        
        <?php echo $__env->make('bill::bill.use_excess_payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sweet_alert'); ?>
    <script>
        function _(el) {
            return document.getElementById(el);
        }

        function uploadFile(){
            _("progressBar").style.display = "block";
            var file = _("file1").files[0];


            var size= file.size/1024/1024;
            if(size>10){
                _("status").innerHTML = "file size not allowed";
                _("status").style.color = "red";
                return false;
            }
            _("status").style.color = "black";
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", window.location.href);
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
             _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        }

        function completeHandler(event) {
             _("status").innerHTML = event.target.responseText;

           // UIkit.modal.alert(event.target.responseText)
            _("progressBar").value = 100;
            _("progressBar").style.display = "block";
        }

        function errorHandler(event) {
            //  _("status").innerHTML = "Upload Failed";
            alert("Upload Failed");
            _("progressBar").style.display = "none";
        }

        function abortHandler(event) {
            // _("status").innerHTML = "Upload Aborted";
            alert("Upload Aborted");
            _("progressBar").style.display = "none";
        }
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_bill').addClass('act_item');

        $('.delete_btn').click(function () {
            var id = $(this).next('.payment_made_entry_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/payment-made/delete-payment-made-entry/"+id;
            })
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>