<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'settings/access-level'], function () {
    Route::get('/', 'AccessLevelWebController@create')->name('access_level_create')->middleware(['auth', 'super_admin']);
    Route::post('store', 'AccessLevelWebController@store')->name('access_level_store')->middleware(['auth', 'super_admin']);
    Route::get('edit/{id}', 'AccessLevelWebController@edit')->name('access_level_edit')->middleware(['auth', 'super_admin']);
    Route::post('update', 'AccessLevelWebController@update')->name('access_level_update')->middleware(['auth', 'super_admin']);
    Route::get('locktransaction', 'locktransaction\PostController@edit')->name('locktransaction')->middleware(['auth', 'super_admin']);
    Route::get('locktransaction_update', 'locktransaction\PostController@update')->name('locktransaction_update');
});

Route::group(['prefix' => 'settings/branchs'], function () {
    Route::get('/', 'branch\PostController@index')->name('branch')->middleware(['auth', 'super_admin']);
    Route::get('create', 'branch\PostController@create')->name('branch_create')->middleware(['auth', 'super_admin']);
    Route::post('store', 'branch\PostController@store')->name('branch_store')->middleware(['auth', 'super_admin']);
    Route::get('edit/{id}', 'branch\PostController@edit')->name('branch_edit')->middleware(['auth', 'super_admin']);
    Route::post('update/{id}', 'branch\PostController@update')->name('branch_update')->middleware(['auth', 'super_admin']);
    Route::get('delete/{id}', 'branch\PostController@destroy')->name('branch_delete')->middleware(['auth', 'super_admin']);
});

Route::group(['prefix' => 'settings/roles'], function () {
    Route::get('/', 'RoleWebController@index')->name('role')->middleware(['auth', 'super_admin']);
    Route::get('create', 'RoleWebController@create')->name('role_create')->middleware(['auth', 'super_admin']);
    Route::post('store', 'RoleWebController@store')->name('role_store')->middleware(['auth', 'super_admin']);
    Route::get('edit/{id}', 'RoleWebController@edit')->name('role_edit')->middleware(['auth', 'super_admin']);
    Route::post('update/{id}', 'RoleWebController@update')->name('role_update')->middleware(['auth', 'super_admin']);
    Route::get('delete/{id}', 'RoleWebController@destroy')->name('role_delete')->middleware(['auth', 'super_admin']);
});

Route::group(['prefix' => 'settings/users', 'middleware' => 'super_admin'], function () {
    Route::get('/', 'UserWebController@index')->name('user')->middleware('auth');
    Route::get('create', 'UserWebController@create')->name('user_create')->middleware('auth');
    Route::post('store', 'UserWebController@store')->name('user_store')->middleware('auth');
    Route::get('show/{id}', 'UserWebController@show')->name('user_show')->middleware('auth');
    Route::get('edit/{id}', 'UserWebController@edit')->name('user_edit')->middleware('auth');
    Route::post('update/{id}', 'UserWebController@update')->name('user_update')->middleware('auth');
    Route::get('password/{id}', 'UserWebController@password')->name('user_password')->middleware('auth');
    Route::post('password/{id}/update', 'UserWebController@updatePassword')->name('update_password')->middleware('auth');
    Route::get('delete/{id}', 'UserWebController@destroy')->name('user_delete')->middleware('auth');
    Route::get('role/{id}', 'UserWebController@userRole')->name('user_role')->middleware('auth');
    Route::post('role/{id}/update', 'UserWebController@updateUserRole')->name('update_user_role')->middleware('auth');
});


Route::group(['prefix' => 'settings/organization-profile'], function () {
    Route::get('/', 'OrganizationProfileWebController@edit')->name('organization_profile')->middleware(['auth', 'super_admin']);
    Route::post('update', 'OrganizationProfileWebController@update')->name('organization_profile_update')->middleware(['auth', 'super_admin']);
});

Route::group(['prefix' => 'settings/organization-invoice/header'], function () {
    Route::get('/', 'invoice\HeaderController@edit')->name('organization_invoice_header')->middleware(['auth', 'super_admin']);
    Route::post('update', 'invoice\HeaderController@update')->name('organization_invoice_header_update')->middleware(['auth', 'super_admin']);
});

