<?php

// SMQC 
Route::prefix('smqc')->namespace('QC\SMQC')->group(function() {
    Route::get('/', 'SMQCController@index')->name('smqc.index'); 
    // Report Fabric 
    Route::group(['prefix'=>'report-fabric'], function(){
        Route::get('/', 'SMQCController@report_kain')->name('kain.dashboard'); 
        Route::get('create', 'SMQCController@kain_create')->name('kain.create'); 
        Route::get('delete{id}', 'SMQCController@kain_delete')->name('kain.delete'); 
        Route::get('edit{id}', 'SMQCController@kain_edit')->name('kain.edit'); 
        Route::get('final', 'SMQCController@final_kain')->name('kain.final'); 
        Route::post('search-id', 'SMQCController@search_id')->name('kain.search_id'); 
        Route::post('search-buyer', 'SMQCController@search_buyer')->name('kain.search_buyer'); 
        Route::get('index-id{id}', 'SMQCController@index_id')->name('kain.index_id'); 
        Route::get('index-buyer{id}', 'SMQCController@index_buyer')->name('kain.index_buyer'); 
        Route::get('data-id', 'SMQCController@data_id')->name('kain.data_id'); 
        Route::get('data-buyer', 'SMQCController@data_buyer')->name('kain.data_buyer'); 
        Route::post('monthly-report', 'SMQCController@report_bulanan')->name('kain.report_bulanan'); 
        Route::get('index-monthly-report{id}', 'SMQCController@bulanan_index')->name('kain.bulanan_index'); 
        Route::get('far-pdf{id}', 'SMQCController@far_pdf')->name('kain.far_pdf'); 
        Route::get('fir-pdf{id}', 'SMQCController@fir_pdf')->name('kain.fir_pdf'); 
        Route::get('shade-pdf{id}', 'SMQCController@shade_pdf')->name('kain.shade_pdf');
        Route::get('send-notif{id}', 'ReportKainController@notif')->name('fabric.notif');
        Route::post('store-report', 'ReportKainController@store')->name('fabric.report_store');
        Route::post('update-report', 'ReportKainController@update')->name('fabric.report_update');
    });
    
    // 1. List Buyer 
    Route::group(['prefix'=>'list-buyer'], function(){
        Route::get('/', 'SMQCListBuyerController@index')->name('listbuyer.index');
        Route::post('store', 'SMQCListBuyerController@store')->name('listbuyer.store');
        Route::post('update', 'SMQCListBuyerController@update')->name('listbuyer.update');
        Route::get('delete{id}', 'SMQCListBuyerController@delete')->name('listbuyer.delete');
    });

    // 2. List Supplier 
    Route::group(['prefix'=>'list-supplier'], function(){
        Route::get('/', 'ListSupplierController@index')->name('listsupplier.index');
        Route::post('store', 'ListSupplierController@store')->name('listsupplier.store');
        Route::post('update', 'ListSupplierController@update')->name('listsupplier.update');
        Route::get('delete{id}', 'ListSupplierController@delete')->name('listsupplier.delete');
    });
 
    // 3. Fabric Standar 
    Route::group(['prefix'=>'fabric-standard'], function(){
        Route::get('/', 'StandarKainController@index')->name('fabric_standar.index');
        Route::post('store', 'StandarKainController@store')->name('fabric_standar.store');
        Route::post('update', 'StandarKainController@update')->name('fabric_standar.update');
        Route::get('delete{id}', 'StandarKainController@delete')->name('fabric_standar.delete');
    });

    Route::group(['prefix'=>'merchandiser-fabric'], function(){
        Route::get('/', 'SMQCController@md_index')->name('md_kain.index'); 
        Route::post('search-report', 'SMQCController@md_search')->name('md_search.index'); 
        Route::get('fabric-report-index{id}', 'SMQCController@md_frindex')->name('md_frindex.index'); 
        Route::get('search-index', 'SMQCController@md_sindex')->name('md_sindex.index'); 
        Route::get('approve-report{id}', 'SMQCController@md_approve')->name('md_approve.report'); 
        Route::get('final-report', 'ReportKainController@md_final')->name('md_final.report'); 
        Route::post('final-search', 'ReportKainController@md_final_search')->name('md_final.search'); 
        Route::get('final-data{id}', 'ReportKainController@md_final_data')->name('md_final.data'); 
        Route::get('final-report-buyer', 'ReportKainController@final_buyer')->name('md_final.buyer'); 
    });
    
    Route::group(['prefix'=>'purchasing-fabric'], function(){
        Route::get('/', 'ReportKainController@prc_index')->name('prc_index.report'); 
        Route::get('data-report', 'ReportKainController@prc_data')->name('prc_data.report'); 
        Route::get('approve-report{id}', 'ReportKainController@prc_approve')->name('prc_approve.report'); 
        Route::get('final-report', 'ReportKainController@prc_final')->name('prc_final.report'); 
        Route::post('final-search', 'ReportKainController@prc_final_search')->name('prc_final.search'); 
        Route::get('final-buyer{id}', 'ReportKainController@prc_final_buyer')->name('prc.final_buyer'); 
        Route::get('final-data-buyer', 'ReportKainController@data_final_buyer')->name('prc_final.buyer'); 
    });
   
    // 4. FAR
    Route::get('far-index{id}', 'FARController@index')->name('far.index');
    Route::post('far-store', 'FARController@store')->name('far.store');
    Route::post('far-update', 'FARController@update')->name('far.update');
    Route::get('far-final{id}', 'FARController@final')->name('far.final');
    Route::get('far-delete{id}', 'FARController@delete')->name('far.delete');
    // 6. Far Detail (FDetail)
    Route::get('fdetail-add{id}', 'FDetailController@add')->name('fdetail.add');
    Route::post('fdetail-create', 'FDetailController@create')->name('fdetail.create');
    Route::get('fdetail-open{id}', 'FDetailController@open')->name('fdetail.open');
    Route::get('fdetail-opdit{id}', 'FDetailController@opdit')->name('fdetail.opdit');
    Route::get('fdetail-opdel{id}', 'FDetailController@opdel')->name('fdetail.opdel');
    Route::post('fdetail-update', 'FDetailController@update')->name('fdetail.update');
    Route::post('fdetail-change', 'FDetailController@change')->name('fdetail.change');
    // 7. Shade 
    Route::get('shade-create{id}', 'ShadeController@create')->name('shade.create');
    Route::get('shade-edit{id}', 'ShadeController@edit')->name('shade.edit');
    Route::post('shade-store', 'ShadeController@store')->name('shade.store');
    Route::get('shade-detail{id}', 'ShadeController@detail')->name('shade.detail');
    Route::get('shade-addnew{id}', 'ShadeController@addnew')->name('shade.addnew');
    Route::post('shade-newfile', 'ShadeController@newfile')->name('shade.newfile');
    Route::post('shade-update', 'ShadeController@update')->name('shade.update');
    Route::get('shade-delete{id}', 'ShadeController@delete')->name('shade.delete');
    // 8. FIR 
    Route::get('fir-create{id}', 'FIRController@create')->name('fir.create');
    Route::get('fir-detail{id}', 'FIRController@detail')->name('fir.detail');
    Route::get('fir-edit{id}', 'FIRController@edit')->name('fir.edit');
    Route::get('fir-delete{id}', 'FIRController@delete')->name('fir.delete');
    Route::post('fir-store', 'FIRController@store')->name('fir.store');
    Route::post('fir-update', 'FIRController@update')->name('fir.update');
    Route::post('fir-note', 'FIRController@note')->name('fir.note');
    //9. Lab
    Route::get('shrinkage-create{id}', 'LabTestController@s_create')->name('shrinkage.create');
    Route::post('shrinkage-store', 'LabTestController@s_store')->name('shrinkage.store');
    Route::get('lab-create{id}', 'LabTestController@l_create')->name('lab.create');
    Route::get('lab-edit{id}', 'LabTestController@l_edit')->name('lab.edit');
    Route::get('lab-delete{id}', 'LabTestController@l_delete')->name('lab.delete');
    Route::post('lab-store', 'LabTestController@l_store')->name('lab.store');
    Route::post('lab-update', 'LabTestController@l_update')->name('lab.update');


    // Report Accessories 
    Route::group(['prefix'=>'report-accessories'], function(){
        Route::get('/', 'SMQCController@report_aksesoris')->name('aksesoris.index');
        Route::get('check', 'SMQCController@report_check')->name('aksesoris.check');
        Route::get('final', 'SMQCController@aksesoris_final')->name('aksesoris.final');
        Route::get('done', 'SMQCController@aksesoris_done')->name('aksesoris.done');
        Route::get('pdf{id}', 'SMQCController@aksesoris_pdf')->name('aksesoris.pdf');
        Route::post('store', 'ReportAksesorisController@store')->name('report_aksesoris.store');
        Route::post('update', 'ReportAksesorisController@update')->name('report_aksesoris.update');
        Route::get('delete{id}', 'ReportAksesorisController@delete')->name('report_aksesoris.delete');
        Route::get('send{id}', 'ReportAksesorisController@send')->name('report_aksesoris.send');
        Route::post('detail', 'ReportAksesorisController@detail_store')->name('report_aksesoris.detail_store');
        Route::group(['prefix'=>'search'], function(){
            Route::post('po', 'ReportAksesorisController@search_po')->name('report_aksesoris.search_po');
            Route::post('item', 'ReportAksesorisController@search_item')->name('report_aksesoris.search_item');
            Route::post('tanggal', 'ReportAksesorisController@search_tanggal')->name('report_aksesoris.search_tanggal');
            Route::post('po-branch', 'ReportAksesorisController@search_po_allbranch')->name('report_aksesoris.search_po_allbranch');
            Route::post('item-branch', 'ReportAksesorisController@search_item_allbranch')->name('report_aksesoris.search_item_allbranch');
            Route::post('tanggal-branch', 'ReportAksesorisController@search_tanggal_allbranch')->name('report_aksesoris.search_tanggal_allbranch');
            Route::post('status', 'ReportAksesorisController@search_status')->name('report_aksesoris.search_status');
        });
        Route::post('update-detail', 'ReportAksesorisController@detail_update')->name('report_aksesoris.detail_update');
        Route::get('delete-detail{id}', 'ReportAksesorisController@detail_delete')->name('report_aksesoris.detail_delete');
        Route::post('done-report', 'ReportAksesorisController@done_report')->name('report_aksesoris.done_report');
        Route::post('cek-report', 'ReportAksesorisController@cek_report')->name('report_aksesoris.cek_report');
        Route::get('periksa-report{id}', 'ReportAksesorisController@periksa_report')->name('report_aksesoris.periksa_report');
        Route::get('hasil-report', 'ReportAksesorisController@hasil_report')->name('report_aksesoris.hasil_report');
        Route::post('done-semua', 'ReportAksesorisController@done_semua')->name('report_aksesoris.done_semua');
    });

    // 1. Table standar 
    Route::group(['prefix'=>'accessories-standard'], function(){
        Route::get('/', 'ACCStandardController@index')->name('accessories_standar.index');
        Route::post('store', 'ACCStandardController@store')->name('accessories_standar.store');
        Route::post('update', 'ACCStandardController@update')->name('accessories_standar.update');
        Route::get('delete{id}', 'ACCStandardController@delete')->name('accessories_standar.delete');
    });

    // 3. Purchasing Aksesoris 
    Route::group(['prefix'=>'purchasing-accessories'], function(){
        Route::get('/', 'ReportAksesorisController@prc_index')->name('accessories_prc.index');
        Route::get('final', 'ReportAksesorisController@prc_final')->name('accessories_prc.final');
        Route::get('done{id}', 'ReportAksesorisController@prc_done')->name('accessories_prc.done');
        Route::get('approveall{id}', 'ReportAksesorisController@prc_approveall')->name('accessories_prc.approveall');
        Route::post('note', 'ReportAksesorisController@prc_note')->name('accessories_prc.note');
    });

    // Menu Tambahan 
    // 1. User management 
    Route::group(['prefix'=>'user-management'], function(){
        Route::get('/', 'UserManagementController@index')->name('user.index');
        Route::post('cari_nik', 'UserManagementController@cari_nik')->name('user.cari_nik');
        Route::post('store', 'UserManagementController@store')->name('usersmqc.store');
        Route::post('update', 'UserManagementController@update')->name('usersmqc.update');
        Route::get('delete{id}', 'UserManagementController@delete')->name('usersmqc.delete');
    });

    // 2. User Role 
    Route::group(['prefix'=>'role-management'], function(){
        Route::get('/', 'UserRoleController@index')->name('role.index');
        Route::post('store', 'UserRoleController@store')->name('role.store');
        Route::post('update', 'UserRoleController@update')->name('role.update');
        Route::get('delete{id}', 'UserRoleController@delete')->name('role.delete');
    });

    // 3. User kategori 
    Route::group(['prefix'=>'category-management'], function(){
        Route::get('/', 'UserKategoriController@index')->name('kategori.index');
        Route::post('store', 'UserKategoriController@store')->name('kategori.store');
        Route::post('update', 'UserKategoriController@update')->name('kategori.update');
        Route::get('delete{id}', 'UserKategoriController@delete')->name('kategori.delete');
    });
});
