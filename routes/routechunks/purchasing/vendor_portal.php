<?php
Route::prefix('prc')->namespace('Purchasing')->group(function() {
    Route::get('/', 'VendorPortalController@dashboard')->name('purchasing.dashboard');

    Route::group(['prefix'=>'vendorportal'], function(){
        Route::get('/', 'VendorPortalController@index')->name('vendorportal.index');
        Route::get('/utilization', 'VendorPortalController@utilization')->name('vendorportal.utilization');
        Route::get('saving-cost', 'VendorPortalController@saving_cost')->name('savingCost.index');
    });

    Route::group(['prefix'=>'saving-cost'], function(){
        Route::get('/', 'SavingCostController@dashboard')->name('savingCost.dashboard');
        Route::get('index{id}', 'SavingCostController@saving_cost')->name('savingCost.index');
        Route::get('realization{id}', 'SavingCostController@realization')->name('savingCost.realization');
        Route::get('analytics', 'SavingCostController@analytics')->name('savingCost.analytics');
        Route::get('annual-report{id}', 'SavingCostController@annual_report')->name('savingCost.annual_report');
        Route::get('delete{id}', 'SavingCostController@delete')->name('savingCost.delete');
        Route::get('export-pdf{id}', 'SavingCostController@export_pdf')->name('savingCost.export_pdf');
        Route::get('manage-pdf{id}', 'SavingCostController@manage_pdf')->name('savingCost.manage_pdf');
        Route::get('search-month{id}', 'SavingCostController@search_month')->name('savingCost.search_month');
        Route::post('plan-store', 'SavingCostController@plan_store')->name('savingCost.plan_store');
        Route::post('search-buyer', 'SavingCostController@search_buyer')->name("savingCost.search_buyer");
        Route::post('store-realization', 'SavingCostController@store_realization')->name("savingCost.store_realization");
    });
});

