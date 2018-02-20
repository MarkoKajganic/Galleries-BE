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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'Auth\LoginController@authenticate');
Route::post('/register', 'RegisterController@register');
//Route::post('/register', 'Auth\RegisterController@create');

Route::middleware('jwt')->get('/galleries', 'GalleriesController@index');
Route::middleware('jwt')->get('/galleries/{id}', 'GalleriesController@show');
Route::middleware('jwt')->post('/galleries', 'GalleriesController@store');
Route::middleware('jwt')->put('/galleries/{id}', 'GalleriesController@update');
Route::middleware('jwt')->delete('/galleries/{id}', 'GalleriesController@destroy');
