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


Route::get('office/affections', 'AffectionAPIController@index');
Route::post('office/affections', 'AffectionAPIController@store');
Route::get('office/affections/{affections}', 'AffectionAPIController@show');
Route::put('office/affections/{affections}', 'AffectionAPIController@update');
Route::patch('office/affections/{affections}', 'AffectionAPIController@update');
Route::delete('office/affections/{affections}', 'AffectionAPIController@destroy');


Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');

Route::resource('affections', 'AffectionAPIController');