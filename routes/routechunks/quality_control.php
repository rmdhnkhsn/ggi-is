<?php

Route::group(['prefix'=>'qcr'], function(){
    Route::get('', 'ReworkController@qc')->name("qc.index");

    // Rework 
    Route::prefix('rework')->group(function() {
        Route::get('/', 'ReworkController@index')->name('rework.index'); //test
        Route::get('/rework_edit/{id}', 'ReworkController@edit')->name('rework.edit');
        Route::post('/rework_store', 'ReworkController@store')->name("rework.store");
        Route::get('/rework_export-csv','ReworkController@ExportCsvEndUser')->name('rework.export_csv');
        Route::get('/rework_export-pdf','ReworkController@RekapHariIni')->name('rework.rekap_hari_ini');

        Route::prefix('wo')->group(function() {
            Route::get('/', 'JdeApiController@index')->name("wo.index");
            Route::get('create', 'JdeApiController@create')->name("wo.add");
            Route::get('show/{id}', 'JdeApiController@show')->name("wo.show");
            Route::post('store', 'JdeApiController@store')->name("wo.store");
            Route::get('edit/{id}', 'JdeApiController@edit')->name('wo.edit');
            Route::get('delete/{id}', 'JdeApiController@delete')->name('wo.delete');
            Route::post('update', 'JdeApiController@update')->name('wo.update');
            Route::get('pdf', 'JdeApiController@pdf')->name('wo.pdf');
            Route::get('export-csv','JdeApiController@excel')->name('wo.excel');
            Route::get('export-detail','JdeApiController@detailexcel')->name('detail.excel');
        });

        Route::group(['prefix'=>'Master-Line'], function(){
            Route::get('/', 'Line\MasterLineController@index')->name("mline.index");
            Route::get('create', 'Line\MasterLineController@create')->name("mline.create");
            Route::post('store', 'Line\MasterLineController@store')->name("mline.store");
            Route::get('edit/{id}', 'Line\MasterLineController@edit')->name('mline.edit');
            Route::post('update', 'Line\MasterLineController@update')->name('mline.update');
            Route::get('pdf', 'Line\MasterLineController@pdf')->name('mline.pdf');
            Route::get('export-csv','Line\MasterLineController@excel')->name('mline.excel');
        });

        Route::group(['prefix'=>'operator'], function(){
            Route::get('', 'ReworkController@master')->name("rework.master");
            Route::get('create', 'ReworkController@create')->name("rework.create");
            Route::get('take/{id}', 'ReworkController@take')->name('rework.take');
            Route::post('kerjakan/{id}','ReworkController@kerjakan')->name('rework.kerjakan');
            Route::post('pindah/{id}','ReworkController@pindah')->name('rework.pindah');
            Route::post('selesai/{id}','ReworkController@selesai')->name('rework.selesai');
            Route::get('lanjutkan/{id}','ReworkController@lanjutkan')->name('rework.lanjutkan');
            Route::get('manual/{id}','ReworkController@manual')->name('rework.manual');
            Route::get('auto/{id}','ReworkController@auto')->name('rework.auto');
            Route::post('lanjutkan/{id}','ReworkController@lanjutkan')->name('rework.lanjutkan');
            Route::get('show/{id}', 'ReworkController@show')->name("rework.show");
            Route::post('store', 'ReworkController@store')->name("rework.store");
            Route::get('edit/{id}', 'ReworkController@edit')->name('rework.edit');
            Route::put('update', 'ReworkController@update')->name('rework.update');
            Route::get('export-csv','ReworkController@exportCsvEndUser')->name('rework.export_csv_enduser');
        });

        Route::prefix('report')->namespace('Line')->group(function() {
            Route::get('report-daily', 'QCReportController@rharian')->name('rharian.index');
            Route::post('report-daily/get', 'QCReportController@harianGet')->name('harian.get');
            Route::post('report-daily/pdf', 'QCReportController@harianPDF')->name('harian.pdf');
            Route::get('report-daily/download', 'QCReportController@downloadHarian')->name('download.harian');
            Route::get('weekly', 'QCReportController@rmingguan')->name('rmingguan.index'); 
            Route::post('weekly/get','QCReportController@mingguan_get')->name('rmingguan.get');
            Route::post('weekly/pdf', 'QCReportController@mingguanPDF')->name('rmingguan.pdf');
            Route::post('weekly/excel', 'QCReportController@mingguanexcel')->name('rmingguan.excel');


            Route::get('report-monthly', 'QCReportController@rbulanan')->name('rbulanan.index');
            Route::post('report-monthly/get','QCReportController@get')->name('rbulanan.get');
            Route::post('report-monthly/pdf', 'QCReportController@bulananPDF')->name('bulanan.pdf');
            Route::post('report-monthly/excel', 'QCReportController@bulananexcel')->name('bulanan.excel');
            Route::get('report-annual', 'QCReportController@rtahunan')->name('rtahunan.index');
            Route::post('report-annual/get','QCReportController@tahunget')->name('rtahunan.get');
            Route::post('report-annual/pdf', 'QCReportController@tahunanPDF')->name('tahunan.pdf');

            Route::get('all-fasilitas-daily', 'ReportAllFasilitasController@harian')->name('all.harian');
            Route::post('all-fasilitas-daily/get', 'ReportAllFasilitasController@getHarian')->name('get.AllHarian');
            Route::post('all-fasilitas-daily/pdf', 'ReportAllFasilitasController@AllHarianPDF')->name('AllHarian.pdf');

            Route::get('all-fasilitas-annual', 'ReportAllFasilitasController@tahunan')->name('all.tahunan');
            Route::post('all-fasilitas-annual/get', 'ReportAllFasilitasController@getTahunan')->name('get.AllTahunan');
            Route::post('all-fasilitas-annual/pdf', 'ReportAllFasilitasController@AllTahunanPDF')->name('AllTahunan.pdf');
        });

        Route::prefix('SPV')->namespace('Line')->group(function() {
            // Route::group(['prefix'=>'detail'], function(){
                Route::get('/', 'SPVController@index')->name("spv.index");
                Route::get('/finalreport/{id}', 'SPVController@final')->name("report.done");
                Route::post('/spv/approve','SPVController@approve')->name("spv.approve");
                Route::get('see/{id}','SPVController@see')->name("spv.see");
                Route::get('show/{id}','SPVController@show')->name("spv.show");
                Route::get('edit/{id}','SPVController@edit')->name("spv.edit");
                Route::post('/spv/update','SPVController@update')->name("spv.update");
            // });
        });
        
        Route::prefix('line-to-user')->namespace('Line')->group(function() {
        // Route::group(['prefix'=>'luser'], function(){
            Route::get('/', 'LineToUserController@index')->name("luser.index");
            Route::get('create/{id}', 'LineToUserController@create')->name("luser.create");
            Route::get('show/{id}', 'LineToUserController@show')->name("luser.show");
            Route::post('store/{id}', 'LineToUserController@store')->name("luser.store");
            Route::get('delete/{id}','LineToUserController@delete')->name('luser.delete');
        });

        
        Route::prefix('line-to-target')->namespace('Line')->group(function() {
        // Route::group(['prefix'=>'ltarget'], function(){
            Route::get('/', 'LineToTargetController@index')->name("ltarget.index");
            Route::get('search/{id}', 'LineToTargetController@search')->name("ltarget.search");
            Route::get('tambah/{id}', 'LineToTargetController@tambah')->name("ltarget.tambah");
            Route::post('tambahHari/{id}', 'LineToTargetController@tambahHari')->name("ltarget.tambahHari");
            Route::get('tambahHari/delete/{id}', 'LineToTargetController@deleteHari')->name("ltarget.deleteHari");
            Route::post('searchwo', 'LineToTargetController@get')->name("ltarget.get");
            Route::get('show/{id}', 'LineToTargetController@show')->name("ltarget.show");
            Route::get('see/{id}', 'LineToTargetController@see')->name("ltarget.see");
            Route::get('summary/{id}', 'LineToTargetController@summary')->name("ltarget.summary");
            Route::get('summary/detail/{id}', 'LineToTargetController@summarydetail')->name("summary.detail");
            Route::post('store/{id}', 'LineToTargetController@store')->name("ltarget.store");
            Route::get('edit/{id}', 'LineToTargetController@edit')->name('ltarget.edit');
            Route::get('delete/{id}','LineToTargetController@delete')->name('ltarget.delete');
            Route::get('final', 'LineToTargetController@final')->name('ltarget.final');
            Route::post('update/{id}', 'LineToTargetController@update')->name('ltarget.update');
            Route::get('pdf', 'LineToTargetController@pdf')->name('ltarget.pdf');
            Route::get('export-csv','LineToTargetController@excel')->name('ltarget.excel');
        });

        Route::prefix('input-auto')->namespace('Line')->group(function() {
			Route::post('fg/{id}', 'AutoController@fg')->name('auto.fg');
			Route::post('ip/{id}', 'AutoController@ip')->name('auto.ip');
			Route::post('sticker/{id}', 'AutoController@sticker')->name('auto.sticker');
			Route::post('meas/{id}', 'AutoController@meas')->name('auto.meas');
			Route::post('trimming/{id}', 'AutoController@trimming')->name('auto.trimming');
			Route::post('other/{id}', 'AutoController@other')->name('auto.other');
			Route::post('ros/{id}', 'AutoController@ros')->name('auto.ros');
			Route::post('broken/{id}', 'AutoController@broken')->name('auto.broken');
			Route::post('skip/{id}', 'AutoController@skip')->name('auto.skip');
			Route::post('pktw/{id}', 'AutoController@pktw')->name('auto.pktw');
			Route::post('crooked/{id}', 'AutoController@crooked')->name('auto.crooked');
			Route::post('pleated/{id}', 'AutoController@pleated')->name('auto.pleated');
			Route::post('htl/{id}', 'AutoController@htl')->name('auto.htl');
			Route::post('button/{id}', 'AutoController@button')->name('auto.button');
			Route::post('print/{id}', 'AutoController@print')->name('auto.print');
			Route::post('shading/{id}', 'AutoController@shading')->name('auto.shading');
			Route::post('dof/{id}', 'AutoController@dof')->name('auto.dof');
			Route::post('dirty/{id}', 'AutoController@dirty')->name('auto.dirty');
			Route::post('shiny/{id}', 'AutoController@shiny')->name('auto.shiny');
			Route::post('bs/{id}', 'AutoController@bs')->name('auto.bs');
			Route::post('unb/{id}', 'AutoController@unb')->name('auto.unb');
			Route::post('remark/{id}', 'AutoController@remark')->name('auto.remark');
			Route::post('file/{id}', 'AutoController@file')->name('auto.file');
			Route::post('hapus/file/{id}', 'AutoController@hapus')->name('hapus.file');
			Route::post('selesai', 'AutoController@selesai')->name('auto.selesai');
		});

        Route::prefix('detail')->namespace('Line')->group(function() {
            Route::get('/', 'LineDetailController@index')->name("detail.index");
            Route::get('manual/{id}', 'LineDetailController@manual')->name("detail.manual");
            Route::post('manualstore/{id}', 'LineDetailController@manualstore')->name("detail.manualstore");
            Route::get('auto/{id}', 'LineDetailController@auto')->name("detail.auto");
            Route::get('create', 'LineDetailController@create')->name("detail.add");
            Route::get('DetaiShow/{id}', 'LineDetailController@show')->name("detail.show");
            Route::post('store', 'LineDetailController@store')->name("detail.store");
            Route::get('detail/edit/{id}', 'LineDetailController@edit')->name('details.edit');
            Route::get('delete/{id}', 'LineDetailController@delete')->name('detail.delete');
            Route::post('detail/update', 'LineDetailController@update')->name('details.update');
            Route::get('pdf', 'LineDetailController@pdf')->name('detail.pdf');
            Route::get('export-csv','LineDetailController@excel')->name('detail.excel');
        });
    });

    Route::prefix('reject-cutting')->namespace('QC\RejectCutting')->group(function() {
       Route::get('/', 'RejectCuttingController@dashboard')->name("RejectCutting.dashboard");
        Route::get('/view', 'RejectCuttingController@index')->name("RejectCutting.index");
        Route::get('/monthly', 'ReportRejectCuttingController@index')->name("RejectCutting.monthly");
        Route::get('/seeTable', 'RejectCuttingController@ItemMeja')->name("RejectCutting.see");
        Route::get('/AddMeja', 'RejectCuttingController@addMeja')->name("RejectCutting.addMeja");
        Route::post('/store', 'RejectCuttingController@store')->name("RejectCutting.store");
        Route::get('/delete/{id}', 'RejectCuttingController@delete_master')->name("RejectCutting.delete");
        Route::get('/delete/cutting/{id}', 'RejectCuttingController@delete')->name("RejectCutting.delete1");
        Route::put('/updateIndex/{RejectCutting}', 'RejectCuttingController@updateIndex')->name("RejectCutting.updateIndex");
        Route::post('/update/approve', 'RejectCuttingController@update')->name("RejectCutting.update.approve");
        Route::post('/update/waiting', 'RejectCuttingController@update2')->name("RejectCutting.update.waiting");
        Route::post('/get-wo-information', 'RejectCuttingController@getWoInformation')->name("RejectCutting.get-wo-information");
        Route::post('/show-wo-information', 'RejectCuttingController@showWoInformation')->name("RejectCutting.show-wo-information");
        Route::post('/store-wo-information', 'RejectCuttingController@storeWoInformation')->name("RejectCutting.store-wo-information");
        Route::post('/update-wo-information', 'RejectCuttingController@updateWoInformation')->name("RejectCutting.update-wo-information");
        Route::get('/report', 'ReportRejectCuttingController@bulanan')->name("RejectCutting.bulanan");
        Route::post('/monthly', 'ReportRejectCuttingController@monthly')->name("RejectCutting.monthly");
        Route::get('/report-reject', 'ReportRejectCuttingController@bulananReject')->name("RejectCutting.bulananReject");
        Route::post('/monthly-reject', 'ReportRejectCuttingController@monthlyReject')->name("RejectCutting.monthlyReject");
        Route::get('/report-yearly', 'ReportRejectCuttingController@tahunan')->name("RejectCutting.tahunan");
        Route::get('/report-yearlyAll', 'ReportRejectCuttingController@tahunanAll')->name("RejectCutting.tahunanAll");
        Route::get('/report-daily-All', 'ReportRejectCuttingController@harianAll')->name("RejectCutting.harianAll");
        Route::post('/daily-All-Facility', 'ReportRejectCuttingController@dailyAll')->name("RejectCutting.dailyAll");
        Route::post('/yearly-All-Facility', 'ReportRejectCuttingController@yearlyAll')->name("RejectCutting.yearlyAll");
        Route::post('/yearly-All-Facility-PDF', 'ReportRejectCuttingController@yearlyAllPDF')->name("RejectCutting.yearlyAllPDF");
        Route::post('/Daily-All-Facility-PDF', 'ReportRejectCuttingController@dailyAllPDF')->name("RejectCutting.dailyAllPDF");
        Route::post('/yearly', 'ReportRejectCuttingController@yearly')->name("RejectCutting.yearly");
        Route::get('/daily', 'ReportRejectCuttingController@harian')->name("RejectCutting.harian");
        Route::get('/daily-Buyer', 'ReportRejectCuttingController@harianBuyer')->name("RejectCutting.harianBuyer");
        Route::post('/daily-report', 'ReportRejectCuttingController@daily')->name("RejectCutting.daily");
        Route::post('/daily-Buyer-report', 'ReportRejectCuttingController@dailyBuyer')->name("RejectCutting.dailyBuyer");
        Route::post('/daily-PDF', 'ReportRejectCuttingController@dailyPDF')->name("RejectCutting.dailyPDF");
        Route::post('/daily-excel', 'ReportRejectCuttingController@dailyExcel')->name("RejectCutting.dailyExcel");
        Route::post('/monthly-Reject-pdf', 'ReportRejectCuttingController@monthlyRejectPDF')->name("RejectCutting.monthlyRejectPDF");
        Route::post('/monthly-Reject-Excel', 'ReportRejectCuttingController@monthlyRejectExcel')->name("RejectCutting.monthlyRejectExcel");
        Route::post('/monthly-excel', 'ReportRejectCuttingController@monthlyExcel')->name("RejectCutting.monthlyExcel");
        Route::post('/yearly-excel', 'ReportRejectCuttingController@yearlyExcel')->name("RejectCutting.yearlyExcel");
        Route::post('/monthly-pdf', 'ReportRejectCuttingController@monthlyPDF')->name("RejectCutting.monthlyPDF");
        Route::post('/yearly-pdf', 'ReportRejectCuttingController@yearlyPDF')->name("RejectCutting.yearlyPDF");
    });
   
    Route::prefix('qc-cutting')->namespace('QC\QC_Cutting')->group(function() {
       Route::get('cek-marker', 'QCCuttingController@index')->name("qc-cutting");
       Route::get('cutting-daily', 'QCCuttingController@cutting_daily')->name("qc-cutting-daily");
       Route::get('reject-cutting', 'QCCuttingController@reject_cutting')->name("qc-reject-cutting");
       Route::get('reject-cutting/details', 'QCCuttingController@details')->name("qc-details");
       Route::get('embro-print', 'QCCuttingController@embro_print')->name("qc-embro-print");
       Route::get('report', 'QCCuttingController@qc_report')->name("qc-report");
    });
   
    Route::prefix('quality-assurance')->namespace('QC\QualityAssurance')->group(function() {
        Route::get('qa-inline', 'QualityAssuranceController@qa_inline')->name("qa.inline.index");
        Route::get('qa-inline/create', 'QualityAssuranceController@create_inline')->name("create.inline.index");
        Route::get('qa-inline/edit', 'QualityAssuranceController@edit_inline')->name("edit.inline.index");

        Route::get('pre-final/create2', 'QualityAssuranceController@go_pre_final')->name("go.prefinal.index");
        Route::get('pre-final', 'QualityAssuranceController@pre_final')->name("qa.prefinal.index");
        Route::get('pre-final/create', 'QualityAssuranceController@create_pre_final')->name("create.prefinal.index");
        Route::get('pre-final/edit', 'QualityAssuranceController@edit_pre_final')->name("edit.prefinal.index");

        Route::get('factory-audit', 'QualityAssuranceController@factory_audit')->name("qa.factory.index");
        Route::get('factory-audit/create', 'QualityAssuranceController@go_factory_audit')->name("go.factory.index");
        Route::get('factory-audit/edit', 'QualityAssuranceController@edit_factory_audit')->name("edit.factory.index");

        Route::get('final-inspection', 'QualityAssuranceController@final_inspection')->name("qa.inspection.index");
        Route::get('final-inspection/edit', 'QualityAssuranceController@edit_final_inspection')->name("edit.inspection.index");
        
        Route::get('report', 'QualityAssuranceController@report')->name("qa.report.index");
        Route::get('report/inline', 'QualityAssuranceController@inline_report')->name("inline.report.index");
        Route::get('report/pre-final', 'QualityAssuranceController@prefinal_report')->name("prefinal.report.index");
        Route::get('report/factory-audit', 'QualityAssuranceController@factory_report')->name("factory.report.index");
        Route::get('report/final-inspection', 'QualityAssuranceController@inspection_report')->name("inspection.report.index");
    });
   
    Route::prefix('daily-cutting')->namespace('QC\DailyCutting')->group(function() {
        Route::get('/', 'DailyCuttingController@index')->name("daily.cutting.index");
    });
    
    include "qc/sample/sample.php";
    include "qc/inspection/inspection.php";
    include "qc/reject_garment/reject_garment.php";
    include "qc/reject_cutting/reject_cutting.php";
    include "qc/factory_audit/factory_audit.php";
    include "qc/smqc/smqc.php";
    include "qc/aql/aql.php";
});