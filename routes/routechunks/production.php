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
        Route::get('-{key}/', 'SewingController@bulan')->name("prd.sewing.bulan");
        Route::post('import', 'SewingController@import')->name("prd.sewing.import");

        Route::get('report-upload-sewing', 'SewingController@report_uploadsewing_')->name("prd.sewing.report.upload.sewing_get");
        Route::post('report-upload-sewing', 'SewingController@report_uploadsewing')->name("prd.sewing.report.upload.sewing_post");

        Route::get('report-late-upload', 'SewingController@report_lateupload_')->name("prd.sewing.report.late.upload_get");
        Route::post('report-late-upload', 'SewingController@report_lateupload')->name("prd.sewing.report.late.upload_post");
        Route::get('persiapan', 'SewingController@Persiapan_index')->name("prd.sewing.persiapan");
        Route::post('persiapan-import', 'SewingController@persiapan_import')->name("prd.sewingpersiapan.import");
        Route::get('format-persiapan', 'SewingController@format_persiapan')->name("prd.sewing.formatpersiapan");

        Route::post('target_lost', 'SewingController@target_lost_update')->name("prd.sewing.targetlostupdate");


        


    });

    Route::prefix('finishing')->namespace('Finishing')->group(function() {
        Route::get('/', 'FinishingController@home')->name("finishing.index");
        Route::get('/packing-list', 'PackingListController@index')->name("packing-list");
        Route::get('/packing-list/packing-buyer-detail-{key}', 'PackingListController@packing_details')->name("packing-details");
        Route::get('/packing-list/packing-details{id}', 'PackingListController@data_details')->name("data-details");
        Route::get('/packing-list/edit{id}', 'PackingListController@edit_packingList')->name("packing-edit");
        Route::get('/packing-list-delete{id}', 'PackingListController@deletePackingList')->name('packing.deletePackingList');
        Route::get('/packing-list-pdf{id}', 'PackingListController@reportPacking_pdf')->name("finishing.reportPacking_pdf");
        Route::get('/packing-list-excel{id}', 'PackingListController@reportPacking_excel')->name("finishing.reportPacking_excel");
        Route::post('/packing-data-wo', 'PackingListController@getDataWo')->name("packing.getDataWo");
        Route::put('/packing-list-update{id}', 'PackingListController@updatePackingList')->name("packing.updatePackingList");
        Route::post('/packing-list-approve', 'PackingListController@updateApprovePackingList')->name('packing.updateApprovePackingList');
        Route::post('/packing-to-expedisi', 'PackingListController@updatePackingListToExpedisi')->name("packing.updatePackingListToExpedisi");
        Route::get('/data-ekspedisi{id_ekspedisi}', 'PackingListController@dataEkspedisi')->name("data-Ekspedisi");
        Route::get('/resume-Excel{id}', 'PackingListController@dataEkspedisiExcel')->name("finishing.dataEkspedisiExcel");  
        Route::post('packing-data-wo-Ekspedisi', 'PackingListController@Ekspedisi')->name("packing.getDataWoEkspedisi");
        Route::post('/packing-list-store', 'PackingListController@storePackingList')->name("packing.storePackingList");
        //to ekspedisi
        Route::get('/expedisi-list-{key}', 'PackingListController@expedisi_details')->name("expedisi-details");
        
        // Folding - INPUT
        Route::get('/input-proses', 'InputProsesController@input_proses')->name("input-proses");
        Route::post('checker-store', 'InputProsesController@storeChecker')->name("folding.storeChecker");
        Route::get('/input-proses/details', 'InputProsesController@proses_details')->name("proses-details");
        Route::get('/input-proses/details-Folding', 'InputProsesController@proses_detailsFolding')->name("proses-detailsFolding");
        Route::get('/input-proses/details-FreeMetal', 'InputProsesController@proses_detailsFreeMetal')->name("proses-detailsFreeMetal");
        Route::get('/input-proses/details-NedeleDetector', 'InputProsesController@proses_detailsNedeleDetector')->name("proses-detailsNedeleDetector");
        Route::get('/input-proses/details-Other', 'InputProsesController@proses_detailsOther')->name("proses-detailsOther");
        Route::post('/nama', 'InputProsesController@getuser')->name("folding.getuser");
        Route::post('/Category', 'InputProsesController@getCategory')->name("folding.getCategory");
        Route::post('checker-update/{id}', 'InputProsesController@updateChecker')->name("folding.updateChecker");
        Route::get('/input-proses/edit-proses/{id}', 'InputProsesController@edit_proses')->name("edit-proses");
        Route::get('delete/{id}', 'InputProsesController@deleteFolding')->name('folding.deleteFolding');

        // REPORT 
        Route::get('/report', 'FinishingReportController@bulanan')->name("finishing.bulanan");
        Route::post('report', 'FinishingReportController@reportFinising')->name("report.index");
        Route::post('report-wo', 'FinishingReportController@reportFinisingWO')->name("report.index.reportWo");
        Route::post('report-Category', 'FinishingReportController@reportFinisingCategory')->name("report.index.reportCategory");
        Route::post('/daily-Finishing', 'FinishingReportController@dailyPDF')->name("finishing.reportPDF");
        Route::post('/daily-Excel', 'FinishingReportController@dailyExcel')->name("finishing.reportExcel");
        Route::post('/wo', 'FinishingReportController@getuserwo')->name("folding.getuser.wo");
    });

    Route::prefix('operator-performance')->namespace('OperatorPerformance')->group(function() {
        Route::get('/', 'OperatorPerformanceController@index')->name("operatorperformance.index");
        Route::get('/hourly-remake', 'OperatorPerformanceController@remake')->name("operatorperformance.remake");
        Route::get('/hourly', 'OperatorPerformanceController@hourly')->name("operatorperformance.hourly");
        Route::get('/monitoring', 'CmEarningController@monitorin_cmc')->name("operatorperformance.monitoring");
        Route::post('/monitoring/main', 'CmEarningController@monitorin_cmc_filter')->name("operatorperformance.monitoring.filter");


        Route::group(['prefix'=>'cm-earning'], function(){
            Route::get('/', 'CmEarningController@index')->name("prod.cm.index");
            Route::post('/main', 'CmEarningController@main')->name("prod.cm.main");
        });

        Route::group(['prefix'=>'progres-output'], function(){
            Route::get('/', 'ProgressOutputController@index')->name("prod.prgs.index");
            Route::get('hadir', 'ProgressOutputController@op_hadir')->name("op.hadir.index");
            Route::get('/view', 'ProgressOutputController@main')->name("prod.prgs.main");
            Route::get('hadir-{id}', 'ProgressOutputController@createHadir')->name("op.hadir.add");
            Route::get('op-hadir-{id}', 'ProgressOutputController@OpHadirTgl')->name("op.hadir.tgl");
            Route::post('get-style', 'ProgressOutputController@get_style')->name("op.hadir.style");
            Route::post('store-hadir', 'ProgressOutputController@storeHadir')->name("op.hadir.store");
            Route::post('update-hadir', 'ProgressOutputController@updateHadir')->name("op.hadir.update");
        });
        Route::group(['prefix'=>'eff'], function(){
            Route::get('/', 'EffProductivityController@index')->name("eff.product.index");
            Route::get('view', 'EffProductivityController@main')->name("eff.product.filter");
        });
        Route::group(['prefix'=>'best-performance'], function(){
            Route::get('/', 'PerformanceOperatorConrtoller@index')->name("performance.product.index");
            Route::post('view', 'PerformanceOperatorConrtoller@main')->name("performance.product.filter");
        });
    });

    Route::prefix('master-smv')->namespace('MasterSMV')->group(function() {
        Route::get('/', 'MasterSMVController@database_smv')->name("databasesmv.index");
        Route::get('-{key}', 'MasterSMVController@database_smv_filter')->name("databasesmv.index-filter");


        Route::get('/data-process', 'MasterSMVController@index')->name("mastersmv.index");
        // Route::get('/{key}', 'MasterSMVController@index_filter')->name("mastersmv.index_filter");
        Route::get('/edit-smv{id}', 'MasterSMVController@edit_smv')->name("edit-smv");
        Route::delete('/delete', 'MasterSMVController@destroy')->name("mastersmv.destroy");

        Route::get('/export', 'MasterSMVController@export')->name("mastersmv.export");
        Route::post('/import', 'MasterSMVController@importFile')->name("mastersmv.import");

        Route::post('/store', 'MasterSMVController@storeSmvHeader')->name("mastersmv.storeSmvHeader");
        Route::post('/store-child', 'MasterSMVController@storeSmvChild')->name("mastersmv.storeSmvChild");
        Route::post('/get-data-proses', 'MasterSMVController@getDatabaseSMV')->name("mastersmv.getDatabaseSMV");
        Route::get('/smv/{id_header}', 'MasterSMVController@smvChild')->name("mastersmv.smvChild");
        Route::post('update-data/{id}', 'MasterSMVController@updateSmvHeader')->name("mastersmv.updateSmvHeader");
        Route::post('update-data-smv{id}', 'MasterSMVController@updateSmvChild')->name("mastersmv.updateSmvChild");
        Route::get('database-smv-pdf/{id}', 'MasterSMVController@databaseSmvPdf')->name("mastersmv.databaseSmvPdf");
        Route::get('database-smv-excel/{id}', 'MasterSMVController@databaseSmvExcel')->name("mastersmv.databaseSmvExcel");
        Route::delete('/delete-header', 'MasterSMVController@destroyHeader')->name("mastersmv.destroyHeader");
        Route::get('/delete', 'MasterSMVController@deleteHeader')->name("mastersmv.deleteHeader");
        Route::get('smv-child-delete/{id}', 'MasterSMVController@deleteSmvChild')->name('mastersmv.deleteSmvChild');
        Route::get('smv-child-deleteall/{id}', 'MasterSMVController@deleteall')->name('mastersmv.deleteall');


    });

    Route::prefix('capability-line')->namespace('CapabilityLine')->group(function() {
        Route::get('', 'CapabilityLineController@index')->name("capabilityline.index");
        Route::get('create', 'CapabilityLineController@create')->name("capabilityline.create");
        Route::post('store', 'CapabilityLineController@store')->name("capabilityline.store");
        Route::get('edit{id}', 'CapabilityLineController@edit')->name("capabilityline.edit");
        Route::post('update', 'CapabilityLineController@update')->name("capabilityline.update");
        Route::get('destroy{id}', 'CapabilityLineController@destroy')->name("capabilityline.destroy");
    });

    Route::prefix('prd-status')->namespace('ProductionStatus')->group(function() {
        Route::get('/', 'PrdStatusController@index')->name("prd.prdstatus.index");
    });

    Route::prefix('asset')->namespace('AssetManagement')->group(function() {
        Route::get('/', 'DashboardController@dashboard')->name("asset.dashboard.index");
        Route::post('/filter', 'DashboardController@dashboardFilter')->name("asset.dashboard.filter");
        Route::post('/Company', 'DashboardController@getCompany')->name("asset.dashboard.getCompany");

        Route::prefix('maintenance')->group(function() {
            Route::get('welcome', 'MaintenanceController@welcome')->name("asset.maintenance.welcome");
            Route::get('/', 'MaintenanceController@index')->name("asset.maintenance.index");
            Route::get('transfer-asset', 'MaintenanceController@transfer_asset')->name("asset.maintenance.tfAsset");
            Route::post('/store', 'MaintenanceController@store')->name("asset.maintenance.store");
            Route::post('/controll', 'MaintenanceController@controll')->name("asset.maintenance.controll");
            Route::get('checking-asset', 'MaintenanceController@checking_asset')->name("asset.maintenance.checkingAsset");
            Route::get('maintenance-asset', 'MaintenanceController@maintenance_asset')->name("asset.maintenance.maintenanceAsset");
            Route::get('setting-asset', 'MaintenanceController@setting_asset')->name("asset.maintenance.settingAsset");
            Route::get('machines/{id}', 'MaintenanceController@getMachineById')->name("asset.maintenance.getMachineById");
           
            Route::get('data-checking', 'MaintenanceController@data_checking')->name("asset.maintenance.dataChecking");
            Route::get('data-maintenance', 'MaintenanceController@data_maintenance')->name("asset.maintenance.dataMaintenance");
            Route::get('data-setting', 'MaintenanceController@data_setting')->name("asset.maintenance.dataSetting");
            
            Route::post('get-data-mesin', 'MaintenanceController@getMachine')->name("asset.getMachine");
            Route::post('update-transfer-maintenance', 'MaintenanceController@updateTransferAssets')->name("asset.maintenance.updateTransferAssets");
            Route::post('update-Checking-maintenance', 'MaintenanceController@updateCheckingAssets')->name("asset.maintenance.updateCheckingAssets");
            Route::post('update-maintenance', 'MaintenanceController@updateMaintenanceAssets')->name("asset.maintenance.updateMaintenanceAssets");
            Route::post('update-setting', 'MaintenanceController@updateSettingAssets')->name("asset.maintenance.updateSettingAssets");
            
            Route::post('edit', 'MaintenanceController@editTransferAssets')->name("asset.maintenance.editTransferAssets");
            Route::post('checking', 'MaintenanceController@editCheckingAssets')->name("asset.maintenance.editCheckingAssets");
            Route::post('maintenance', 'MaintenanceController@editMaintenanceAssets')->name("asset.maintenance.editMaintenanceAssets");
            Route::post('setting', 'MaintenanceController@editSettingAssets')->name("asset.maintenance.editSettingAssets");
            Route::get('delete-asset-maintenance/{id}', 'MaintenanceController@deleteAssetMaintenance')->name('asset.master.deleteAssetMaintenance');
            Route::post('report', 'MaintenanceController@reportMiantenance')->name("asset.master.report.maintenance2");
            Route::get('data-transfer', 'MaintenanceController@data_transfer')->name("asset.maintenance.dataTransfer");
            Route::get('data-transfer/-{key}', 'MaintenanceController@data_transfer_filter')->name("asset.maintenance.dataTransfer-filter");
            Route::get('data-checking/-{key}', 'MaintenanceController@data_checking_filter')->name("asset.maintenance.checking-filter");
            Route::get('data-setting/-{key}', 'MaintenanceController@data_setting_filter')->name("asset.maintenance.setting-filter");
            Route::get('data-maintenance/-{key}', 'MaintenanceController@data_maintenance_filter')->name("asset.maintenance.maintenance-filter");
    
            Route::get('report', 'MaintenanceController@data_report')->name("asset.maintenance.dataReport");
        });

        Route::prefix('transaction')->group(function() {
            Route::get('/', 'TransactionController@transaction')->name("asset.transaction.index");
            Route::get('maintenance', 'TransactionController@maintenance')->name("asset.maintenance");
            Route::get('in', 'TransactionController@purchase')->name("asset.purchase");
            Route::get('out', 'TransactionController@transaksi_out')->name("asset.transaksi_out");
            Route::post('/store-asset-transaction', 'TransactionController@storeAssetTransaction')->name("asset.master.storeAssetTransaction");
            Route::post('/transaction-out', 'TransactionController@storeAssetTransactionOut')->name("asset.master.storeAssetTransactionOut");
            Route::post('/update-asset-transaction', 'TransactionController@updateAssetTransaction')->name("asset.master.updateAssetTransaction");
            Route::get('delete-asset-transaction/{id}', 'TransactionController@deleteAssetTransaction')->name('asset.master.deleteAssetTransaction');
            Route::post('supplier', 'TransactionController@getSupplier')->name("asset.getSupplier");
            Route::post('getData', 'TransactionController@getData')->name("asset.getData");
            Route::post('get-data-mesin', 'TransactionController@getMachine')->name("asset.getMachine");
            Route::post('get-data-branch', 'TransactionController@getBranch')->name("asset.getBranch");
    
    
            Route::get('rental', 'TransactionController@rental')->name("asset.rental");
            Route::get('trial', 'TransactionController@trial')->name("asset.trial");
        });

        Route::prefix('master-data')->group(function() {
            Route::get('/', 'MasterDataController@master_data')->name("asset.master_data.index");
            // 
            Route::get('company', 'MasterDataController@master_company')->name("asset.master.company");
            Route::get('branch', 'MasterDataController@master_branch')->name("asset.master.branch");
            Route::get('location', 'MasterDataController@master_location')->name("asset.master.location");
            Route::get('machine-type', 'MasterDataController@master_machineType')->name("asset.master.machineType");
            Route::get('category-machine', 'MasterDataController@master_categoryMachine')->name("asset.master.categoryMachine");
            Route::get('brand', 'MasterDataController@brand')->name("asset.master.brand");
            Route::get('machine', 'MasterDataController@machine')->name("asset.master.machine");
            Route::get('machine_edit/{id}', 'MasterDataController@machine_edit')->name("asset.master.machine.edit");

            Route::get('total-machine', 'MasterDataController@totalMachine')->name("asset.master.totalMachine");
            Route::post('total-machine', 'MasterDataController@totalMachinePost')->name("asset.master.totalMachinePost");
            Route::get('total-machine-produksi', 'MasterDataController@totalMachineProduksi')->name("asset.master.totalMachineProduksi");
            Route::get('total-machine-ReadyGudang', 'MasterDataController@totalMachineReadyGudang')->name("asset.master.totalMachineReadyGudang");
            Route::get('customer', 'MasterDataController@customer')->name("asset.master.customer");
            Route::get('users', 'MasterDataController@users')->name("asset.master.users");
            Route::get('generate', 'MasterDataController@generate')->name("asset.master.generate");
            Route::get('maintenance', 'MasterDataController@maintenance')->name("asset.master.maintenance");
            Route::get('condition', 'MasterDataController@condition')->name("asset.master.condition");
            Route::get('setting', 'MasterDataController@setting')->name("asset.master.setting");
            Route::get('result', 'MasterDataController@result')->name("asset.master.result");
            Route::get('barcode', 'MasterDataController@pdfQRCodeID')->name("asset.master.pdfQRCodeID");
            Route::post('master-data-/import', 'MasterDataController@import')->name("asset.master.import");
            Route::get('data-all', 'MasterDataController@excel')->name("asset.master.excel");
            Route::get('data-all-pdf', 'MasterDataController@dataMachinePDf')->name("asset.master.pdf");
    
            
            // tambahan
            Route::post('/store-asset-company', 'MasterDataController@storeAssetCompany')->name("asset.master.storeAssetCompany");
            Route::post('update-asset-company/{ID}', 'MasterDataController@updateAssetCompany')->name("asset.master.updateAssetCompany");
            Route::get('delete/{ID}', 'MasterDataController@deleteAssetCompany')->name('asset.master.deleteAssetCompany');
            Route::post('/store-asset-Branch', 'MasterDataController@storeAssetBranch')->name("asset.master.storeAssetBranch");
            Route::post('update-asset-Branch/{id}', 'MasterDataController@updateAssetBranch')->name("asset.master.updateAssetBranch");
            Route::get('delete-asset-Branch/{id}', 'MasterDataController@deleteAssetBranch')->name('asset.master.deleteAssetBranch');
            Route::post('/store-asset-Location', 'MasterDataController@storeAssetLocation')->name("asset.master.storeAssetLocation");
            Route::post('update-asset-Location/{id}', 'MasterDataController@updateAssetLocation')->name("asset.master.updateAssetLocation");
            Route::get('delete-asset-Location/{id}', 'MasterDataController@deleteAssetLocation')->name('asset.master.deleteAssetLocation');
            Route::post('/store-asset-MachineType', 'MasterDataController@storeAssetMachineType')->name("asset.master.storeAssetMachineType");
            Route::post('update-asset-MachineType/{id}', 'MasterDataController@updateAssetMachineType')->name("asset.master.updateAssetMachineType");
            Route::get('delete-asset-MachineType/{id}', 'MasterDataController@deleteAssetMachineType')->name('asset.master.deleteAssetMachineType');
            Route::post('/store-asset-MachineCategory', 'MasterDataController@storeAssetMachineCategory')->name("asset.master.storeAssetMachineCategory");
            Route::post('update-asset-MachineCategory/{id}', 'MasterDataController@updateAssetMachineCategory')->name("asset.master.updateAssetMachineCategory");
            Route::get('delete-asset-MachineCategory/{id}', 'MasterDataController@deleteAssetMachineCategory')->name('asset.master.deleteAssetMachineCategory');
            Route::post('/store-asset-Brand', 'MasterDataController@storeAssetBrand')->name("asset.master.storeAssetBrand");
            Route::post('update-asset-Brand/{id}', 'MasterDataController@updateAssetBrand')->name("asset.master.updateAssetBrand");
            Route::get('delete-asset-Brand/{id}', 'MasterDataController@deleteAssetBrand')->name('asset.master.deleteAssetBrand');
            Route::post('/store-asset-Machine', 'MasterDataController@storeAssetMachine')->name("asset.master.storeAssetMachine");
            Route::post('update-asset-Machine', 'MasterDataController@updateAssetMachine')->name("asset.master.updateAssetMachine");
            Route::get('delete-asset-Machine/{id}', 'MasterDataController@deleteAssetMachine')->name('asset.master.deleteAssetMachine');
            Route::post('/store-asset-Supplier', 'MasterDataController@storeAssetSupplier')->name("asset.master.storeAssetSupplier");
            Route::post('update-asset-Supplier/{id}', 'MasterDataController@updateAssetSupplier')->name("asset.master.updateAssetSupplier");
            Route::get('delete-asset-Supplier/{id}', 'MasterDataController@deleteAssetSupplier')->name('asset.master.deleteAssetSupplier');
            Route::post('/store-asset-Maintenance', 'MasterDataController@storeAssetMaintenance')->name("asset.master.storeAssetMaintenance");
            Route::post('update-asset-Maintenance/{id}', 'MasterDataController@updateAssetMaintenance')->name("asset.master.updateAssetMaintenance");
            Route::get('delete-asset-Maintenance/{id}', 'MasterDataController@deleteAssetMaintenance')->name('asset.master.deleteAssetMaintenance');
            Route::post('/store-asset-Condition', 'MasterDataController@storeAssetCondition')->name("asset.master.storeAssetCondition");
            Route::post('update-asset-Condition', 'MasterDataController@updateAssetCondition')->name("asset.master.updateAssetCondition");
            Route::get('delete-asset-Condition/{id}', 'MasterDataController@deleteAssetCondition')->name('asset.master.deleteAssetCondition');
            Route::post('/store-asset-UserAkses', 'MasterDataController@storeAssetUserAkses')->name("asset.master.storeAssetUserAkses");
            Route::post('update-asset-UserAkses', 'MasterDataController@updateAssetUserAkses')->name("asset.master.updateAssetUserAkses");
            Route::get('delete-asset-UserAkses/{id}', 'MasterDataController@deleteAssetUserAkses')->name('asset.master.deleteAssetUserAkses');
            Route::post('/store-asset-Setting', 'MasterDataController@storeAssetSetting')->name("asset.master.storeAssetSetting");
            Route::post('update-asset-Setting', 'MasterDataController@updateAssetSetting')->name("asset.master.updateAssetSetting");
            Route::get('delete-asset-Setting/{id}', 'MasterDataController@deleteAssetSetting')->name('asset.master.deleteAssetSetting');
            Route::post('/nama', 'MasterDataController@getuser')->name("asset.master.getuser");
        });

        Route::prefix('report')->group(function() {
            Route::get('/', 'ReportController@index')->name("asset.report.index");
            Route::post('report', 'ReportController@report')->name("asset.master.report");
            Route::post('report-maintenance', 'ReportController@reportMiantenance')->name("asset.master.report.maintenance");
    
            Route::post('report_wmr', 'ReportController@report_wmr')->name("asset.master.report_wmr");
            Route::get('report_wmr_detail', 'ReportController@report_wmr_detail')->name("asset.master.report_wmr_detail");
    
        });
    });

    Route::prefix('cost-fact-rpt')->namespace('CostFactoryRpt')->group(function() {
        Route::get('/', 'CostFactoryRptController@index')->name("prd.costfactrpt.index");
        Route::get('coba', 'MasterDataController@coba')->name("asset.master.coba");
    });

}); 
