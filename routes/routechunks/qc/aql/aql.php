<?php

Route::prefix('aql-miyamori')->namespace('QC\AQL')->group(function() {
    Route::get('/', 'AQLController@index')->name("aql.index");
    Route::get('aql', 'AQLController@aql_list')->name("aql.list");
    Route::get('perhitungan-aql', 'AQLController@aql_perhitungan')->name("aql.perhitungan");
    Route::get('check-by-my-self', 'AQLController@check_by_self')->name("aql.check");
    Route::get('check-by-my-self/create', 'AQLController@create_check')->name("aql.create.check");
    Route::get('check-by-my-self/edit', 'AQLController@edit_check')->name("aql.edit.check");
    Route::get('check-by-my-self/create/category', 'AQLController@category_check')->name("aql.category.check");
    Route::get('check-by-my-self/create/category/quantity', 'AQLController@quantity_check')->name("aql.quantity.check");
    Route::get('check-by-my-self/create/category/quantity/description', 'AQLController@description_check')->name("aql.description.check");
});