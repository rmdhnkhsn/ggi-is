<?php
Route::prefix('itd')->group(function() {
    Route::get('', 'ITDTController@index')->name("it_dt.index");
    // Route::get('/dashboard_tiket', 'ITDTController@index')->name("tiket.index");

    // Route::prefix('ticketing')->namespace('IT_DT\ticketing')->group(function() {
    //     Route::get('', 'TiketController@index')->name("tiket.index");
    //     Route::get('/create', 'TiketController@create')->name("tiket.create");
    //     Route::get('/create/{id}', 'TiketController@create_tiket')->name("tiket.createtes");
    //     Route::post('/store', 'TiketController@store')->name("tiket.store");
    //     Route::get('/see', 'TiketController@see')->name("tiket.user");
    //     Route::get('edit/{id}', 'TiketController@edit')->name("tiket.edit");
    //     Route::post('/update', 'TiketController@update')->name("tiket.update");

    //     Route::get('/all', 'ITTiketController@tiket')->name("tiket.it");
    //     Route::get('/tiketdone', 'ITTiketController@tiketdone')->name("tiketd.itdone");
    //     Route::get('editit/{id}', 'ITTiketController@tiketacc')->name("tiketit.edit");
    //     Route::post('/updateit', 'ITTiketController@updateit')->name("tiketit.update");
    //     Route::get('/alltiket/done', 'ITTiketController@tiketdoneall')->name("tiketd.itdoneall");
        Route::post('/x', 'ITTiketController@getk')->name("coba.done");
    //     Route::post('/alltiket/done2', 'ITTiketController@doneall_tgl')->name("tiketd.itdoneall2");

    //     Route::group(['prefix'=>'user'], function(){
    //         Route::get('', 'UserMasterController@index')->name("userip.index");
    //         Route::get('/create', 'UserMasterController@create')->name("userip.create");
    //         Route::post('/store', 'UserMasterController@store')->name("userip.store");
    //         Route::post('/storeuser', 'UserMasterController@storeuser')->name("useripuser.store");
    //         Route::get('edit/{id}', 'UserMasterController@edit')->name('userip.edit');
    //         Route::post('/update', 'UserMasterController@update')->name("userip.update");
    //         Route::get('delete/{id}', 'UserMasterController@delete')->name('userip.delete');
    //     });
    
    //     Route::group(['prefix'=>'staff'], function(){
    //         Route::get('', 'ItSupportController@index')->name("itsupport.index");
    //         Route::get('/create', 'ItSupportController@create')->name("itsupport.create");
    //         Route::post('/store', 'ItSupportController@store')->name("itsupport.store");
    //         Route::get('delete/{id}', 'ItSupportController@delete')->name('itsupport.delete');
    //     });
    
    //     Route::group(['prefix'=>'subcategory'], function(){
    //         Route::get('', 'KategoriRusakController@index')->name("kategorir.index");
    //         Route::get('/create', 'KategoriRusakController@create')->name("kategorir.create");
    //         Route::post('/store', 'KategoriRusakController@store')->name("kategorir.store");
    //         Route::get('delete/{id}', 'KategoriRusakController@delete')->name('kategorir.delete');
    //         Route::get('edit/{id}', 'KategoriRusakController@edit')->name('kategorir.edit');
    //         Route::post('/update', 'KategoriRusakController@update')->name("kategorir.update");
    //     });
    
    //     Route::group(['prefix'=>'category'], function(){
    //         Route::get('', 'KategoriController@index')->name("kategorit.index");
    //         Route::get('/create', 'KategoriController@create')->name("kategorit.create");
    //         Route::post('/store', 'KategoriController@store')->name("kategorit.store");
    //         Route::get('delete/{id}', 'KategoriController@delete')->name('kategorit.delete');
    //         Route::get('edit/{id}', 'KategoriController@edit')->name('kategorit.edit');
    //         Route::post('/update', 'KategoriController@update')->name("kategorit.update");
    //     });
    
    //     Route::group(['prefix'=>'help'], function(){
    //         Route::get('', 'HelpController@index')->name("thelp.index");
    //         Route::get('edit/{id}', 'HelpController@edit')->name('thelp.edit');
    //         Route::post('/update', 'HelpController@update')->name("thelp.update");
    //     });
    
    //     Route::get('/report-user', 'ReportTiketController@user')->name("report.user");
    //     Route::post('/report-user/get', 'ReportTiketController@usertiketget')->name("report.usertiketget");

    //     Route::get('/report-problem', 'ReportTiketController@problem')->name("report.problem");
    //     Route::post('/report-problem/get', 'ReportTiketController@problemget')->name("report.problemget");

    //     Route::get('/report-itsupport', 'ReportTiketController@kinerjaIT')->name("report.it");
    //     Route::post('/report-itsupport/get', 'ReportTiketController@kinerjaitget')->name("report.kinerjaitget");
    // });

    Route::prefix('ticket')->namespace('IT_DT\ITDT_Ticketing')->group(function() {
        Route::get('', 'TicketingController@main')->name("tiket-index");
        Route::get('create', 'TicketingController@create')->name("create-ticket");
        // Route::get('create?v_mode=', 'TicketingController@create')->name("create-ticket");

        Route::get('admin-version-it', 'TicketingController@adminIT')->name("admin-ticket-it");
        Route::post('/store-it', 'TicketingController@store')->name("tiket-it-store");
        Route::post('/update-it', 'TicketingController@prosesTiketIT')->name("tiket.it.update");
        Route::post('/update-it2', 'TicketingController@prosesTiketIT')->name("tiket.it.update2");
        Route::get('/done-it', 'ReportTiketController@tiketdone')->name("tiket.it.done");
        Route::get('/done-it/all', 'ReportTiketController@tiketdoneall')->name("tiket.it.doneall");
        Route::post('/done-it/all2', 'ReportTiketController@doneall_tgl')->name("tiket.it.doneall2");
        Route::get('admin-version-dt', 'TicketingController@adminDT')->name("admin-ticket-dt");
        Route::get('/done-dt/all', 'ReportTiketController@tiketdoneall_dt')->name("tiket.dt.doneall");
        Route::post('/done-dt/all2', 'ReportTiketController@doneall_tgl_dt')->name("tiket.dt.doneall2");
        Route::get('admin-version-hr-ga', 'TicketingController@adminHRD')->name("admin-ticket-hrd");
        Route::get('/done-hr-ga/all', 'ReportTiketController@tiketdoneall_hrd')->name("tiket.hrd.doneall");
        Route::post('/done-hr-ga/all2', 'ReportTiketController@doneall_tgl_hrd')->name("tiket.hrd.doneall2");
        Route::post('/x', 'TicketingController@get_error')->name("get.error.ticket");

        Route::get('monitoring-booking', 'TicketingController@monitoringBooking')->name("ticket-monitoring");
        Route::post('/store-Booking', 'TicketingController@storeBooking')->name("tiket-it-storeBooking");
        Route::get('create-booking', 'TicketingController@createBooking')->name("create-booking");
        Route::get('/show-booking-ticket', 'TicketingController@showBookingTicket')->name("show-booking-ticket");
        Route::get('admin-version-booking', 'TicketingController@adminBooking')->name("admin-ticket-booking");
        Route::post('/update-booking-done', 'TicketingController@prosesBookingDone')->name("tiket.bookingDone.update");
        Route::post('/update-booking-cancel', 'TicketingController@prosesBookingCancel')->name("tiket.bookingCancel.update");
        Route::post('/update-booking-cancel-all', 'TicketingController@prosesBookingCancelAll')->name("tiket.bookingCancelAll.update");
        Route::delete('/cancel-booking-ticket/{booking_id}', 'TicketingController@cancelBookingTicket')->name("tiket-it-cancelBookingTicket");
        Route::get('/booking-report', 'ReportTiketController@BookingReport')->name("tiket.it.booking");
        Route::post('/booking-report-perday', 'ReportTiketController@BookingReportTanggal')->name("tiket.it.bookingreport");

        Route::post('/ticketing/store-message', 'TicketingController@storeMessage')->name("ticketing.store-message");
        Route::post('/ticketing/show-message-user', 'TicketingController@showMessageUser')->name("ticketing.show-message-user");
        Route::post('/ticketing/show-message-admin', 'TicketingController@showMessageAdmin')->name("ticketing.show-message-admin");
        Route::get('/ticketing/show-support-division', 'TicketingController@showSupportDivision')->name("ticketing.show-support-division");
        Route::post('/ticketing/show-support-team', 'TicketingController@showSupportTeam')->name("ticketing.show-support-team");
        Route::get('/ticketing/show-chat-history-user', 'TicketingController@showChatHistoryUser')->name("ticketing.show-chat-history-user");
        Route::get('/ticketing/show-chat-history-admin', 'TicketingController@showChatHistoryAdmin')->name("ticketing.show-chat-history-admin");
        Route::get('/ticketing/serach-nama', 'TicketingController@TicektingSearchNama')->name("ticketing-search-nama");
        Route::get('/ticketing/serach-tittle', 'TicketingController@TicektingSearchTitle')->name("ticketing-search-tittle");


         //tiket doc
        //
        Route::post('/store-doc', 'TicketingController@store_doc')->name("tiket-doc-store");
        Route::get('admin-version-doc', 'TicketingController@admin_doc')->name("admin-ticket-doc");
        Route::post('assign-doc', 'TicketingController@process_doc')->name("process-ticket-doc");
        Route::post('update-tiket-doc', 'TicketingController@update_tiket_doc')->name("update-ticket-doc");
        Route::post('update-doc', 'TicketingController@update_tiketUser_doc')->name("update-ticketuser-doc");

        Route::get('done-doc', 'TicketingController@done_tiket_doc')->name("tiket.doc.doneall");
        Route::get('all-doc', 'TicketingController@all_tiket_doc')->name("tiket.doc.all");
        Route::get('edit-tiket-doc{id}', 'TicketingController@edit_tiket_doc')->name("tiket.doc.edit");
        Route::get('download-doc{id}', 'TicketingController@download_excel')->name("tiket.doc.download");
        Route::get('detail-tiket-doc{id}', 'TicketingController@detail_tiket_doc')->name("tiket.doc.detail");
        Route::post('export-excel-doc', 'ReportTiketController@ExportExcel_doc')->name("export-ticket-doc");
        Route::post('export-doc-all', 'ReportTiketController@ExportExcel_docall')->name("export.ticket.docall");

        //end tiket doc

        //tiket accounting
        Route::post('/store-acc', 'TicketingController@store_acc')->name("tiket-acc-store");
        Route::post('/close-acc', 'TicketingController@close_acc')->name("tiket-acc-close");
        Route::get('admin-version-acc', 'TicketingController@admin_acc')->name("admin-ticket-acc");
        Route::post('/assign-acc', 'TicketingController@assign_acc')->name("tiket-acc-assign");
        Route::post('/pencairan-acc', 'TicketingController@pencairan_acc')->name("tiket-acc-pencairan");
        Route::post('/realisasi-acc', 'TicketingController@RealisaiUser_acc')->name("tiket-acc-realisaiuser");

        Route::post('/done-acc', 'TicketingController@done_acc')->name("tiket-acc-done");
        Route::get('done-acc', 'TicketingController@done_tiket_acc')->name("tiket.acc.doneall");
        Route::post('export-acc-jde', 'ReportTiketController@Excel_acc_jde')->name("export-ticket-acc");
        Route::post('export-acc-tfr', 'ReportTiketController@Excel_acc_tfr')->name("export-ticket-acc-tfr");

        Route::group(['prefix'=>'user'], function(){
            Route::get('/', 'MasterTiketController@index')->name("user.tiket.index");
            Route::get('/create', 'MasterTiketController@create')->name("user.tiket.create");
            Route::post('/store', 'MasterTiketController@store')->name("user.tiket.store");
            Route::post('/storeuser', 'MasterTiketController@storeuser')->name("user.tiket.storeuser");
            Route::get('/edit{id}', 'MasterTiketController@edit')->name('user.tiket.edit');
            Route::post('/update', 'MasterTiketController@update')->name("user.tiket.update");
            Route::get('/delete/{id}', 'MasterTiketController@delete')->name('user.tiket.delete');
        });

        Route::group(['prefix'=>'report-it'], function(){
            Route::get('/user', 'ReportTiketController@user')->name("report.it.user");
            Route::post('/user/get', 'ReportTiketController@usertiketget')->name("report.it.userget");
            Route::get('/problem', 'ReportTiketController@problem')->name("report.it.problem");
            Route::post('/problem/get', 'ReportTiketController@problemget')->name("report.it.problemget");
            Route::get('/itsupport', 'ReportTiketController@kinerjaIT')->name("report.it.perporma");
            Route::post('/itsupport/get', 'ReportTiketController@kinerjaitget')->name("report.it.perpormaget");
            Route::get('/loan', 'ReportTiketController@peminjaman')->name("report.it.peminjaman");
            Route::post('/loan/get', 'ReportTiketController@peminjamanget')->name("report.it.peminjamanget");
        });

        Route::group(['prefix'=>'report-dt'], function(){
            Route::get('/user', 'ReportTiketController@user_dt')->name("report.dt.user");
            Route::post('/user/get', 'ReportTiketController@usertiketget_dt')->name("report.dt.userget");
            Route::get('/problem', 'ReportTiketController@problem_dt')->name("report.dt.problem");
            Route::post('/problem/get', 'ReportTiketController@problemget_dt')->name("report.dt.problemget");
            Route::get('/dtsupport', 'ReportTiketController@kinerja_dt')->name("report.dt.perporma");
            Route::post('/dtsupport/get', 'ReportTiketController@kinerjaget_dt')->name("report.dt.perpormaget");
        });

        Route::group(['prefix'=>'report-hr-ga'], function(){
            Route::get('/user', 'ReportTiketController@user_hrd')->name("report.hrd.user");
            Route::post('/user/get', 'ReportTiketController@usertiketget_hrd')->name("report.hrd.userget");
            Route::get('/problem', 'ReportTiketController@problem_hrd')->name("report.hrd.problem");
            Route::post('/problem/get', 'ReportTiketController@problemget_hrd')->name("report.hrd.problemget");
            Route::get('/hrsupport', 'ReportTiketController@kinerja_hrd')->name("report.hrd.perporma");
            Route::post('/hrsupport/get', 'ReportTiketController@kinerjaget_hrd')->name("report.hrd.perpormaget");
        });

        Route::group(['prefix'=>'error'], function(){
            Route::get('', 'MasterTiketController@index_error')->name("error.it.index");
            Route::get('/create', 'MasterTiketController@create_error')->name("error.it.create");
            Route::post('/store', 'MasterTiketController@store_error')->name("error.it.store");
            Route::get('/delete/{id}', 'MasterTiketController@delete_error')->name('error.it.delete');
            Route::get('/sub{id}', 'MasterTiketController@sub_error')->name('error.it.sub');
            Route::post('/update', 'MasterTiketController@update_error')->name("error.it.update");
            Route::post('/sub-store', 'MasterTiketController@store_sub_error')->name("suberror.it.store");
            Route::get('/sub-delete/{id}', 'MasterTiketController@delete_sub_error')->name('suberror.it.delete');
            Route::get('/sub-edit/{id}', 'MasterTiketController@edit_sub_error')->name('suberror.it.edit');
            Route::post('/update', 'MasterTiketController@update_sub_error')->name("suberror.it.update");
        });
        Route::group(['prefix'=>'suport'], function(){
            Route::get('', 'MasterTiketController@index_suport')->name("suport.tiket.index");
            Route::get('/create', 'MasterTiketController@create_suport')->name("suport.tiket.create");
            Route::post('/store', 'MasterTiketController@store_suport')->name("suport.tiket.store");
            Route::get('/delete/{id}', 'MasterTiketController@delete_suport')->name('suport.tiket.delete');
        });
    });

    Route::prefix('work-plan')->namespace('IT_DT\Workplan')->group(function() {
        Route::get('', 'WorkController@index')->name("workplan.index");
        Route::get('create', 'WorkController@create')->name("create.index");
        Route::post('store', 'WorkController@store')->name("store.workplan.it");
        Route::post('start', 'WorkController@start')->name("start.workplan.it");
        Route::post('pending', 'WorkController@pending')->name("pending.workplan.it");
        Route::post('done', 'WorkController@done')->name("done.workplan.it");
        Route::get('edit{id}', 'WorkController@edit')->name('edit.workplan.it');
        Route::post('update', 'WorkController@update')->name("update.workplan.it");
    });

    Route::prefix('framework')->namespace('IT_DT\Framework')->group(function() {
        Route::get('', 'FrameworkController@index')->name("framework.index");
        Route::group(['prefix'=>'components'], function(){
            Route::get('button', 'FrameworkController@button')->name("components.button");
            Route::get('form', 'FrameworkController@form')->name("components.form");
            Route::get('select', 'FrameworkController@select')->name("components.select");
            Route::get('card-nav', 'FrameworkController@cardNav')->name("components.cardNav");
            Route::get('row-append', 'FrameworkController@rowAppend')->name("components.rowAppend");
            Route::get('accordion', 'FrameworkController@accordion')->name("components.accordion");
            Route::get('upload', 'FrameworkController@upload')->name("components.upload");
            Route::get('modal', 'FrameworkController@modal')->name("components.modal");
        });
    });

    Route::prefix('rating-program')->namespace('IT_DT\RatingProgram')->group(function() {
        Route::get('', 'RatingProgramController@index')->name("rating.index");
        Route::get('master', 'RatingProgramController@master')->name("rating.master");
        Route::get('question-rating', 'RatingProgramController@question_rating')->name("question-rating");
    });

    Route::prefix('rating-program')->namespace('IT_DT\RatingProgram')->group(function() {
        Route::get('', 'RatingProgramController@index')->name("rating.index");
        Route::get('-{id}', 'RatingProgramController@PerModule')->name("rating.index.permodule");

        Route::get('master', 'RatingProgramController@master')->name("rating.master");
        Route::get('/create', 'RatingProgramController@create')->name("userfeedback.create");
        Route::get('/updatemaster{id}', 'RatingProgramController@updatemaster')->name("userfeedback.updatemaster");
        Route::get('/deletemaster{id}', 'RatingProgramController@deletemaster')->name("userfeedback.deletemaster");

        Route::get('/edit{id}', 'RatingProgramController@edit')->name("userfeedback.edit");
        Route::post('/update', 'RatingProgramController@update')->name("userfeedback.update");
        Route::post('/store', 'RatingProgramController@store')->name("userfeedback.store");

        Route::get('questions', 'RatingProgramController@question')->name("rating.questions");
        Route::post('store-questions', 'RatingProgramController@question_store')->name("userfeedback.store.questions");

        // Route::get('emoji', 'RatingProgramController@question')->name("rating.question");
        // Route::get('analytics', 'UserFeedbackController@analytics')->name("userfeedback-analytics");
        // Route::get('/review', 'UserFeedbackController@kuesioner')->name("userfeedback-review");
        // Route::post('/review', 'UserFeedbackController@kuesioner_store')->name("userfeedback-reviewstore");
    });

    Route::prefix('rpa')->namespace('IT_DT\RPA')->group(function() {
        Route::get('', 'RPAController@index')->name("rpa.index");
        Route::get('issue-mr-dashboard', 'ITIssueMRController@dashboard')->name("rpa.issue_mr.dashboard");
        Route::get('data-issue-mr{id}', 'ITIssueMRController@utama')->name("rpa.issue_mr.utama");
        Route::get('report-issue{id}', 'ITIssueMRController@report')->name("rpa.issue_mr.report");
        Route::get('change-status-request{id}', 'ITIssueMRController@change_status')->name("rpa.issue_mr.change_status");
        Route::get('export-mr-direct', 'ITIssueMRController@export_mr_direct')->name("rpa.mr_direct.export");
        Route::get('export-excel-mr-direct', 'ITIssueMRController@export_excel_mr_direct')->name("rpa.mr_direct.excel_export");
        Route::get('export-excel-issue-mr', 'ITIssueMRController@export_excel_issue_mr')->name("rpa.issue_mr.export_excel");
        Route::get('export-issue-mr', 'ITIssueMRController@export_issue_mr')->name("rpa.issue_mr.export");
        Route::post('done-request', 'ITIssueMRController@done_request')->name("rpa.issue_mr.done_request");
        Route::post('rpa-issue-report', 'ITIssueMRController@issue_report')->name("rpa.issue_mr.issue_report");
    });

    Route::prefix('rpa')->namespace('IT_DT\RPA')->group(function() {
        Route::get('dashboard-issue-ir', 'IssueIRController@dashboard')->name("rpa.issueIR.dashboard");
        Route::get('request-issue-ir-{id}', 'IssueIRController@index')->name("rpa.issueIR.index");
        Route::get('issue-ir-report-{id}', 'IssueIRController@report')->name("rpa.issueIR.report");
        Route::post('issue-ir-search-report', 'IssueIRController@search_report')->name("rpa.issueIR.search_report");
        Route::get('export-excel-issue-ir', 'IssueIRController@excel_issue_ir')->name("rpa.issue_ir.excel_export");
        Route::get('export-pdf-issue-ir', 'IssueIRController@pdf_issue_ir')->name("rpa.issue_ir.export_pdf");
        Route::get('report-export-excel-ir', 'IssueIRController@excel_report')->name("rpa.report_ir.excel_export");
        Route::get('report-export-pdf-ir', 'IssueIRController@pdf_report')->name("rpa.report_ir.export_pdf");
    });

    Route::prefix('role-management')->namespace('IT_DT\Role')->group(function() {
        Route::get('role', 'RoleManagementController@role')->name("role.management.index");
        Route::get('employee', 'RoleManagementController@employee')->name("employee.management.index");
        Route::get('position', 'RoleManagementController@position')->name("position.management.index");
    });
});

