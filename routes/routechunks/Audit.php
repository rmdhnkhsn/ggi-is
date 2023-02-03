<?php
Route::prefix('icr')->namespace('Audit')->group(function() {
    Route::get('/', 'IcController@index')->name("icr.index");

    Route::prefix('tarik-data')->namespace('Tarik_data')->group(function() {
        Route::get('/', 'ledgerController@index')->name("icr.tarikan.index");
        Route::get('/ladger', 'ledgerController@formLadger')->name("icr.tarikan.ladger");
        Route::post('/ladger/get', 'ledgerController@GetLadger')->name("icr.get.ladger2");
        Route::post('/ladger/get-excel', 'ledgerController@GetLadgerExcel')->name("icr.get.ladger");

        Route::get('/inventory', 'InventoryController@formInventory')->name("icr.tarikan.inventory");
        Route::post('/inventory/get', 'InventoryController@GetInventory')->name("icr.get.inventory");

        // Route::group(['prefix'=>'user'], function(){


        // });
    });

    //Audit
    include "audit/audit.php";
    //1.Audit NA
    include "audit/auditna.php";
    //2.Audit pemasukan
    include "audit/p_audit.php";
    
});