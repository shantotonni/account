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

Route::group(['prefix' => 'manpower/service' , 'middleware' => 'auth'], function () {

    Route::get('/pending', 'ManpowerServiceController@pending')->name('manpower_service_pending');
    Route::post('/pending', 'ManpowerServiceController@pending_search')->name('manpower_service_pending_search');
    Route::get('/confirmed', 'ManpowerServiceController@confirmed')->name('manpower_service_confirmed');
    Route::post('/confirmed', 'ManpowerServiceController@confirmed_search')->name('manpower_service_confirmed_search');
    Route::get('/create', 'ManpowerServiceController@create')->name('manpower_service_create');
    Route::post('/store', 'ManpowerServiceController@store')->name('manpower_service_store');
    Route::get('/edit/{id}', 'ManpowerServiceController@edit')->name('manpower_service_edit');
    Route::post('/update/{id}', 'ManpowerServiceController@update')->name('manpower_service_update');
    Route::get('/destory/{id}/{bill}/{invoice}', 'ManpowerServiceController@destroy')->name('manpower_service_destroy');
    Route::get('/pendingupdate/{id}', 'ManpowerServiceController@pendinUpdate')->name('manpower_service_pendingUpdate');

      //pdf

    Route::get('/pdf/{id}', 'ManpowerServiceController@orderPdf')->name('manpower_service_pdf');


    //send mail to order

    Route::get('/mail/{id}', 'ManpowerServiceController@orderMail')->name('manpower_service_sendMail');
    Route::post('/mail/store/{id}', 'ManpowerServiceController@orderMailStore')->name('manpower_service_sendMailStore');
    Route::get('/sendmail/show/', 'ManpowerServiceController@SendMailShow')->name('manpower_service_mail_send_show');
    Route::post('/sendmail/show/', 'ManpowerServiceController@SendMailShowbyfilter')->name('manpower_service_mail_send_show_filter');
    Route::get('/sendmail/show/{id}', 'ManpowerServiceController@SendMailShowPerID')->name('manpower_service_mail_show_per_id');

    //Ticket bill route

    Route::get('/bill/show/{id}/{progress}', 'ManpowerServiceBillInvoiceController@billShow')->name('manpower_service_bill_show');
    Route::get('/bill/show/{progress}', 'ManpowerServiceBillInvoiceController@billCreate')->name('manpower_service_bill_create');
    Route::post('/bill/store', 'ManpowerServiceBillInvoiceController@billStore')->name('manpower_service_bill_store');



    //ticket invoice route

    Route::get('/invoice/show/{id}/{progress}', 'ManpowerServiceBillInvoiceController@invoiceShow')->name('manpower_service_invoice_show');
    Route::get('/invoice/show/{progress}', 'ManpowerServiceBillInvoiceController@invoiceCreate')->name('manpower_service_invoice_create');
    Route::post('/invoice/store', 'ManpowerServiceBillInvoiceController@invoiceStore')->name('manpower_service_invoice_store');

});

// Manpower Service document route

Route::group(['prefix' => 'manpower/service/document','middleware' => 'auth'], function () {

    Route::get('/', 'ManpowerServiceDocumentController@index')->name('manpower_service_document_index');
    Route::post('/', 'ManpowerServiceDocumentController@search')->name('manpower_service_document_index_search');
    Route::get('/create', 'ManpowerServiceDocumentController@create')->name('manpower_service_document_create');
    Route::post('/store', 'ManpowerServiceDocumentController@store')->name('manpower_service_document_store');
    Route::get('/edit/{id}', 'ManpowerServiceDocumentController@edit')->name('manpower_service_document_edit');
    Route::post('/update/{id}', 'ManpowerServiceDocumentController@update')->name('manpower_service_document_update');
    Route::get('/delete/{id?}', 'ManpowerServiceDocumentController@delete')->name('manpower_service_document_delete');

    //shanto Email send

    Route::get('/download/{id}', 'ManpowerServiceDocumentController@download')->name('manpower_service_document_download');
    Route::get('/send/mail/{id}', 'ManpowerServiceDocumentController@sendMail')->name('manpower_service_document_sendMail');
    Route::post('/send/mail/store/{id}', 'ManpowerServiceDocumentController@sendMailStore')->name('manpower_service_document_sendMail_store');

});





// Manpower Service hotel route



Route::group(['prefix' => 'manpower/service/hotel','middleware' => 'auth'], function () {

    Route::get('/', 'ManpowerServiceTicketController@index')->name('manpower_service_hotel_index');
    Route::get('/create', 'ManpowerServiceTicketController@create')->name('manpower_service_hotel_create');
    Route::post('/store', 'ManpowerServiceTicketController@store')->name('manpower_service_hotel_store');
    Route::get('/edit/{id}', 'ManpowerServiceTicketController@edit')->name('manpower_service_hotel_edit');
    Route::post('/update/{id}', 'ManpowerServiceTicketController@update')->name('manpower_service_hotel_update');
    Route::get('/delete/{id?}', 'ManpowerServiceTicketController@delete')->name('manpower_service_hotel_delete');

});

