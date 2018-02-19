<?php

use Illuminate\Http\Request;

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

Route::get('galleries', 'GalleriesController@index');
Route::get('galleries/{id}', 'GalleriesController@show');
Route::post('galleries', 'GalleriesController@store');
Route::put('galleries/{id}', 'GalleriesController@update');
Route::delete('galleries/{id}', 'GalleriesController@destroy');
