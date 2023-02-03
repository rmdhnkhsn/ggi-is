<?php

Route::prefix('sample')->namespace('QC\Sample')->group(function() {
    Route::get('', 'SampleController@index')->name("sample.index");
    Route::get('final_report', 'SampleController@final')->name("finalreport.sample");
    Route::get('download_pdf/{id}', 'SampleController@pdf')->name("sample.pdf");

    Route::group(['prefix'=>'quality_report'], function(){
        Route::get('', 'SampleController@report')->name("qr.index");
        Route::post('file/{id}', 'SampleController@file')->name('sample.file');
        Route::post('delete_file', 'SampleController@delete_file')->name('sample.file.delete');
        Route::post('cari-item', 'SampleController@cari_item')->name('sample.cari_item');
        Route::post('cari-buyer', 'SampleController@cari_buyer')->name('sample.cari_buyer');
        Route::get('add/report', 'SampleController@add')->name("qr.add");
        Route::post('post/report', 'SampleController@store')->name("qr.store");
        Route::get('edit/report/{id}', 'SampleController@edit')->name("qr.edit");
        Route::post('update/report', 'SampleController@update')->name("qr.update");
        Route::get('delete/report/{id}', 'SampleController@delete')->name("qr.delete");
        Route::post('change/detail/{id}', 'SampleController@change')->name("create.detail");
    });

    Route::group(['prefix'=>'fabric_quality'], function(){
        Route::get('add/{id}', 'FabricQualityController@add')->name("fq.add");
        Route::post('store', 'FabricQualityController@store')->name("fq.store");
        Route::get('show/{id}', 'FabricQualityController@show')->name("fq.show");
        Route::get('edit/{id}', 'FabricQualityController@edit')->name("fq.edit");
        Route::post('update/{id}', 'FabricQualityController@update')->name("fq.update");
        Route::get('delete/{id}', 'FabricQualityController@delete')->name("fq.delete");
    });

    Route::group(['prefix'=>'measurement_standar'], function(){
        Route::get('add/{id}', 'MeasurementController@add')->name("mea.add");
        Route::post('store', 'MeasurementController@store')->name("mea.store");
        Route::get('show/{id}', 'MeasurementController@show')->name("mea.show");
        Route::get('edit/{id}', 'MeasurementController@edit')->name("mea.edit");
        Route::post('update/{id}', 'MeasurementController@update')->name("mea.update");
        Route::get('delete/{id}', 'MeasurementController@delete')->name("mea.delete");

    });

    Route::group(['prefix'=>'measurement_detail'], function(){
        Route::get('add/{id}', 'MeaDetailController@add')->name("mdetail.add");
        Route::post('store', 'MeaDetailController@store')->name("mdetail.store");
        Route::get('show/{id}', 'MeaDetailController@show')->name("mdetail.show");
        Route::get('edit/{id}', 'MeaDetailController@edit')->name("mdetail.edit");
        Route::get('edit_all/{id}', 'MeaDetailController@editall')->name("mdetail.editall");
        Route::post('update/{id}', 'MeaDetailController@update')->name("mdetail.update");
        Route::get('delete/{id}', 'MeaDetailController@delete')->name("mdetail.delete");
        Route::get('del/{id}', 'MeaDetailController@del')->name("mdetail.del");
    });

    Route::group(['prefix'=>'measurement'], function(){
        Route::get('add/{id}', 'SampleMeasurementController@add')->name("sample_measurement.add");
        Route::post('store', 'SampleMeasurementController@store')->name("sample_measurement.store");
        Route::get('show/{id}', 'SampleMeasurementController@show')->name("sample_measurement.show");
        Route::get('edit/{id}', 'SampleMeasurementController@edit')->name("sample_measurement.edit");
        Route::get('edit_all/{id}', 'SampleMeasurementController@editall')->name("sample_measurement.editall");
        Route::post('update', 'SampleMeasurementController@update')->name("sample_measurement.update");
        Route::get('delete/{id}', 'SampleMeasurementController@delete')->name("sample_measurement.delete");
        Route::get('del/{id}', 'SampleMeasurementController@del')->name("sample_measurement.del");
        Route::get('tambah-field{id}', 'SampleMeasurementController@tambah_field')->name("sample_measurement.tambah_field");
    });

    Route::group(['prefix'=>'color'], function(){
        Route::get('add/{id}', 'ColorController@add')->name("sample_color.add");
        Route::post('store', 'ColorController@store')->name("sample_color.store");
        Route::get('show/{id}', 'ColorController@show')->name("sample_color.show");
        Route::get('edit/{id}', 'ColorController@edit')->name("sample_color.edit");
        Route::post('update', 'ColorController@update')->name("sample_color.update");
        Route::get('delete/{id}', 'ColorController@delete')->name("sample_color.delete");
    });

    Route::group(['prefix'=>'workmanship'], function(){
        Route::post('change/{id}', 'WorkmanshipController@change')->name("work.change");
        Route::get('add/{id}', 'WorkmanshipController@add')->name("work.add");
        Route::post('store', 'WorkmanshipController@store')->name("work.store");
        Route::get('show/{id}', 'WorkmanshipController@show')->name("work.show");
        Route::get('edit/{id}', 'WorkmanshipController@edit')->name("work.edit");
        Route::post('update/{id}', 'WorkmanshipController@update')->name("work.update");
        Route::get('delete/{id}', 'WorkmanshipController@delete')->name("work.delete");

    });

    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'CategoryController@index')->name("sample_category.index");
        Route::get('create', 'CategoryController@create')->name("sample_category.create");
        Route::post('store', 'CategoryController@store')->name("sample_category.store");
        Route::get('edit{id}', 'CategoryController@edit')->name("sample_category.edit");
        Route::get('delete{id}', 'CategoryController@delete')->name("sample_category.delete");
        Route::post('update', 'CategoryController@update')->name("sample_category.update");
    });

    Route::group(['prefix'=>'list-buyer'], function(){
        Route::get('index{id}', 'ListBuyerSampleController@index')->name("list_buyer.index");
        Route::get('create{id}', 'ListBuyerSampleController@create')->name("list_buyer.create");
        Route::post('store', 'ListBuyerSampleController@store')->name("list_buyer.store");
        Route::get('edit{id}', 'ListBuyerSampleController@edit')->name("list_buyer.edit");
        Route::get('delete{id}', 'ListBuyerSampleController@delete')->name("list_buyer.delete");
        Route::post('update', 'ListBuyerSampleController@update')->name("list_buyer.update");
    });

    Route::group(['prefix'=>'item'], function(){
        Route::get('index{id}', 'ItemCategoryController@index')->name("item_category.index");
        Route::get('create{id}', 'ItemCategoryController@create')->name("item_category.create");
        Route::post('store', 'ItemCategoryController@store')->name("item_category.store");
        Route::get('edit{id}', 'ItemCategoryController@edit')->name("item_category.edit");
        Route::get('delete{id}', 'ItemCategoryController@delete')->name("item_category.delete");
        Route::post('update', 'ItemCategoryController@update')->name("item_category.update");
    });

    Route::group(['prefix'=>'description'], function(){
        Route::get('index{id}', 'DescriptionController@index')->name("description_item.index");
        Route::get('create{id}', 'DescriptionController@create')->name("description_item.create");
        Route::post('store', 'DescriptionController@store')->name("description_item.store");
        Route::get('edit{id}', 'DescriptionController@edit')->name("description_item.edit");
        Route::get('delete{id}', 'DescriptionController@delete')->name("description_item.delete");
        Route::post('update', 'DescriptionController@update')->name("description_item.update");
    });

    Route::group(['prefix'=>'sample_detail'], function(){
        Route::get('create/{id}', 'SampleReportController@create')->name("create.detail");
        Route::get('sample_final/{id}', 'SampleReportController@final')->name("sample.final");
    });

    Route::group(['prefix'=>'check_report'], function(){
        Route::get('', 'SampleReportController@spl')->name("spl.report");
        Route::post('spl/app', 'SampleReportController@splapp')->name("spl.app");
        Route::get('sample/finalreport/{id}', 'SampleReportController@appfinal')->name("app.final");
    });

    Route::group(['prefix'=>'sample_dept'], function(){
        Route::get('', 'SampleReportController@dept')->name("dept.report");
        Route::post('dept/app', 'SampleReportController@deptapp')->name("dept.app");
        Route::get('final_sample/{id}', 'SampleReportController@sdep')->name("dept.final");
    });

    Route::group(['prefix'=>'spv_qc'], function(){
        Route::get('', 'SampleReportController@spv')->name("spv.sample");
        Route::post('spv/sample/app', 'SampleReportController@spv_app')->name("spv.sampleapp");
        Route::get('final_spv/{id}', 'SampleReportController@s_svp')->name("spv.final");
    });

    Route::group(['prefix'=>'sample_report'], function(){
        Route::get('monthly/get', 'SampleAllReportController@monthly')->name("monthly.get");
        Route::post('monthly/data', 'SampleAllReportController@monthly_post')->name("monthly.post");
        Route::post('pdf/monthly', 'SampleAllReportController@monthly_pdf')->name("monthly.pdf");
        Route::get('annual/get', 'SampleAllReportController@annual')->name("annual.get");
        Route::post('annual/data', 'SampleAllReportController@annual_post')->name("annual.post");
        Route::post('pdf/annual', 'SampleAllReportController@annual_pdf')->name("annual.pdf");
    });

});