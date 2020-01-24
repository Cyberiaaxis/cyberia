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

Auth::routes();
Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'role:Admin']], function(){
    Route::resource('/','StaffsController');
    Route::resources([ '/roles'=>'RolesController',  '/permissions' => 'PermissionsController'  ]);
    Route::delete('/staff/operations/{id}','RolesController@edit');
    Route::get('/operations/{id}','OperationsController@show')->name('operations');
    Route::post('/operations/{id}','OperationsController@createPermission')->name('operations.store');
    Route::delete('/operations/{id}','OperationsController@removePermission');
    Route::post('/user/giveRole/{id},  UserController@giveRole');
    Route::resource('/users','UsersController');
});
