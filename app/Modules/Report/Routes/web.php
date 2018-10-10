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


Route::group(['prefix' => 'report','middleware'=>'auth'], function () {


    Route::get('/', 'ReportWebController@index')->name('report')->middleware('read_access');
    Route::get('account/transactions', 'ReportWebController@accountTransactions')->name('report_account_transactions')->middleware('read_access');
    Route::post('account/transactions', 'ReportWebController@accountTransactionsSearch')->name('report_account_transactions_search')->middleware('read_access');
    Route::get('account/transactions/{id}', 'ReportWebController@accountTransactionsAccountSearch')->name('report_account_transactions_account_search')->middleware('read_access');
    Route::get('account/general/ledger', 'ReportWebController@accountGeneralLedger')->name('report_account_general_ledger_search')->middleware('read_access');
    Route::post('account/general/ledger', 'ReportWebController@accountGeneralLedgerSearch')->name('report_account_general_ledger_search')->middleware('read_access');
    Route::get('account/journal', 'ReportWebController@accountJournal')->name('report_account_journal_search')->middleware('read_access');
    Route::post('account/journal', 'ReportWebController@accountJournalSearch')->name('report_account_journal_search')->middleware('read_access');
    Route::get('account/trial/balance', 'ReportWebController@accountTrialBalance')->name('report_account_trial_balance_search')->middleware('read_access');
    Route::post('account/trial/balance', 'ReportWebController@accountTrialBalanceSearch')->name('report_account_trial_balance_search')->middleware('read_access');
    Route::get('account/profitandloss', 'ReportWebController@ProfitAndLoss')->name('report_account_ProfitAndLoss')->middleware('read_access');
    Route::post('account/profitandloss', 'ReportWebController@ProfitAndLossbyfilter')->name('report_account_ProfitAndLoss_by_filter')->middleware('read_access');
    Route::get('account/profit/loss', 'ReportWebController@ProfitLoss')->name('report_account_profit_loss')->middleware('read_access');
    Route::get('account/cash/flow/statement', 'ReportWebController@CashFlowStatement')->name('report_account_cash_flow_statement')->middleware('read_access');
    Route::get('account/balance/sheet', 'ReportWebController@BalanceSheet')->name('report_account_balance_sheet')->middleware('read_access');
    Route::get('account/balance/and/sheet', 'ReportWebController@BalanceAndSheet')->name('report_account_balance_and_sheet')->middleware('read_access');
    Route::post('account/balance/and/sheet', 'ReportWebController@BalanceAndSheetbyfilter')->name('report_account_balance_and_sheet_filter')->middleware('read_access');
    Route::get('account/customer', 'ReportWebController@customer')->name('report_account_customer')->middleware('read_access');
    Route::get('account/customer/category/filter/{id}', 'ReportWebController@customerCategory')->name('report_account_customer_category_filter')->middleware('read_access');
    Route::get('account/customer/category/filter/{start}/{end}/{id}', 'ReportWebController@customerCategoryDate')->name('report_account_customer_category_filter')->middleware('read_access');


    Route::post('account/customer', 'ReportWebController@customerSearch')->name('report_account_customer_search')->middleware('read_access');
    Route::get('account/customer/{id}', 'ReportWebController@customerDetails')->name('report_account_customer_id')->middleware('read_access');
    Route::post('account/customer/{id}', 'ReportWebController@customerDetailsSearch')->name('report_account_customer_id_search')->middleware('read_access');
    Route::get('account/item', 'ReportWebController@item')->name('report_account_item')->middleware('read_access');
    Route::post('account/item', 'ReportWebController@filter_item')->name('report_account_item_filter');
    Route::get('account/item/{id}/{start}/{end}', 'ReportWebController@itemDetails')->name('report_account_item_details')->middleware('read_access');



    Route::get('cashbook', 'ReportWebController@cashbook')->name('report_cashbook')->middleware('read_access');
    Route::post('cashbook', 'ReportWebController@cashbooksearch')->name('report_cashbook_search')->middleware('read_access');



    Route::post('sales/agent', 'SalesCommissionReportController@filterbydate')->name('reportSalesdateby_agent')->middleware('read_access');
    Route::get('sales/agent', 'SalesCommissionReportController@index')->name('report_Sales_by_agent')->middleware('read_access');
    Route::get('sales/agent/details/{id}/{start}/{end}', 'SalesCommissionReportController@details')->name('report_Sales_by_agent_details')->middleware('read_access');
    Route::post('sales/agent/details', 'SalesCommissionReportController@detailsbydate')->name('report_Sales_by_agent_detailsbydate')->middleware('read_access');


    Route::get('stock', 'Stock\PostController@index')->name('report_stock_index_item')->middleware('read_access');
    Route::post('stock', 'Stock\PostController@filter')->name('report_stock_index_item_filter')->middleware('read_access');
    Route::get('stock/details/{id}/{start}/{end}', 'Stock\PostController@details')->name('report_stock_details_item')->middleware('read_access');



});
