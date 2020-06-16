<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
$route = app('router');
$route->view('/story', 'player.story');
$route->view('/','welcome')->middleware('guest');
$route->auth(['verify' => true]);
$route->post('/checkemail', 'Auth\RegisterController@checkEmail')->name('checkemail');
$route->view('/story','player.story');
$route->view('/profile', 'player.profile');
$route->view('/attack', 'player.attack');
$route->view('/gang', 'player.gang');
$route->view('/forum', 'player.forums.index');
$route->view('/home','player.index')->middleware('auth');
// Route::view('/crime','player.crime')->middleware('auth');
// Route::get('crime', 'CrimeController@index')->middleware('auth');

// $route->group(
//     ['middleware' => ['auth', 'verified']],
$route->group(['middleware' => ['verified']], function($route){
        $route->resources([
                        '/crime'=>'CrimeController',
                        '/player' => 'PlayerController',
                        '/profile' => 'UsersController',
                        '/gang' => 'GangController',
                        '/gym' => 'GymController',
                        '/forums' => 'ForumsController',
                        '/course' => 'CoursesController',
                        '/forums/{forum}/thread' => 'ThreadsController',
                        // '/inventory' => 'InventoryController',
                        // '/attacks' => 'AttacksController',
                    ]);
        $route->get('job/{job}', 'JobController@join')->name('job');
        $route->get('jobs/leave', 'JobController@leave')->name('job.leave');
        $route->get('jobs/benefit', 'JobController@getJobBenefit')->name('job.benefit');
        $route->get('inventory/trade/{item}', 'InventoryController@tradeItem')->name('inventory.trade');
        $route->get('inventory/use/{item}', 'InventoryController@useItem')->name('inventory.use');
        $route->get('attacks/{defender}', 'AttacksController@attack')->name('attacks');
});
    $route->group(['prefix' => 'staff', 'middleware' => ['auth']], function($route){
        $route->resource('/','StaffsController');
        $route->resources([
                        '/roles'=>'RolesController',
                        '/permissions' => 'PermissionsController',
                        '/users'=>'UsersController',
                        '/itemCategories'=>'ItemCategoriesController',
                        '/items'=>'ItemsController',

                    ]);
    // Route::resource('/users','UsersController');
});
    $route->group(['middleware' => ['auth']], function($route){
    Route::resources([
        '/playeritems'=>'PlayerItemsController',
    ]);
});

