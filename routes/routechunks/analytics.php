<?php
Route::prefix('analytics')->namespace('Analytics')->group(function() {
    Route::get('labour-cost', 'AnalyticsController@labour_cost')->name("analytics.labourcost");
});