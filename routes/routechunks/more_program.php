<?php
Route::prefix('mrp')->namespace('MoreProgram')->group(function() {
    Route::get('/', 'MoreProgramController@home')->name("mp-home");
        Route::get('gistube', 'MoreProgramController@gistube')->name("gistube-leaderboard");
        Route::get('show-dashboard-achievement', 'MoreProgramController@showDashboardAchievement')->name("gistube.show-dashboard-achievement");
        Route::get('show-leaderboard', 'MoreProgramController@showLeaderBoard')->name("gistube.show-leaderboard");

    Route::group(['prefix'=>'overtime-request'], function(){
        Route::get('/', 'LemburController@overtime_request')->name("overtime-request");
        Route::get('-{key}/', 'LemburController@overtime_requestBln')->name("overtime-request-bln");

        Route::get('create-request', 'LemburController@create_request')->name("create-request");
        Route::post('store-request', 'LemburController@store')->name("store.request.overtime");
        Route::post('/nama', 'LemburController@getuser')->name("overtime.getuser");
        Route::post('/getwo', 'LemburController@getwo')->name("overtime.getwo");
        Route::post('/bagian', 'LemburController@bagian')->name("bagian.lembur");
        Route::post('/tambah-karyawan', 'LemburController@addKaryawan')->name("overtime.add.karyawan");
        Route::get('edit{id}', 'LemburController@edit_request')->name('edit.request');
        Route::post('update-request', 'LemburController@update')->name("update.request.overtime");
        Route::post('formulir.pdf', 'LemburController@pdf')->name("pdf.request.overtime");
        Route::get('/getbuyer', 'LemburController@get_buyer')->name("get_buyer.request.overtime");

    });

    Route::group(['prefix'=>'job-orientation'], function(){
        Route::get('/', 'JobOrientationController@index')->name("job.index");
        Route::get('/upload', 'JobOrientationController@upload')->name("job.upload");
        Route::post('/link-store', 'JobOrientationController@link_store')->name("job.link_store");
        Route::post('/image-store', 'JobOrientationController@image_store')->name("job.image_store");
        Route::post('/video-store', 'JobOrientationController@video_store')->name("job.video_store");
        Route::post('/pdf-store', 'JobOrientationController@pdf_store')->name("job.pdf_store");
        Route::post('/excel-store', 'JobOrientationController@excel_store')->name("job.excel_store");
        Route::post('/word-store', 'JobOrientationController@word_store')->name("job.word_store");
        Route::post('/ppt-store', 'JobOrientationController@ppt_store')->name("job.ppt_store");
        Route::post('/rar-store', 'JobOrientationController@rar_store')->name("job.rar_store");
        Route::post('/sc-store', 'JobOrientationController@sc_store')->name("job.sc_store");
        Route::get('/delete{id}', 'JobOrientationController@delete')->name("job.delete");
        Route::get('/delete-image{id}', 'JobOrientationController@delete_image')->name("job.delete_image");
        Route::get('/delete-link{id}', 'JobOrientationController@delete_link')->name("job.delete_link");
        Route::get('/delete-video{id}', 'JobOrientationController@delete_video')->name("job.delete_video");
        Route::get('/delete-pdf{id}', 'JobOrientationController@delete_pdf')->name("job.delete_pdf");
        Route::get('/delete-excel{id}', 'JobOrientationController@delete_excel')->name("job.delete_excel");
        Route::get('/delete-word{id}', 'JobOrientationController@delete_word')->name("job.delete_word");
        Route::get('/delete-ppt{id}', 'JobOrientationController@delete_ppt')->name("job.delete_ppt");
        Route::get('/delete-rar{id}', 'JobOrientationController@delete_rar')->name("job.delete_rar");
        Route::get('/delete-sc{id}', 'JobOrientationController@delete_sc')->name("job.delete_sc");
        Route::get('/download{id}', 'JobOrientationController@download')->name("job.download");
        Route::get('/download-image{id}', 'JobOrientationController@download_image')->name("job.download_image");
        Route::get('/download-video{id}', 'JobOrientationController@download_video')->name("job.download_video");
        Route::get('/download-pdf{id}', 'JobOrientationController@download_pdf')->name("job.download_pdf");
        Route::get('/download-excel{id}', 'JobOrientationController@download_excel')->name("job.download_excel");
        Route::get('/download-word{id}', 'JobOrientationController@download_word')->name("job.download_word");
        Route::get('/download-ppt{id}', 'JobOrientationController@download_ppt')->name("job.download_ppt");
        Route::get('/download-rar{id}', 'JobOrientationController@download_rar')->name("job.download_rar");
        Route::get('/download-sc{id}', 'JobOrientationController@download_sc')->name("job.download_sc");
        Route::get('/show-list-job', 'JobOrientationController@show_list')->name("job.show_list");
        Route::get('/public-list-job', 'JobOrientationController@public_list')->name("job.public_list");
        Route::post('/bagian', 'JobOrientationController@bagian')->name("job.bagian");
        Route::post('/verif', 'JobOrientationController@verif')->name("job.verif");
        Route::post('/unverif', 'JobOrientationController@unverif')->name("job.unverif");
        Route::post('/update', 'JobOrientationController@update')->name("job.update");
        Route::get('/viewers', 'JobOrientationController@viewers')->name("job.viewers");
        Route::get('/public', 'JobOrientationController@public')->name("job.public");
        Route::put('/update-viewers', 'JobOrientationController@update_viewers')->name("job.update_viewers");
        Route::get('orientation-modul{id}', 'JobOrientationProbationController@modul')->name("start-modul-probation");
        Route::get('orientation-question{id}', 'JobOrientationProbationController@quest')->name("start-test-orientation");
        Route::get('question-next{id}', 'JobOrientationProbationController@quest2')->name("next-test-orientation");
        Route::put('question-answer', 'JobOrientationProbationController@answer_update')->name("question.answer_update");
        Route::put('answer-send', 'JobOrientationProbationController@answer_send')->name("question.answer_send");
        Route::get('result-test{id}', 'JobOrientationController@result_test')->name("result-test");
        Route::post('store-viewers', 'JobOrientationProbationController@store_viewers')->name("job.store_viewers");
        Route::get('disapprove{id}','JobOrientationProbationController@disapproveView')->name('probation-test.disapprove_view');
        Route::post('probation-disapprove','JobOrientationProbationController@disapprove')->name('probation-test.disapprove');
        Route::get('probation-approve{id}','JobOrientationProbationController@approve')->name('probation-test.approve');
    });

    Route::group(['prefix'=>'gcc-traffic'], function(){
        Route::get('/', 'GCCTraficController@index')->name("traffic-index");
        Route::get('analytics', 'GCCTraficController@analytics')->name("traffic-analytics");

    });

    Route::group(['prefix'=>'weekly-question'], function(){
        Route::get('/', 'WeeklyQuestController@index')->name("weekly-question");
        Route::get('finish', 'WeeklyQuestController@finish')->name("finish-question");
        Route::get('weekly-report', 'WeeklyQuestController@weekly_report')->name("weekly_report-question");
        Route::post('store', 'WeeklyQuestController@store')->name("store-question");
    });

    Route::group(['prefix'=>'user-feedback'], function(){
        // Route::get('/', 'UserFeedbackController@index')->name("userfeedback-index");
        // Route::get('/create', 'UserFeedbackController@create')->name("userfeedback-create");
        // Route::post('/store', 'UserFeedbackController@store')->name("userfeedback-store");
        // Route::get('analytics', 'UserFeedbackController@analytics')->name("userfeedback-analytics");

        Route::get('/review', 'UserFeedbackController@kuesioner')->name("userfeedback-review");
        Route::post('/review', 'UserFeedbackController@kuesioner_store')->name("userfeedback-reviewstore");

    });

    Route::group(['prefix'=>'barcode-security'], function(){
        Route::get('/', 'BarcodeSecurityController@index')->name("barcode.security.index");
        Route::get('scan-approve', 'BarcodeSecurityController@approve')->name("barcode.security.approve");
        Route::get('scan-disapprove', 'BarcodeSecurityController@disapprove')->name("barcode.security.disapprove");
        Route::get('activity', 'BarcodeSecurityController@activity')->name("barcode.security.activity");

    });
});