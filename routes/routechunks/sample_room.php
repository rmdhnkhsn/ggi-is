<?php
Route::prefix('slr')->namespace('SampleRoom')->group(function() {
    Route::get('/', 'SampleRoomController@home')->name("sample-home");
    Route::get('sample-request', 'SampleRoomController@sample_request')->name("sample-request");
    Route::post('sample-update/{id}', 'SampleRoomController@update')->name("sample.update1");
    Route::get('sample-user', 'SampleRoomController@sample_user')->name("sample-user");
    Route::post('update-approve', 'SampleRoomController@updateDepartementTrecking')->name("sample-updateDepartementTrecking");
    Route::post('update-user/{id}', 'SampleRoomController@updateUser')->name("sample-updateUser");
    Route::post('sample-store', 'SampleRoomController@store')->name("sample.storeUser");
    Route::get('delete/{id}', 'SampleRoomController@delete_User')->name('sample.deleteUser');
    Route::get('detail/{id}', 'SampleRoomController@detailDone')->name('sample.detailDone');
    Route::post('daily-pattern', 'SampleRoomController@storeDailyRemarkPattern')->name("sample.storeDailyRemark");
    Route::post('sample-store-dev', 'SampleRoomController@storeDailyRemarkDev')->name("sample.storeDailyRemarkDev");
    Route::post('sample-daily-cutting', 'SampleRoomController@storeDailyRemarkCutting')->name("sample.storeDailyRemarkCutting");
    Route::post('sample-daily-sewing', 'SampleRoomController@storeDailyRemarkSewing')->name("sample.storeDailyRemarkSewing");
    Route::get('sample/store-daily-sample', 'SampleRoomController@storeDailySample')->name("sample.store-daily-sample");

    Route::get('scheduling', 'SampleRoomController@scheduling')->name("sample-scheduling");
    Route::post('update-remark-pattern', 'SampleRoomController@updateRemarkPattern')->name("sample-updateRemarkPattern");
    Route::post('update-remark-Cutting', 'SampleRoomController@updateRemarkCutting')->name("sample-updateRemarkCutting");
    Route::post('update-remark-Sewing', 'SampleRoomController@updateRemarkSewing')->name("sample-updateRemarkSewing");
    Route::post('sewing-pdf/{id}', 'SampleRoomController@sewingPDF')->name("sample-sewingPDF");
    
    Route::get('dashboard', 'SampleRoomController@dashboard')->name("sample-dashboard"); 
    
});