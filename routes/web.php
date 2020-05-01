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


Route::view('/','welcome')->middleware('guest');
Auth::routes(['verify' => true]);
// dd(Auth::routes());
Route::post('/checkemail', 'Auth\RegisterController@checkEmail')->name('checkemail');
Route::view('/story','player.story');
Route::view('/profile', 'player.profile');
Route::view('/attack', 'player.attack');
Route::view('/gang', 'player.gang');
Route::view('/home','player.index')->middleware('auth');
// Route::view('/crime','player.crime')->middleware('auth');
// Route::get('crime', 'CrimeController@index')->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    Route::resources([
                        '/crime'=>'CrimeController',
                        '/player' => 'PlayerController',
                        '/profile' => 'UsersController',
                        '/gang' => 'GangController',
                        '/forums' => 'ForumsController',
                        '/forums/{forum}/thread' => 'ThreadsController',
                        // '/attack' => 'AttacksController',
                    ]);
});
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

