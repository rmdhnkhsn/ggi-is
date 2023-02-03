<?php
Route::prefix('hrd')->namespace('HR_GA')->group(function() {
    Route::get('', 'hrgaController@index')->name("hrga.index");

    Route::prefix('safety-compliance')->namespace('AuditBuyer')->group(function() {
        Route::get('', 'MasterItemController@index')->name("hrga.index_auditbuyer");
        Route::get('item-master', 'MasterItemController@see')->name("hr_ga.item.see");
        Route::get('/repair', 'ReportController@repair')->name("hr_ga.auditbuyer.repair");
        Route::get('/repair/pdf', 'ReportController@repair_pdf')->name("hr_ga.auditbuyer.repairpdf");

        Route::group(['prefix'=>'item-master'], function(){
            Route::get('item{id}', 'MasterItemController@add_location')->name("hr_ga.item.add_location");
            Route::get('/master/delete/{id}', 'MasterItemController@delete_master')->name("hr_ga.itemmaster.delete"); 
            Route::post('/master/store', 'MasterItemController@store_master')->name("hr_ga.itemmaster.store");
            Route::post('/master/lokasi/store', 'MasterItemController@store_location')->name("hr_ga.item.store");
            Route::get('/master/lokasi/delete/{id}', 'MasterItemController@delete_location')->name("hr_ga.item.delete"); 
        });

        Route::group(['prefix'=>'map-cln'], function(){
            Route::get('/', 'MapController@mapcln')->name("hr_ga.auditbuyer.map");
            Route::get('/gc1', 'MapController@MapsGc1')->name("hrd.map.gc1");
            Route::get('/gc2', 'MapController@MapsGc2')->name("hrd.map.gc2");
            Route::get('/sample', 'MapController@MapsSample')->name("hrd.map.sample");
            Route::get('/marketing', 'MapController@MapsMarketing')->name("hrd.map.marketing");
        });

        Route::group(['prefix'=>'scan-alarm'], function(){
            Route::get('', 'AlarmController@f_scant')->name("hr_ga.alaram.scant");
            Route::post('/controll', 'AlarmController@controll')->name("hr_ga.alaram.controll");
            Route::post('/store', 'AlarmController@store')->name("hr_ga.alaram.store");
            Route::post('/update_perbaikan', 'AlarmController@update_perbaikan')->name("hr_ga.alaram.perbaikan");
            Route::post('/update_finish', 'AlarmController@update_finish')->name("hr_ga.alaram.finish");
        });

        Route::group(['prefix'=>'scan-smoke-detector'], function(){
            Route::get('', 'SmokeDetController@f_scant')->name("hr_ga.smokedet.scant");
            Route::post('/controll', 'SmokeDetController@controll')->name("hr_ga.smokedet.controll");
            Route::post('/store', 'SmokeDetController@store')->name("hr_ga.smokedet.store");
            Route::post('/update_perbaikan', 'SmokeDetController@update_perbaikan')->name("hr_ga.smokedet.perbaikan");
            Route::post('/update_finish', 'SmokeDetController@update_finish')->name("hr_ga.smokedet.finish");
        });

        Route::group(['prefix'=>'scan-apar'], function(){
            Route::get('', 'AparController@f_scant')->name("hr_ga.apar.scant");
            Route::post('/controll', 'AparController@controll')->name("hr_ga.apar.controll");
            Route::post('/store', 'AparController@store')->name("hr_ga.apar.store");
            Route::post('/update_perbaikan', 'AparController@update_perbaikan')->name("hr_ga.apar.perbaikan");
            Route::post('/update_finish', 'AparController@update_finish')->name("hr_ga.apar.finish");
        });

        Route::group(['prefix'=>'scan-emergency-exit'], function(){
            Route::get('', 'EmerExitController@f_scant')->name("hr_ga.emerexit.scant");
            Route::post('/controll', 'EmerExitController@controll')->name("hr_ga.emerexit.controll");
            Route::post('/store', 'EmerExitController@store')->name("hr_ga.emerexit.store");
            Route::post('/update_perbaikan', 'EmerExitController@update_perbaikan')->name("hr_ga.emerexit.perbaikan");
            Route::post('/update_finish', 'EmerExitController@update_finish')->name("hr_ga.emerexit.finish");
        });

        Route::group(['prefix'=>'scan-emergency-lamp'], function(){
            Route::get('', 'EmerLampController@f_scant')->name("hr_ga.emerlamp.scant");
            Route::post('/controll', 'EmerLampController@controll')->name("hr_ga.emerlamp.controll");
            Route::post('/store', 'EmerLampController@store')->name("hr_ga.emerlamp.store");
            Route::post('/update_perbaikan', 'EmerLampController@update_perbaikan')->name("hr_ga.emerlamp.perbaikan");
            Route::post('/update_finish', 'EmerLampController@update_finish')->name("hr_ga.emerlamp.finish");
        });

        Route::group(['prefix'=>'monthly-report'], function(){
            Route::get('', 'ReportController@bulanan')->name("hr_ga.auditbuyer.rformbln");
            Route::post('all-item', 'ReportController@get_bulananAll')->name("hr_ga.auditbuyer.getbln");
            Route::post('allpdf', 'ReportController@get_bulananAll_PDF')->name("hr_ga.auditbuyer.getblnpdf");
        }); 

        Route::group(['prefix'=>'alarm-report'], function(){
            Route::get('', 'ReportController@tahunan_alarm')->name("hr_ga.auditbuyer.falarm");
            Route::post('/anual', 'ReportController@get_tahunan_alarm')->name("hr_ga.auditbuyer.getalarm");
            Route::post('/anualpdf', 'ReportController@get_tahunan_alarmpdf')->name("hr_ga.auditbuyer.getalarmpdf");
        }); 

        Route::group(['prefix'=>'smoke-detector-report'], function(){
            Route::get('', 'ReportController@tahunan_smokedet')->name("hr_ga.auditbuyer.fsmoke");
            Route::post('/anual', 'ReportController@get_tahunan_smokedet')->name("hr_ga.auditbuyer.getsmoke");
            Route::post('/anualpdf', 'ReportController@get_tahunan_smokedetpdf')->name("hr_ga.auditbuyer.getsmokepdf");
        }); 

        Route::group(['prefix'=>'apar-report'], function(){
            Route::get('', 'ReportController@tahunan')->name("hr_ga.auditbuyer.rformthn");
            Route::post('/anual', 'ReportController@get_tahunan_apar')->name("hr_ga.auditbuyer.getthn");
            Route::post('/anualpdf', 'ReportController@get_tahunan_aparpdf')->name("hr_ga.auditbuyer.getthnpdf");
        }); 

        Route::group(['prefix'=>'emergency-exit-report'], function(){
            Route::get('', 'ReportController@tahunan_emerexit')->name("hr_ga.auditbuyer.fexit");
            Route::post('/anual', 'ReportController@get_tahunan_emerexit')->name("hr_ga.auditbuyer.getexit");
            Route::post('/anualpdf', 'ReportController@get_tahunan_emerexitpdf')->name("hr_ga.auditbuyer.getexitpdf");
        }); 

        Route::group(['prefix'=>'emergency-lamp-report'], function(){
            Route::get('', 'ReportController@tahunan_emerlamp')->name("hr_ga.auditbuyer.flamp");
            Route::post('/anual', 'ReportController@get_tahunan_emerlamp')->name("hr_ga.auditbuyer.getlamp");
            Route::post('/anualpdf', 'ReportController@get_tahunan_emerlamppdf')->name("hr_ga.auditbuyer.getlamppdf");
        }); 
        Route::group(['prefix'=>'map-gm1'], function(){
            Route::get('/', 'MapController@Gm1')->name("hr_ga.auditbuyer.mapgm1");
            Route::get('/maja1', 'MapController@MapsGm1')->name("hrd.map.gm1");
        });
        Route::group(['prefix'=>'map-gm2'], function(){
            Route::get('/', 'MapController@Gm2')->name("hr_ga.auditbuyer.mapgm2");
            Route::get('/maja2', 'MapController@MapsGm2')->name("hrd.map.gm2");
        });
    });

    Route::prefix('turn-over')->namespace('TurnOver')->group(function() {
        Route::get('/', 'TurnOverController@index')->name("to-index");
    });
    
    Route::prefix('job-vacancy')->namespace('JobVacancy')->group(function() {
        Route::get('/', 'JobVacancyController@employee_tracking')->name("employee-tracking");
        Route::get('request-description{id}', 'JobVacancyController@request_description')->name("request-description");
        Route::get('request-search', 'JobVacancyController@request_search')->name("request-search");
        Route::get('publish-search', 'JobVacancyController@publish_search')->name("publish-search");
        Route::get('applicant-search', 'JobVacancyController@applicant_search')->name("applicant-search");
        Route::get('psikologi-search', 'JobVacancyController@psikologi_search')->name("psikologi-search");
        Route::get('skill-search', 'JobVacancyController@skill_search')->name("skill-search");
        Route::get('interview-search', 'JobVacancyController@interview_search')->name("interview-search");
        Route::get('public-delete{id}', 'JobVacancyController@public_delete')->name("public-delete");
        Route::get('publish-description{id}', 'JobVacancyController@publish_description')->name("publish-description");
        Route::post('request-description-update', 'JobVacancyController@desc_update')->name("request-desc_update");
        Route::post('publish-update', 'JobVacancyController@publish_update')->name("request-publish_update");
        Route::get('disqualification{id}', 'JobVacancyController@disqualification')->name("candidate-disqualification");
        Route::put('publish-all-update', 'JobVacancyController@update_all')->name("publish-update_all");
        Route::put('disqualification-all', 'JobVacancyController@disqualification_all')->name("disqualification-all");
        Route::get('applicant-detail{id}', 'JobVacancyController@applicant_detail')->name("details_applicant-index");
        Route::get('details', 'JobVacancyController@details')->name("details-index");
        Route::post('psychological-date-update', 'JobVacancyController@psyco_date_update')->name("applicant-psyco_date_update");
        Route::post('psychological-score', 'JobVacancyController@psychotest_score')->name("applicant-psychotest_score");
        Route::post('testskill-score', 'JobVacancyController@testskill_score')->name("applicant-testskill_score");
        Route::post('skilltest-date', 'JobVacancyController@testskill_date')->name("applicant-testskill_date");
        Route::post('psychotest-date', 'JobVacancyController@psychotest_date')->name("applicant-psychotest_date");
        Route::post('update-testskill', 'JobVacancyController@testskill_update')->name("applicant-testskill_update");
        Route::post('update-psychotest', 'JobVacancyController@psychotest_update')->name("applicant-psychotest_update");
        Route::post('interview-store', 'JobVacancyController@interview_store')->name("applicant-interview_store");
        Route::get('end-probation{id}', 'JobVacancyController@end_probation')->name("candidate-end_probation");
        Route::get('probation-update{id}', 'JobVacancyController@probation_update')->name("applicant-probation_update");
        Route::get('process-end{id}', 'JobVacancyController@process_end')->name("applicant-process_end");
    });
    
    Route::prefix('rekap-absensi')->namespace('RekapAbsensi')->group(function() {
        Route::get('/', 'RekapAbsensiController@index')->name("rekap-index");
        Route::get('/excel', 'RekapAbsensiController@ResumeExcel')->name("rekap.absen.exlcel");
        Route::get('/pdf', 'RekapAbsensiController@ResumePdf')->name("rekap.absen.pdf");
    });
    
    Route::prefix('daily-abscence')->namespace('DailyAbsen')->group(function() {
        Route::get('/', 'DailyAbsenController@index')->name("absen-index");
    });
    
    Route::prefix('job-orientation-test')->namespace('JobOrientationTest')->group(function() {
        Route::get('/', 'QuestionController@draft')->name("question.draft");
        Route::get('tambah-soal{id}', 'QuestionController@index')->name("question.index");
        Route::post('modul-soal-store', 'ModulController@store')->name("job_orientation.modul-store");
        Route::post('soal-store', 'SoalController@store')->name("job_orientation.soal-store");
        Route::post('soal-update', 'SoalController@update')->name("job_orientation.soal-update");
        Route::post('departemen', 'ModulController@departemen')->name("job_orientation.departemen");
        Route::get('delete-soal{id}', 'SoalController@delete')->name("job_orientation.delete-soal");
        Route::get('delete-semua-soal{id}', 'SoalController@delete_all')->name("job_orientation.delete_all-soal");
    });
    
    Route::prefix('permit-pengajuan')->namespace('PermitPengajuan')->group(function() {
        Route::get('/', 'PermitPengajuanController@index')->name("permit.request.pengajuan");
        Route::get('scan-approve', 'PermitPengajuanController@scanApprove')->name("scanApprove.permit");
        Route::get('scan-reject', 'PermitPengajuanController@scanReject')->name("scanReject.permit");
    });
    
    Route::prefix('report-permit-request')->namespace('PermitPengajuan')->group(function() {
        Route::get('/', 'ReportPermitController@index')->name("report.permit.request");
    });
});