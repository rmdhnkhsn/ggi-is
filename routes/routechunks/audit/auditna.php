<?php
Route::prefix('/')->group(function() {
    Route::group(['prefix'=>'auditna'], function(){
        // Route::get('/form/na', 'AuditNAController@form_na')->name("audit.formm");
        // Route::post('/get/na', 'AuditNAController@get_data_na')->name("audit.gett");
        Route::post('create/{F4111_UKID}', 'AuditNAController@create1')->name("temuanna.create");
        Route::post('store', 'AuditNAController@store')->name("temuanna.store");
        Route::get('/hasil/na', 'AuditNAController@hasil_na')->name("hasil.na");
        Route::get('edit1/{F4111_UKID}', 'AuditNAController@konfir_audit')->name("temuanna.konfir1");
        Route::post('Update', 'AuditNAController@update')->name("temuanna.update");


        Route::get('/form/na', 'AuditNAController@form_na1')->name("audit.formm1");
        Route::post('/get/na', 'AuditNAController@get_data_na1')->name("audit.gett1");
        Route::get('/form/na/all', 'AuditNAController@form_na_all')->name("audit.formmall");
        Route::post('/get/na/all', 'AuditNAController@get_data_na_all')->name("audit.gettall");
        Route::get('/form/na/gudang', 'AuditNAController@form_na_gudang')->name("audit.form.gudang");
        Route::post('/get/na/gudang', 'AuditNAController@get_data_na_gudang')->name("audit.get.gudang");



        // Route::post('konfir/gudang/{F4111_UKID}', 'AuditNAController@create')->name("temuanna.konfir");
        Route::get('konfir/gudang/{F4111_UKID}', 'AuditNAController@create')->name("temuanna.konfir");
        Route::post('storee', 'AuditNAController@konfir')->name("temuanna.konfirgudang");
        Route::get('edit/{F4111_UKID}', 'AuditNAController@konfir_audit')->name("temuanna.kaudit");
        Route::post('Updatet', 'AuditNAController@update_diterima')->name("temuanna.updatet");
        Route::post('Updatep', 'AuditNAController@update_pertimbangkan')->name("temuanna.updatep");
        Route::post('Updatejde', 'AuditNAController@update_jde')->name("temuanna.updatej");

        Route::get('/konfirgudang', 'AuditNAController@konfir_gudang')->name("auditna.konfir");
        Route::get('/konfirgudang1', 'AuditNAController@AccAudit')->name("auditna.diterima");
        Route::get('/konfirgudang2', 'AuditNAController@pertimbanganAudit')->name("auditna.dipertimbangkan");
        Route::get('/konfirgudang3', 'AuditNAController@jde')->name("auditna.jde");

        // Route::post('editt/{F4111_UKID}', 'AuditNAController@create_konfir')->name("audit.na");
        // Route::get('/test', 'AuditController@test')->name("audit.test");
        // Route::post('/get/na', 'AuditNAController@get_data_na')->name("audit.gett");
        
});
});