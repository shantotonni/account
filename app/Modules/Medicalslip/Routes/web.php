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

Route::group(['prefix' => 'medicalslip', 'middleware' => 'auth'], function () {

    Route::get('/{id?}', 'MedicalSlipController@index')->name('medicalslip')->middleware('read_access');
    Route::get('recruit/create/{id}', 'MedicalSlipController@create')->name('medicalslip_create')->middleware('create_access');
    Route::post('recruit/store', 'MedicalSlipController@store')->name('medicalslip_store')->middleware('create_access');
    Route::get('recruit/edit/{id}', 'MedicalSlipController@edit')->name('medicalslip_edit')->middleware('read_access');
    Route::get('recruit/show/{id}', 'MedicalSlipController@show')->name('medicalslip_show')->middleware('read_access');
    Route::post('recruit/update/{id}', 'MedicalSlipController@update')->name('medicalslip_update')->middleware('update_access');
    Route::get('recruit/delete/{id}', 'MedicalSlipController@delete')->name('medicalslip_delete')->middleware('delete_access');

});
