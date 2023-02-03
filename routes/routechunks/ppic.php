<?php
    Route::prefix('pic')->group(function() {
        Route::get('', 'PPIC\form_return\PPICFormReturnController@home')->name("form_return.home");
        Route::prefix('reject-cutting')->namespace('PPIC\form_return')->group(function() {
            Route::get('', 'PPICFormReturnController@index')->name("form_return.index");
            Route::post('/update', 'PPICFormReturnController@update')->name("form_return.update.process");
        });
        Route::prefix('schedule')->namespace('PPIC\schedule')->group(function() {
            Route::get('', 'ScheduleController@index')->name("ppic.schedule.index");
            Route::get('wo_running', 'ScheduleController@wo_running')->name("ppic.schedule.wo_running");
            Route::get('wo_targetday', 'ScheduleController@wo_targetday')->name("ppic.schedule.wo_targetday");
            Route::get('wo_progress_sewing', 'ScheduleController@wo_progress_sewing')->name("ppic.schedule.wo_progress_sewing");
            Route::get('wo_anomali_sewing', 'ScheduleController@wo_anomali_sewing')->name("ppic.schedule.wo_anomali_sewing");

            Route::get('unplanned_output', 'ScheduleController@unplanned_output')->name("ppic.schedule.unplanned_output");
            Route::get('update_sewing', 'ScheduleController@update_sewing')->name("ppic.schedule.update_sewing");
            Route::get('reset_sewing', 'ScheduleController@reset_sewing')->name("ppic.schedule.reset_sewing");


            Route::get('last_line_available_date/{line_id}/{woid}/{timing}', 'ScheduleController@last_line_available_date')->name("ppic.schedule.last_line_available_date");
            Route::get('change_line_available_date/{line_id}/{tanggal}', 'ScheduleController@change_line_available_date')->name("ppic.schedule.change_line_available_date");
            Route::get('get_schedule/{woid}/{wo_no}/{order}/{adjsupp}/{complete}/{tday}/{lc1}/{lc2}/{lc3}/{dt_start}/{line_id}', 'ScheduleController@get_schedule')->name("ppic.schedule.get_schedule");

            // Route::get('holiday/{line_id}/{dt_from}/{dt_to}', 'ScheduleController@add_holiday_between')->name("ppic.schedule.holiday");
            // Route::get('holiday/{line_id}/{dt_from}', 'ScheduleController@isLibur')->name("ppic.schedule.islibur");
            // Route::get('holiday_date/{line_id}/{tgl}', 'ScheduleController@get_tgl_workday')->name("ppic.schedule.get_tgl_workday");

            Route::get('simulate', 'ScheduleController@simulate')->name("ppic.schedule.simulate");

            Route::post('create', 'ScheduleController@store')->name("ppic.schedule.store");
            Route::get('edit/{id}', 'ScheduleController@edit')->name("ppic.schedule.edit");
            Route::post('edit', 'ScheduleController@update')->name("ppic.schedule.update");
            Route::get('delete/{id}', 'ScheduleController@delete')->name("ppic.schedule.delete");

            Route::get('wo_by_line/{id}', 'ScheduleController@wo_by_line')->name("ppic.schedule.wo_by_line");
            Route::get('wocount_by_line/{woid}/{lineid}/{tanggal}', 'ScheduleController@wocount_by_line')->name("ppic.schedule.wocount_by_line");
            Route::post('totalsmv', 'ScheduleController@get_totalsmv')->name("ppic.schedule.get_totalsmv");
            Route::post('line_effisiensi', 'ScheduleController@get_line_effisiensi')->name("ppic.schedule.get_line_effisiensi");

            Route::prefix('update_shipment')->group(function() {
                Route::get('', 'ScheduleController@upship_index')->name("ppic.schedule.upship.index");
                Route::post('update', 'ScheduleController@upship_update')->name("ppic.schedule.upship.update");
            });
            Route::prefix('prodline')->group(function() {
                Route::get('', 'ProductionLineController@index')->name("ppic.schedule.prodline.index");
                Route::get('create', 'ProductionLineController@create')->name("ppic.schedule.prodline.create");
                Route::post('store', 'ProductionLineController@store')->name("ppic.schedule.prodline.store");
                Route::get('edit{id}', 'ProductionLineController@edit')->name("ppic.schedule.prodline.edit");
                Route::post('update', 'ProductionLineController@update')->name("ppic.schedule.prodline.update");
                Route::get('operator{id}', 'ProductionLineController@totaloperator')->name("ppic.schedule.prodline.totaloperator");
            });
            Route::prefix('branchworkday')->group(function() {
                Route::get('', 'BranchWorkDayController@index')->name("ppic.schedule.workday.index");
                Route::get('create', 'BranchWorkDayController@create')->name("ppic.schedule.workday.create");
                Route::post('store', 'BranchWorkDayController@store')->name("ppic.schedule.workday.store");
                Route::get('edit{id}', 'BranchWorkDayController@edit')->name("ppic.schedule.workday.edit");
                Route::post('update', 'BranchWorkDayController@update')->name("ppic.schedule.workday.update");
            });
            Route::prefix('branchovertime')->group(function() {
                Route::get('', 'BranchOvertimeController@index')->name("ppic.schedule.overtime.index");
                Route::get('create', 'BranchOvertimeController@create')->name("ppic.schedule.overtime.create");
                Route::post('store', 'BranchOvertimeController@store')->name("ppic.schedule.overtime.store");
                Route::get('edit{id}', 'BranchOvertimeController@edit')->name("ppic.schedule.overtime.edit");
                Route::post('update', 'BranchOvertimeController@update')->name("ppic.schedule.overtime.update");
                Route::get('destroy{id}', 'BranchOvertimeController@destroy')->name("ppic.schedule.overtime.destroy");

            });
            Route::prefix('branchovertimehour')->group(function() {
                Route::get('', 'BranchOvertimeHourController@index')->name("ppic.schedule.overtimehour.index");
                Route::get('create', 'BranchOvertimeHourController@create')->name("ppic.schedule.overtimehour.create");
                Route::post('store', 'BranchOvertimeHourController@store')->name("ppic.schedule.overtimehour.store");
                Route::get('edit{id}', 'BranchOvertimeHourController@edit')->name("ppic.schedule.overtimehour.edit");
                Route::post('update', 'BranchOvertimeHourController@update')->name("ppic.schedule.overtimehour.update");
                Route::get('destroy{id}', 'BranchOvertimeHourController@destroy')->name("ppic.schedule.overtimehour.destroy");

            });
            Route::prefix('holiday')->group(function() {
                Route::get('', 'NationalHolidayController@index')->name("ppic.schedule.holiday.index");
                Route::get('create', 'NationalHolidayController@create')->name("ppic.schedule.holiday.create");
                Route::post('store', 'NationalHolidayController@store')->name("ppic.schedule.holiday.store");
                Route::get('edit{id}', 'NationalHolidayController@edit')->name("ppic.schedule.holiday.edit");
                Route::post('update', 'NationalHolidayController@update')->name("ppic.schedule.holiday.update");
            });

            Route::get('report_actual_scheduling', 'ScheduleController@report_actual_scheduling_')->name("ppic.schedule.report_report_actual_scheduling_get");
            Route::post('report_actual_scheduling', 'ScheduleController@report_actual_scheduling')->name("ppic.schedule.report_report_actual_scheduling_show");

            Route::get('report_facility_monthly', 'ScheduleController@report_facility_monthly_')->name("ppic.schedule.report_facility_monthly_get");
            Route::post('report_facility_monthly', 'ScheduleController@report_facility_monthly')->name("ppic.schedule.report_facility_monthly_show");

            Route::get('report_facility_buyer', 'ScheduleController@report_facility_buyer_')->name("ppic.schedule.report_facility_buyer_get");
            Route::post('report_facility_buyer', 'ScheduleController@report_facility_buyer')->name("ppic.schedule.report_facility_buyer_show");

            Route::get('report_loading_capacity', 'ScheduleController@report_loading_capacity_')->name("ppic.schedule.report_loading_capacity_get");
            Route::post('report_loading_capacity', 'ScheduleController@report_loading_capacity')->name("ppic.schedule.report_loading_capacity_show");

            Route::get('report_kapasitas_from_sales', 'ScheduleController@report_kapasitas_from_sales_')->name("ppic.schedule.report_kapasitas_from_sales_get");
            Route::post('report_kapasitas_from_sales', 'ScheduleController@report_kapasitas_from_sales')->name("ppic.schedule.report_kapasitas_from_sales_show");

            Route::get('report_pending_or', 'ScheduleController@report_pending_or_')->name("ppic.schedule.report_pending_or_get");
            Route::post('report_pending_or', 'ScheduleController@report_pending_or')->name("ppic.schedule.report_pending_or_show");

            Route::get('report_summary_order', 'ScheduleController@report_summary_order_')->name("ppic.schedule.report_summary_order_get");
            Route::post('report_summary_order', 'ScheduleController@report_summary_order')->name("ppic.schedule.report_summary_order_show");

            Route::get('report_smv', 'ScheduleController@report_smv_')->name("ppic.schedule.report_smv_get");
            Route::post('report_smv', 'ScheduleController@report_smv')->name("ppic.schedule.report_smv_show");

            Route::get('report_capabilityline', 'ScheduleController@report_capabilityline_')->name("ppic.schedule.report_capabilityline_get");
            Route::post('report_capabilityline', 'ScheduleController@report_capabilityline')->name("ppic.schedule.report_capabilityline_show");

            Route::get('report_plancutting', 'ScheduleController@report_plancutting_')->name("ppic.schedule.report_plancutting_get");
            Route::post('report_plancutting', 'ScheduleController@report_plancutting')->name("ppic.schedule.report_plancutting_show");

            Route::get('report_ekspor_plan', 'ScheduleController@report_ekspor_plan_')->name("ppic.schedule.report_ekspor_plan_get");
            Route::post('report_ekspor_plan', 'ScheduleController@report_ekspor_plan')->name("ppic.schedule.report_ekspor_plan_show");

            //REPORTING PAK CHANDRA
            //[DONE] A. Progress Output
            Route::get('report_outputsewing_monthly', 'ScheduleController@report_outputsewing_monthly')->name("ppic.schedule.report_outputsewing_monthly_get");
            Route::get('report_outputsewing_facility', 'ScheduleController@report_outputsewing_facility')->name("ppic.schedule.report_outputsewing_facility_get");
            Route::get('report_outputsewing_recap', 'ScheduleController@report_outputsewing_recap')->name("ppic.schedule.report_outputsewing_recap_get");

            //B. Recap Output Sewing : suspend 
            Route::get('report_recap_buyer', 'ScheduleController@report_recap_buyer')->name("ppic.schedule.report_recap_buyer_get");
            Route::get('report_recap_line', 'ScheduleController@report_recap_line')->name("ppic.schedule.report_recap_line_get");

            //D. Recap Output Sewing : 
            Route::get('report_loading_capacity_perline', 'ScheduleController@report_loading_capacity_perline')->name("ppic.schedule.report_loading_capacity_perline_get");

            //END REPORTING PAK CHANDRA

        });

        Route::prefix('standard-cost')->namespace('PPIC\standard_cost')->group(function() {
            Route::get('', 'StandardCostController@index')->name("ppic.standard.cost.index");
            Route::get('show{wo}', 'StandardCostController@show')->name("ppic.standard.cost.show");
        });

        Route::prefix('issue-mr')->namespace('PPIC\issue_mr')->group(function() {
            Route::get('', 'IssueMRController@index')->name("ppic.issue_mr.index");
            Route::get('issue-mr-data{id}', 'IssueMRController@issue_mr_data')->name("ppic.issue_mr.issue_mr_data");
            Route::get('report{id}', 'IssueMRController@report')->name("ppic.issue_mr.report");
            Route::get('ready-issue{id}', 'IssueMRController@ready_issue')->name("rpa.issue_mr.ready_issue");
            Route::get('delete-issue{id}', 'IssueMRController@delete_issue')->name("rpa.issue_mr.delete_issue");
            Route::post('store-request', 'IssueMRController@store_request')->name("ppic.issue_mr.store-request");
            Route::post('update-request', 'IssueMRController@update_request')->name("ppic.issue_mr.update-request");
            Route::post('copy-request', 'IssueMRController@copy_request')->name("ppic.issue_mr.copy-request");
            Route::post('cari-wo', 'IssueMRController@cari_wo')->name("ppic.issue_mr.cari_wo");
            Route::get('cari-sisa-kontrak', 'IssueMRController@sisa_kontrak')->name("ppic.issue_mr.sisa_kontrak");
            Route::get('cari-partlist{wo}-{glpt}', 'IssueMRController@cari_partlist')->name("ppic.issue_mr.cari_partlist");
            Route::post('cari-jde', 'IssueMRController@cari_jde')->name("ppic.issue_mr.cari_jde");
            Route::post('search-issue-report', 'IssueMRController@issue_report')->name("ppic.issue_mr.issue_report");
        });
    });