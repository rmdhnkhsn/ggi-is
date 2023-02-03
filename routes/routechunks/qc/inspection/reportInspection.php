<?php
Route::prefix('report')->namespace('QC\Inspection')->group(function() {
    Route::group(['prefix'=>'final-inspection'], function(){
        Route::get('daily', 'reportInspectionController@rharian')->name('finali.rharian');
        // Route::post('daily/get', 'QCReportController@harianGet')->name('harian.get');
        // Route::post('daily/pdf', 'QCReportController@harianPDF')->name('harian.pdf');
        // Route::get('download/daily', 'QCReportController@downloadHarian')->name('download.harian');
        // Route::get('monthly', 'QCReportController@rbulanan')->name('rbulanan.index');
        // Route::post('/monthly/get','QCReportController@get')->name('rbulanan.get');
        // Route::post('monthly/pdf', 'QCReportController@bulananPDF')->name('bulanan.pdf');
        // Route::get('annual', 'QCReportController@rtahunan')->name('rtahunan.index');
        // Route::post('/annual/get','QCReportController@tahunget')->name('rtahunan.get');
        // Route::post('annual/pdf', 'QCReportController@tahunanPDF')->name('tahunan.pdf');
    });

    // Route::group(['prefix'=>'report-all-fasilitas'], function(){
    //     Route::get('all/annual', 'ReportAllFasilitasController@tahunan')->name('all.tahunan');
    //     Route::get('all/daily', 'ReportAllFasilitasController@harian')->name('all.harian');
    //     Route::post('get/annual', 'ReportAllFasilitasController@getTahunan')->name('get.AllTahunan');
    //     Route::post('get/daily', 'ReportAllFasilitasController@getHarian')->name('get.AllHarian');
    //     Route::post('all/annual/pdf', 'ReportAllFasilitasController@AllTahunanPDF')->name('AllTahunan.pdf');
    //     Route::post('all/daily/pdf', 'ReportAllFasilitasController@AllHarianPDF')->name('AllHarian.pdf');
    // });
});