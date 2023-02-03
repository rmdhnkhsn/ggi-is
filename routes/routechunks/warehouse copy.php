<?php
Route::prefix('war')->namespace('Warehouse')->group(function() {
    Route::get('/', 'WarehouseController@home')->name("warehouse-home");
    Route::get('expedition', 'WarehouseController@expedition')->name("warehouse-expedition");
    Route::get('material', 'WarehouseController@material')->name("warehouse-material");

    Route::get('delivery', 'WarehouseController@delivery')->name("warehouse-delivery");
    Route::get('delivery-details', 'WarehouseController@delivery_details')->name("delivery-details");
    Route::get('delivery-konfirm', 'WarehouseController@delivery_konfirm')->name("delivery-konfirm");
    Route::get('scan-delivery', 'WarehouseController@scanqr_delivery')->name("scan-delivery");
    Route::get('verify-valid-buyer/{number_contract}/{transaction_date}', 'WarehouseController@verifyValidBuyer')->name("verify-valid-buyer");

    // Route::get('qrcode-scan/{id}', 'WarehouseController@generate')->name('warehouse.generate');
    Route::post('qrcode-warehouse', 'WarehouseController@pdfQRCode')->name('warehouse-qrcode');
    Route::get('qrcode-warehouse-id/{id_barcode}', 'WarehouseController@pdfQRCodeID')->name('warehouse-qrcodeID');
    Route::post('store-data', 'WarehouseController@store')->name('warehouse-store');
    Route::post('update-remark', 'WarehouseController@updateRemark')->name('warehouse-UpdateRemark');
    Route::post('update-scan', 'WarehouseController@updateScanQrcode')->name("warehouse-updateScanQrcode");
    Route::post('update-Anomali-Done', 'WarehouseController@updateAnomaliToDone')->name("warehouse-updateAnomaliToDone");
    Route::get('store-qr-code', 'WarehouseController@storeQrCode')->name("store-qr-code");
    Route::get('show-delivery-detail', 'WarehouseController@showDeliveryDetail')->name("show-delivery-detail");


    Route::get('receiving', 'WarehouseController@receiving')->name("warehouse-receiving");
    Route::get('receiving-details', 'WarehouseController@receiving_details')->name("receiving-details");
    Route::get('anomali-receiving/{id}', 'WarehouseController@anomali_receiving')->name("anomali-receiving");
    Route::get('scan-receiving', 'WarehouseController@scanqr_receiving')->name("scan-receiving");
    Route::post('report', 'WarehouseController@reportFinising')->name("report-warehouse");

    Route::get('/report', 'WarehouseController@bulanan')->name("warehouse-bulanan");
    Route::post('/daily-warehouse', 'WarehouseController@dailyPDF')->name("warehouse-reportPDF");
    Route::post('/daily-Excel', 'WarehouseController@dailyExcel')->name("warehouse-reportExcel");
    Route::post('update-approve', 'WarehouseController@updateKonfirm')->name('warehouse-updateKonfirm');
    Route::post('update-reject', 'WarehouseController@updateReject')->name('warehouse-updateReject');
    Route::get('/details/{id_barcode}', 'WarehouseController@receiving_detailsID')->name('warehouse-detailsid');
    Route::get('/anomali-delivery/{id_barcode}', 'WarehouseController@anomali_delivery')->name('anomali-delivery');
    Route::post('delivery-barcode', 'WarehouseController@deliveryCreateBarcode')->name("delivery-create");

    Route::prefix('packing-list')->group(function() {
        Route::get('/', 'PackingListController@index')->name("warehouse-packing");
        Route::get('detail/{id_ekspedisi}', 'PackingListController@detail')->name("detail-packing");
        Route::get('detail-Ekspedisi/{id}', 'PackingListController@data_details')->name("data_details-packing");
        Route::get('download/{kode_ekspedisi}', 'PackingListController@downloadpacking')->name("download-packingEkspedisi");
        Route::get('download', 'PackingListController@download')->name("download-packing");
        Route::post('store-invoice','PackingListController@storeData')->name("store-packing");
        Route::post('packing-list-edit', 'PackingListController@updateEkspedisi')->name("packing.updateEkspedisi");
        Route::post('update-surat-jalan/{kode_ekspedisi}', 'PackingListController@UpdateSuratjalan')->name("packing.UpdateSuratjalan");
        Route::post('packing-to-expedisi', 'PackingListController@updateEkspedisi')->name("packing.updateEkspedisi");
        Route::get('data-ekspedisi/{kode_ekspedisi}', 'PackingListController@ekspedisiPDF')->name("packing.EkspedisiPDF");
        Route::get('data-ekspedisi-Excel/{kode_ekspedisi}', 'PackingListController@ekspedisiExcel')->name("packing.EkspedisiExcel");
        Route::get('packing-edit/{kode_ekspedisi}', 'PackingListController@edit_details')->name("edit-details");
        Route::post('show-report-packing', 'PackingListController@showReportPacking')->name("show-report-packing");






        Route::get('/index2', 'PackingListController@index2')->name("warehouse-packing2");

    });

});