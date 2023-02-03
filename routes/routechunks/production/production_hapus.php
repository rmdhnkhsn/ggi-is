<?php
use Illuminate\Support\Facades\Route;

Route::prefix('prd')->namespace('Production')->group(function() {
    Route::get('/', 'ProductionController@index')->name("prd.home");
    Route::prefix('tower-signal')->group(function() {
        Route::get('/', 'ProductionController@produk')->name("prd.index");
        Route::get('/data', 'ProductionController@data')->name("prd.data");
        Route::get('/SignalTowerProduction', 'ProductionController@reporttower')->name("prd.reporttower");
        Route::get('/perform', 'ProductionController@perform')->name("prd.perform");
        Route::get('/grafik', 'ProductionController@grafik')->name("prd.grafik");
        Route::get('/grafikBatang', 'ProductionController@grafikBatang')->name("prd.grafikBatang");
        Route::post('/grafik/getData', 'ProductionController@getAvgTotalResponseTime')->name('prd.grafik.getData');
        Route::post('/grafikBatang/getData', 'ProductionController@getAvgTotalResponseTime')->name('prd.grafikBatang.getData');
        
        Route::get('rdata', 'ProductionController@datatower')->name('production.dataTower');
        Route::post('/rdata/getData','ProductionController@getData')->name('reporttower.getData');
        Route::get('rbulanan', 'ProductionController@bulanan')->name('production.bulanan');
        Route::post('/rbulan/get','ProductionController@get')->name('reporttower.get');
        Route::get('rperform', 'ProductionController@bulananPerform')->name('production.bulananPerform');
        Route::post('/rperform/get','ProductionController@performGet')->name('perform.performGet');
        Route::get('rchart', 'ProductionController@bulananChart')->name('production.bulananChart');
        Route::post('/rchart/get','ProductionController@chartGet')->name('grafik.chartGet');
        Route::get('/detail', 'ProductionController@detail')->name("detail");
    });

    Route::prefix('sewing')->namespace('Sewing')->group(function() {
        Route::get('/', 'SewingController@index')->name("prd.sewing.index");
        Route::post('import', 'SewingController@import')->name("prd.sewing.import");
    });
}); 
