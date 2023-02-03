<?php
Route::group(['prefix'=>'cmc'], function(){
        Route::get('', 'CommandCenter2\CCAllFactoryController@commandCenter2')->name('commandCenter2');
        Route::get('branch{id}', 'CommandCenter2\CommandCenterController@CClevel2')->name('cc2.level2');

        Route::get('frework/{id}', 'CommandCenter2\CCQualityController@rework')->name('cc2.rework');
        Route::get('frejectCutting', 'CommandCenter2\CCQualityController@rejectCutting')->name('cc2.rejectCutting');
        Route::get('flines/{id}', 'CommandCenter2\CCQualityController@lines')->name('cc2.lines');

        Route::prefix('quality')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCAllBranchController@allfac')->name('allfac2.qc');
                Route::get('branch{id}','CommandCenterController@qc')->name("cc2.qc");

                Route::get('lines/{id}', 'CCAllBranchController@lines')->name('allcc2.lines');
                Route::get('qc', 'CCAllBranchController@qc')->name('allcc2.qc');
                Route::get('rework', 'CCAllBranchController@rework')->name('allcc2.rework');
                Route::get('rejectCutting', 'CCAllBranchController@rejectCutting')->name('allcc2.rejectCutting');
        });

        Route::prefix('audit')->namespace('CommandCenter2')->group(function() {
                Route::get('audit_all', 'CCAuditController@ItAll')->name('internal.audit.all');
                Route::get('cc_audit/{id}', 'CCAuditController@index')->name('cc2.internal.audit');
                // Route::get('detail/{id}', 'CCAuditController@detail')->name("cc2.tiket_detail");
        });

        Route::prefix('indah')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCIndahController@indahAll')->name('indah2.all');
                Route::get('branch{id}', 'CCIndahController@index')->name('cc2.indah');
        });

        Route::prefix('itdt')->namespace('CommandCenter')->group(function() {
                Route::get('it_dt_all', 'CCITDTController@ItAll')->name('it_dt.all');
                Route::get('ticketing/{id}', 'CCITDTController@index')->name('cc.it.dt');
                Route::get('ticket_detail/{id}', 'CCITDTController@detail')->name("cc.tiket_detail");
        });


        Route::prefix('itd')->namespace('CommandCenter2')->group(function() {
                // Route::get('', 'CCITDTController@main')->name('main.index');
                Route::get('branch{id}/work-plan', 'CCITDTController@workplan')->name('workplan.comcen');
                Route::get('branch{id}/work-plan-{key}', 'CCITDTController@workplan_tahun')->name('workplan.comcen.tahun');
                Route::get('branch1/work-plan', 'CCITDTController@workplan')->name('workplan.notif');
                Route::get('', 'CCITDTController@ItAll')->name('it_dt2.all');
                Route::get('branch{id}', 'CCITDTController@ticketing')->name('cc2.it.dt');
                Route::get('info', 'CCITDTController@info')->name('cc2.it.info');
                Route::get('detail/{id}', 'CCITDTController@detail')->name("cc2.tiket_detail");
                Route::get('dt-ticketing', 'CCITDTController@dt_ticketing')->name("cc.dt.ticketing");
        });

        Route::prefix('production')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCProductionController@index')->name('cproduction2.index');
                Route::get('pro_allbranch', 'CCProductionController@allbranch')->name('cproduction2.allbranch');
                Route::get('s-tower', 'CCProductionController@stower')->name('cproduction2.stower');

                Route::get('branch{id}/monitoring', 'CCProductionController@monitoring')->name('cc.production.monitoring');
                Route::get('branch{id}', 'CCProductionController@stower')->name('cc.production.stower');
                Route::post('branch{id}/monitoring/filter', 'CCProductionController@filter_monitoring')->name('cc.production.monitoring.filter');

        });

        Route::prefix('warehouse')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCAuditController@index')->name('cc.internal.audit');
                Route::get('branch{id}', 'CCAuditController@ledger_it')->name('cc.icr.ledge-it');
                Route::get('branch{id}/pemasukan', 'CCAuditController@detai_anomali_pemasukan')->name('cc.icr.ledge-it.pemasukan');
                Route::get('branch{id}/pengeluaran', 'CCAuditController@detai_anomali_pengeluaran')->name('cc.icr.ledge-it.pengeluaran');
                Route::get('branch{id}/na', 'CCAuditController@detai_anomali_na')->name('cc.icr.ledge-it.na');
                Route::get('branch{id}/{user}', 'CCAuditController@ledger_it_user')->name('cc.icr.ledge-it.user');
                Route::get('branch{id}/{user}/detail-na', 'CCAuditController@peruser_anomali_na')->name('cc.icr.ledge-it.naU');
                Route::get('branch{id}/{user}/detail-pengeluaran', 'CCAuditController@peruser_anomali_pengeluaran')->name('cc.icr.ledge-it.pengeluaranU');
                Route::get('branch{id}/{user}/detail-pemasukan', 'CCAuditController@peruser_anomali_pemasukan')->name('cc.icr.ledge-it.pemasukanU');
                Route::get('test{id}', 'CCAuditController@test')->name('cc.icr.test');
        });
        Route::prefix('purchasing')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCPurchasingController@branch_all')->name('cpurchasing.all_branch');
                // Route::get('', 'CCPurchasingController@fob')->name('fob.index');
                // Route::get('', 'CCPurchasingController@index')->name('menu.index');
                Route::get('podelay', 'CCPurchasingController@po_delayed_detail')->name('cpurchasing.po_delayed_detail');
        });

        Route::prefix('marketing')->namespace('CommandCenter2')->group(function() {
                Route::get('recap_order', 'CCMarketingController@branch_all')->name('cmarketing.all_branch');
                Route::get('fob', 'CCMarketingController@fob')->name('fob.index');
                Route::get('', 'CCMarketingController@index')->name('menu.index');
        });

        Route::prefix('accounting')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'CCAccountingController@branch_all')->name('caccounting.all_branch');
                Route::get('ticket-accounting', 'CCAccountingController@ticket')->name('cc.ticket.accounting');
        });

        Route::prefix('hrd')->namespace('CommandCenter2')->group(function() {
                Route::get('', 'HRGAController@all_factory')->name('cc.hrd.index');

                Route::get('branch{id}', 'CCHrdAuditBuyerController@AuditBuyer')->name('cc.hrd.auditbuyer');
                Route::get('branch{id}/gc1', 'CCHrdAuditBuyerController@CLNMapsGc1')->name('cc.hrd.map1');
                Route::get('branch{id}/gc2', 'CCHrdAuditBuyerController@CLNMapsGc2')->name('cc.hrd.map2');
                Route::get('branch{id}/sample', 'CCHrdAuditBuyerController@CLNMapsSample')->name('cc.hrd.map3');
                Route::get('branch{id}/marketing', 'CCHrdAuditBuyerController@CLNMapsMarketing')->name('cc.hrd.map4');
                Route::get('branch{id}/maja1', 'CCHrdAuditBuyerController@MapGM1')->name('cc.hrd.map5');
                Route::get('branch{id}/maja2', 'CCHrdAuditBuyerController@MapGM2')->name('cc.hrd.map6');

                Route::get('branch{id}/overtime-employee', 'HRGAController@overtime')->name('cc.overtime');
                // KURANG BRANCH{ID}
                Route::get('overtime-buyer', 'HRGAController@overtime_buyer')->name('cc.overtime.buyer');
                Route::get('overtime-departement', 'HRGAController@overtime_departement')->name('cc.overtime.departement');
                Route::get('overtime-analytics', 'HRGAController@overtime_analytics')->name('cc.overtime.analytics');
                
                Route::get('past-time', 'HRGAController@past_time')->name('cc.past_time');
                Route::get('monitoring', 'HRGAController@covid_monitoring')->name('cc.covid_monitoring');

                // Route::get('approval', 'HRGAController@approval')->name("cc.approval");
                // Route::post('approval1', 'HRGAController@approval1')->name("approval1.request.overtime");
                // Route::post('reject1', 'HRGAController@reject1')->name("reject1.request.overtime");
                // Route::get('approval/detail{id}', 'HRGAController@detail_OvertimeRequest')->name("cc.detail.request.overtime");


        });
        //overime
        Route::prefix('/')->namespace('CommandCenter2')->group(function() {
                Route::get('approval', 'HRGAController@approval')->name("cc.approval");
                Route::get('approval/-{key}/', 'HRGAController@approvalBln')->name("cc.approval.bulan");

                Route::post('approval1', 'HRGAController@approval1')->name("approval1.request.overtime");
                Route::post('approvalgm', 'HRGAController@approvalGM')->name("approvalgm.request.overtime");
                Route::post('reject1', 'HRGAController@reject1')->name("reject1.request.overtime");
                Route::get('approval/detail{id}', 'HRGAController@detail_OvertimeRequest')->name("cc.detail.request.overtime");
                Route::post('report.pdf', 'HRGAController@download_report')->name("download-report");
                
                // Route::get('app/{id}', 'HRGAController@app')->name("cc.app.request.overtime");
       
        });


        // Route::prefix('warehouse')->namespace('CommandCenter2')->group(function() {
        //         Route::get('', 'CCWarehouseController@branch_all')->name('cwarehouse.all_branch');
        //         Route::get('perfactory', 'CCWarehouseController@perfactory')->name('cwarehouse.perfactory');
        //         Route::get('perfactory_detail', 'CCWarehouseController@perfactory_detail')->name('cwarehouse.perfactory.detail');
        // });
});