Route::group(['prefix' => 'settings/my-profile'], function () {
    Route::get('/', 'MyProfileWebController@edit')->name('my_profile')->middleware('auth');
    Route::post('update', 'MyProfileWebController@update')->name('my_profile_update')->middleware('auth');
    Route::get('password', 'MyProfileWebController@password')->name('my_profile_password')->middleware('auth');
    Route::post('password/update', 'MyProfileWebController@passwordUpdate')->name('my_profile_password_update')->middleware('auth');
});

Route::group(['prefix' => 'settings/tax', 'middleware' => 'super_admin'], function () {
    Route::get('/', 'TaxWebController@index')->name('tax')->middleware('auth');
    Route::get('create', 'TaxWebController@create')->name('tax_create')->middleware('auth');
    Route::post('store', 'TaxWebController@store')->name('tax_store')->middleware('auth');
    Route::get('edit/{id}', 'TaxWebController@edit')->name('tax_edit')->middleware('auth');
    Route::post('update/{id}', 'TaxWebController@update')->name('tax_update')->middleware('auth');
    Route::get('delete/{id}', 'TaxWebController@destroy')->name('tax_delete')->middleware('auth');
});

Route::group(['prefix' => 'settings/backup', 'middleware' => 'super_admin'], function () {


    Route::get('/schedule', 'BackupController@schedule')->name('backup_schedule')->middleware('auth');
    Route::post('/schedule/{id}', 'BackupController@scheduleUpdate')->name('backup_schedule_update')->middleware('auth');


    Route::get('/', 'BackupController@index')->name('backup')->middleware('auth');
    Route::get('create', 'BackupController@create')->name('backup_create')->middleware('auth');
    Route::post('store', 'BackupController@store')->name('backup_store')->middleware('auth');
    Route::get('edit/{id}', 'BackupController@download')->name('backup_download')->middleware('auth');


});

Route::group(['prefix' => 'settings/Openingbalance', 'middleware' => 'super_admin'], function () {
    Route::get('/', 'Balance\OpeningBalanceController@index')->name('setting_openingbalance')->middleware('auth');
    Route::get('create', 'Balance\OpeningBalanceController@create')->name('setting_openingbalance_create')->middleware('auth');
    Route::post('store', 'Balance\OpeningBalanceController@store')->name('setting_openingbalance_store')->middleware('auth');
    Route::post('edit/{id}', 'Balance\OpeningBalanceController@edit')->name('setting_openingbalance_edit')->middleware('auth');
  //  Route::get('delete', 'Balance\OpeningBalanceController@delete')->name('setting_openingbalance_delete')->middleware('auth');

});


Route::group(['prefix' => 'settings/tax', 'middleware' => 'super_admin'], function(){
    Route::get('/', 'TaxWebController@index')->name('tax')->middleware('auth');
    Route::get('create', 'TaxWebController@create')->name('tax_create')->middleware('auth');
    Route::post('store', 'TaxWebController@store')->name('tax_store')->middleware('auth');
    Route::get('edit/{id}', 'TaxWebController@edit')->name('tax_edit')->middleware('auth');
    Route::post('update/{id}', 'TaxWebController@update')->name('tax_update')->middleware('auth');
    Route::get('delete/{id}', 'TaxWebController@destroy')->name('tax_delete')->middleware('auth');
});

Route::group(['prefix' => 'ticket/settings/tax'], function () {

    Route::get('/', 'ticket\tickettax\PostController@index')->name('ticket_tax')->middleware('auth');
    Route::get('/create', 'ticket\tickettax\PostController@create')->name('ticket_tax_create')->middleware('auth');
    Route::post('/store', 'ticket\tickettax\PostController@store')->name('ticket_tax_store')->middleware('auth');
    Route::get('/edit/{id}', 'ticket\tickettax\PostController@edit')->name('ticket_tax_edit')->middleware('auth');
    Route::post('/update/{id}', 'ticket\tickettax\PostController@update')->name('ticket_tax_update')->middleware('auth');
    Route::get('/destory/{id?}', 'ticket\tickettax\PostController@destroy')->name('ticket_tax_destroy')->middleware('auth');

});

Route::group(['prefix' => 'ticket/settings/commissions' , 'middleware' => 'auth'],  function () {

    Route::get('/edit/{id}', 'ticket\ticketcommission\PostController@edit')->name('ticket_commission_edit')->middleware('read_access');
    Route::post('/update/{id}', 'ticket\ticketcommission\PostController@update')->name('ticket_commission_update')->middleware('update_access');

});

