<?php
Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::group(['prefix'=>'karyawan'], function(){
        Route::get('/', 'KaryawanController@index')->name('karyawan.index');
        Route::get('/inactive', 'KaryawanController@inactive')->name('karyawan.inactive');
        Route::post('/manage', 'KaryawanController@manage')->name('karyawan.manage');
        Route::post('mupdate', 'KaryawanController@mupdate')->name('karyawan.mupdate');
        Route::get('edit/role/{id}', 'KaryawanController@editrole')->name("karyawan.editrole");
        Route::post('update/role', 'KaryawanController@updaterole')->name("karyawan.updaterole");
        Route::get('export', 'KaryawanController@export')->name('karyawan.export');
        Route::post('import', 'KaryawanController@import')->name('karyawan.import');
        Route::get('viewimport', 'KaryawanController@viewimport')->name('karyawan.viewimport');
    });
    Route::group(['prefix'=>'wo'], function(){
        Route::get('masterwo', 'KaryawanController@masterwo')->name("masterwo.index");
        Route::get('wo/{id}', 'KaryawanController@woshow')->name("masterwo.show");
    });

});