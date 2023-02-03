<?php
use Illuminate\Support\Facades\Route;

Route::prefix('production')->namespace('Production')->group(function() {
    Route::group(['prefix'=>'product'], function(){
        Route::get('/dashboardProduction', 'ProductionController@produk')->name("production.index");
        Route::get('/', 'ProductionController@index')->name("production.home");
        Route::get('/data', 'ProductionController@data')->name("production.data");
        Route::get('/SignalTowerProduction', 'ProductionController@reporttower')->name("production.reporttower");
        Route::get('/perform', 'ProductionController@perform')->name("production.perform");
        Route::get('/grafik', 'ProductionController@grafik')->name("production.grafik");
        Route::get('/grafikBatang', 'ProductionController@grafikBatang')->name("production.grafikBatang");
        Route::get('/grafik/getData', 'ProductionController@getAvgTotalResponseTime')->name('production.grafik.getData');
        Route::get('/grafikBatang/getData', 'ProductionController@getAvgTotalResponseTime')->name('production.grafikBatang.getData');
         
    });
    Route::group(['prefix'=>'report'], function(){
        Route::get('rbulanan', 'ProductionController@bulanan')->name('production.bulanan');
        Route::post('/rbulan/get','ProductionController@get')->name('reporttower.get');
        Route::get('rperform', 'ProductionController@bulananPerform')->name('production.bulananPerform');
        Route::post('/rperform/get','ProductionController@performGet')->name('perform.performGet');
        Route::get('rchart', 'ProductionController@bulananChart')->name('production.bulananChart');
        Route::post('/rchart/get','ProductionController@chartGet')->name('grafik.chartGet');
        Route::get('/detail', 'ProductionController@detail')->name("detail");
    });
    Route::group(['prefix'=>'view'], function(){
        Route::get('/view', 'qrcodeController@index')->name("qrcode.index");
        Route::get('/create', 'qrcodeController@create')->name("qrcode.create");

        // Store a new pdf
        Route::post('/storeSmv/{qrcode}', 'qrcodeController@storeSmv')->name("qrcode.storeSmv");
        Route::post('/storePpm/{qrcode}', 'qrcodeController@storePpm')->name("qrcode.storePpm");
        Route::post('/storeWork/{qrcode}', 'qrcodeController@storeWork')->name("qrcode.storeWork");
        Route::post('/storeTrimcard/{qrcode}', 'qrcodeController@storeTrimcard')->name("qrcode.storeTrimcard");
        Route::post('/storeTechspech/{qrcode}', 'qrcodeController@storeTechspech')->name("qrcode.storeTechspech");
        // Route::get('/createSmv/{qrcode}', 'qrcodeController@createSmv')->name("qrcode.createSmv");
        // Route::get('/createSmv/{qrcode}', 'qrcodeController@createSmv')->name("qrcode.createSmv");


        // Edit Existing PDF Upload
        Route::put('/updateSmv/{qrcode}', 'qrcodeController@updateSmv')->name("qrcode.updateSmv");
        Route::put('/updatePpm/{qrcode}', 'qrcodeController@updatePpm')->name("qrcode.updatePpm");
        Route::put('/updateWork/{qrcode}', 'qrcodeController@updateWork')->name("qrcode.updateWork");
        Route::put('/updateTrimcard/{qrcode}', 'qrcodeController@updateTrimcard')->name("qrcode.updateTrimcard");
        Route::put('/updateTechspech/{qrcode}', 'qrcodeController@updateTechspech')->name("qrcode.updateTechspech");

        Route::post('/store', 'qrcodeController@store')->name("qrcode.store");
        Route::get('/show/{id}', 'qrcodeController@show')->name("qrcode.show");
        Route::get('/show_smv/{id}', 'qrcodeController@show_smv')->name("qrcode.show_smv");
        Route::get('qrcode/{id}', 'qrcodeController@generate')->name('qrcode.generate');
        Route::get('qrcode2/{id}', 'qrcodeController@generate2')->name('qrcode.generate2');
        Route::post('download-qr-code/{type}', 'qrcodeController@downloadQrcode')->name('qrcode.download');
        Route::get('delete/{id}', 'qrcodeController@delete')->name('qrcode.delete');
        Route::get('detail/', 'qrcodeController@detail')->name('qrcode.detail');
        Route::get('edit-image/{id}','qrcodeController@edit')->name('edit-image');
        Route::get('edit-pdf/{id}','qrcodeController@editPdf')->name('edit-pdf');
        Route::post('update-image/{id}','qrcodeController@update')->name('update');
        Route::post('update-pdf/{id}','qrcodeController@updatePdf')->name('updatePdf');
    });
    
    Route::group(['prefix'=>'Show'], function(){
        Route::get('/show_smv/{id}', 'qrcodeController@show_smv')->name("qrcode.show_smv");
        Route::get('/show_ppm/{id}', 'qrcodeController@show_ppm')->name("qrcode.show_ppm");
        Route::get('/show_trimcard/{id}', 'qrcodeController@show_trimcard')->name("qrcode.show_trimcard");
        Route::get('/show_work/{id}', 'qrcodeController@show_work')->name("qrcode.show_work");
        Route::get('/show_techspech/{id}', 'qrcodeController@show_techspech')->name("qrcode.show_techspech");
        Route::get('detail_smv/', 'qrcodeController@detail_smv')->name('qrcode.detail_smv');
        Route::get('detail_ppm/', 'qrcodeController@detail_ppm')->name('qrcode.detail_ppm');
        Route::get('detail_work/', 'qrcodeController@detail_work')->name('qrcode.detail_work');
        Route::get('detail_trimcard/', 'qrcodeController@detail_trimcard')->name('qrcode.detail_trimcard');
        Route::get('detail_techspech/', 'qrcodeController@detail_techspech')->name('qrcode.detail_techspech');

    });


   
}); 