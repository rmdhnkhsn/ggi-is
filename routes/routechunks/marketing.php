<?php

Route::prefix('mkt')->namespace('Marketing')->group(function() {
    Route::get('/', 'MarketingController@index')->name('marketing.index');

    // Rekap Order 
    Route::prefix('rekap-order')->namespace('RekapOrder')->group(function() {
        Route::get('/', 'RekapOrderController@dashboard')->name('rekap.dashboard');
        Route::get('/rekap_index', 'RekapOrderController@index')->name('rekap.index');
        Route::get('/rekap_all', 'RekapOrderController@all')->name('rekap.all');
        Route::get('/rekap_data{id}', 'RekapOrderController@rekap_data')->name('rekap.rekap_data');
        Route::get('/all_report', 'RekapOrderController@all_report')->name('rekap.all_report');
        Route::get('/add', 'RekapOrderController@add')->name('rekap.add');
        Route::post('/store', 'RekapOrderController@store')->name('rekap.store');
        Route::get('/edit/{id}', 'RekapOrderController@edit')->name('rekap.edit');
        Route::post('/update', 'RekapOrderController@update')->name('rekap.update');
        Route::get('/delete/{id}', 'RekapOrderController@delete')->name('rekap.delete');

        Route::prefix('detail')->group(function() {
            Route::get('/create/{id}', 'RekapOrderController@create')->name('rekap.create');
            Route::get('/{id}', 'RekapOrderController@final')->name('rekap.final');
            Route::post('/store', 'RekapDetailController@store')->name('rekapDetail.store');
            Route::get('/edit/{id}', 'RekapDetailController@edit')->name('rekapDetail.edit');
            Route::get('/create/edit/{id}', 'RekapDetailController@edit')->name('rekapDetail.edit');
            Route::post('/update', 'RekapDetailController@update')->name('rekapDetail.update');
            Route::get('/delete/{id}', 'RekapDetailController@delete')->name('rekapDetail.delete');
            Route::get('/editsize/{id}', 'RekapSizeController@edit')->name('size.edit');
            Route::get('/create/editsize/{id}', 'RekapSizeController@edit')->name('size.edit');
        });

        Route::prefix('breakdown')->group(function() {
            Route::get('/create/{id}', 'RekapBreakdownController@create')->name('breakdown.create');
            Route::get('/see/{id}', 'RekapBreakdownController@see')->name('breakdown.see');
            Route::post('/store/{id}', 'RekapBreakdownController@store')->name('breakdown.store');
            Route::get('/delete/{id}', 'RekapBreakdownController@delete')->name('breakdown.delete');
            Route::get('/see/edit_data/{id}', 'RekapBreakdownController@edit')->name('breakdown.edit');
            Route::get('/create/edit_data/{id}', 'RekapBreakdownController@edit')->name('breakdown.edit');
            Route::post('/add/new/{id}', 'RekapBreakdownController@add')->name('breakdown.add');
            Route::post('/total/amount/{id}', 'RekapBreakdownController@totalAmount')->name('breakdown.totalAmount');
            Route::post('/update/{id}', 'RekapBreakdownController@update')->name('breakdown.update');
        });

        Route::prefix('size')->group(function() {
            Route::post('/store/{id}', 'RekapSizeController@store')->name('size.store');
            Route::post('/update/{id}', 'RekapSizeController@update')->name('size.update');
        });

        Route::prefix('final-report')->group(function() {
            Route::get('/', 'RekapOrderController@finalReport')->name('rekap.finalReport');
            Route::get('/data-final{id}', 'RekapOrderController@rekapFinal')->name('rekap.rekapFinal');
            Route::get('/all-final', 'RekapOrderController@final_all')->name('rekap.final_all');
            Route::get('/download/{id}', 'RekapOrderController@download')->name('rekap.download');
            Route::get('/download_pdf/{id}', 'RekapOrderController@download_pdf')->name('rekap.download_pdf');
        });

        Route::prefix('cost-manufacture')->group(function() {
            Route::get('', 'CostManufactureController@index')->name('cm.index');
            Route::get('data-cm{id}', 'CostManufactureController@data_cm')->name('cm.data_cm');
            Route::get('all-data-cm', 'CostManufactureController@all_data')->name('cm.all_data');
        });

    });

    // Trimcard 
    Route::prefix('trimcard')->namespace('TrimCard')->group(function() {
        Route::get('/', 'TrimCardController@dashboard')->name('trimcard.dashboard');
        Route::get('/index', 'TrimCardController@index')->name('trimcard.index');
        Route::post('/get-wo', 'TrimCardController@get_wo')->name('trimcard.get_wo');
        Route::post('/wo/store', 'TrimCardController@store')->name('trimcard.store');
        Route::get('/delete/{id}', 'TrimCardController@delete')->name('trimcard.delete');
        Route::get('/edit/{id}', 'TrimCardController@edit')->name('trimcard.edit');
        Route::post('/update', 'TrimCardController@update')->name('trimcard.update');
        Route::get('/breakdown/{id}', 'TrimCardController@breakdown')->name('trimcard.breakdown');
        Route::post('/get/{id}', 'TrimCardController@get')->name('trimcard.get');
        Route::post('/excel/{id}', 'TrimCardController@excel')->name('trimcard.excel');
        Route::post('/pdf/{id}', 'TrimCardController@pdf')->name('trimcard.pdf');
        Route::get('/file/{id}', 'TrimCardPDFController@file')->name('trimcard.file');
        Route::post('/add_file', 'TrimCardPDFController@addfile')->name('trimcard.addfile');
        Route::get('/delete_file/{id}', 'TrimCardPDFController@delete_file')->name('trimcard.delete_file');
        Route::get('/download_file/{id}', 'TrimCardPDFController@getFile')->name('trimcard.download_file');
    });


    // worksheet
    Route::prefix('worksheet')->namespace('WorkSheet')->group(function() {
        Route::get('/', 'WorkSheetController@index')->name('worksheet.index');
        Route::post('/comment', 'WorkSheetController@comment_store')->name('worksheet.comment_store');
        Route::post('cari-po', 'WorkSheetController@cari_po')->name('worksheet.cari_po');
        Route::post('tambah-po', 'WorkSheetController@tambah_po')->name('worksheet.tambah_po');
        Route::get('/po-list{id}', 'WorkSheetController@po_list')->name('worksheet.po_list');
        Route::post('/copy-worksheet', 'WorkSheetController@copy_worksheet')->name('worksheet.copy_worksheet');

        // Route::get('/po-list-{key}', 'WorkSheetController@po_list_filter')->name('worksheet.po_list.key');

        Route::get('/worksheet-list{id}', 'WorkSheetController@list')->name('worksheet.list');
        Route::get('/general-identity{id}', 'WorkSheetController@general')->name('worksheet.general');
        Route::post('/store-general-identity/{id}', 'WorkSheetController@general_store')->name('worksheet.general_store');
        Route::get('/show-general-identity{id}', 'WorkSheetController@general_show')->name('worksheet.general_show');
        Route::get('/delete-general-identity/{id}', 'WorkSheetController@general_delete')->name('worksheet.general_delete');
        Route::get('/show-general-identity/edit/{id}', 'WorkSheetController@general_edit')->name('worksheet.general_edit');
        Route::post('/update-general-identity', 'WorkSheetController@general_update')->name('worksheet.general_update');
        Route::get('/breakdown{id}', 'WorkSheetController@breakdown')->name('worksheet.breakdown');
        Route::post('/store/breakdown', 'WorkSheetController@breakdown_store')->name('w_breakdown.breakdown_store');
        Route::get('/material-fabric{id}', 'WorkSheetController@material_pabric')->name('worksheet.material_pabric');
        Route::get('/materialfabric-delete{id}', 'MaterialFabricController@mf_delete')->name('worksheet.mf_delete');
        Route::get('/material-fabric/detail/{id}', 'MaterialFabricController@detail')->name('worksheet.detail');
        Route::post('/store-material-fabric', 'MaterialFabricController@store')->name('material_fabric.store');
        Route::post('/update-material-fabric', 'MaterialFabricController@update')->name('material_fabric.update');
        Route::post('/update-images', 'MaterialFabricController@update_images')->name('material_fabric.update_images');
        Route::get('/material-sewing{id}', 'WorkSheetController@material_sewing')->name('worksheet.material_sewing');
        Route::get('/materialsewing-delete{id}', 'MaterialSewingController@ms_delete')->name('worksheet.ms_delete');
        Route::post('/material-sewing/sewing/store', 'MaterialSewingController@sewing_store')->name('worksheet.sewing_store');
        Route::post('/material-sewing/sewing/update', 'MaterialSewingController@sewing_update')->name('worksheet.sewing_update');
        Route::post('/material-sewing/inac/store', 'MaterialSewingController@inac_store')->name('worksheet.inac_store');
        Route::post('/material-sewing/inac/update', 'MaterialSewingController@inac_update')->name('worksheet.inac_update');
        Route::get('/materialsewing-inac_delete{id}', 'MaterialSewingController@inac_delete')->name('worksheet.inac_delete');
        Route::post('/material-sewing/packaging/store', 'MaterialSewingController@packaging_store')->name('worksheet.packaging_store');
        Route::post('/material-sewing/packaging/update', 'MaterialSewingController@packaging_update')->name('worksheet.packaging_update');
        Route::get('/materialsewing-packaging_delete{id}', 'MaterialSewingController@packaging_delete')->name('worksheet.packaging_delete');
        Route::post('/material-sewing/detail/store', 'MaterialSewingController@detail_store')->name('worksheet.detail_store');

        Route::get('/packing{id}', 'WorkSheetController@packaging')->name('worksheet.packaging');
        Route::get('/create/finish/{id}', 'WorkSheetController@finish')->name('worksheet.finish');
        Route::get('/measurement/excel/{id}', 'MeasurementController@excel')->name('worksheet.measurement.excel');

        Route::get('/measurement{id}', 'WorkSheetController@measurement')->name('worksheet.measurement');
        Route::get('/measurement/detail/{id}', 'MeasurementController@detail')->name('worksheet.measurement.detail');
        Route::post('/measurement/file{id}', 'MeasurementController@file')->name('worksheet.measurement.file');
        Route::get('/measurement/download/{id}', 'MeasurementController@download')->name('worksheet.measurement.download');
        Route::post('/store-measurement', 'MeasurementController@store')->name('worksheet.measurement.store');
        Route::post('/update-measurement', 'MeasurementController@update')->name('worksheet.measurement.update');

        Route::post('/store-packing', 'PackingController@store')->name('worksheet.packing.store');
        Route::get('/folding/download/{id}', 'PackingController@folding')->name('worksheet.folding.download');
        Route::get('/packing/download/{id}', 'PackingController@packing')->name('worksheet.packing.download');
        Route::get('/info/download/{id}', 'PackingController@info')->name('worksheet.info.download');

        Route::get('/finish{id}', 'WorkSheetController@finish')->name('worksheet.finish');
        Route::get('/sudah-beres{id}', 'WorkSheetController@sudah_beres')->name('worksheet.sudah_beres');
        Route::get('/preview{id}', 'WorkSheetController@preview')->name('worksheet.preview');
        Route::get('/count{id}', 'WorkSheetController@count')->name('worksheet.count');
        Route::get('/cancel_count{id}', 'WorkSheetController@cancel_count')->name('worksheet.cancel_count');
        Route::get('/print/one/{id}', 'WorkSheetController@general_print')->name('worksheet.general_print');
    });

    // QR-Code 
    Route::group(['prefix'=>'qrcode'], function(){
        Route::get('/', 'qrcodeController@index')->name("qrcode.index");
        Route::get('/create', 'qrcodeController@create')->name("qrcode.create");
        Route::post('/storeSmv/{qrcode}', 'qrcodeController@storeSmv')->name("qrcode.storeSmv");
        Route::post('/storePpm/{qrcode}', 'qrcodeController@storePpm')->name("qrcode.storePpm");
        Route::post('/storeWork/{qrcode}', 'qrcodeController@storeWork')->name("qrcode.storeWork");
        Route::post('/storeTrimcard/{qrcode}', 'qrcodeController@storeTrimcard')->name("qrcode.storeTrimcard");
        Route::post('/storeTechspech/{qrcode}', 'qrcodeController@storeTechspech')->name("qrcode.storeTechspech");
        Route::put('/updateSmv/{qrcode}', 'qrcodeController@updateSmv')->name("qrcode.updateSmv");
        Route::put('/updateSmv1/{qrcode}', 'qrcodeController@updateSmv1')->name("qrcode.updateSmv1");
        Route::put('/updatePpm/{qrcode}', 'qrcodeController@updatePpm')->name("qrcode.updatePpm");
        Route::put('/updatePpm1/{qrcode}', 'qrcodeController@updatePpm1')->name("qrcode.updatePpm1");
        Route::put('/updatePpmVideos/{qrcodemodel}', 'qrcodeController@updatePpmVideos')->name("qrcode.updatePpmVideos");
        Route::put('/updatePpmVideos1/{qrcodemodel}', 'qrcodeController@updatePpmVideos1')->name("qrcode.updatePpmVideos1");
        Route::put('/updateWork/{qrcode}', 'qrcodeController@updateWork')->name("qrcode.updateWork");
        Route::put('/updateWork1/{qrcode}', 'qrcodeController@updateWork1')->name("qrcode.updateWork1");
        Route::put('/updateTrimcard/{qrcode}', 'qrcodeController@updateTrimcard')->name("qrcode.updateTrimcard");
        Route::put('/updateTrimcard1/{qrcode}', 'qrcodeController@updateTrimcard1')->name("qrcode.updateTrimcard1");
        Route::put('/updateTechspech/{qrcode}', 'qrcodeController@updateTechspech')->name("qrcode.updateTechspech");
        Route::put('/updateTechspech1/{qrcode}', 'qrcodeController@updateTechspech1')->name("qrcode.updateTechspech1");
        Route::post('/store', 'qrcodeController@store')->name("qrcode.store");
        Route::get('/show/{id}', 'qrcodeController@show')->name("qrcode.show");
        Route::get('/show_smv/{id}', 'qrcodeController@show_smv')->name("qrcode.show_smv");
        Route::get('qrcode/{id}', 'qrcodeController@generate')->name('qrcode.generate');
        Route::post('qrcode/{id}', 'qrcodeController@generateQrcode')->name('qrcode.generate.image');
        Route::get('/exportlaporan/{id}', 'qrcodeController@pdf')->name('qrcode.laporan');
        Route::get('/exportlaporan2/{id}', 'qrcodeController@pdf2')->name('qrcode.laporan2');
        Route::get('delete/{id}', 'qrcodeController@delete')->name('qrcode.delete');
        Route::get('detail/', 'qrcodeController@detail')->name('qrcode.detail');
        Route::get('edit-data/{id}','qrcodeController@edit')->name('edit-data');
        Route::get('edit-pdf/{id}','qrcodeController@editPdf')->name('edit-pdf');
        Route::post('update-image/{id}','qrcodeController@update')->name('update');
        Route::put('update-ppm-date/{qrcodemodel}','qrcodeController@updatePpmDate')->name('update.ppm-date');
        Route::post('update-pdf/{id}','qrcodeController@updatePdf')->name('updatePdf');

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

    // Sample Request
    Route::prefix('sample-request')->namespace('SampleRequest')->group(function() {
        Route::get('/', 'SampleRequestController@index')->name('sample.room.index');
        Route::get('detail/{id}', 'SampleRequestController@detail')->name('sample.detail');
        Route::post('sample-store', 'SampleRequestController@store')->name("sample.store");
        Route::post('sample-update/{id}', 'SampleRequestController@update')->name("sample.update");
        Route::get('/delete/{id}', 'SampleRequestController@delete')->name('sample.delete');
    });

});