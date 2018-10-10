<?php $__env->startSection('title', 'Payment Made'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php $theader = app('\App\Lib\TemplateHeader'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        #table_center th,td{
            border-color: black !important;

        }
        table#info{
            font-size: 12px !important;
            line-height: 2px;
            border: 1px solid black !important;

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
            h1,p,h2 {
                font-size: 12px;
            }

            #company,#download {

                display:none;
            }
            #company_h{

            }

            #table_center th,td{

                font-size: 11px;

            }

            #payemnt_rec{

            }
            #payemnt_code{
                position: relative;


            }

            #address_info{
                position: relative;
                top:-60px;

            }
            #recieve{
                position: relative;

            }
            #amount{
                font-size: 00px;
            }

            table#info{
                width: 80%;
                position: relative;
                top:-60px;

            }
            #excess_payment{
                position: relative;
                top:-100px;

            }
            #table_center{
                position: relative;
                top:-140px;

            }
            #look{
                position: relative;

            }
            body{
                margin-top: -50px;
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

                        <li class="heading_list">Recent Payment Made</li>
                        <?php $__currentLoopData = $payment_mades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_made_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="">
                            <a href="<?php echo e(route('payment_made_show' , $payment_made_data->id)); ?>" class="md-list-content" type="button">
                            <span class="md-list-heading uk-text-truncate"><?php echo e($payment_made_data->customer->display_name); ?></br>
                            <span class="uk-text-small uk-text-muted"><?php echo e($payment_made_data->payment_date); ?></span>
                            </span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="<?php echo e(route('payment_made')); ?>">See All</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="uk-width-large-8-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar hidden-print">
                            <div class="md-card-toolbar-actions hidden-print">

                                <span  style="display: none;" id="loaded_n_total"></span>
                                <span  id="status"></span> <progress id="progressBar" value="0" max="100" style="float: left;margin-right: 15px; margin-top: 10px; height: 20px;width:300px; display: none;"></progress>
                                <div  style="float: left;margin-right: 15px; height: 14px;" class="uk-form-file md-btn md-btn-wave-light">
                                    Upload file
                                    <input name="file1" id="file1" type="file" onchange="uploadFile()">
                                </div>
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="<?php echo e(route('payment_made_edit', ['id' => $payment_made->id])); ?>">Edit</a>
                                            </li>
                                            <?php if($payment_made->file_url): ?>
                                             <li>
                                                 <a download href="<?php echo e(url($payment_made->file_url)); ?>">Attach File</a>
                                             </li>
                                            <?php endif; ?>
                                            <li>
                                                <a class="uk-text-danger" href="<?php echo e(route('payment_made_delete', ['id' => $payment_made->id])); ?>">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">#PR-0001</h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 301px;">

                            <?php if($theader->getBanner()->headerType): ?>
                                <div class="" style="text-align: center;">

                                    <img src="<?php echo e(asset($theader->getBanner()->file_url)); ?>">
                                </div>
                            <?php else: ?>
                                <div class="uk-grid" data-uk-grid-margin style="text-align: center; margin-top: 20px; ">
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
                                        <h2 style="text-align: center; width: 90%;" class="">PAYMENT Voucher</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># PM-<?php echo e(str_pad($payment_made->id, 6, '0', STR_PAD_LEFT)); ?></p>
                                    </div>
                                </div>
                                
                            </div>
                           
                           
                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    
                                    <div id="address_info" class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Payment To :</span>
                                        <address>
                                            <p><strong><?php echo e($payment_made->customer->display_name); ?></strong></p>
                                            <?php if(!empty($payment_made->customer->company_name) && !empty($payment_made->customer->phone_number_1)): ?>
                                            <p>
                                                    <?php echo e($payment_made->customer->company_name); ?>,<?php echo e($payment_made->customer->phone_number_1); ?>

                                             </p>
                                           <?php endif; ?>
                                            <p>Billing Address-
                                                <?php if(!empty($payment_made->customer->billing_street)): ?>
                                                <?php echo e($payment_made->customer->billing_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->billing_city)): ?>
                                                <?php echo e($payment_made->customer->billing_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->billing_state)): ?>
                                                <?php echo e($payment_made->customer->billing_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->billing_zip_code)): ?>
                                                <?php echo e($payment_made->customer->billing_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($payment_made->customer->billing_country); ?>

                                            </p>
                                            <p>Shipping address-
                                                <?php if(!empty($payment_made->customer->shipping_street)): ?>
                                                <?php echo e($payment_made->customer->shipping_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->shipping_city)): ?>
                                                <?php echo e($payment_made->customer->shipping_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->shipping_state)): ?>
                                                <?php echo e($payment_made->customer->shipping_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($payment_made->customer->shipping_zip_code)): ?>
                                                <?php echo e($payment_made->customer->shipping_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($payment_made->customer->shipping_country); ?>

                                            </p>
                                        </address>
                                    </div>
                                </div>
                                 <div id="recieve" class="uk-width-small-1-2 uk-row-first">

                                     <table id="info" border="1" class="uk-table inv_top_right_table">

                                         <tr class="uk-table-middle">
                                             <td class="no-border-bottom">Amount Received :</td>
                                             <td class="uk-text-right no-border-bottom">BDT <?php echo e($payment_made->amount); ?></td>
                                         </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Payment Date :</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($payment_made->payment_date); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Reference Number :</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($payment_made->reference); ?></td>
                                        </tr>


                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom">Paid Through :</td>
                                                <td class="uk-text-right no-border-bottom"><?php echo e($payment_made->account->account_name); ?></td>
                                            </tr>

                                         <?php if($payment_made->invoice_show == "on"): ?>
                                             <tr class="uk-table-middle">
                                                 <td class="no-border-bottom">Bank Info :</td>
                                                 <td class="uk-text-right no-border-bottom"><?php echo e($payment_made->bank_info); ?></td>
                                             </tr>
                                         <?php endif; ?>

                                    </table>
                                </div>
                            </div>

                            <div id="excess_payment" class="uk-grid">
                                <div  class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <address>
                                            <p><strong></strong></p>
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <div id="table_center" class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table border="1" class="uk-table">
                                        <caption>
                                            <span class="uk-text-muted uk-text-small uk-text-italic">Over payment: <?php echo e($payment_made->excess_amount); ?></span>
                                        </caption>
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Bill Number</th>
                                            <th>Bill Date</th>
                                            <th>Bill Amount </th>
                                            <th>Payment Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $payment_made_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_made_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="uk-table-middle">
                                                <td><?php echo e($payment_made_entry->bill->bill_number); ?></td>
                                                <td><?php echo e($payment_made_entry->bill->bill_date); ?></td>
                                                <td><?php echo e($payment_made_entry->bill->amount); ?></td>
                                                <td><?php echo e($payment_made_entry->amount); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                       <caption style="margin-top: 20px;" align="bottom"><span style="float: left" class="uk-text-small ">Customer Signature</span> <span style="float: right" class="uk-text-small uk-margin-bottom">Company Representative</span></caption>
                                    </table>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-print">
                    <div class="uk-margin-large-top">
                        <h2 class="heading_b">More Information</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Deposit To :</td>
                                            <td class="uk-text-right no-border-bottom">Account Name</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin-top">
                        <h2 class="heading_b">Payment History</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Date</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="uk-table-middle">
                                            <td>12-june 2017</td>
                                            <td>Payment of amount</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
                _("progressBar").value = 0;
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
             _("status").innerHTML = "Upload Failed";
            alert("Upload Failed");
            _("progressBar").style.display = "none";
        }

        function abortHandler(event) {
            // _("status").innerHTML = "Upload Aborted";
            alert("Upload Aborted");
            _("progressBar").style.display = "none";
        }
        $('#sidebar_money_out').addClass('current_section');
        $('#sidebar_payment_made').addClass('act_item');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>