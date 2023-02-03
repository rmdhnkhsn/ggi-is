<?php
Route::prefix('hrd_delete_soon')->namespace('hr_ga\AuditBuyer')->group(function() {
        Route::get('/dashboard', 'hrgaController@index')->name("hrga.index");
        Route::get('/audit-buyer/dashboard', 'MasterItemController@index')->name("hrga.index_auditbuyer");

    Route::group(['prefix'=>'audit-buyer/item'], function(){
        Route::get('/master', 'MasterItemController@see')->name("hr_ga.item.see");
        Route::get('/master/delete/{id}', 'MasterItemController@delete_master')->name("hr_ga.itemmaster.delete"); 
        Route::post('/master/store', 'MasterItemController@store_master')->name("hr_ga.itemmaster.store");

        Route::get('/master/lokasi/{id}', 'MasterItemController@add_location')->name("hr_ga.item.add_location");
        Route::post('/master/lokasi/store', 'MasterItemController@store_location')->name("hr_ga.item.store");
        Route::get('/master/lokasi/delete/{id}', 'MasterItemController@delete_location')->name("hr_ga.item.delete"); 
    });

    Route::group(['prefix'=>'audit-buyer/alarm'], function(){
        Route::get('/scant', 'AlarmController@f_scant')->name("hr_ga.alaram.scant");
        Route::post('/controll', 'AlarmController@controll')->name("hr_ga.alaram.controll");
        Route::post('/store', 'AlarmController@store')->name("hr_ga.alaram.store");
        Route::get('/see', 'AlarmController@see')->name("hr_ga.alaram.see");
        Route::post('/update_perbaikan', 'AlarmController@update_perbaikan')->name("hr_ga.alaram.perbaikan");
        Route::post('/update_finish', 'AlarmController@update_finish')->name("hr_ga.alaram.finish");
    });

    Route::group(['prefix'=>'audit-buyer/smoke_detector'], function(){
        Route::get('/scant', 'SmokeDetController@f_scant')->name("hr_ga.smokedet.scant");
        Route::post('/controll', 'SmokeDetController@controll')->name("hr_ga.smokedet.controll");
        Route::post('/store', 'SmokeDetController@store')->name("hr_ga.smokedet.store");
        Route::post('/update_perbaikan', 'SmokeDetController@update_perbaikan')->name("hr_ga.smokedet.perbaikan");
        Route::post('/update_finish', 'SmokeDetController@update_finish')->name("hr_ga.smokedet.finish");
    });

    Route::group(['prefix'=>'audit-buyer/emergency_exit'], function(){
        Route::get('/scant', 'EmerExitController@f_scant')->name("hr_ga.emerexit.scant");
        Route::post('/controll', 'EmerExitController@controll')->name("hr_ga.emerexit.controll");
        Route::post('/store', 'EmerExitController@store')->name("hr_ga.emerexit.store");
        Route::post('/update_perbaikan', 'EmerExitController@update_perbaikan')->name("hr_ga.emerexit.perbaikan");
        Route::post('/update_finish', 'EmerExitController@update_finish')->name("hr_ga.emerexit.finish");
    });

    Route::group(['prefix'=>'audit-buyer/emergency_lamp'], function(){
        Route::get('/scant', 'EmerLampController@f_scant')->name("hr_ga.emerlamp.scant");
        Route::post('/controll', 'EmerLampController@controll')->name("hr_ga.emerlamp.controll");
        Route::post('/store', 'EmerLampController@store')->name("hr_ga.emerlamp.store");
        Route::post('/update_perbaikan', 'EmerLampController@update_perbaikan')->name("hr_ga.emerlamp.perbaikan");
        Route::post('/update_finish', 'EmerLampController@update_finish')->name("hr_ga.emerlamp.finish");
    });

    Route::group(['prefix'=>'audit-buyer/apar'], function(){
        Route::get('/scant', 'AparController@f_scant')->name("hr_ga.apar.scant");
        Route::post('/controll', 'AparController@controll')->name("hr_ga.apar.controll");
        Route::post('/store', 'AparController@store')->name("hr_ga.apar.store");
        Route::post('/update_perbaikan', 'AparController@update_perbaikan')->name("hr_ga.apar.perbaikan");
        Route::post('/update_finish', 'AparController@update_finish')->name("hr_ga.apar.finish");
    });

    Route::group(['prefix'=>'audit-buyer/report'], function(){
        Route::get('/repair', 'ReportController@repair')->name("hr_ga.auditbuyer.repair");
        Route::get('/repair/pdf', 'ReportController@repair_pdf')->name("hr_ga.auditbuyer.repairpdf");

        Route::get('/monthly', 'ReportController@bulanan')->name("hr_ga.auditbuyer.rformbln");
        Route::post('/monthly/get', 'ReportController@get_bulananAll')->name("hr_ga.auditbuyer.getbln");
        Route::post('/monthly/getpdf', 'ReportController@get_bulananAll_PDF')->name("hr_ga.auditbuyer.getblnpdf");

        Route::get('/anual/apar', 'ReportController@tahunan')->name("hr_ga.auditbuyer.rformthn");
        Route::post('/anual/apar/get', 'ReportController@get_tahunan_apar')->name("hr_ga.auditbuyer.getthn");
        Route::post('/anual/apar/getpdf', 'ReportController@get_tahunan_aparpdf')->name("hr_ga.auditbuyer.getthnpdf");

        Route::get('/anual/alarm', 'ReportController@tahunan_alarm')->name("hr_ga.auditbuyer.falarm");
        Route::post('/anual/alarm/get', 'ReportController@get_tahunan_alarm')->name("hr_ga.auditbuyer.getalarm");
        Route::post('/anual/alarm/getpdf', 'ReportController@get_tahunan_alarmpdf')->name("hr_ga.auditbuyer.getalarmpdf");

        Route::get('/anual/smoke_detector', 'ReportController@tahunan_smokedet')->name("hr_ga.auditbuyer.fsmoke");
        Route::post('/anual/smoke_detector/get', 'ReportController@get_tahunan_smokedet')->name("hr_ga.auditbuyer.getsmoke");
        Route::post('/anual/smoke_detector/getpdf', 'ReportController@get_tahunan_smokedetpdf')->name("hr_ga.auditbuyer.getsmokepdf");

        Route::get('/anual/emergency_exit', 'ReportController@tahunan_emerexit')->name("hr_ga.auditbuyer.fexit");
        Route::post('/anual/emergency_exit/get', 'ReportController@get_tahunan_emerexit')->name("hr_ga.auditbuyer.getexit");
        Route::post('/anual/emergency_exit/getpdf', 'ReportController@get_tahunan_emerexitpdf')->name("hr_ga.auditbuyer.getexitpdf");

        Route::get('/anual/emergency_lamp', 'ReportController@tahunan_emerlamp')->name("hr_ga.auditbuyer.flamp");
        Route::post('/anual/emergency_lamp/get', 'ReportController@get_tahunan_emerlamp')->name("hr_ga.auditbuyer.getlamp");
        Route::post('/anual/emergency_lamp/getpdf', 'ReportController@get_tahunan_emerlamppdf')->name("hr_ga.auditbuyer.getlamppdf");
    });


});