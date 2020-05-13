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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Following not needed when working with Resource Controllers
// Route::get('categories/', 'CategoryController@index');
// Route::get('categories/{id}', 'CategoryController@show');
// Route::post('categories/', 'CategoryController@store');
// Route::delete('categories/{id}', 'CategoryController@destroy');
// Route::put('categories/{id}', 'CategoryController@update');

// Simplified version of the Resource Route
Route::resource('categories', 'CategoryController');
Route::resource('itemlists', 'ItemListController');
Route::resource('items', 'ItemController');
