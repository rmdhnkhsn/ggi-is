<?php
Route::prefix('/')->group(function() {
    Route::group(['prefix'=>'audittf'], function(){
        Route::get('/audit', 'AuditController@index')->name("audit.index");
        Route::get('/form', 'AuditController@form')->name("audit.form");
        Route::post('/get', 'AuditController@get_data')->name("audit.get");
        Route::get('/formf', 'AuditController@formf')->name("auditf.form");
        Route::post('/getf', 'AuditController@get_dataf')->name("auditf.get");
        Route::get('/form/gudang', 'AuditController@form_gudang')->name("auditf.form.gudang");
        Route::post('/get/gudang', 'AuditController@get_data_gudang')->name("auditf.get.gudang");



        Route::get('konfir/gudang/{F564111H_UKID}', 'AuditController@create_konfir')->name("temuantf.konfir");

        // Route::post('konfir/gudang/{F564111H_UKID}', 'AuditController@create_konfir')->name("temuantf.konfir");

        Route::post('store', 'AuditController@store')->name("temuantf.store");
        Route::get('edit/{F564111H_UKID}', 'AuditController@konfir_audit')->name("temuantf.kaudit");
        Route::post('Updatet', 'AuditController@update_diterima')->name("temuantf.updatet");
        Route::post('Updatep', 'AuditController@update_pertimbangkan')->name("temuantf.updatep");
        Route::post('Updatejde', 'AuditController@update_jde')->name("temuantf.updatej");


        Route::get('/konfirgudang', 'AuditController@konfir_gudang')->name("audittf.konfir");
        Route::get('/konfirgudang1', 'AuditController@AccAudit')->name("audittf.diterima");
        Route::get('/konfirgudang2', 'AuditController@pertimbanganAudit')->name("audittf.dipertimbangkan");
        Route::get('/konfirgudang3', 'AuditController@jde')->name("audittf.jde");

        // Route::post('create/{F4111_UKID}', 'AuditNAController@create')->name("temuanna.create");
        // Route::post('store', 'AuditNAController@store')->name("temuanna.store");
        
        Route::get('/test', 'AuditController@test')->name("audit.test");
    });

    Route::group(['prefix'=>'user/gudang'], function(){
        Route::get('/see', 'UserGudangController@index')->name("user.gudang.index");
        Route::get('/create', 'UserGudangController@create')->name("user.gudang.create");
        Route::post('/store', 'UserGudangController@store')->name("user.gudang.store");
        Route::get('delete/{id}', 'UserGudangController@delete')->name('user.gudang.delete');

        Route::get('edit/{id}', 'UserGudangController@edit')->name('user.gudang.edit');
        Route::post('/update', 'UserGudangController@update')->name("user.gudang.update");
    });


});