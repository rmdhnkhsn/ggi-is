<?php
Route::prefix('mkt')->namespace('Marketing')->group(function() {
    Route::group(['prefix'=>'marketing'], function(){
        Route::get('/', 'MarketingController@index')->name('marketing.index');
    });

    Route::group(['prefix'=>'qrcode'], function(){
        Route::get('/qrcode', 'qrcodeController@index')->name("qrcode.index");
        Route::get('/create', 'qrcodeController@create')->name("qrcode.create");

        // Store a new pdf
        Route::post('/storeSmv/{qrcode}', 'qrcodeController@storeSmv')->name("qrcode.storeSmv");
        Route::post('/storePpm/{qrcode}', 'qrcodeController@storePpm')->name("qrcode.storePpm");
        Route::post('/storeWork/{qrcode}', 'qrcodeController@storeWork')->name("qrcode.storeWork");
        Route::post('/storeTrimcard/{qrcode}', 'qrcodeController@storeTrimcard')->name("qrcode.storeTrimcard");
        Route::post('/storeTechspech/{qrcode}', 'qrcodeController@storeTechspech')->name("qrcode.storeTechspech");
        // Route::get('/createSmv/{qrcode}', 'qrcodeController@createSmv')->name("qrcode.createSmv");
        // Route::get('/createSmv/{qrcode}', 'qrcodeController@createSmv')->name("qrcode.createSmv");
        // Edit Existing PDF Upload
        Route::put('/updateSmv/{qrcode}', 'qrcodeController@updateSmv')->name("qrcode.updateSmv");
        Route::put('/updateSmv1/{qrcode}', 'qrcodeController@updateSmv1')->name("qrcode.updateSmv1");
        Route::put('/updatePpm/{qrcode}', 'qrcodeController@updatePpm')->name("qrcode.updatePpm");
        Route::put('/updatePpm1/{qrcode}', 'qrcodeController@updatePpm1')->name("qrcode.updatePpm1");
        Route::put('/updateWork/{qrcode}', 'qrcodeController@updateWork')->name("qrcode.updateWork");
        Route::put('/updateWork1/{qrcode}', 'qrcodeController@updateWork1')->name("qrcode.updateWork1");
        Route::put('/updateTrimcard/{qrcode}', 'qrcodeController@updateTrimcard')->name("qrcode.updateTrimcard");
        Route::put('/updateTrimcard1/{qrcode}', 'qrcodeController@updateTrimcard1')->name("qrcode.updateTrimcard1");
        Route::put('/updateTechspech/{qrcode}', 'qrcodeController@updateTechspech')->name("qrcode.updateTechspech");
        Route::put('/updateTechspech1/{qrcode}', 'qrcodeController@updateTechspech1')->name("qrcode.updateTechspech1");

        Route::post('/store', 'qrcodeController@store')->name("qrcode.store");
        Route::get('/show/{id}', 'qrcodeController@show')->name("qrcode.show");
        Route::get('/show_smv/{id}', 'qrcodeController@show_smv')->name("qrcode.show_smv");
        Route::get('qrcode/{id}', 'qrcodeController@generate')->name('qrcode.generate');
        Route::post('qrcode/{id}', 'qrcodeController@generateQrcode')->name('qrcode.generate.image');
        // Route::get('qrcode/{id}', 'qrcodeController@generateQrcodePDF')->name('qrcode.generate.pdf');
        // Route::get('qrcode2/{id}', 'qrcodeController@generate2')->name('qrcode.generate2');
        Route::get('/exportlaporan/{id}', 'qrcodeController@pdf')->name('qrcode.laporan');
        Route::get('/exportlaporan2/{id}', 'qrcodeController@pdf2')->name('qrcode.laporan2');
        Route::get('delete/{id}', 'qrcodeController@delete')->name('qrcode.delete');
        Route::get('detail/', 'qrcodeController@detail')->name('qrcode.detail');
        Route::get('edit-data/{id}','qrcodeController@edit')->name('edit-data');
        Route::get('edit-pdf/{id}','qrcodeController@editPdf')->name('edit-pdf');
        Route::post('update-image/{id}','qrcodeController@update')->name('update');
        Route::post('update-pdf/{id}','qrcodeController@updatePdf')->name('updatePdf');
    });
    
    Route::group(['prefix'=>'Show'], function(){
        Route::get('/show_smv/{id}', 'qrcodeController@show_smv')->name("qrcode.show_smv");
        Route::get('/show_ppm/{id}', 'qrcodeController@show_ppm')->name("qrcode.show_ppm");
        Route::get('/show_trimcard/{id}', 'qrcodeController@show_trimcard')->name("qrcode.show_trimcard");
        Route::get('/show_work/{id}', 'qrcodeController@show_work')->name("qrcode.show_work");
        Route::get('/show_techspech/{id}', 'qrcodeController@show_techspech')->name("qrcode.show_techspech");
        Route::get('detail_smv/', 'qrcodeController@detail_smv')->name('qrcode.detail_smv');
        Route::get('detail_ppm/', 'qrcodeController@detail_ppm')->name('qrcode.detail_ppm');
        Route::get('detail_work/', 'qrcodeController@detail_work')->name('qrcode.detail_work');
        Route::get('detail_trimcard/', 'qrcodeController@detail_trimcard')->name('qrcode.detail_trimcard');
        Route::get('detail_techspech/', 'qrcodeController@detail_techspech')->name('qrcode.detail_techspech');

    });

    
    

});