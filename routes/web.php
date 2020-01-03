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
Route::middleware('auth')->prefix('staff')->group(function(){ 
    Route::get('/','StaffController@home');
    Route::resource('/roles','StaffController');
    Route::resource('/rolemanager','RoleManagerController'); 
});
