<?php
Route::prefix('/')->group(function() {
        Route::get('/audit', 'AuditController@index')->name("audit.index");
   
        Route::group(['prefix'=>'pemasukan'], function(){

        Route::get('/form', 'AuditPemasukanController@form')->name("auditp.form");
        Route::post('/get', 'AuditPemasukanController@get_data')->name("auditp.get");
        Route::get('/formf', 'AuditPemasukanController@formf')->name("auditpf.form");
        Route::post('/getf', 'AuditPemasukanController@get_dataf')->name("auditpf.get");
        Route::get('/form/gudang', 'AuditPemasukanController@form_gudang')->name("auditpf.form.gudang");
        Route::post('/get/gudang', 'AuditPemasukanController@get_data_gudang')->name("auditpf.get.gudang");

        
        Route::get('konfir/gudang/{F564111C_UKID}', 'AuditPemasukanController@create_konfir')->name("temuantfp.konfir");

        // Route::post('konfir/gudang/{F564111C_UKID}', 'AuditPemasukanController@create_konfir')->name("temuantfp.konfir");
        Route::post('store', 'AuditPemasukanController@store')->name("temuantfp.store");
        Route::get('edit/{F564111C_UKID}', 'AuditPemasukanController@konfir_audit')->name("temuantfp.kaudit");
        Route::post('Updatet', 'AuditPemasukanController@update_diterima')->name("temuantfp.updatet");
        Route::post('Updatep', 'AuditPemasukanController@update_pertimbangkan')->name("temuantfp.updatep");
        Route::post('Updatejde', 'AuditPemasukanController@update_jde')->name("temuantfp.updatej");


        Route::get('/konfirgudang', 'AuditPemasukanController@konfir_gudang')->name("audittfp.konfir");
        Route::get('/konfirgudang1', 'AuditPemasukanController@AccAudit')->name("audittfp.diterima");
        Route::get('/konfirgudang2', 'AuditPemasukanController@pertimbanganAudit')->name("audittfp.dipertimbangkan");
        Route::get('/konfirgudang3', 'AuditPemasukanController@jde')->name("audittfp.jde");

        // Route::post('create/{F4111_UKID}', 'AuditNAController@create')->name("temuanna.create");
        // Route::post('store', 'AuditNAController@store')->name("temuanna.store");
        
        Route::get('/test', 'AuditController@test')->name("audit.test");
});
});