Route::group(['prefix' => 'ticket/settings/airlines'], function () {

    Route::get('/', 'ticket\airlines\PostController@index')->name('ticket_airlines')->middleware('auth');
    Route::get('/create', 'ticket\airlines\PostController@create')->name('ticket_airlines_create')->middleware('auth');
    Route::post('/store', 'ticket\airlines\PostController@store')->name('ticket_airlines_store')->middleware('auth');
    Route::get('/edit/{id}', 'ticket\airlines\PostController@edit')->name('ticket_airlines_edit')->middleware('auth');
    Route::post('/update/{id}', 'ticket\airlines\PostController@update')->name('ticket_airlines_update')->middleware('auth');
    Route::get('/destory/{id?}', 'ticket\airlines\PostController@destroy')->name('ticket_airlines_destroy')->middleware('auth');

});

Route::group(['prefix' => 'ticket/settings/airlinestax'], function () {

    Route::get('/', 'ticket\airlinestax\PostController@index')->name('ticket_airlinestax')->middleware('auth');
    Route::get('/create', 'ticket\airlinestax\PostController@create')->name('ticket_airlinestax_create')->middleware('auth');
    Route::post('/store', 'ticket\airlinestax\PostController@store')->name('ticket_airlinestax_store')->middleware('auth');
    Route::get('/edit/{id}', 'ticket\airlinestax\PostController@edit')->name('ticket_airlinestax_edit')->middleware('auth');
    Route::post('/update/{id}', 'ticket\airlinestax\PostController@update')->name('ticket_airlinestax_update')->middleware('auth');
    Route::get('/destory/{id?}', 'ticket\airlinestax\PostController@destroy')->name('ticket_airlinestax_destroy')->middleware('auth');

});

Route::group(['prefix' => 'ticket/order' , 'middleware' => 'auth'], function () {

    Route::get('/pending', 'Order\order\PostController@pending')->name('ticket_Order_pending')->middleware('read_access');
    Route::post('/pending', 'Order\order\PostController@pending_search')->name('ticket_Order_pending_search')->middleware('read_access');
    Route::get('/confirmed', 'Order\order\PostController@confirmed')->name('ticket_Order_confirmed')->middleware('read_access');
    Route::post('/confirmed', 'Order\order\PostController@confirmed_search')->name('ticket_Order_confirmed_search')->middleware('read_access');
    Route::get('/create', 'Order\order\PostController@create')->name('ticket_Order_create')->middleware('create_access');
    Route::post('/store', 'Order\order\PostController@store')->name('ticket_Order_store')->middleware('create_access');
    Route::get('/edit/{id}', 'Order\order\PostController@edit')->name('ticket_Order_edit')->middleware('read_access');
    Route::post('/update/{id}', 'Order\order\PostController@update')->name('ticket_Order_update')->middleware('update_access');
    Route::get('/pdf/{id}', 'Order\order\PostController@orderPdf')->name('ticket_Order_pdf')->middleware('read_access');
    Route::get('/destory/{id}/{bill}/{invoice}', 'Order\order\PostController@destroy')->name('ticket_Order_destroy')->middleware('delete_access');
    Route::get('/pendingupdate/{id}', 'Order\order\PostController@pendinUpdate')->name('ticket_Order_pendingUpdate')->middleware('update_access');

    //send mail to order

    Route::get('/mail/{id}', 'Order\order\PostController@orderMail')->name('ticket_Order_sendMail')->middleware('create_access');
    Route::post('/mail/store/{id}', 'Order\order\PostController@orderMailStore')->name('ticket_Order_sendMailStore')->middleware('create_access');
    Route::get('/sendmail/show/', 'Order\order\PostController@SendMailShow')->name('another_mail_send_show')->middleware('read_access');
    Route::post('/sendmail/show/', 'Order\order\PostController@SendMailShowbyfilter')->name('another_mail_send_show_filter')->middleware('read_access');
    Route::get('/sendmail/show/{id}', 'Order\order\PostController@SendMailShowPerID')->name('send_mail_show_per_id')->middleware('read_access');

    //Ticket bill route

    Route::get('/bill/show/{id}/{order}', 'Order\order\TicketBillInvoiceController@billShow')->name('ticket_Order_bill_show')->middleware('read_access');
    Route::get('/bill/show/{order}', 'Order\order\TicketBillInvoiceController@billCreate')->name('order_ticket_bill_create')->middleware('create_access');
    Route::post('/bill/store', 'Order\order\TicketBillInvoiceController@billStore')->name('ticket_bill_store')->middleware('create_access');

    //ticket invoice route

    Route::get('/invoice/show/{id}/{order}', 'Order\order\TicketBillInvoiceController@invoiceShow')->name('ticket_Order_invoice_show')->middleware('read_access');
    Route::get('/invoice/show/{order}', 'Order\order\TicketBillInvoiceController@invoiceCreate')->name('order_ticket_invoice_create')->middleware('create_access');
    Route::post('/invoice/store', 'Order\order\TicketBillInvoiceController@invoiceStore')->name('ticket_invoice_store')->middleware('create_access');


});

