<?php
Route::prefix('marketing')->namespace('Marketing\RekapOrder')->group(function() {
    Route::group(['prefix'=>'rekap-order'], function(){
        Route::get('/rekap', 'RekapOrderController@dashboard')->name('rekap.dashboard');
        Route::get('/rekap_index', 'RekapOrderController@index')->name('rekap.index');
        Route::get('/all_report', 'RekapOrderController@all_report')->name('rekap.all_report');
        Route::get('/add', 'RekapOrderController@add')->name('rekap.add');
        Route::post('/store', 'RekapOrderController@store')->name('rekap.store');
        Route::get('/edit/{id}', 'RekapOrderController@edit')->name('rekap.edit');
        Route::post('/update', 'RekapOrderController@update')->name('rekap.update');
        Route::get('/delete/{id}', 'RekapOrderController@delete')->name('rekap.delete');
    });

    Route::group(['prefix'=>'rekap-detail'], function(){
        Route::get('/create/{id}', 'RekapOrderController@create')->name('rekap.create');
        Route::get('/{id}', 'RekapOrderController@final')->name('rekap.final');
        Route::post('/store', 'RekapDetailController@store')->name('rekapDetail.store');
        Route::get('/edit/{id}', 'RekapDetailController@edit')->name('rekapDetail.edit');
        Route::get('/create/edit/{id}', 'RekapDetailController@edit')->name('rekapDetail.edit');
        Route::post('/update', 'RekapDetailController@update')->name('rekapDetail.update');
        Route::get('/delete/{id}', 'RekapDetailController@delete')->name('rekapDetail.delete');
        Route::get('/editsize/{id}', 'RekapSizeController@edit')->name('size.edit');
        Route::get('/create/editsize/{id}', 'RekapSizeController@edit')->name('size.edit');
    });

    Route::group(['prefix'=>'rekap-breakdown'], function(){
        Route::get('/create/{id}', 'RekapBreakdownController@create')->name('breakdown.create');
        Route::get('/see/{id}', 'RekapBreakdownController@see')->name('breakdown.see');
        Route::post('/store/{id}', 'RekapBreakdownController@store')->name('breakdown.store');
        Route::get('/delete/{id}', 'RekapBreakdownController@delete')->name('breakdown.delete');
        Route::get('/see/edit_data/{id}', 'RekapBreakdownController@edit')->name('breakdown.edit');
        Route::get('/create/edit_data/{id}', 'RekapBreakdownController@edit')->name('breakdown.edit');
        Route::post('/add/new/{id}', 'RekapBreakdownController@add')->name('breakdown.add');
        Route::post('/total/amount/{id}', 'RekapBreakdownController@totalAmount')->name('breakdown.totalAmount');
        Route::post('/update/{id}', 'RekapBreakdownController@update')->name('breakdown.update');
    });

    Route::group(['prefix'=>'rekap-size'], function(){
        Route::post('/store/{id}', 'RekapSizeController@store')->name('size.store');
        Route::post('/update/{id}', 'RekapSizeController@update')->name('size.update');
    });

    Route::group(['prefix'=>'final-report'], function(){
        Route::get('/', 'RekapOrderController@finalReport')->name('rekap.finalReport');
        Route::get('/download/{id}', 'RekapOrderController@download')->name('rekap.download');
        Route::get('/download_pdf/{id}', 'RekapOrderController@download_pdf')->name('rekap.download_pdf');
    });
});