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

Route::get('/home', 'HomeController@index');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');


Route::get('office/affections', ['as'=> 'office.affections.index', 'uses' => 'AffectionController@index']);
Route::post('office/affections', ['as'=> 'office.affections.store', 'uses' => 'AffectionController@store']);
Route::get('office/affections/create', ['as'=> 'office.affections.create', 'uses' => 'AffectionController@create']);
Route::put('office/affections/{affections}', ['as'=> 'office.affections.update', 'uses' => 'AffectionController@update']);
Route::patch('office/affections/{affections}', ['as'=> 'office.affections.update', 'uses' => 'AffectionController@update']);
Route::delete('office/affections/{affections}', ['as'=> 'office.affections.destroy', 'uses' => 'AffectionController@destroy']);
Route::get('office/affections/{affections}', ['as'=> 'office.affections.show', 'uses' => 'AffectionController@show']);
Route::get('office/affections/{affections}/edit', ['as'=> 'office.affections.edit', 'uses' => 'AffectionController@edit']);


Route::resource('affections', 'AffectionController');

Route::resource('affections', 'AffectionController');

Route::resource('affections', 'AffectionController');

Route::resource('affections', 'AffectionController');

Route::resource('affections', 'AffectionController');

Route::resource('affections', 'AffectionController');