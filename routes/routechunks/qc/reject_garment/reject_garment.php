<?php

Route::prefix('reject_garment')->namespace('QC\RejectGarment')->group(function() {
    Route::get('', 'RejectGarmentController@index')->name("rgarment.index");

    Route::group(['prefix'=>'line'], function(){
        Route::get('', 'LineController@index')->name("line.index");
        Route::get('get_wo/{id}', 'LineController@get')->name("line.get");
        Route::get('take/{id}', 'LineController@take')->name("line.take");
        Route::get('take/show_detail/{id}','RejectBreakdownController@show')->name("reject_detail.show");
        Route::get('take/edit_detail/{id}','RejectBreakdownController@edit')->name("reject_detail.edit");
        Route::post('store', 'LineController@store')->name("line.store");
        Route::post('search', 'LineController@search')->name("line.search");
        Route::get('take/edit/{id}', 'LineController@edit')->name("line.edit");
        Route::post('update', 'LineController@update')->name("line.update");
        Route::get('delete/{id}', 'LineController@delete')->name("line.delete");
    });

    Route::group(['prefix'=>'detail'], function(){
        Route::get('index/{id}', 'RejectGarmentController@detail_index')->name("detail.index");
        Route::get('index/edit/{id}', 'RejectGarmentController@edit')->name("detail.edit");
        Route::post('store', 'RejectGarmentController@store')->name("detail.store");
        Route::post('update/{id}', 'RejectGarmentController@update')->name("detail.update");
        Route::get('delete/{id}', 'RejectGarmentController@delete')->name("detail.delete");
    });

    Route::group(['prefix'=>'report'], function(){
        Route::post('store', 'RejectReportController@store')->name("report.store");
        Route::post('update', 'RejectReportController@update')->name("report.update");
    });

    Route::group(['prefix'=>'reject_detail'], function(){
        Route::post('store', 'RejectBreakdownController@store')->name("reject_detail.store");
        Route::post('hapus', 'RejectBreakdownController@delete')->name("reject_detail.hapus");
        Route::post('edit', 'RejectBreakdownController@edit')->name("reject_detail.edit");
        Route::post('update', 'RejectBreakdownController@update')->name("reject_detail.update");
    });

    Route::group(['prefix'=>'reject_report'], function(){
        Route::get('index', 'LaporanRejectController@index')->name("reject_report.index");
        Route::post('bulanan', 'LaporanRejectController@bulanan')->name("reject_report.bulanan");
        Route::post('bulanan_pdf', 'LaporanRejectController@bulananPDF')->name("reject_report.bulanan_pdf");
        Route::post('bulanan/excel', 'LaporanRejectController@excel')->name('reject_report.excel');
    });

    Route::group(['prefix'=>'packing_list'], function(){
        Route::get('index', 'PackingListController@index')->name("packing.index");
        Route::get('index_all', 'PackingListController@all')->name("packing.all");
        Route::post('store', 'PackingListController@store')->name("packing.store");
        Route::get('delete/{id}', 'PackingListController@delete')->name("packing.delete");
        Route::get('index/edit/{id}', 'PackingListController@edit')->name("packing.edit");
        Route::post('update', 'PackingListController@update')->name("packing.update");
        Route::get('print/{id}', 'PackingListController@print')->name("packing.print");
    });

    Route::group(['prefix'=>'packing_detail'], function(){
        Route::get('index/{id}', 'PackingDetailController@index')->name("packing_detail.index");
        Route::post('store', 'PackingDetailController@store')->name("packing_detail.store");
        Route::get('delete/{id}', 'PackingDetailController@delete')->name("packing_detail.delete");
        Route::get('index/edit/{id}', 'PackingDetailController@edit')->name("packing_detail.edit");
        Route::post('update', 'PackingDetailController@update')->name("packing_detail.update");
    });
});