// Ticket document route

Route::group(['prefix' => 'ticket/document','middleware' => 'auth'], function () {

    Route::get('/', 'ticket\ticket_document\TicketDocumentController@index')->name('ticket_document_index')->middleware('read_access');
    Route::get('/create', 'ticket\ticket_document\TicketDocumentController@create')->name('ticket_document_create')->middleware('create_access');
    Route::post('/store', 'ticket\ticket_document\TicketDocumentController@store')->name('ticket_document_store')->middleware('create_access');
    Route::get('/edit/{id}', 'ticket\ticket_document\TicketDocumentController@edit')->name('ticket_document_edit')->middleware('read_access');
    Route::post('/update/{id}', 'ticket\ticket_document\TicketDocumentController@update')->name('ticket_document_update')->middleware('update_access');
    Route::get('/delete/{id?}', 'ticket\ticket_document\TicketDocumentController@delete')->name('ticket_document_delete')->middleware('delete_access');

    //shanto

    Route::get('/download/{id}', 'ticket\ticket_document\TicketDocumentController@download')->name('ticket_document_download')->middleware('read_access');
    Route::get('/send/mail/{id}', 'ticket\ticket_document\TicketDocumentController@sendMail')->name('ticket_document_sendMail')->middleware('create_access');
    Route::post('/send/mail/store/{id}', 'ticket\ticket_document\TicketDocumentController@sendMailStore')->name('ticket_document_sendMail_store')->middleware('create_access');

});

        // Ticket Hotel route

Route::group(['prefix' => 'ticket/hotel','middleware' => 'auth'], function () {

    Route::get('/', 'ticket\ticket_hotel\TicketHotelController@index')->name('ticket_hotel_index')->middleware('read_access');
    Route::get('/create', 'ticket\ticket_hotel\TicketHotelController@create')->name('ticket_hotel_create')->middleware('create_access');
    Route::post('/store', 'ticket\ticket_hotel\TicketHotelController@store')->name('ticket_hotel_store')->middleware('create_access');
    Route::get('/edit/{id}', 'ticket\ticket_hotel\TicketHotelController@edit')->name('ticket_hotel_edit')->middleware('read_access');
    Route::post('/update/{id}', 'ticket\ticket_hotel\TicketHotelController@update')->name('ticket_hotel_update')->middleware('update_access');
    Route::get('/delete/{id?}', 'ticket\ticket_hotel\TicketHotelController@delete')->name('ticket_hotel_delete')->middleware('delete_access');

});


Route::group(['prefix' => 'ticket/IATA/bill','middleware' => 'auth'], function () {

    Route::get('/', 'IataBillController@bill')->name('ticket_bill_index')->middleware('read_access');
    Route::post('/find_bill', 'IataBillController@find_bill')->name('find_bill')->middleware('read_access');

});


Route::group(['prefix' => 'ticket/dashboard','middleware' => 'auth'], function () {

    Route::get('/', 'TicketDashboardController@dashboard')->name('ticket_dashboard_index')->middleware('read_access');
    Route::post('/filter', 'TicketDashboardController@filter')->name('ticket_dashboard_filter')->middleware('read_access');
    Route::get('/totalTicketOrder', 'TicketDashboardController@totalTicketOrder')->name('total_ticket_order')->middleware('read_access');
    Route::get('/totalTicketOrder/{id}/{start}/{end}', 'TicketDashboardController@totalTicketOrderById')->name('ticket_Order_total_show')->middleware('read_access');

});