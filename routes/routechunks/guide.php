<?php
Route::prefix('guide')->namespace('Guide')->group(function() {
    Route::get('guide-home', 'GuideController@home')->name("guide-home");
    Route::get('guide-upload', 'GuideController@upload')->name("guide-upload");
    // Route::get('play-video', 'GuideController@play')->name("guide-play");
    Route::get('guide-playlist/{id}', 'GuideController@playlist')->name("guide-playlist");
    Route::post('video/store', 'GuideController@store')->name("guide.video.store");
    Route::get('video/{video}/edit', 'GuideController@edit')->name("guide.video.edit");
    Route::put('video/{video}', 'GuideController@update')->name("guide.video.update");
    Route::delete('video/{video}', 'GuideController@update')->name("guide.video.update");

//route for plylist
    Route::post('playlist/store', 'GuideController@storePlaylist')->name("guide.playlist.storePlaylist");
    Route::put('playlist/{playlist}', 'GuideController@update')->name("guide.playlist.update");
    Route::delete('playlist/{playlist}', 'GuideController@update')->name("guide.playlist.delete");
    Route::get('show-list-video', 'GuideController@showListVideo')->name("show-list-video");
    Route::get('show-playlist-video', 'GuideController@showPlaylistVideo')->name("show-playlist-video");
    Route::get('show-category', 'GuideController@showCategory')->name("show-category");
    Route::post('store-playlist', 'GuideController@storePlaylist')->name("store-playlist");
    Route::post('store-like', 'GuideController@storeLike')->name("store-like");
    Route::get('show-log', 'GuideController@showLog')->name("show-log");
    Route::post('store-view', 'GuideController@storeView')->name("store-view");

    Route::get('show-comment', 'GuideController@showComment')->name("show-comment");
    Route::post('store-comment', 'GuideController@storeComment')->name("store-comment");
    Route::post('store-reply', 'GuideController@storeReply')->name("store-reply");
    
});