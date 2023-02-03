<?php
Route::prefix('war')->namespace('Warehouse')->group(function() {
    Route::get('/', 'WarehouseController@home')->name("warehouse-home");
    //ily
    Route::prefix('expedition')->group(function() {
        Route::get('/', 'WarehouseController@expedition')->name("warehouse-expedition");
        Route::prefix('packing-list')->group(function() {
            Route::get('/', 'PackingListController@index')->name("warehouse-packing");
            // Route::get('/', 'PackingListController@index')->name("warehouse-packing");
            Route::get('detail-{id_ekspedisi}', 'PackingListController@detail')->name("detail-packing");
            Route::get('detail-Ekspedisi-{id}', 'PackingListController@data_details')->name("data_details-packing");
            Route::get('download-packing-ekspedisi-{kode_ekspedisi}', 'PackingListController@downloadpacking')->name("download-packingEkspedisi");
            Route::get('download', 'PackingListController@download')->name("download-packing");
            Route::post('store-invoice','PackingListController@storeData')->name("store-packing");
            // Route::post('packing-list-edit', 'PackingListController@updateEkspedisi')->name("packing.updateEkspedisi");
            Route::post('update-surat-jalan-{kode_ekspedisi}', 'PackingListController@UpdateSuratjalan')->name("packing.UpdateSuratjalan");
            Route::post('update-shipment-{kode_ekspedisi}', 'PackingListController@UpdateInvoice')->name("packing.UpdateInvoice");
            Route::post('packing-to-expedisi', 'PackingListController@updateEkspedisi')->name("packing.updateEkspedisi");
            Route::get('download-ekspedisi-pdf-{kode_ekspedisi}', 'PackingListController@ekspedisiPDF')->name("packing.EkspedisiPDF");
            Route::get('data-ekspedisi-Excel-{kode_ekspedisi}', 'PackingListController@ekspedisiExcel')->name("packing.EkspedisiExcel");
            Route::get('packing-edit-{kode_ekspedisi}', 'PackingListController@edit_details')->name("edit-details");
            Route::post('get-data-mesin', 'PackingListController@getDataWo')->name("packinglist.getDataWo");
            Route::post('tamabah-wo', 'PackingListController@addWo')->name("packinglist.addWo");
            Route::get('report-schedule-wo', 'PackingListController@report_wo')->name("packinglist.report_wo");
            Route::get('siedit-packing-list-{id}', 'PackingListController@siedit')->name("packinglist.siedit");
        });
    });

    Route::prefix('material')->group(function() {
        Route::get('/', 'WarehouseController@material')->name("warehouse-material");
        Route::prefix('delivery')->group(function() {
            Route::get('/', 'WarehouseController@delivery')->name("warehouse-delivery");
            Route::get('packinglist{id}', 'WarehouseController@delivery_packinglist')->name("warehouse-delivery-packinglist");
            Route::get('delivery-pick', 'WarehouseController@delivery_details')->name("delivery-details");
            Route::get('delivery-confirm', 'WarehouseController@delivery_konfirm')->name("delivery-konfirm");
            Route::get('delivery-qrcode/{id_barcode}', 'WarehouseController@pdfQRCodeID')->name('warehouse-qrcodeID');
            Route::get('delivery-del/{id}', 'WarehouseController@delete_box')->name('warehouse-delete-box');
            Route::get('verify-valid-buyer/{number_contract}/{transaction_date}', 'WarehouseController@verifyValidBuyer')->name("verify-valid-buyer");
            Route::post('delivery-barcode', 'WarehouseController@deliveryCreateBarcode')->name("delivery-create");
            Route::get('/details{id_barcode}', 'WarehouseController@receiving_detailsID')->name('warehouse-detailsid');
            // Route::post('qrcode-warehouse', 'WarehouseController@pdfQRCode')->name('warehouse-qrcode');

        });

        Route::prefix('receiving')->group(function() {
            Route::get('/', 'WarehouseController@receiving')->name("warehouse-receiving");
            Route::get('receiving-details', 'WarehouseController@receiving_details')->name("receiving-details");
            Route::get('scan-delivery', 'WarehouseController@scanqr_delivery')->name("scan-delivery");
            Route::post('update-scan', 'WarehouseController@updateScanQrcode')->name("warehouse-updateScanQrcode");
            Route::post('update-remark', 'WarehouseController@updateRemark')->name('warehouse-UpdateRemark');
            Route::get('anomali-receiving/{id}', 'WarehouseController@anomali_receiving')->name("anomali-receiving");
            Route::get('set_anomali{id}', 'WarehouseController@set_anomali_receiving')->name("set-anomali-receiving");
            Route::post('set_anomali', 'WarehouseController@store_anomali_receiving')->name("store-anomali-receiving");
            Route::get('api/scan-qr/{id}', 'WarehouseController@get_item')->name("receiving-scanqr-api");
            Route::post('api/scan-qr', 'WarehouseController@sfe_item')->name("receiving-scanqr-api-store");
        });

    });

    Route::prefix('request-issue-ir')->group(function() {
        Route::get('/', 'RequestIssueIRController@index')->name("Warehouse.requestIR.index");
        Route::get('/edit{id}', 'RequestIssueIRController@edit')->name("Warehouse.requestIR.edit");      
        Route::get('/delete{id}', 'RequestIssueIRController@delete')->name("Warehouse.requestIR.delete");
        Route::post('/', 'RequestIssueIRController@update')->name("Warehouse.requestIR.update");
        Route::post('/qty-convert', 'RequestIssueIRController@qty_convert')->name('requestIR.qty_convert');
    });

    // Route::get('qrcode-scan/{id}', 'WarehouseController@generate')->name('warehouse.generate');
    Route::post('store-data', 'WarehouseController@store')->name('warehouse-store');
    Route::post('update-Anomali-Done', 'WarehouseController@updateAnomaliToDone')->name("warehouse-updateAnomaliToDone");
    Route::get('store-qr-code', 'WarehouseController@storeQrCode')->name("store-qr-code");
    Route::get('show-delivery-detail', 'WarehouseController@showDeliveryDetail')->name("show-delivery-detail");
    Route::get('scan-receiving', 'WarehouseController@scanqr_receiving')->name("scan-receiving");
    Route::post('report', 'WarehouseController@reportFinising')->name("report-warehouse");
    Route::get('/report', 'WarehouseController@bulanan')->name("warehouse-bulanan");
    Route::post('/daily-warehouse', 'WarehouseController@dailyPDF')->name("warehouse-reportPDF");
    Route::post('/daily-Excel', 'WarehouseController@dailyExcel')->name("warehouse-reportExcel");
    Route::post('update-approve', 'WarehouseController@updateKonfirm')->name('warehouse-updateKonfirm');
    Route::post('update-reject', 'WarehouseController@updateReject')->name('warehouse-updateReject');
    Route::get('/anomali-delivery/{id_barcode}', 'WarehouseController@anomali_delivery')->name('anomali-delivery');
});