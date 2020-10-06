<?php
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// */

// $route = app('router');
// $route->view('/test', 'test');
// $route->view('/story', 'player.story');
// $route->view('/','welcome')->middleware('guest');
// $route->auth(['verify' => true]);
// $route->post('/checkemail', 'Auth\RegisterController@checkEmail')->name('checkemail');
// $route->view('/story','player.story');
// $route->view('/profile', 'player.profile');
// $route->view('/attack', 'player.attack');
// $route->view('/gang', 'player.gang');
// $route->view('/forum', 'player.forums.index');
// $route->get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider','[a-z]+')->name('provider');
// $route->get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider','[a-z]+')->name('provider.callback');
// // Route::view('/crime','player.crime')->middleware('auth');
// // Route::get('crime', 'CrimeController@index')->middleware('auth');

// // $route->group(
// //     ,
// $route->group(['middleware' => ['auth', 'verified']], function($route){
//         $route->resources([
//                         '/home' => 'HomeController',
//                         '/crime'=>'CrimeController',
//                         '/player' => 'PlayerController',
//                         '/profile' => 'UsersController',
//                         '/gang' => 'GangController',
//                         '/gym' => 'GymController',
//                         '/forums' => 'ForumsController',
//                         '/course' => 'CoursesController',
//                         '/forums/{forum}/thread' => 'ThreadsController',
//                         // '/market' => 'ShopsController',
//                         // '/inventory' => 'InventoryController',
//                         // '/attacks' => 'AttacksController',
//                     ]);
//         // $route->view('home', 'player.index')->name('home');
//         $route->get('sidebar', 'SidebarController@bars')->name('sidebar');
//         $route->get('job/{job}', 'JobController@join')->name('job');
//         $route->get('jobs/leave', 'JobController@leave')->name('job.leave');
//         $route->get('jobs/benefit', 'JobController@getJobBenefit')->name('job.benefit');
//         $route->get('inventory/trade/{item}', 'InventoryController@tradeItem')->name('inventory.trade');
//         $route->get('inventory/use/{item}', 'InventoryController@useItem')->name('inventory.use');
//         $route->get('attacks/{defender}', 'AttacksController@attack')->name('attacks');
//         $route->get('shops/{shop}', 'ShopsController@shopInventory')->name('shops');
//         $route->get('travel', 'TravelRoutesController@travelRoutes')->name('travel');
//         $route->get('starttravel/{travelroute}', 'UsersController@startTravel')->name('starttravel');
//         $route->get('endtravel/{travelroute}', 'UsersController@endTravel')->name('endtravel');
//         $route->get('realestatebuy/{realEstate}', 'RealEstateController@buy')->name('realestatebuy');
//         $route->get('realestateactive/{realEstate}', 'RealEstateController@activeRealEstate')->name('realestateactive');
//         $route->get('heal/{userId}', 'UsersController@heal')->name('heal');
//         $route->get('bust/{userDetails}', 'UsersController@bust')->name('bust');
//         $route->get('attack/{defender}', 'AttacksController')->name('attack')->middleware('checkStatus');
//         $route->get('attackstart/{defender}', 'AttacksController@attack')->name('attackstart')->middleware('checkStatus');

//         // $route->get('itemmarket', 'CityController@itemsMarket')->name('itemmarket');
// });
//     $route->group(['prefix' => 'staff', 'middleware' => ['auth:api']], function($route){
//         $route->resource('/','StaffsController');
//         $route->resources([
//                         '/roles'=>'RolesController',
//                         '/permissions' => 'PermissionsController',
//                         '/users'=>'UsersController',
//                         '/itemCategories'=>'ItemCategoriesController',
//                         '/items'=>'ItemsController',

//                     ]);
//     // Route::resource('/users','UsersController');
// });
//     $route->group(['middleware' => ['auth:api']], function($route){
//     // Route::resources([
//     //     // '/playeritems'=>'PlayerItemsController',
//     // ]);
// });

