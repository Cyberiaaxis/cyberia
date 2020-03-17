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

Route::view('/forum','player.forums.index');


Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
// dd(Auth::routes());
Route::post('/checkemail', 'Auth\RegisterController@checkEmail')->name('checkemail');
Route::view('/story','player.story');
Route::view('/home','player.index');
Route::group(['prefix' => 'staff', 'middleware' => ['auth']], function(){
    Route::resource('/','StaffsController');
    Route::resources([ 
                        '/roles'=>'RolesController',  
                        '/permissions' => 'PermissionsController',
                        '/users'=>'UsersController',
                        '/itemCategories'=>'ItemCategoriesController',
                        '/items'=>'ItemsController',
                    ]);
    // Route::resource('/users','UsersController');
});
Route::group(['middleware' => ['auth']], function(){
    Route::resources([
        '/playeritems'=>'PlayerItemsController',
    ]);
});

