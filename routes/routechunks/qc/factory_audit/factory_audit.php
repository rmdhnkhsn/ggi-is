<?php
Route::prefix('factory-audit')->namespace('QC\FactoryAudit')->group(function() {
        Route::get('/', 'FactoryAuditController@dashboard')->name("FactoryAudit.dashboard");
        Route::get('/auditor', 'FactoryAuditController@auditor')->name("FactoryAudit.auditor");
        Route::get('/view', 'FactoryAuditController@index')->name("FactoryAudit.index");
        Route::get('/packing', 'FactoryAuditController@packing')->name("FactoryAudit.packing");
        Route::get('/details{id}', 'FactoryAuditController@details')->name("FactoryAudit.details");
        // Route::get('/edit{id}', 'FactoryAuditController@edit')->name("FactoryAudit.edit");
        Route::get('/seeTable', 'FactoryAuditController@auditorSee')->name("FactoryAudit.see");
        Route::get('/add-auditor', 'FactoryAuditController@addMeja')->name("FactoryAudit.addMeja");
        Route::post('/store', 'FactoryAuditController@store')->name("FactoryAudit.store");
        Route::post('/storeSignature', 'FactoryAuditController@storeSignature')->name("FactoryAudit.storeSignature");
        Route::get('/delete/{id}', 'FactoryAuditController@delete_auditor')->name("FactoryAudit.delete");
        Route::get('/delete/cutting/{id}', 'FactoryAuditController@delete')->name("FactoryAudit.delete1");
        // Route::put('/updateIndex/{FactoryAudit}', 'FactoryAuditController@updateIndex')->name("FactoryAudit.updateIndex");
        Route::post('/show-wo-information', 'FactoryAuditController@showWoInformation')->name("FactoryAudit.show-wo-information");
        Route::post('/show-all-wo-information', 'FactoryAuditController@showAllWoInformation')->name("FactoryAudit.show-all-wo-information");
        Route::post('/packing-PDF', 'FactoryAuditController@packingPDF')->name("FactoryAudit.packingPDF");
        
        Route::post('/store-packing-audit', 'FactoryAuditController@storePackingAudit')->name("packing-audit.store");
        Route::post('/store-factory-audit', 'FactoryAuditController@storeFactoryAudit')->name("factory-audit.store");
        Route::post('/update-factory-audit', 'FactoryAuditController@updateFactoryAudit')->name("factory-audit.update");
        Route::get('/edit-factory-audit/{id}', 'FactoryAuditController@editFactoryAudit')->name("factory-audit.edit");
        Route::post('/signature', 'FactoryAuditController@signature')->name("FactoryAudit.signature");
        
        Route::get('/show-remark', 'FactoryAuditController@showRemark')->name("FactoryAudit.show-remark");   
        Route::post('/store-remark', 'FactoryAuditController@storeRemark')->name("FactoryAudit.storeRemark"); 
        Route::put('/update-remark', 'FactoryAuditController@updateRemark')->name("FactoryAudit.updateRemark"); 
        Route::post('/delete-remark', 'FactoryAuditController@deleteRemark')->name("FactoryAudit.deleteRemark"); 

    });