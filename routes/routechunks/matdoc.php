<?php
Route::prefix('mtd')->namespace('MatDoc')->group(function() {
    Route::get('/', 'MatDocController@home')->name("matdoc-home");

    Route::prefix('subkon')->namespace('Subkon')->group(function() {
        Route::get('/', 'SubkonController@all_subkon')->name("subkon.index");
        // Route::get('monitoring', 'SubkonController@monitoring')->name("monitoring.index");
        // Route::get('rekapitulasi', 'SubkonController@rekapitulasi')->name("rekapitulasi.index");
        Route::post('filter', 'SubkonController@filter_subkon')->name("subkon.index.filter");
        Route::get('filter261', 'SubkonController@getAju_261')->name("subkon.filter.261");
        Route::get('filter262', 'SubkonController@getAju_262')->name("subkon.filter.262");
        Route::post('get-item', 'SubkonController@get_item')->name("subkon.get.item");
        Route::post('get-garment', 'SubkonController@get_garment')->name("subkon.get.garment");

        Route::post('create', 'SubkonController@create')->name("subkon.create");
        Route::post('update', 'SubkonController@update')->name("subkon.update");
        Route::get('monitor-{no_kontrak}', 'SubkonController@monitor')->name('subkon.monitoring');
        Route::get('rekapitulasi-{no_kontrak}', 'SubkonController@rekapitulasi')->name('subkon.rekapitulasi');
        Route::get('edit/{no_kontrak}', 'SubkonController@edit')->name('subkon.edit');
        Route::get('delete/{no_kontrak}', 'SubkonController@delete')->name('subkon.delet');
        Route::post('jatuh-tempo', 'SubkonController@RekapJatuhTempo')->name('subkon.jatuh.tempo');
        Route::get('rekap-detail', 'SubkonController@rekapDetail')->name('subkon.rekapDetail');

        Route::get('rekap-detail-{no_kontrak}', 'SubkonController@rekapDetail')->name('subkon.rekapDetail');
        Route::post('filter-rekap-detail', 'SubkonController@Filter_rekapDetail')->name('subkon.rekapDetail.filter');
        Route::post('sinkron-jde-pj-kk', 'Bc261Controller@sinkron_jde')->name('subkon.sinkronjde.pj');

        Route::post('create-pj-kk', 'Bc261Controller@create')->name('subkon.create.pj');
        Route::post('insert-pj-kk261', 'Bc261Controller@insert')->name('subkon.insert.pj');
        Route::get('rekapitulasi-{no_kontrak}/no-aju-{no_aju}', 'Bc261Controller@show_dokumen')->name('subkon.rekapitulasi.dok');
        Route::get('rekapitulasi-{no_kontrak}/edit-{no_aju}', 'Bc261Controller@edit')->name('subkon.rekapitulasi.edit');
        Route::get('rekapitulasi-{no_kontrak}/delete-{no_aju}', 'Bc261Controller@delete')->name('subkon.rekapitulasi.delete');

        Route::post('update-pj-kk261', 'Bc261Controller@update')->name('subkon.update.pj261');
        Route::post('insert-material', 'Bc261Controller@store_TambahMaterial')->name('subkon.insert.material');
        Route::get('edit-261-{id}', 'Bc261Controller@editMaterial')->name("subkon.edit.material");
        Route::post('update-261', 'Bc261Controller@updateMaterial')->name("subkon.update.material");
        Route::get('delete-261-{id}', 'Bc261Controller@deleteMaterial')->name("subkon.delete.material");
        Route::get('eksport-excel-{no_kontrak}/no-aju-{no_aju}', 'Bc261Controller@excel_tpb261')->name('subkon.rekapitulasi.excel');
        Route::get('monitoring-261-{no_kontrak}', 'Bc261Controller@Monitoring261Excel')->name('subkon.monitoring261.excel');


        Route::get('create-pemasukan-{no_kontrak}', 'Bc262Controller@create')->name('subkon.create.pemasukan');
        Route::post('insert-pemasukan', 'Bc262Controller@insert')->name('subkon.insert.262');
        Route::get('rekapitulasi-{no_kontrak}/bc262-{no_aju}', 'Bc262Controller@show_dokumen')->name('subkon.rekapitulasi262.dok');
        Route::get('rekapitulasi-{no_kontrak}/edit262-{no_aju}', 'Bc262Controller@edit')->name('subkon.rekapitulasi262.edit');
        Route::post('update-pj-kk262', 'Bc262Controller@update')->name('subkon.update.pj262');
        Route::post('insert-return', 'Bc262Controller@insert_return')->name('subkon.insert.return');
        Route::get('edit-262-{id}', 'Bc262Controller@editBarangjadi')->name("subkon.edit.barangjadi");
        Route::post('update-262', 'Bc262Controller@updateBarangjadi')->name("subkon.update.barangjadi");
        Route::get('delete-262-{id}', 'Bc262Controller@deleteBarangjadi')->name("subkon.delete.barangjadi");
        Route::post('eksport-excel262', 'Bc262Controller@excel_tpb262')->name('subkon.rekapitulasi262.excel');
        Route::get('rekapitulasi262-{no_kontrak}/delete-{no_aju}', 'Bc262Controller@delete')->name('subkon.rekapitulasi261.delete');


        Route::get('hitung-jaminan-{no_kontrak}', 'Bc261Controller@Perhitungan_Jaminan')->name('subkon.hitung.jaminan');
        Route::get('upload-tpb-{no_kontrak}', 'SubkonController@UploadTPB')->name('subkon.uploadtpb');
        Route::get('monitoring-excel-{no_kontrak}', 'SubkonController@monitoringExcel')->name('subkon.monitoring.excel');

        Route::post('subkon-receive-262', 'Bc262Controller@receive262')->name('subkon.receive.262');
        Route::post('subkon-receive-262-insert', 'Bc262Controller@insertreceive')->name('subkon.receive.262.insert');


        

    });
    
    Route::prefix('in-out')->namespace('InOut')->group(function() {
        Route::get('/', 'inOutController@index')->name("in-out.index");
        Route::get('pengeluaran-barang', 'inOutController@in_out')->name("in-out.barang");
        Route::get('monitoring', 'inOutController@monitoring')->name("in-out.monitoring");
        Route::get('report', 'inOutController@report')->name("in-out.report");
        Route::get('report-pdf', 'inOutController@report_pdf')->name("in-out.reportPDF");
        Route::get('report-excel', 'inOutController@report_excel')->name("in-out.reportExcel");
        Route::post('filter-date', 'inOutController@search_date')->name("in-out.search_date");
        Route::post('update-gudang', 'inOutController@update_gudang')->name("in-out.update_gudang");
        Route::post('update-ekspedisi', 'inOutController@update_ekspedisi')->name("in-out.update_ekspedisi");
        Route::post('update-dokumen-note', 'inOutController@update_ekspedisi')->name("in-out.update_dokumen_note");

        Route::get('update-status-barang-{id}', 'inOutController@next_step')->name("in-out.next_step");
        Route::get('reverse-barang-{id}', 'inOutController@reverse_step')->name("in-out.reverse_step");
        Route::get('finish', 'inOutController@finish')->name("in-out.finish");
        Route::get('pengeluaran-finish{id}', 'inOutController@pengeluaran_finish')->name("in-out.pengeluaran_finish");
        Route::post('void-bpb', 'inOutController@void_bpb')->name("in-out.void-bpb");
    });

    Route::prefix('invoice')->namespace('Invoice')->group(function() {
        Route::get('/', 'invoiceController@index')->name("invoice.index");
        Route::get('list-{id}', 'invoiceController@invoiceList')->name("invoiceList.index");
        Route::post('getBuyer', 'invoiceController@getBuyer')->name("invoiceList.buyer");
        Route::get('getInformation-{id}', 'invoiceController@getInformation')->name("invoiceList.Information");
        Route::post('/store', 'invoiceController@storeInvoiceHeader')->name("invoice.storeInvoiceHeader");
        Route::get('listItem-{id}', 'invoiceController@listItem')->name("invoiceList.listItem");
        // Route::get('list-item', 'invoiceController@invoiceListItem')->name("invoiceList.list-item");
        Route::get('preview-{id}', 'invoiceController@invoiceListPreview')->name("invoiceList.preview");
        Route::post('/store-data-invoice', 'invoiceController@storeDataInvoice')->name("invoice.storeDataInvoice");
        Route::get('previewpdf-{id}', 'invoiceController@previewPDF')->name("invoiceList.previewPDF");
    });
    // Route::prefix('invoice')->namespace('Invoice')->group(function() {
    //     Route::get('/', 'invoiceController@index')->name("invoice.index");
    //     // Route::post('/storee', 'invoiceController@storeInvoiceBeneficary')->name("invoice.store");
    //     // Route::post('/update', 'invoiceController@updateInvoiceBeneficary')->name("invoice.updateInvoiceBeneficary");
    //     Route::post('/store', 'invoiceController@storeInvoiceHeader')->name("invoice.storeInvoiceHeader");
    //     Route::post('/store-data-invoice', 'invoiceController@storeDataInvoice')->name("invoice.storeDataInvoice");
    //     Route::get('list', 'invoiceController@invoiceList')->name("invoiceList.index");
    //     Route::get('listItem', 'invoiceController@listItem')->name("invoiceList.listItem");
    //     Route::post('getBuyer', 'invoiceController@getBuyer')->name("invoiceList.buyer");
    //     // Route::get('buyer', 'invoiceController@invoiceListBuyer')->name("invoiceList.buyerData");
    //     Route::get('information', 'invoiceController@invoiceListInformation')->name("invoiceList.information");
    //     Route::get('list-item', 'invoiceController@invoiceListItem')->name("invoiceList.list-item");
    //     Route::get('preview', 'invoiceController@invoiceListPreview')->name("invoiceList.preview");
    //     Route::get('preview-pdf', 'invoiceController@previewPDF')->name("invoiceList.previewPDF");
    //     // Route::get('detail', 'invoiceController@invoiceListdetail')->name("invoiceList.detail");
    //     // Route::get('downloadpacking', 'invoiceController@downloadpacking')->name("invoiceList.downloadpacking");
    //     // Route::get('edit', 'invoiceController@invoiceEdit')->name("invoiceList.edit");
    //     // Route::post('update-invoice', 'invoiceController@updateInvoiceHeader')->name("invoiceList.updateInvoiceHeader");
    //     // Route::get('listItem-edit', 'invoiceController@listItemEdit')->name("invoiceList.listItemEdit");
    //     // Route::post('update-listItem', 'invoiceController@updatelistInvoiceEdit')->name("invoiceList.listItemInvoiceEdit");
    //     // Route::get('detailPackinglist-Pdf', 'invoiceController@detailPackinglistPdf')->name("invoiceList.detailPackinglistPdf");
    //     // Route::get('preview-excel', 'invoiceController@previewEXCEL')->name("invoiceList.previewEXCEL");

    //     // Route::get('list', 'invoiceController@invoiceList')->name("invoiceList.index");
    // });

    Route::prefix('contract_wo')->namespace('ContractWO')->group(function() {
        Route::get('/', 'ContractWOController@index')->name("contractwo.index");
    });

    Route::prefix('document-storage')->namespace('DocumentStorage')->group(function() {
        Route::get('document-in', 'DocumentStorageController@in')->name("documentStorage.in");
        Route::get('document-out', 'DocumentStorageController@out')->name("documentStorage.out");
        Route::get('document-other', 'DocumentStorageController@other')->name("documentStorage.other");
    });

    Route::prefix('partial-262')->namespace('Partial')->group(function() {
        Route::get('/', 'PartialController@index')->name("partial.index");
        Route::get('/input-partial-{branch}-{kontrak}', 'PartialController@inputPartial')->name("input.partial.index");
        Route::post('input-qty', 'PartialController@inputQtyPartial')->name("input.qty.partial");
        Route::post('store-qty-partial', 'PartialController@StorePartial')->name("store.qty.partial");
        Route::get('rekap-partial-{id}', 'PartialController@rekapPartial')->name("rekap.partial.index");
        Route::get('monitoring-partial-{id}', 'PartialController@monitoringPartial')->name("monitoring.partial.index");
        Route::get('edit-qty-{kontrak}/{id}', 'PartialController@EditQtyPartial')->name("edit.qty.partial");
        Route::post('update-qty-partial', 'PartialController@UpdatePartial')->name("update.qty.partial");
        Route::get('delete-qty-{kontrak}/{id}', 'PartialController@DeletePartial')->name("delete.qty.partial");
    });
});