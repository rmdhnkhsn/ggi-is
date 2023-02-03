<?php

Route::prefix('prd')->namespace('Cutting')->group(function() {
    Route::group(['prefix'=>'cutting'], function(){
        Route::namespace('Product_Costing')->group(function() {
            Route::get('/', 'CuttingController@dashboard')->name("cutting.dashboard");
            Route::get('update-proses{id}', 'CuttingController@update_proses')->name("cutting.update_proses");
        });

        
        Route::prefix('hr')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'MasterKodeKerjaController@index')->name("master_kode_kerja.index");
            Route::post('master-kode-kerja/store', 'MasterKodeKerjaController@store')->name("master_kode_kerja.store");
            Route::post('master-kode-kerja/update', 'MasterKodeKerjaController@update')->name("master_kode_kerja.update");
            Route::get('master-kode-kerja/delete{id}', 'MasterKodeKerjaController@delete')->name("master_kode_kerja.delete");
            Route::post('master-kode-kerja/update_hari_kerja', 'MasterKodeKerjaController@update_hari_kerja')->name("master_kode_kerja.update_hari_kerja");
            Route::get('kode-kerja-karyawan', 'KodeKerjaKaryawanController@index')->name("kode_kerja_karyawan.index");
            Route::get('kode-kerja-karyawan/export', 'KodeKerjaKaryawanController@export')->name("kode_kerja_karyawan.export");
            Route::post('kode-kerja-karyawan/import', 'KodeKerjaKaryawanController@import')->name("kode_kerja_karyawan.import");
            Route::get('kode-kerja-karyawan/cari_nik{id}', 'KodeKerjaKaryawanController@cari_nik')->name("kode_kerja_karyawan.cari_nik");
            Route::get('kode-kerja-karyawan/kode_kerja{id}', 'KodeKerjaKaryawanController@kode_kerja')->name("kode_kerja_karyawan.kode_kerja");
            Route::post('kode-kerja-karyawan/store', 'KodeKerjaKaryawanController@store')->name("kode_kerja_karyawan.store");
            Route::post('kode-kerja-karyawan/update', 'KodeKerjaKaryawanController@update')->name("kode_kerja_karyawan.update");
            Route::get('kode-kerja-karyawan/delete{id}', 'KodeKerjaKaryawanController@delete')->name("kode_kerja_karyawan.delete");
            Route::post('kode-kerja-karyawan/search', 'KodeKerjaKaryawanController@search')->name("kode_kerja_karyawan.search");
            Route::get('kode-kerja-karyawan/show', 'KodeKerjaKaryawanController@show')->name("kode_kerja_karyawan.show");
        });

        Route::prefix('ppic')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'CuttingController@ppic')->name("cutting.ppic");
            Route::get('/qty_breakdown{id}', 'CuttingController@qty_breakdown')->name("cutting.qty_breakdown");
            Route::get('history', 'CuttingPPICController@wo_selesai')->name("cutting.wo_selesai");
            Route::post('create', 'CuttingPPICController@create')->name("cutting.ppic.create");
            Route::post('search-wo', 'CuttingPPICController@search_wo')->name("cutting.ppic.search_wo");
            Route::post('schedule-wo', 'CuttingPPICController@schedule_wo')->name("cutting.ppic.schedule_wo");
            Route::post('component-wo', 'CuttingPPICController@component_wo')->name("cutting.ppic.component_wo");
            Route::get('edit{id}', 'CuttingPPICController@edit')->name("cutting.ppic.edit");
            Route::post('component-store{id}', 'CuttingPPICController@component_store')->name("cutting.ppic.component_store");
            Route::get('delete{id}', 'CuttingPPICController@delete')->name("cutting.ppic.delete");
            Route::post('store', 'CuttingPPICController@store')->name("cutting.ppic.store");
            Route::post('update', 'CuttingPPICController@update')->name("cutting.ppic.update");
        });

        Route::prefix('adm-cutting')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'CuttingController@adm_cutting')->name("cutting.admincutting");
            Route::get('create', 'CuttingController@adm_create')->name("create-form");
            Route::get('edit{id}', 'AdminCuttingController@adm_edit')->name("adm.edit-form");
            Route::post('update_kain', 'AdminCuttingController@update_kain')->name("adm.update-kain");
            Route::post('tambah_gelaran', 'AdminCuttingController@tambah_gelaran')->name("adm.tambah_gelaran");
            Route::post('assortmarker', 'AdminCuttingController@assortmarker')->name("adm.assortmarker");
            Route::post('assortmarker/new', 'AdminCuttingController@assort_new')->name("adm.assort_new");
            Route::post('assortmarker/add', 'AdminCuttingController@add_assortmarker')->name("add.assortmarker");
            Route::post('assortmarker/update', 'AdminCuttingController@assort_update')->name("update.assortmarker");
            Route::get('assortmarker/delete{id}', 'AdminCuttingController@assort_delete')->name("delete.assortmarker");
            Route::get('delete_fabric{id}', 'AdminCuttingController@delete_fabric')->name("adm.delete_fabric");
            Route::post('update-detail', 'AdminCuttingController@update_detail')->name("adm.update_detail");
            Route::get('create/data_ppic{id}', 'AdminCuttingController@data_ppic')->name("cutting.data_ppic");
            Route::post('color', 'AdminCuttingController@color')->name("cutting.color");
            Route::post('component', 'AdminCuttingController@component')->name("cutting.component");
            Route::post('gelaran-wo/store', 'AdminCuttingController@gelaran_wo')->name("cutting.gelaran_wo");
            Route::post('size', 'AdminCuttingController@size')->name("cutting.size");

            Route::get('print-label{id}', 'PrintLabelController@pemakaian_kain')->name("cutting.pemakaian_kain");
            Route::post('label-store', 'PrintLabelController@store')->name("cutting.label_store");
            Route::get('label-detail{id}', 'PrintLabelController@detail')->name("cutting.label_detail");
            Route::get('label-edit{id}', 'PrintLabelController@edit')->name("cutting.label_edit");
            Route::post('label-update', 'PrintLabelController@update')->name("cutting.label_update");
            Route::get('label-delete{id}', 'PrintLabelController@delete')->name("cutting.label_delete");
            Route::get('label-print{id}', 'PrintLabelController@print')->name("cutting.label_print");
            Route::get('delete-all-item{id}', 'PrintLabelController@delete_all')->name("cutting.label_delete_all");
        });

        // REVISI
        Route::prefix('admin-cutting')->namespace('Product_Costing')->group(function() {
            Route::get('form-gelaran', 'AdmCuttingController@gelaran')->name("admin.cutting.gelaran");
            Route::get('form-gelaran/create', 'AdmCuttingController@create_gelaran')->name("create.gelaran");
            Route::get('form-gelaran/edit', 'AdmCuttingController@edit_gelaran')->name("edit.gelaran");
            Route::get('form-gelaran/detail', 'AdmCuttingController@detail_gelaran')->name("detail.gelaran");

            Route::get('form-dalam-proses', 'AdmCuttingController@dalam_proses')->name("admin.cutting.proses");
            Route::get('form-dalam-proses/edit', 'AdmCuttingController@edit_proses')->name("edit.proses");
            Route::get('form-dalam-proses/detail', 'AdmCuttingController@detail_proses')->name("detail.proses");
            Route::get('form-dalam-proses/print', 'AdmCuttingController@print_proses')->name("print.proses");
            Route::get('form-dalam-proses/print/pdf', 'AdmCuttingController@print_pdf')->name("print.proses.pdf");

            Route::get('data-cutting', 'AdmCuttingController@data_cutting')->name("admin.cutting.data");
            Route::get('data-cutting/detail', 'AdmCuttingController@detail_cutting')->name("detail.data.cutting");
        });
        
        Route::prefix('proses-gelar')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'CuttingController@gelar')->name("cutting.gelar");
            Route::get('mulai-gelar{id}', 'CuttingController@mulai_gelar')->name("mulai-gelar");
            Route::post('proses-gelar-user', 'ProsesGelarController@simpan_user')->name("gelar.simpan_user");
            Route::post('finish', 'ProsesGelarController@finish')->name("gelar.finish");
            Route::get('delete{id}', 'ProsesGelarController@delete')->name("gelar.delete");
            Route::get('form-gelar{id}', 'CuttingController@form_gelar')->name("form-gelar");
            Route::post('form-gelar/store', 'ProsesGelarController@store_gelar')->name("form.store_gelar");
            Route::post('form-gelar/add_new', 'ProsesGelarController@add_new')->name("form.add_new");
            Route::post('form-gelar/update', 'ProsesGelarController@update')->name("form.update");
        });
        
        // REVISI
        Route::prefix('proses-gelar-rev')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'ProsesGelarController@proses_gelar')->name("cutting.gelar.index");
        });

        Route::prefix('proses-cutting')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'CuttingController@proses_cutting')->name("proses_cutting.index");
            Route::get('mulai{id}', 'ProsesCuttingController@mulai')->name("proses_cutting.mulai");
            Route::post('proses-cutting-user', 'ProsesCuttingController@simpan_user')->name("proses_cutting.simpan_user");
            Route::post('finish', 'ProsesCuttingController@finish')->name("proses_cutting.finish");
        });

        Route::prefix('proses-numbering')->namespace('Product_Costing')->group(function() { 
            Route::get('/', 'CuttingController@proses_numbering')->name("proses_numbering.index");
            Route::get('mulai{id}', 'ProsesNumberingController@mulai')->name("proses_numbering.mulai");
            Route::post('proses-numbering-user', 'ProsesNumberingController@simpan_user')->name("proses_numbering.simpan_user");
            Route::post('finish', 'ProsesNumberingController@finish')->name("proses_numbering.finish");
        });
        
        Route::prefix('proses-bundling')->namespace('Product_Costing')->group(function() { 
            // Route::get('/', 'CuttingController@proses_bundling')->name("proses_bundling.index");
            Route::get('/', 'CuttingController@proses_numbering')->name("proses_numbering.index");
            Route::get('mulai{id}', 'ProsesBundlingController@mulai')->name("proses_bundling.mulai");
            Route::post('proses-bundling-user', 'ProsesBundlingController@simpan_user')->name("proses_bundling.simpan_user");
            Route::get('input-{id}', 'ProsesBundlingController@bundling_index')->name("proses_bundling.bundling_index");
            Route::post('input-rfid', 'ProsesBundlingController@rf_id')->name("proses_bundling.input_rfid");
            Route::post('update-rfid', 'ProsesBundlingController@update_data')->name("proses_bundling.update_rfid");
            Route::post('rfid-manual', 'ProsesBundlingController@rfid_manual')->name("proses_bundling.manual");
            Route::get('hapus-rfid/{id}', 'ProsesBundlingController@delete_data')->name("proses_bundling.delete_rfid");
            Route::post('finish', 'ProsesBundlingController@finish')->name("proses_bundling.finish");
        });

        
        Route::prefix('proses-pressing')->namespace('Product_Costing')->group(function() { 
            Route::get('/', 'CuttingController@proses_pressing')->name("proses_pressing.index");
            Route::get('mulai{id}', 'ProsesPressingController@mulai')->name("proses_pressing.mulai");
            Route::get('next{id}', 'ProsesPressingController@next')->name("proses_pressing.next");
            Route::post('proses-pressing-user', 'ProsesPressingController@simpan_user')->name("proses_pressing.simpan_user");
            Route::post('finish', 'ProsesPressingController@finish')->name("proses_pressing.finish");
        });

        Route::prefix('report')->namespace('Product_Costing')->group(function() {
            Route::get('/', 'ReportController@report_gelar')->name("report.gelar");
            Route::get('proses-cutting', 'ReportController@report_cutting')->name("report.cutting");
            Route::get('proses-numbering', 'ReportController@report_numbering')->name("report.numbering");
            Route::get('proses-pressing', 'ReportController@report_pressing')->name("report.pressing");
            Route::get('proses-bundling', 'ReportController@report_bundling')->name("report.bundling");
            Route::get('analytics', 'ReportController@report_analytics')->name("report.analytics");
        });

    });
   
}); 