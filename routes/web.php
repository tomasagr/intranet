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
    return view('login.index');
});

Route::get('/profile', 'UsersController@profile');
Route::get('/search', 'SearchController@search');
Route::get('/login', 'LoginController@index');
Route::get('/register', 'RegisterController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about-us', 'AboutUsController@index');
Route::get('/manuals', 'ManualsController@index');
Route::get('/products', 'ProductssController@index');
Route::get('/jobs', 'JobsController@index');
Route::get('/jobs/{id}', 'JobsController@show');
Route::get('/solidaria', 'RSEController@solidaria');
Route::get('/regional', 'RSEController@regional');
Route::get('/begreen', 'RSEController@begreen');
Route::get('/diary', 'DiaryController@index');
Route::get('/informal', 'NewsController@informal');
Route::get('/institutional', 'NewsController@institutional');
Route::get('/informal/{id}', 'NewsController@show');
Route::get('/institutional/{id}', 'NewsController@show');
Route::get('/sector/{id}', 'NewsController@sector');
Route::get('/rincon-japones', 'RinconController@index');

