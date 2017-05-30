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
Route::get('/units', 'UnitsController@index');
Route::get('/sectors', 'SectorsController@index');

Route::get('/units/{id}/sectors', 'UnitSectorsController@show');

Route::post('/users', 'UsersController@register');
Route::get('/users', 'UsersController@index');
Route::get('/users/{id}', 'UsersController@show');
Route::post('/users/{id}/edit', 'UsersController@update');

Route::get('/news','NewsController@index');
Route::get('/news/search','NewsController@search');

Route::get('/manuals', 'ManualsController@getAll');

Route::get('/events', 'EventsApiController@index');
Route::get('/events/{date}', 'EventsApiController@show');

Route::get('videos', 'Panel\VideosController@getAll');
Route::get('informacion', 'Panel\InformacionController@getAll');
Route::get('curiosidades', 'Panel\CuriosidadesController@getAll');
