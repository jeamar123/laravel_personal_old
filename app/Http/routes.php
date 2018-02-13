<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\ExpensesController;

// Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', 'HomeController@getHomeView');
    // Route::post('/task', 'TaskController@addTasks');
    // Route::delete('/task/{id}', 'TaskController@deleteTasks');

    Route::get('/categories', 'ExpensesCategoryController@getCategories');
    Route::post('/categories', 'ExpensesCategoryController@addCategories');
    Route::post('/categories/update', 'ExpensesCategoryController@updateCategories');
    Route::get('/categories/delete/{id}', 'ExpensesCategoryController@deleteCategories');

    Route::get('/expenses', 'ExpensesController@getExpenses');
    Route::post('/expenses/month', 'ExpensesController@getExpensesByMonth');
    Route::post('/expenses', 'ExpensesController@addExpenses');
    Route::post('/expenses/update', 'ExpensesController@updateExpenses');
    Route::get('/expenses/delete/{id}', 'ExpensesController@deleteExpenses');
// });
