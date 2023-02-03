<?php
Route::prefix('career')->namespace('Career')->group(function() {
    Route::get('home', 'CareerController@home')->name("career-home");
    Route::get('apply-job{id}', 'CareerController@apply_job')->name("apply-job"); 
    Route::post('search-job', 'CareerController@search_job')->name("search-job"); 
    Route::post('applicant-job', 'CareerController@applicant_job')->name("applicant-job"); 
    Route::get('live-search-career', 'CareerController@live_search')->name("live_search-job"); 
    Route::get('search-live-career', 'CareerController@search_career')->name("search_career-job"); 
});