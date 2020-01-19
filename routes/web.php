<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::group(['prefix' => 'staff', 'middleware' => 'auth'], function(){
    Route::resource('/','StaffsController');
    Route::resources([ '/roles'=>'RolesController',  '/permissions' => 'PermissionsController'  ]);
    Route::delete('/staff/operations/{id}','RolesController@edit')->middleware(['role:admin']);
    Route::get('/operations/{id}','OperationsController@show')->name('operations')->middleware(['role:admin']);
    Route::post('/operations/{id}','OperationsController@createPermission')->name('operations.store')->middleware(['role:admin']);
    Route::delete('/operations/{id}','OperationsController@removePermission')->middleware(['role:admin']);
    Route::resource('/users','UsersController');
});
