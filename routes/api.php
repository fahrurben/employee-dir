<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authenticate', 'AuthenticationController@authenticate');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/departments', 'DepartmentController@index');
    Route::post('/departments', 'DepartmentController@create');
    Route::post('/departments/{id}', 'DepartmentController@update');
    Route::delete('/departments/{id}', 'DepartmentController@delete');

    Route::get('/employees', 'EmployeeController@index');
    Route::get('/employees/{id}', 'EmployeeController@get');
    Route::post('/employees', 'EmployeeController@create');
    Route::post('/employees/{id}', 'EmployeeController@update');
    Route::delete('/employees/{id}', 'EmployeeController@delete');
});