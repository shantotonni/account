<?php $__env->startSection('title', 'Invoice'); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('app/moneyin/invoice/invoice.module.js')); ?>"></script>
    <script src="<?php echo e(url('app/moneyin/invoice/invoice.useCredit.js')); ?>"></script>
    <script src="<?php echo e(url('app/moneyin/invoice/invoice.excessPayment.js')); ?>"></script>
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

            #print{
                display: none;
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

                        <li class="heading_list">Recent Invoices</li>

                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a href="<?php echo e(url('/invoice/show'.'/'.$invoice_data->id)); ?>" class="md-list-content">
                                <span class="md-list-heading uk-text-truncate"><?php echo e($invoice_data->customer->display_name); ?> <span class="uk-text-small uk-text-muted">(<?php echo e($invoice_data->created_at->format('d M Y')); ?>)</span></span>
                                <span class="uk-text-small uk-text-muted">INV-<?php echo e(str_pad($invoice_data->invoice_number, 6, '0', STR_PAD_LEFT)); ?></span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="<?php echo e(url('/invoice')); ?>">See All</a>
                        </li>

                    </ul>
                </div>
            </div>

            <?php
            $helper = new \App\Lib\Helpers;

            ?>
            <?php $theader = app('\App\Lib\TemplateHeader'); ?>
            <div class="uk-width-large-8-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">

                        <div class="md-card-toolbar" style="border-bottom: 0px solid rgba(0,0,0,.12);">

                            <div class="md-card-toolbar-actions hidden-print">

                                <span  style="display: none;" id="loaded_n_total"></span>
                                <span  id="status"></span>   <progress id="progressBar" value="0" max="100" style="float: left;margin-right: 15px; margin-top: 10px; height: 20px;width:300px; display: none;"></progress>
                                <div  style="float: left;margin-right: 15px; height: 14px;" class="uk-form-file md-btn md-btn-wave-light">
                                    Upload file
                                    <input name="file1" id="file1" type="file" onchange="uploadFile()">
                                </div>
                               <?php if($invoice->save==1): ?>
                                  <a  href="<?php echo route('invoice_update_save',$invoice->id); ?>" id="popup" style="float: left;margin-right: 15px" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">Mark as Open</a>
                                <?php endif; ?>
                                <?php if($invoice->save==1): ?>

                                <p id="draft" style="margin: 0;padding: 0;padding-top: 7px;float: left;margin-right: 10px;text-transform: uppercase">Draft</p>

                                <?php endif; ?>

                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul id="nav_in_without_href" class="uk-nav" style="display: <?php echo e($invoice->save==1?'block':'none'); ?>">


                                               <li>
                                                   <a href="<?php echo e(url('/invoice/show'.'/'.$invoice->id)); ?>">Invoice</a>
                                               </li>

                                               <li>
                                                   <a href="<?php echo e(url('/invoice/edit'.'/'.$invoice->id)); ?>">Edit</a>
                                               </li>
                                               <?php if($invoice->file_url): ?>
                                                <li>
                                                    <a  href="<?php echo e(url($invoice->file_url)); ?>" downlaod class="uk-nav-header">Attach File</a>
                                                </li>
                                               <?php endif; ?>
                                               <li>
                                                   <a class="uk-nav-header">Use Credits</a>
                                               </li>
                                               <li>
                                                   <a class="uk-nav-header">Use Excess Payment</a>
                                               </li>
                                               <li>
                                                   <a class="uk-nav-header">Create Credit Note</a>
                                               </li>
                                               <li>
                                                   <a class="uk-nav-header">Challan</a>
                                               </li>
                                        </ul>

                                     <ul id="nav_in_with_href" class="uk-nav" style="display: <?php echo e($invoice->save==1?'none':'block'); ?>" >

                                              <li>
                                                  <a href="<?php echo e(url('/invoice/show'.'/'.$invoice->id)); ?>">Invoice</a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo e(url('/invoice/edit'.'/'.$invoice->id)); ?>">Edit</a>
                                              </li>
                                         <?php if($invoice->file_url): ?>
                                             <li>
                                                 <a  href="<?php echo e(url($invoice->file_url)); ?>" download>Attach File</a>
                                             </li>
                                         <?php endif; ?>
                                              <li>
                                                  <a data-uk-modal="{target:'#modal_header_footer'}" href="#">Use Credits</a>
                                              </li>
                                              <li>
                                                  <a data-uk-modal="{target:'#modal_header_footer1'}" href="#">Use Excess Payment</a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo e(url('/invoice'.'/'.$invoice->id.'/create-credit')); ?>">Create Credit Note</a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo e(url('invoice/challan'.'/'.$invoice->id)); ?>">Challan</a>
                                              </li>




                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="margin-top: 0px;">

                           <?php if($theader->getBanner()->headerType): ?>
                                <div class="" style="text-align: center;">

                                <img src="<?php echo e(asset($theader->getBanner()->file_url)); ?>">
                                </div>
                            <?php else: ?>
                                <div class="uk-grid" data-uk-grid-margin style="text-align: center;">
                                    <h1 style="width: 100%; text-align: left;"><img style="text-align: left;height: 140px;width: 55%;" class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt=""></h1>
                                </div>
                                
                           <?php endif; ?>


                            <div class="uk-grid" data-uk-grid-margin>
                                
                                <div class="uk-width-5-5" style="font-size: 12px;">
                                    <div class="uk-grid">
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <input type="hidden" ng-init="invoice_id='asdfg'" value="<?php echo e($invoice->id); ?>" name="invoice_id" ng-model="invoice_id">

                            <div class="uk-grid" style="font-size: 12px;">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span ><b> Bill To:</b></span>
                                        <address>
                                            <p>Name- <?php echo e($invoice->customer->display_name); ?></p>
                                            <p>
                                                <?php if(!empty($invoice->customer->company_name)): ?>
                                                Company- <?php echo e($invoice->customer->company_name); ?>,
                                                <?php endif; ?>
                                                Phone- <?php echo e($invoice->customer->phone_number_1); ?>

                                            </p>

                                            
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2">
                                    <div class="uk-width-small-1-1">
                                        <!-- <p style="text-align: right; width: 99%; margin: 0; padding: 0;" class="uk-text-small uk-margin-right-remove">Balance Due</p>
                                        <h2 style="text-align: right; width: 99%;" class="uk-margin-top-remove">BDT <?php echo e($helper->getDueBalance($invoice->id)); ?></h2> -->
                                    </div>
                                    <table id="info" class="uk-table inv_top_right_table">
                                        
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Invoice No </td>
                                            <td class="uk-text-center "><?php echo e(str_pad($invoice->invoice_number, 6, '0', STR_PAD_LEFT)); ?></td>
                                        </tr>
                                     
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Invoice Date </td>
                                            <td class="uk-text-center "><?php echo e(date('d-m-Y',strtotime($invoice->invoice_date))); ?></td>
                                        </tr>
                                        <?php if(!empty($ticket_order->first_name ) || !empty($ticket_order->last_name )): ?>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Passenger Name </td>
                                            <td class="uk-text-center "><?php echo e($ticket_order->first_name); ?> <?php echo e($ticket_order->last_name); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">E-Mail </td>
                                            <td class="uk-text-center "></td>
                                        </tr>
                                        <?php if(!empty($ticket_order->contact_number)): ?>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Phone</td>
                                            <td class="uk-text-center "><?php echo e($ticket_order->contact_number); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Total Amout</td>
                                            <td class="uk-text-center "><?php echo e($invoice->total_amount); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Total Amount Due</td>
                                            <td class="uk-text-center "><?php echo e($helper->getDueBalance($invoice->id)); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Amount Paid</td>
                                            <td class="uk-text-center"><?php echo e($invoice->total_amount - $helper->getDueBalance($invoice->id)); ?></td>
                                        </tr>
                                        <!-- <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Deposit Received</td>
                                            <td class="uk-text-center "></td>
                                        </tr> -->
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom" style="font-size: 12px;">
                                <div class="uk-width-1-1">
                                    <table id="table_center" border="1" class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th class="uk-text-center">Sector</th>
                                            <th class="uk-text-center"><?php echo e($ticket_order->departureSector); ?></th>
                                            <th class="uk-text-center">Tax Rate</th>
                                            <th class="uk-text-center">Hotel(If Any)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-center">Destination</td>
                                            <td class="uk-text-center"><?php echo e($ticket_order->arriveTo); ?></td>
                                            <td class="uk-text-center" rowspan="3">
                                              <?php $total_ticket_tax_amount=0; ?>
                                              <?php $__currentLoopData = $ticket_order->Ticket_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php echo e($ticket->title); ?> - <?php echo e($ticket->amount); ?> <br>
                                                <?php $total_ticket_tax_amount=$total_ticket_tax_amount+$ticket->amount; ?>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </td>
                                            <td class="uk-text-center" >
                                              <?php if($ticket_order->ticket_hotel_id): ?>
                                                <?php echo e($ticket_order->hotel->title); ?>

                                              <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-center">Travel Dates</td>
                                            <td class="uk-text-center"><?php echo e($ticket_order->departureDate); ?></td>
                                            <!-- <td class="uk-text-center"> </td> -->
                                            <td class="uk-text-center" >
                                              <?php if($ticket_order->ticket_hotel_id): ?>
                                                <?php echo e($ticket_order->hotel->address); ?>

                                              <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-center">No. of Travelers</td>
                                            <td class="uk-text-center"><?php echo e($ticket_order->adultPassenger + $ticket_order->childPassenger + $ticket_order->infantPassenger); ?></td>
                                            <!-- <td class="uk-text-center"> </td> -->
                                            <td class="uk-text-center" >
                                              <?php if($ticket_order->ticket_hotel_id): ?>
                                                <?php echo e($ticket_order->hotel->note); ?>

                                              <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td >Service</td>
                                            <td>Description</td>
                                            <td class="uk-text-center">Amount per Traveler</td>
                                            <td class="uk-text-center">Total Amount in BDT</td>
                                        </tr>
                                        <?php $__currentLoopData = $invoice_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-center"><?php echo e($invoice_entry->item->item_name); ?></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"><?php echo e($invoice_entry->rate); ?></td>
                                            <td class="uk-text-center"><?php echo e($invoice_entry->amount); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td ></td>
                                            <td></td>
                                            <td class="uk-text-center">Sub Total</td>
                                            <td class="uk-text-center"><?php echo e($sub_total); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle hidden">
                                            <td ></td>
                                            <td></td>
                                            <td class="uk-text-center">Tax on Airticket</td>
                                            <td class="uk-text-center"><?php echo e($total_ticket_tax_amount); ?></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td ></td>
                                            <td></td>
                                            <td class="uk-text-center">Other Tax</td>
                                            <td class="uk-text-center"><?php if(($invoice->shipping_charge>0) && ($invoice->adjustment>0)): ?>
                                            <?php echo e(number_format($invoice->total_amount - $sub_total -$invoice->shipping_charge-$invoice->adjustment,2)); ?>


                                            <?php elseif($invoice->shipping_charge>0): ?>
                                            <?php echo e(number_format($invoice->total_amount - $sub_total -$invoice->shipping_charge,2)); ?>


                                            

                                            <?php else: ?>
                                            <?php echo e(number_format($invoice->total_amount - $sub_total,2)); ?>

                                            <?php endif; ?></td>
                                        </tr>

                                        

                                        <tr class="uk-table-middle">
                                            <td class="uk-text-center "></td>
                                            <td class=""></td>
                                            <td class="uk-text-center ">Total</td>
                                            <td class="uk-text-center "><?php echo e($invoice->total_amount); ?></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                    <p>In Words - <?php echo e(ucfirst($numberTransformer->toWords($invoice->total_amount))); ?> BDT Only</p>

                                    
                                </div>
                            </div>
                            <?php if($invoice->customer_note): ?>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">

                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                    <p class="uk-text-small uk-margin-bottom"><?php echo e($invoice->customer_note); ?></p>



                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="uk-grid">
                                <div class="uk-width-1-2" style="text-align: left">
                                    <p class="uk-text-small uk-margin-bottom">Customer Signature</p>
                                </div>
                                <div class="uk-width-1-2" style="text-align: right">
                                    <p  class="uk-text-small uk-margin-bottom">Company Representative</p>
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
                        <h2 class="heading_b">Payments Received</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table report_table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th class="uk-text-right">Payment#</th>
                                            <th class="uk-text-right">Reference#</th>
                                            <th class="uk-text-right">Payment Mode</th>
                                            <th class="uk-text-right">Amount</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        <?php $__currentLoopData = $payment_receive_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_receive_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($payment_receive_entry->paymentReceive->payment_date); ?></td>
                                            <td class="uk-text-right"><?php echo e($payment_receive_entry->payment_receives_id); ?></td>
                                            <td class="uk-text-right"><?php echo e($payment_receive_entry->paymentReceive->reference); ?></td>
                                            <td class="uk-text-right"><?php echo e($payment_receive_entry->paymentReceive->paymentMode->mode_name); ?></td>
                                            <td class="uk-text-right">BDT <?php echo e($payment_receive_entry->amount); ?></td>
                                            <td class="uk-text-center">
                                                <a href="<?php echo e(url('/payment-received/edit'.'/'.$payment_receive_entry->payment_receives_id)); ?>"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="payment_receive_delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="payment_receive_entry_id" value="<?php echo e($payment_receive_entry->id); ?>">
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
                        <h2 class="heading_b">Credits Applied</h2>
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
                                            <th>Credit Note</th>
                                            <th class="uk-text-right">Credits Applied</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        <?php $__currentLoopData = $credit_receive_entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit_receive_entry): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr class="uk-table-middle">
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($credit_receive_entry->creditNote->credit_note_date); ?></td>
                                            <td><?php echo e($credit_receive_entry->credit_note_id); ?></td>
                                            <td class="uk-text-right">BDT <?php echo e($credit_receive_entry->amount); ?></td>
                                            <td class="uk-text-center">
                                                
                                                <a class="credit_receive_entry_delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="credit_receive_entry_id" value="<?php echo e($credit_receive_entry->id); ?>">
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

        
        <?php echo $__env->make('invoice::invoice.use_credit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('invoice::invoice.use_excess_payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 50px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Stock Unavailable</h4>
                    </div>
                    <form action="<?php echo route('adding_stock',$invoice->id); ?>" method="post">
                        <?php echo csrf_field(); ?>

                    <div class="modal-body">
                        <h3 style="list-style: none;color: green;margin-top: 10px;text-decoration: underline">Item</h3>
                        <table class="table table-bordered">
                            <thead style="margin-top: 30px;background-color: #5CB85C;color: white;text-transform: uppercase;">
                            <tr>
                                <th>Pen</th>
                                <th>Available</th>
                                <th>Your Quantity</th>
                            </tr>
                            </thead>
                            <tbody id="stockEntry">

                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Stock & Create</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- show Item Modal -->
        <div class="modal fade" id="message-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 50px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Mark As Open</h4>
                    </div>
                    <form action="<?php echo route('adding_stock',$invoice->id); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="modal-body">
                            <h3 style="list-style: none;color: green;margin-top: 10px;">Invoice was marked as open</h3>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sweet_alert'); ?>

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
            <script>


                $('.payment_receive_delete_btn').click(function () {
                    var id = $(this).next('.payment_receive_entry_id').val();
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this! If you delete this",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function () {
                        window.location.href = "/payment-received/delete-payment-receive-entry/"+id;
                    })
                })

                $('.credit_receive_entry_delete_btn').click(function () {
                    var id = $(this).next('.credit_receive_entry_id').val();
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this! If you delete this",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function () {
                        window.location.href = "/invoice/delete-credit/"+id;
                    })
                })


                    $("#popup").click(function(e){
                        e.preventDefault();
                        axios.post(this.href)
                            .then(function (response) {
                                var row=document.getElementById('stockEntry');
                                row.innerHTML=response.data;


                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                        axios.get(this.href)
                            .then(function (response) {

                              if(response.data.status){


                                  $("#create-item").modal("show");
                                  $("#popup").hide();
                                  setTimeout(function () {
                                      location.reload();
                                  }, 15000)


                              }else{

                                  $("#message-item").modal("show");
                                  $("#popup").hide();
                                  $("#draft").hide();
                                  $("#nav_in_without_href").hide();
                                  $("#nav_in_with_href").show();


                              }

                            })
                            .catch(function (error) {
                                console.log(error);
                            });


                    });
                $('#sidebar_money_in').addClass('current_section');
                $('#sidebar_invoice').addClass('act_item');



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
                    // _("status").innerHTML = event.target.responseText;

                 //   UIkit.modal.alert(event.target.responseText)
                    _("progressBar").value = 100;
                    _("progressBar").style.color = "blue";
                    _("status").innerHTML = event.target.responseText;
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
            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.invoice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>