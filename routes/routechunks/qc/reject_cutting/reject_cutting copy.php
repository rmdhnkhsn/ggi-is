<?php 

Route::prefix('qc')->namespace('QC\RejectCutting')->group(function() {
  
  Route::group(['prefix'=>'reject'], function(){
    Route::get('/dashboard', 'RejectCuttingController@dashboard')->name("RejectCutting.dashboard");
        Route::get('/see', 'RejectCuttingController@index')->name("RejectCutting.index");
        Route::get('/monthly', 'ReportRejectCuttingController@index')->name("RejectCutting.monthly");
      
        Route::get('/seeTable', 'RejectCuttingController@ItemMeja')->name("RejectCutting.see");
        Route::get('/AddMeja', 'RejectCuttingController@addMeja')->name("RejectCutting.addMeja");
        Route::post('/store', 'RejectCuttingController@store')->name("RejectCutting.store");
        Route::get('/delete/{id}', 'RejectCuttingController@delete_master')->name("RejectCutting.delete");
        Route::get('/delete/cutting/{id}', 'RejectCuttingController@delete')->name("RejectCutting.delete1");
        Route::put('/updateIndex/{RejectCutting}', 'RejectCuttingController@updateIndex')->name("RejectCutting.updateIndex");
        // Route::get('/x', 'RejectCuttingController@getk')->name("RejectCutting.index");

        Route::post('/update/approve', 'RejectCuttingController@update')->name("RejectCutting.update.approve");
        Route::post('/update/waiting', 'RejectCuttingController@update2')->name("RejectCutting.update.waiting");

        Route::post('/show-wo-information', 'RejectCuttingController@showWoInformation')->name("RejectCutting.show-wo-information");
        Route::post('/store-wo-information', 'RejectCuttingController@storeWoInformation')->name("RejectCutting.store-wo-information");
      });
      Route::group(['prefix'=>'report'], function(){
        Route::get('/monthly', 'ReportRejectCuttingController@index')->name("RejectCutting.monthly");
      });
    
});