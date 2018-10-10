<?php $option = app('App\Lib\RouteOption'); ?>
<!-- main sidebar -->
<aside id="sidebar_main">
    <div style="background-color: #fff; text-align: center;" class="sidebar_main_header">
        <div class="sidebar_logo">
            <a style="margin-left: 0px;" href="<?php echo e(url('dashboard')); ?>" class="sSidebar_hide sidebar_logo_large">
                <img class="logo_regular" src="<?php echo e(url('uploads/op-logo/logo.png')); ?>" alt="" height="15" width="71"/>
            </a>
        </div>
    </div>
    <div class="menu_section">
        <ul>
            <li id="sidebar_dashboard" class="" title="Dashboard">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>

            <li id="sidebar_contact" class="" title="contacts">
                <a href="<?php echo e(route('contact')); ?>">
                    <span class="menu_icon"><i class="material-icons">perm_contact_calendar</i></span>
                    <span class="menu_title">Contacts</span>
                </a>
            </li>

            <li id="sidebar_inventory" class="" title="Inventory">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">add_shopping_cart</i></span>
                    <span class="menu_title">Inventory</span>
                </a>
                <ul>
                    <li id="sidebar_inventory_inventory" class=""><a href="<?php echo e(route('inventory')); ?>">Inventory</a></li>
                    <li id="sidebar_inventory_price_list" class=""><a href="<?php echo e(route('price_list')); ?>">Price List</a></li>
                    <li id="sidebar_inventory_product" class=""><a href="<?php echo e(route('track')); ?>">Product Track</a></li>
                </ul>

            </li>
            <li id="sidebar_bank" class="" title="Account">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">account_balance_wallet</i></span>
                    <span class="menu_title">Bank</span>
                </a>
                <ul>
                    <li id="sidebar_bank_bank" class=""><a href="<?php echo e(url('bank')); ?>">Bank</a></li>
                    <li id="sidebar_bank_report" class=""><a href="<?php echo e(url('bank/report')); ?>">Bank Report</a></li>
                </ul>

            </li>
            <li id="sidebar_money_in" class="" title="Money In">
                <a href="#" id="tiktok5">
                    <span class="menu_icon"><i class="material-icons">attach_money</i></span>
                    <span class="menu_title">Money In</span>
                </a>
                <ul>
                    <li id="sidebar_estimate" class=""><a href="<?php echo e(route('estimate')); ?>">Estimate</a></li>

                    <li id="sidebar_aif" class="" title="Account Information Form">
                        <a href="#">
                            <span class="menu_title">AIF</span>
                        </a>

                        <ul>

                            <li id="sidebar_aif_add" class="" title="AIF ADD">
                                <a href="<?php echo e(route('aif_create')); ?>">
                                    <span class="menu_title">Add</span>
                                </a>
                            </li>

                            <li id="sidebar_aif_view" class="" title="View All">
                                <a href="<?php echo e(route('aif')); ?>">
                                    <span class="menu_title">View All</span>
                                </a>
                            </li>

                            <li id="sidebar_my_aif" class="" title="My AIFs">
                                <a href="<?php echo e(route('my_aif')); ?>">
                                    <span class="menu_title">My AIF's</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li id="sidebar_income" class=""><a href="<?php echo e(route('income')); ?>">Income</a></li>
                    <li id="sidebar_invoice" class=""><a href="<?php echo e(route('invoice')); ?>">Invoice</a></li>
                    <li id="sidebar_payment_recieve" class=""><a href="<?php echo e(route('payment_received')); ?>">Payment Received</a></li>
                    <li id="sidebar_credit_note" class=""><a href="<?php echo e(route('credit_note')); ?>">Credit Notes</a></li>

                </ul>

            </li>
            <li id="sidebar_money_out" class="" title="Money Out">
                <a href="#" id="tiktok6">
                    <span class="menu_icon"><i class="material-icons">money_off</i></span>
                    <span class="menu_title">Money Out</span>
                </a>
                <ul>
                    <li id="sidebar_expense" class=""><a href="<?php echo e(route('expense')); ?>">Expenses</a></li>
                    <li id="sidebar_bill" class=""><a href="<?php echo e(route('bill')); ?>">Bills</a></li>
                    <li id="sidebar_payment_made" class=""><a href="<?php echo e(route('payment_made')); ?>">Payments Made</a></li>
                    <li id="sidebar_sales_commission" class=""><a href="<?php echo e(route('sales_commission')); ?>">Sales Commission</a></li>

                    <li id="sidebar_cnb" class="" title="Conveyance Bill">
                        <a href="#">
                            <span class="menu_title">Conveyance Bill</span>
                        </a>

                        <ul>
                            <li id="sidebar_cnb_add" class="" title="Bill ADD">
                                <a href="<?php echo e(route('cnb_create')); ?>">
                                    <span class="menu_title">Add</span>
                                </a>
                            </li>

                            <li id="sidebar_cnb_view" class="" title="View All">
                                <a href="<?php echo e(route('cnb')); ?>">
                                    <span class="menu_title">View All</span>
                                </a>
                            </li>

                        </ul>

                    </li>

                </ul>

            </li>
            <li id="sidebar_account" class="" title="Accountant">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">account_balance_wallet</i></span>
                    <span class="menu_title">Accountant</span>
                </a>
                <ul>
                    <li id="sidebar_account_jurnal" class=""><a href="<?php echo e(route('journal')); ?>">Manual Journals</a></li>
                    <li id="sidebar_account_chart_of_accounts" class=""><a href="<?php echo e(route('account_chart')); ?>">Chart of Accounts</a></li>
                </ul>

            </li>
            
            <li id="sidebar_reports" class="" title="reports">
                <a href="<?php echo e(url('report')); ?>">
                    <span class="menu_icon"><i class="material-icons">pie_chart</i></span>
                    <span class="menu_title">Reports</span>
                </a>
            </li>


    <?php if($option->ticket() != Null): ?>
        <?php if($option->ticket()->status == 1): ?>

          <li id="sidebar_ticketing" class="" title="Ticketing">
                        <a id="tiktok" href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE8F8;</i></span>
                            <span class="menu_title">Ticketing</span>
                        </a>
                        <ul>

                            <li id="sidebar_ticket_dashboard" class="" title="Ticket Dashboard">
                                <a href="<?php echo e(route('ticket_dashboard_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">Da</i></span>
                                    <span class="menu_title">Dashboard</span>
                                </a>
                            </li>

                            <li id="sidebar_ticket_setting" class="" title="Settings">
                                <a href="#">
                                    <span class="menu_icon"><i class="material-icons">settings</i></span>
                                    <span class="menu_title">Settings</span>

                                </a>

                                <ul>

                                    <li id="sidebar_ticket_commission" class="" title="ticket commission">
                                        <a href="<?php echo e(route('ticket_commission_edit',1)); ?>">
                                            <span class="menu_icon"><i class="material-icons">content_cut</i></span>
                                            <span class="menu_title">Commission</span>
                                        </a>
                                    </li>



                                    <li id="sidebar_ticket_hotel" class="" title="Hotel">
                                        <a href="<?php echo e(route('ticket_hotel_index')); ?>">
                                            <span class="menu_icon"><i class="material-icons" style="color: red">Hotel</i></span>
                                            <span class="menu_title">Ticket Hotel</span>
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li id="sidebar_ticket_order" class="" title="Order">
                                <a href="#">
                                    <span class="menu_icon"><i class="material-icons">airline_seat_flat</i></span>
                                    <span class="menu_title">Order</span>

                                </a>
                                <ul>
                                    <li id="sidebar_ticket_order_new" class="" title="reports">
                                        <a href="<?php echo route('ticket_Order_create'); ?>">
                                            <span class="menu_icon"><i class="material-icons">add_circle</i></span>
                                            <span class="menu_title">New</span>
                                        </a>
                                    </li>
                                    <li id="sidebar_ticket_order_pending" class="" title="reports">
                                        <a href="<?php echo e(route('ticket_Order_pending')); ?>">
                                            <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                            <span class="menu_title">Pending Order</span>
                                        </a>
                                    </li>
                                    <li id="sidebar_ticket_order_confirm" class="" title="reports">
                                        <a href="<?php echo e(route('ticket_Order_confirmed')); ?>">
                                            <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                            <span class="menu_title">Confirm Order</span>
                                        </a>
                                    </li>
                                    
                                        
                                            
                                            
                                        
                                    
                                </ul>

                            </li>
                       <li id="sidebar_ticket_order_docuemnt" class="" title="document">
                           <a href="<?php echo route('ticket_document_index'); ?>">
                               <span class="menu_icon"><i class="material-icons">Ticket</i></span>
                               <span class="menu_title">Ticket Document</span>

                           </a>
                       </li>
                        <li id="sidebar_ticket_order_bill" class="" title="bill">
                            <a href="<?php echo route('ticket_bill_index'); ?>">
                                <span class="menu_icon"><i class="material-icons">Bill</i></span>
                                <span class="menu_title">IATA Bill</span>

                            </a>
                        </li>

                  </ul>

        </li>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php if($option->manPower() != Null): ?>
        <?php if($option->manPower()->status == 1): ?>
            <li id="manpower_service" class="" title="Ticketing">
                <a id="manpower_service_tok" href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE03F;</i></span>
                    <span class="menu_title">Manpower Service</span>
                </a>
                <ul>

                    <li id="manpower_ticket_dashboard" class="" title="Ticket Dashboard">
                        <a href="<?php echo e(route('ticket_dashboard_index')); ?>">
                            <span class="menu_icon"><i class="material-icons">Da</i></span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                    </li>

                    <li id="manpower_ticket_setting" class="" title="Settings">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">settings</i></span>
                            <span class="menu_title">Settings</span>
                        </a>

                        <ul>

                            <li id="manpower_ticket_hotel" class="" title="Hotel">
                                <a href="<?php echo e(route('manpower_service_hotel_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons" style="color: red">Progress</i></span>
                                    <span class="menu_title">Progress Status</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li id="manpower_ticket_order" class="" title="Order">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">airline_seat_flat</i></span>
                            <span class="menu_title">Order</span>

                        </a>
                        <ul>
                            <li id="manpower_ticket_order_new" class="" title="reports">
                                <a href="<?php echo route('manpower_service_create'); ?>">
                                    <span class="menu_icon"><i class="material-icons">add_circle</i></span>
                                    <span class="menu_title">New</span>
                                </a>
                            </li>
                            <li id="manpower_ticket_order_pending" class="" title="reports">
                                <a href="<?php echo e(route('manpower_service_pending')); ?>">
                                    <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                    <span class="menu_title">Pending Order</span>
                                </a>
                            </li>
                            <li id="manpower_ticket_order_confirm" class="" title="reports">
                                <a href="<?php echo e(route('manpower_service_confirmed')); ?>">
                                    <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                    <span class="menu_title">Confirm Order</span>
                                </a>
                            </li>

                        </ul>

                    </li>
                    <li id="manpower_ticket_order_docuemnt" class="" title="document">
                        <a href="<?php echo route('manpower_service_document_index'); ?>">
                            <span class="menu_icon"><i class="material-icons"></i>Document</span>
                            <span class="menu_title"></span>

                        </a>
                    </li>

                </ul>

            </li>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($option->recruit() != Null): ?>
        <?php if($option->recruit()->status == 1): ?>
            <li id="sidebar_recruit" class="" title="Recruit">

                <a id="tiktok2" href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                    <span class="menu_title">Recruit</span>

                </a>

                <ul>
                    <li id="sidebar_recruit_dashboard" class="" title="reports">
                    <a href="<?php echo route('recruitdashboard'); ?>">
                        <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                        <span class="menu_title">Dashboard</span>

                    </a>
                    </li>

                    <li id="sidebar_recruit_order" class="" title="reports">
                        <a href="<?php echo e(route('order')); ?>">
                            <span class="menu_icon"><i class="material-icons">perm_contact_calendar</i></span>
                            <span class="menu_title">All Customers </span>
                        </a>
                    </li>
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            
                        
                    

                    <li id="sidebar_hrmbb" class="" title="Medical">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE147;</i></span>
                            <span class="menu_title">Medical</span>
                        </a>

                        <ul>
                            <li id="medical_slip_form_indexsss" class="" title="Medical Sip">
                                <a href="<?php echo e(route('medical_slip_form_index')); ?>">
                                    <span class="menu_icon"></span>
                                    <span class="menu_title">Medical Sip</span>
                                </a>
                            </li>

                            <li id="sidebar_medical_report" class="" title="Report">
                                <a href="<?php echo route('medicalslip'); ?>">
                                    <span class="menu_title">Report</span>
                                </a>
                            </li>
                            <li id="sidebar_mofa" class="" title="Mofa">
                                <a href="<?php echo route('mofa'); ?>">
                                    <span class="menu_title">Mofa</span>
                                </a>
                            </li>
                            <li id="sidebar_fitcard" class="" title="Fit Card">
                                <a href="<?php echo route('fit_card'); ?>">
                                    <span class="menu_title">Fit Card</span>
                                </a>
                            </li>
                            
                        </ul>

                    </li>

                    <li id="sidebar_police_clearance" class="" title="Police Clearance">
                        <a href="<?php echo route('police_clearance_index'); ?>">
                            <span class="menu_icon"><i class="material-icons">security</i></span>
                            <span class="menu_title">Police Clearance</span>
                        </a>
                    </li>

                    
                        
                            
                            
                        
                    

                    <li id="sidebar_recrut_visa" class="" title="reports">

                        <a href="<?php echo e(route('visa')); ?>">
                            <span class="menu_icon"><i class="material-icons">description</i></span>
                            <span class="menu_title">Visa </span>
                        </a>
                    </li>
                    
                        
                            
                            
                        
                    

                    <li id="visa_stamp" class="" title="reports">
                        <a href="<?php echo e(route('visastamp')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                            <span class="menu_title">Visa Stamping</span>
                        </a>
                    </li>

                    <li id="sidebar_hrmbb" class="" title="Manpower">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">person</i></span>
                            <span class="menu_title">Manpower</span>
                        </a>

                        <ul>

                            <li id="sidebar_finger_2" class="" title="Finger">
                                <a href="<?php echo route('fingerprint_index'); ?>">
                                    <span class="menu_title">Finger</span>
                                </a>
                            </li>
                            <li id="sidebar_training" class="" title="Training">
                                <a href="<?php echo route('training_index'); ?>">
                                    <span class="menu_title">Training</span>
                                </a>
                            </li>
                            <?php if($option->manPower()->status == 1): ?>
                            <li id="sidebar_manpower_index" class="" title="Manpower">

                                <a href="<?php echo e(route('manpower_index')); ?>">
                                    
                                    <span class="menu_title">Manpower</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li id="sidebar_completion" class="" title="Completion">
                                <a href="<?php echo route('completion_index'); ?>">
                                    <span class="menu_title">Completion</span>
                                </a>
                            </li>
                            
                        </ul>

                    </li>


                    <li id="sidebar_hrmbb" class="" title="Flight">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">flight_land</i></span>
                            <span class="menu_title">Flight</span>
                        </a>

                        <ul>
                            <li id="sidebar_submission" class="" title="reports">
                                <a href="<?php echo e(route('submission')); ?>">
                                    <span class="menu_icon"></span>
                                    <span class="menu_title">Submission</span>
                                </a>
                            </li>

                            <li id="sidebar_confirmation" class="" title="Logbook">
                                <a href="<?php echo e(route('confirmation')); ?>">
                                    <span class="menu_title">Confirmation</span>
                                </a>
                            </li>

                        </ul>

                    </li>
                    
                        
                            
                            
                        
                    
                    
                        
                            
                            

                        
                    


                    
                        
                            
                            
                        
                    


                    <!-- <li id="sidebar_flight_index" class="" title="reports">

                        <a href="<?php echo e(route('flight_index')); ?>">
                            <span class="menu_icon"><i class="material-icons">Flight</i></span>
                            <span class="menu_title">Flight</span>
                        </a>
                    </li> -->
                    <li id="sidebar_order_" class="" title="Docuemnt">
                        <a href="<?php echo e(route('document')); ?>">
                            <span class="menu_icon"><i class="material-icons">library_books</i></span>
                            <span class="menu_title">Accounts </span>
                        </a>
                        <ul>
                            <li id="sidebar_order_expense_accounts" class="" title="Docuemnt">
                                <a href="<?php echo e(route('order_expense_accounts')); ?>">
                                    <span class="menu_icon"><i class="material-icons">explicit</i></span>
                                    <span class="menu_title">Expense </span>
                                </a>
                            </li>

                            <li id="sidebar_order_expense_sector" class="" title="Docuemnt">
                                <a href="<?php echo e(route('order_expense_sector')); ?>">
                                    <span class="menu_icon"><i class="material-icons">payment</i></span>
                                    <span class="menu_title">Expense Sector </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li id="sidebar_recruit_document" class="" title="Docuemnt">
                        <a href="<?php echo e(route('document')); ?>">
                            <span class="menu_icon"><i class="material-icons">description</i></span>
                            <span class="menu_title">Documents </span>
                        </a>
                    </li>


                    <li id="sidebar_recruit_forms" class="" title="Money Out">

                        <a id="ticktok3" href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                            <span class="menu_title">Forms</span>

                        </a>

                        <ul>

                            <li id="sidebar_form_basis_edit" class="" title="reports">
                                <a href="<?php echo e(route('form_basis_edit')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Basic Information</span>
                                </a>
                            </li>
                            
                                
                                    
                                    
                                
                            

                            <li id="sidebar_visaacceptance" class="" title="visaacceptance">
                                <a href="<?php echo e(route('visaacceptance')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Visa Acceptance</span>
                                </a>
                            </li>
                            <li id="sidebar_agreement_index" class="" title="reports">
                                <a href="<?php echo e(route('agreement_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Agreement</span>
                                </a>
                            </li>
                            <li id="sidebar_Objection" class="" title="reports">
                                <a href="<?php echo e(route('objection_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">No Objection</span>

                                </a>
                            </li>
                            <li id="sidebar_VLS" class="" title="reports">
                                <a href="<?php echo e(route('visa_process_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">VLS Process</span>

                                </a>
                            </li>
                            <li id="sidebar_Immigration" class="" title="reports">
                                <a href="<?php echo e(route('immigration_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Immigration</span>

                                </a>
                            </li>
                            <li id="sidebar_note_sheet_index" class="" title="reports">
                                <a href="<?php echo e(route('note_sheet_index')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Note Sheet</span>

                                </a>
                            </li>
                            <li id="sidebar_visa_form_m" class="" title="reports">
                                <a href="<?php echo e(route('visaform')); ?>">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Form</span>

                                </a>
                            </li>
                        </ul>
                    </li>

                    <li id="sidebar_customer_report" class="" title="Customer Reports">
                        <a href="<?php echo e(route('recrutereport')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE85C;</i></span>
                            <span class="menu_title">Report</span>
                        </a>
                    </li>

                </ul>

            </li>
            <li id="Hajj" class="" title="Hajj">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE0AF;</i></span>
                    <span class="menu_title">Hajj</span>
                </a>

                <ul>

                    <li id="Hajj_Police_Clearence" class="" title="Clearence">
                        <a href="<?php echo e(route('Hajj_Police_Clearence')); ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: red">Progress</i></span>
                            <span class="menu_title">Police Clearance</span>
                        </a>
                    </li>
                    <li id="Hajj_Medicale_Certificate" class="" title="Certificate">
                        <a href="<?php echo e(route('Hajj_Medicale_Certificate')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE548;</i></span>
                            <span class="menu_title">Medical Certificate</span>
                        </a>
                    </li>
                    <li id="Hajj_Visa_Processing" class="" title="Visa">
                        <a href="<?php echo e(route('Hajj_Visa_Processing')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE7F1;</i></span>
                            <span class="menu_title">Visa Processing</span>
                        </a>
                    </li>
                    <li id="Hajj_Training" class="" title="Training">
                        <a href="<?php echo e(route('Hajj_Training')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE84E;</i></span>
                            <span class="menu_title">Training</span>
                        </a>
                    </li>

                    <li id="Hajj_GiftPack" class="" title="GiftPack">
                        <a href="<?php echo e(route('Hajj_GiftPack')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE8F6;</i></span>
                            <span class="menu_title">Gift Pack</span>
                        </a>
                    </li>
                    <li id="Hajj_Flight" class="" title="Flight">
                        <a href="<?php echo e(route('Hajj_Flight')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE905;</i></span>
                            <span class="menu_title">Flight</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li id="Umrah" class="" title="Umrah">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE84F;</i></span>
                    <span class="menu_title">Umrah</span>
                </a>

                <ul>
                    <li id="Umrah_Police_Clearence" class="" title="Clearence">
                        <a href="<?php echo e(route('Umrah_Police_Clearence')); ?>">
                            <span class="menu_icon"><i class="material-icons" style="color: red">Progress</i></span>
                            <span class="menu_title">Police Clearance</span>
                        </a>
                    </li>
                    <li id="Umrah_Medicale_Certificate" class="" title="Certificate">
                        <a href="<?php echo e(route('Umrah_Medicale_Certificate')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE548;</i></span>
                            <span class="menu_title">Medical Certificate</span>
                        </a>
                    </li>
                    <li id="Umrah_Visa_Processing" class="" title="Visa">
                        <a href="<?php echo e(route('Umrah_Visa_Processing')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE7F1;</i></span>
                            <span class="menu_title">Visa Processing</span>
                        </a>
                    </li>
                    <li id="Umrah_Training" class="" title="Training">
                        <a href="<?php echo e(route('Umrah_Training')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE84E;</i></span>
                            <span class="menu_title">Training</span>
                        </a>
                    </li>

                    <li id="Umrah_GiftPack" class="" title="GiftPack">
                        <a href="<?php echo e(route('Umrah_GiftPack')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE8F6;</i></span>
                            <span class="menu_title">Gift Pack</span>
                        </a>
                    </li>
                    <li id="Umrah_Flight" class="" title="Flight">
                        <a href="<?php echo e(route('Umrah_Flight')); ?>">
                            <span class="menu_icon"><i class="material-icons">&#xE905;</i></span>
                            <span class="menu_title">Flight</span>
                        </a>
                    </li>
                </ul>

            </li>

             <li id="sidebar_hrm" class="" title="HRM">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE407;</i></span>
                    <span class="menu_title">HRM</span>
                </a>

                <ul>

                    <li id="sidebar_hrm_view" class="" title="Logbook">
                        <a href="<?php echo e(route('reception_logbook_index')); ?>">
                            <span class="menu_title">Logbook</span>
                        </a>
                    </li>
                    
                </ul>

            </li>


        <?php endif; ?>
    <?php endif; ?>


        </ul>
    </div>
</aside>
<!-- main sidebar end -->