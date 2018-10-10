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

Route::group(['prefix' => 'recrutereport' , 'middleware' => 'auth'], function () {

    Route::get('/', 'RreportController@index')->name('recrutereport');
    Route::get('/vendor', 'RreportController@vendor')->name('recrutereport_vendor');
    Route::get('/vendorList/{id}', 'RreportController@vendorList')->name('recrutereport_vendorList');
    Route::post('/vendor', 'RreportController@vendorSearch')->name('recrutereport_vendorSearch');
    Route::get('/ven', 'RreportController@ticketvendorSearch')->name('recrutereport_ticket_vendorSearch');
    Route::get('/company', 'RreportController@company')->name('recrutereport_company');
    Route::get('/companyList', 'RreportController@companyList')->name('recrutereport_companyList');
    Route::get('/visa', 'RreportController@visa')->name('recrutereport_visa');
    Route::get('/visalist', 'RreportController@visalist')->name('recrutereport_visa');

    Route::get('/customer-report', 'RreportController@customerReport')->name('recrutereport_customer_report');

    Route::get('/medical-slip-report', 'RreportController@medicalSlipReport')->name('recrutereport_medical_slip_report');
    Route::post('/medical-slip-report', 'RreportController@medicalSlipReportSearch')->name('recrutereport_medical_slip_report_search');

});
