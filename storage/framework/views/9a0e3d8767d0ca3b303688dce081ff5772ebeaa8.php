<?php $__env->startSection('title', 'Credit Notes'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
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

                        <li class="heading_list">Recent Credit Notes</li>

                        <?php $__currentLoopData = $credit_notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit_note_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('credit_note_show', ['id' => $credit_note_data->id])); ?>" class="md-list-content">
                                <span class="md-list-heading uk-text-truncate">
                                   CN-<?php echo e($credit_note_data->credit_note_number); ?>

                                    <span class="uk-text-small uk-text-muted">(<?php echo e(date('d-m-Y',strtotime($credit_note_data->credit_note_date))); ?>)</span>
                                </span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="<?php echo e(route('credit_note')); ?>">See All</a>
                        </li>

                    </ul>
                </div>
            </div>
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
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="#">Edit</a>
                                            </li>
                                            <?php if($credit_note->file_url): ?>
                                                <li>
                                                    <a download href="<?php echo e(url($credit_note->file_url)); ?>">Attach File</a>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <a href="<?php echo e(route('credit_note_refund_create', ['id' => $credit_note->id])); ?>">Refund</a>
                                            </li>
                                            <li>
                                                <a class="uk-text-danger" href="#">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">#CN-<?php echo e($credit_note->credit_note_number); ?></h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 301px;">
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
                                        <h2 style="text-align: center; width: 90%;" class="">CREDIT NOTE</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># CN-<?php echo e(str_pad($credit_note->credit_note_number, 6, '0', STR_PAD_LEFT)); ?></p>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Bill To:</span>
                                        <address>
                                            <p><strong><?php echo e($credit_note->customer->display_name); ?></strong></p>
                                           <?php if(!empty($credit_note->customer->company_name) && !empty($credit_note->customer->phone_number_1)): ?>
                                            <p>
                                                <?php echo e($credit_note->customer->company_name); ?>,
                                                <?php echo e($credit_note->customer->phone_number_1); ?>

                                            </p>
                                            <?php endif; ?>
                                            <p>Billing Address-
                                                <?php if(!empty($credit_note->customer->billing_street)): ?>
                                                <?php echo e($credit_note->customer->billing_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->billing_city)): ?>
                                                <?php echo e($credit_note->customer->billing_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->billing_state)): ?>
                                                <?php echo e($credit_note->customer->billing_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->billing_zip_code)): ?>
                                                <?php echo e($credit_note->customer->billing_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($credit_note->customer->billing_country); ?>

                                            </p>
                                            <p>Shipping address-
                                                <?php if(!empty($credit_note->customer->shipping_street)): ?>
                                                <?php echo e($credit_note->customer->shipping_street); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->shipping_city)): ?>
                                                <?php echo e($credit_note->customer->shipping_city); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->shipping_state)): ?>
                                                <?php echo e($credit_note->customer->shipping_state); ?>,
                                                <?php endif; ?>
                                                <?php if(!empty($credit_note->customer->shipping_zip_code)): ?>
                                                <?php echo e($credit_note->customer->shipping_zip_code); ?>,
                                                <?php endif; ?>
                                                <?php echo e($credit_note->customer->shipping_country); ?>

                                            </p>
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Credit Date :</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($credit_note->created_at->format('d M, Y')); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table border="1" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th class="uk-text-right">Qty</th>
                                            <th class="uk-text-right">Rate</th>
                                            <th class="uk-text-right">Discount(%)</th>
                                            <th class="uk-text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        <?php $__currentLoopData = $credit_note_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit_note_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="uk-table-middle">
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($credit_note_entry->item->item_name); ?> <?php if($credit_note_entry->description): ?><br><?php echo e($credit_note_entry->description); ?><?php endif; ?></td>
                                                <td class="uk-text-right"><?php echo e($credit_note_entry->quantity); ?></td>
                                                <td class="uk-text-right"><?php echo e($credit_note_entry->rate); ?></td>
                                                <td class="uk-text-right"><?php echo e($credit_note_entry->discount); ?>%</td>
                                                <td class="uk-text-right"><?php echo e($credit_note_entry->amount); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Sub Total</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($sub_total); ?></td>
                                        </tr>

                                        <?php if($credit_note->tax_total>0): ?>
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Tax</td>
                                                <td class="uk-text-right no-border-bottom"><?php echo e($credit_note->tax_total); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($credit_note->shiping_charge>0): ?>
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Shipping Charge</td>
                                                <td class="uk-text-right no-border-bottom"><?php echo e($credit_note->shiping_charge); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if($credit_note->adjustment > 0 || $credit_note->adjustment < 0): ?>
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Adjustment</td>
                                                <td class="uk-text-right no-border-bottom"><?php echo e($credit_note->adjustment); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Total</td>
                                            <td class="uk-text-right no-border-bottom"><?php echo e($credit_note->total_credit_note); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">Balance Due</td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">BDT  <?php echo e($credit_note->available_credit); ?></td>
                                        </tr>
                                        </tbody>
                                        <?php if(!empty($credit_note->customer_note)): ?>
                                        <caption align="bottom"> Note: <?php echo e($credit_note->customer_note); ?></caption>
                                        <?php endif; ?>
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

                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-print">
                    <div class="uk-margin-large-top">
                        <h2 class="heading_b">Refund History</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Payment Mode</th>
                                            <th class="uk-text-right">Amount Refunded</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        <?php $__currentLoopData = $credit_note->creditNoteRefunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td><?php echo e($count++); ?></td>
                                            <td><?php echo e($refund->created_at->format('d M Y')); ?></td>
                                            <td><?php echo e($refund->paymentMode->mode_name); ?></td>
                                            <td class="uk-text-right">BDT <?php echo e($refund->amount); ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo e(route('credit_note_refund_edit', ['id' => $refund->id])); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="refund_delete_btn">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i>
                                                </a>
                                                <input type="hidden" value="<?php echo e($refund->id); ?>" class="refund_id">
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin-top">
                        <h2 class="heading_b">Applied Invoices</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Invoice#</th>
                                            <th class="uk-text-right">Amount Credited</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        <?php $__currentLoopData = $credit_note->creditNotePayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="uk-table-middle">
                                                <td><?php echo e($count++); ?></td>
                                                <td><?php echo e($payment->created_at->format('d M Y')); ?></td>
                                                <td><?php echo e($payment->invoice->invoice_number); ?></td>
                                                <td class="uk-text-right">BDT <?php echo e($payment->amount); ?></td>
                                                <td class="uk-text-center">
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
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
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>

        $('#sidebar_money_in').addClass('current_section');
        $('#sidebar_credit_note').addClass('act_item');

        $('.refund_delete_btn').click(function () {
            var id = $(this).next('.refund_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/credit-note/refund/delete/"+id;
            })
        });

        $('.payment_delete_btn').click(function () {
            var id = $(this).next('.payment_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/credit-note/delete/"+id;
            })
        })

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
             _("status").innerHTML = "Upload Aborted";
            alert("Upload Aborted");
            _("progressBar").style.display = "none";
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.invoice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>