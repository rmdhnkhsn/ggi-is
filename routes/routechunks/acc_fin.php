<?php
Route::prefix('acf')->group(function() {

    Route::get('', function () {
        return view('acc_fin.home',['page'=>'Acc & Fin']);
    })->name('acc_fin.home');

    Route::prefix('cost-factory')->namespace('AccFin\cost_factory')->group(function() {
        Route::get('', 'CostFactoryController@index')->name("accfin.costfactory.index");
        // Route::get('create', 'CostFactoryController@create')->name("accfin.costfactory.create");
        Route::post('store-data', 'CostFactoryController@store')->name("accfin.costfactory.store");
        Route::post('branch', 'CostFactoryController@getDataBranch')->name("accfin.costfactory.branch");
        Route::get('get-{year}', 'CostFactoryController@getCostData')->name("accfin.costfactory.get");
    });
    Route::prefix('cost-factory-rpt')->namespace('AccFin\cost_factory')->group(function() {
        Route::get('/', 'CostFactoryRptController@index')->name("accfin.costfactoryrpt.index");
    });

    Route::prefix('blocking-budget')->namespace('AccFin\Budgeting')->group(function() {
        Route::get('/', 'BlockBudgetController@monitoring')->name("acc.budget.monitoring");
        Route::get('detail', 'BlockBudgetController@monitoring_detail')->name("budget.monitoring.detail");
        Route::get('budget-daily', 'BlockBudgetController@budgetDaily')->name("acc.budget.daily");
        Route::get('plan-history', 'BlockBudgetController@planHistory')->name("acc.budget.planHistory");
        Route::get('edit-budget', 'BlockBudgetController@editBudget')->name("acc.budget.editBudget");
        Route::get('/limit', 'BlockBudgetController@limit')->name("acc.budget.limit");
        Route::post('/limit-store', 'BlockBudgetController@store_limit')->name("acc.store.limit");
        Route::get('/plan', 'BlockBudgetController@Create_Plan')->name("acc.budget.plan");
        Route::post('/getdeskripsi', 'BlockBudgetController@getAccDesc')->name("acc.account.desc");
        Route::post('/plan-store', 'BlockBudgetController@store_plan')->name("acc.store.plan");
        Route::post('/plan-update', 'BlockBudgetController@update_plan')->name("acc.update.plan");
        Route::get('/filter', 'BlockBudgetController@monitoring_filter')->name("budget.monitoring.filter");






    });
});