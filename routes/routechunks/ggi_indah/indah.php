<?php
Route::prefix('ggi_indah')->namespace('ggi_indah')->group(function() {
    Route::group(['prefix'=>'ggi_indah'], function(){
        Route::get('/ggi/indah', 'GgiIndahController@index')->name("indah.temuan");
        // Route::get('/dashboardindah', 'IndahController@indah')->name("indah.index1");
        // Route::post('/findings', 'IndahController@store')->name("temuan.index");
});

    Route::group(['prefix'=>'indah'], function(){
        Route::get('/dashboardindah', 'IndahController@indah')->name("indah.index");
        Route::post('/store', 'IndahController@store')->name("vote.store");
        Route::get('/countvote', 'IndahController@countvote')->name("indah.countvote");
        Route::get('/cari', 'IndahController@cari')->name("indah.cari");
        Route::post('/vote', 'IndahController@vote')->name("indah.vote");
});
    Route::group(['prefix'=>'petugas'], function(){
        Route::get('/see', 'IpetugasController@petugas')->name("Pindah.index");
        Route::get('/create', 'IpetugasController@create')->name("satgas.create");
        Route::post('/store', 'IpetugasController@store')->name("satgas.store");
        Route::get('edit/{id}', 'IpetugasController@edit')->name('satgas.edit');
        Route::post('/update', 'IpetugasController@update')->name("satgas.update");
        Route::get('delete/{id}', 'IpetugasController@delete')->name('satgas.delete');
    
    });
    Route::group(['prefix'=>'jpiket'], function(){
        Route::get('/see', 'IjadwalController@jadwal')->name("Jindah.index");
        //Route::get('/create', 'IpetugasController@create')->name("satgas.create");
        //Route::post('/store', 'IpetugasController@store')->name("satgas.store");
        Route::get('edit/{id}', 'IjadwalController@edit')->name('piket.edit');
        Route::post('/update', 'IjadwalController@update')->name("piket.update");
    });

    Route::group(['prefix'=>'report'], function(){
        Route::get('dailyreport', 'IreportController@day')->name("indah.day");
        Route::post('daily/get', 'IreportController@getharian')->name('indah.harian');
        Route::Post('daily/detail', 'IreportController@haridetail')->name('indah.Hdetail');

        Route::get('weeklyreport', 'IreportController@week')->name("indah.week");
        Route::post('Weekly/get', 'IreportController@getmingguan')->name('indah.mingguan');
        Route::Post('Weekly/detail', 'IreportController@minggudetail')->name('indah.Mdetail');

        Route::get('monthlyreport', 'IreportController@month')->name("indah.month");
        Route::post('monthly/get', 'IreportController@getbulanan')->name('indah.bulanan');
        Route::Post('monthly/detail', 'IreportController@bulandetail')->name('indah.Bdetail');

        Route::get('annualreport', 'IreportController@year')->name("indah.year");
        Route::post('annual/get', 'IreportController@gettahunan')->name('indah.tahunan');
        Route::Post('annual/detail', 'IreportController@tahundetail')->name('indah.Tdetail');

        Route::get('/report', 'IreportController@index')->name("indah.report");
           
    });

    Route::group(['prefix'=>'ipiket'], function(){
        Route::get('/see', 'jadwalController@index')->name("piket.index");
        Route::get('/ipiket', 'jadwalController@ipiket')->name("piket.jadwal");
        Route::post('/istore', 'jadwalController@istore')->name("piket.store");
        Route::get('delete/{id}', 'jadwalController@delete')->name('piket.delete');
        // Route::get('edit/{id}', 'jadwalController@edit')->name('piket.edit');
        // Route::post('/update', 'jadwalController@update')->name("piket.update");
    });

    Route::group(['prefix'=>'find'], function(){
        Route::get('/see', 'ItemuanController@see')->name("indah.divisi");
        Route::get('/see/2', 'ItemuanController@see_tanggap')->name("indah.dtanggap");
        Route::get('/see/3', 'ItemuanController@see_selesai')->name("indah.dselesai");
        Route::get('/see/4', 'ItemuanController@see_acc')->name("indah.dacc");
        Route::get('/create', 'ItemuanController@create')->name("divisi.create");
        Route::post('/store', 'ItemuanController@store')->name("divisi.store");
        Route::get('delete/{id}', 'ItemuanController@delete')->name('divisi.delete');
        Route::get('edit/{id}', 'ItemuanController@edit')->name('divisi.edit');
        Route::post('/update', 'ItemuanController@update')->name("divisi.update");
    });

    Route::group(['prefix'=>'findings'], function(){
        Route::get('/dashboard', 'IdivisiController@index')->name("temuan.index");
        Route::get('/see', 'IdivisiController@see')->name("idivisi.divisi");
        Route::get('/see/2', 'IdivisiController@see_tanggap')->name("idivisi.dtanggap");
        Route::get('/see/3', 'IdivisiController@see_selesai')->name("idivisi.dselesai");
        // Route::get('/see/4', 'IdivisiController@see_acc')->name("idivisi.dacc");
        Route::get('delete/{id}', 'IdivisiController@delete')->name('divisi.delete');
        Route::get('respon/{id}', 'IdivisiController@edit1')->name('idivisi.edit');
        Route::post('/update', 'IdivisiController@update1')->name("idivisi.update");
        
        Route::get('upload/{id}', 'IdivisiController@edit2')->name('idivisi.editp');
        Route::post('/updatee', 'IdivisiController@update2')->name("idivisi.updatep");
    });


});