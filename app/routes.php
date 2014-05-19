<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('user', 'UserController');
Route::controller('admin', 'AdminController');
Route::controller('orders', 'OrderController');
Route::controller('inventory', 'InventoryController');
Route::controller('traces', 'TracesController');
Route::controller('timeline', 'TimelineController');
Route::controller('sponsors', 'SponsorsController');

Route::any("/sirtrevorjs/upload", array("uses" => "SirTrevorJsController@upload"));

Route::get('order', 'HomeController@orderForm');
Route::post('orderWorker', 'HomeController@orderWorker');
Route::get('{route}', 'HomeController@site');
Route::get('', 'HomeController@site');