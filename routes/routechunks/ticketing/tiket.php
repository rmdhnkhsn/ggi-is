<?php
Route::group(['it'=>'it'], function(){
    Route::get('it_dt/dashboar', 'ITDTController@index')->name("it_dt.index");
    Route::get('/dashboard_tiket', 'ITDTController@index')->name("tiket.index");
   
});

Route::prefix('ticketing')->namespace('ticketing')->group(function() {
    Route::group(['prefix'=>'tiket'], function(){
        Route::get('/dashboard', 'TiketController@index')->name("tiket.index");
        Route::get('/create', 'TiketController@create')->name("tiket.create");
        Route::get('/create_tiket/{id}', 'TiketController@create_tiket')->name("tiket.createtes");
        Route::post('/store', 'TiketController@store')->name("tiket.store");
        Route::get('/see', 'TiketController@see')->name("tiket.user");
        Route::get('edit/{id}', 'TiketController@edit')->name("tiket.edit");
        Route::post('/update', 'TiketController@update')->name("tiket.update");
        
        
    });
    //tiket acc It suport
    Route::group(['prefix'=>'tiketit'], function(){
        Route::get('/tiket/all', 'ITTiketController@tiket')->name("tiket.it");
        Route::get('/tiketdone', 'ITTiketController@tiketdone')->name("tiketd.itdone");
        Route::get('edit/{id}', 'ITTiketController@tiketacc')->name("tiketit.edit");
        Route::post('/update', 'ITTiketController@updateit')->name("tiketit.update");
        Route::get('/alltiket/done', 'ITTiketController@tiketdoneall')->name("tiketd.itdoneall");
        Route::post('/x', 'ITTiketController@getk')->name("coba.done");
        Route::post('/alltiket/done2', 'ITTiketController@doneall_tgl')->name("tiketd.itdoneall2");
       // Route::get('/tiketd', 'ITTiketController@tiketd')->name("tiketd.it");
        // Route::post('pending', 'ITTiketController@tiketpending')->name("tiketit.pending");
        //Route::post('done', 'ITTiketController@tiketdone')->name("tiketit.done");
        // Route::get('/tiketw', 'ITTiketController@tiketw')->name("tiketw.it");
        // Route::get('/tiketpro', 'ITTiketController@tiketpro')->name("tiketpro.it");
        // Route::get('/tiketp', 'ITTiketController@tiketp')->name("tiketp.it");
        
    });


    Route::group(['prefix'=>'user'], function(){
        Route::get('/dashboadr/user', 'UserMasterController@index')->name("userip.index");
        Route::get('/create', 'UserMasterController@create')->name("userip.create");
        Route::post('/store', 'UserMasterController@store')->name("userip.store");
        Route::post('/storeuser', 'UserMasterController@storeuser')->name("useripuser.store");
        Route::get('edit/{id}', 'UserMasterController@edit')->name('userip.edit');
        Route::post('/update', 'UserMasterController@update')->name("userip.update");
        Route::get('delete/{id}', 'UserMasterController@delete')->name('userip.delete');
        //Route::post('/ajax', 'UserMasterController@ajax')->name("userip.ajax");
    });

    Route::group(['prefix'=>'it'], function(){
        Route::get('/dashboard/it', 'ItSupportController@index')->name("itsupport.index");
        Route::get('/create', 'ItSupportController@create')->name("itsupport.create");
        Route::post('/store', 'ItSupportController@store')->name("itsupport.store");
        Route::get('delete/{id}', 'ItSupportController@delete')->name('itsupport.delete');
    });

    Route::group(['prefix'=>'subkategori'], function(){
        Route::get('/dashboard/kategori', 'KategoriRusakController@index')->name("kategorir.index");
        Route::get('/create', 'KategoriRusakController@create')->name("kategorir.create");
        Route::post('/store', 'KategoriRusakController@store')->name("kategorir.store");
        Route::get('delete/{id}', 'KategoriRusakController@delete')->name('kategorir.delete');
        Route::get('edit/{id}', 'KategoriRusakController@edit')->name('kategorir.edit');
        Route::post('/update', 'KategoriRusakController@update')->name("kategorir.update");
    });

    Route::group(['prefix'=>'kategori'], function(){
        Route::get('/dashboard/kategori', 'KategoriController@index')->name("kategorit.index");
        Route::get('/create', 'KategoriController@create')->name("kategorit.create");
        Route::post('/store', 'KategoriController@store')->name("kategorit.store");
        Route::get('delete/{id}', 'KategoriController@delete')->name('kategorit.delete');
        Route::get('edit/{id}', 'KategoriController@edit')->name('kategorit.edit');
        Route::post('/update', 'KategoriController@update')->name("kategorit.update");
    });

    Route::group(['prefix'=>'help'], function(){
        Route::get('/help', 'HelpController@index')->name("thelp.index");
        Route::get('edit/{id}', 'HelpController@edit')->name('thelp.edit');
        Route::post('/update', 'HelpController@update')->name("thelp.update");
    });

    Route::group(['prefix'=>'report'], function(){
        Route::get('/itsupport', 'ReportTiketController@kinerjaIT')->name("report.it");
        Route::get('/user', 'ReportTiketController@user')->name("report.user");
        Route::get('/problem', 'ReportTiketController@problem')->name("report.problem");
        Route::post('/problemget', 'ReportTiketController@problemget')->name("report.problemget");
        Route::post('/Performanceget', 'ReportTiketController@kinerjaitget')->name("report.kinerjaitget");
        Route::post('/usertiketget', 'ReportTiketController@usertiketget')->name("report.usertiketget");
    });


});