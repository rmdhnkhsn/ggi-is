<?php
Route::prefix('division')->namespace('Admin')->group(function() {
    Route::group(['prefix'=>'division'], function(){
        Route::get('/', 'BagianController@index')->name('bagian.index');
        Route::get('create', 'BagianController@create')->name("bagian.create");
        Route::post('store', 'BagianController@store')->name("bagian.store");
        Route::get('edit/{id}', 'BagianController@edit')->name('bagian.edit');
        Route::post('update', 'BagianController@update')->name('bagian.update');
        Route::get('delete/{id}', 'BagianController@delete')->name('bagian.delete');
    });
});