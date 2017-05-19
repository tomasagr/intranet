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
	return redirect('/home');
});


Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index');
	Route::get('/profile', 'UsersController@profile');
	Route::get('/search', 'SearchController@search');
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
	Route::get('/forum', 'ForumController@index');
	Route::get('/forum/1', 'ForumController@show');
	Route::get('/topic/1', 'ForumController@topic');

	Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function() {
		Route::get('/', 'HomeController@panel');


		Route::get('users', ['as'=> 'panel.users.index', 'uses' => 'Panel\UserController@index']);
		Route::post('users', ['as'=> 'panel.users.store', 'uses' => 'Panel\UserController@store']);
		Route::get('users/create', ['as'=> 'panel.users.create', 'uses' => 'Panel\UserController@create']);
		Route::put('users/{users}', ['as'=> 'panel.users.update', 'uses' => 'Panel\UserController@update']);
		Route::patch('users/{users}', ['as'=> 'panel.users.update', 'uses' => 'Panel\UserController@update']);
		Route::delete('users/{users}', ['as'=> 'panel.users.destroy', 'uses' => 'Panel\UserController@destroy']);
		Route::get('users/{users}', ['as'=> 'panel.users.show', 'uses' => 'Panel\UserController@show']);
		Route::get('users/{users}/edit', ['as'=> 'panel.users.edit', 'uses' => 'Panel\UserController@edit']);
	});
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('panel/noticias', ['as'=> 'panel.noticias.index', 'uses' => 'Panel\NoticiasController@index']);
Route::post('panel/noticias', ['as'=> 'panel.noticias.store', 'uses' => 'Panel\NoticiasController@store']);
Route::get('panel/noticias/create', ['as'=> 'panel.noticias.create', 'uses' => 'Panel\NoticiasController@create']);
Route::put('panel/noticias/{noticias}', ['as'=> 'panel.noticias.update', 'uses' => 'Panel\NoticiasController@update']);
Route::patch('panel/noticias/{noticias}', ['as'=> 'panel.noticias.update', 'uses' => 'Panel\NoticiasController@update']);
Route::delete('panel/noticias/{noticias}', ['as'=> 'panel.noticias.destroy', 'uses' => 'Panel\NoticiasController@destroy']);
Route::get('panel/noticias/{noticias}', ['as'=> 'panel.noticias.show', 'uses' => 'Panel\NoticiasController@show']);
Route::get('panel/noticias/{noticias}/edit', ['as'=> 'panel.noticias.edit', 'uses' => 'Panel\NoticiasController@edit']);


Route::get('panel/contenidos', ['as'=> 'panel.contenidos.index', 'uses' => 'Panel\ContenidoController@index']);
Route::post('panel/contenidos', ['as'=> 'panel.contenidos.store', 'uses' => 'Panel\ContenidoController@store']);
Route::get('panel/contenidos/create', ['as'=> 'panel.contenidos.create', 'uses' => 'Panel\ContenidoController@create']);
Route::put('panel/contenidos/{contenidos}', ['as'=> 'panel.contenidos.update', 'uses' => 'Panel\ContenidoController@update']);
Route::patch('panel/contenidos/{contenidos}', ['as'=> 'panel.contenidos.update', 'uses' => 'Panel\ContenidoController@update']);
Route::delete('panel/contenidos/{contenidos}', ['as'=> 'panel.contenidos.destroy', 'uses' => 'Panel\ContenidoController@destroy']);
Route::get('panel/contenidos/{contenidos}', ['as'=> 'panel.contenidos.show', 'uses' => 'Panel\ContenidoController@show']);
Route::get('panel/contenidos/{contenidos}/edit', ['as'=> 'panel.contenidos.edit', 'uses' => 'Panel\ContenidoController@edit']);


Route::get('panel/rSES', ['as'=> 'panel.rSES.index', 'uses' => 'Panel\RSEController@index']);
Route::post('panel/rSES', ['as'=> 'panel.rSES.store', 'uses' => 'Panel\RSEController@store']);
Route::get('panel/rSES/create', ['as'=> 'panel.rSES.create', 'uses' => 'Panel\RSEController@create']);
Route::put('panel/rSES/{rSES}', ['as'=> 'panel.rSES.update', 'uses' => 'Panel\RSEController@update']);
Route::patch('panel/rSES/{rSES}', ['as'=> 'panel.rSES.update', 'uses' => 'Panel\RSEController@update']);
Route::delete('panel/rSES/{rSES}', ['as'=> 'panel.rSES.destroy', 'uses' => 'Panel\RSEController@destroy']);
Route::get('panel/rSES/{rSES}', ['as'=> 'panel.rSES.show', 'uses' => 'Panel\RSEController@show']);
Route::get('panel/rSES/{rSES}/edit', ['as'=> 'panel.rSES.edit', 'uses' => 'Panel\RSEController@edit']);


Route::get('panel/eventos', ['as'=> 'panel.eventos.index', 'uses' => 'Panel\EventosController@index']);
Route::post('panel/eventos', ['as'=> 'panel.eventos.store', 'uses' => 'Panel\EventosController@store']);
Route::get('panel/eventos/create', ['as'=> 'panel.eventos.create', 'uses' => 'Panel\EventosController@create']);
Route::put('panel/eventos/{eventos}', ['as'=> 'panel.eventos.update', 'uses' => 'Panel\EventosController@update']);
Route::patch('panel/eventos/{eventos}', ['as'=> 'panel.eventos.update', 'uses' => 'Panel\EventosController@update']);
Route::delete('panel/eventos/{eventos}', ['as'=> 'panel.eventos.destroy', 'uses' => 'Panel\EventosController@destroy']);
Route::get('panel/eventos/{eventos}', ['as'=> 'panel.eventos.show', 'uses' => 'Panel\EventosController@show']);
Route::get('panel/eventos/{eventos}/edit', ['as'=> 'panel.eventos.edit', 'uses' => 'Panel\EventosController@edit']);


Route::get('panel/vacaciones', ['as'=> 'panel.vacaciones.index', 'uses' => 'Panel\VacacionesController@index']);
Route::post('panel/vacaciones', ['as'=> 'panel.vacaciones.store', 'uses' => 'Panel\VacacionesController@store']);
Route::get('panel/vacaciones/create', ['as'=> 'panel.vacaciones.create', 'uses' => 'Panel\VacacionesController@create']);
Route::put('panel/vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.update', 'uses' => 'Panel\VacacionesController@update']);
Route::patch('panel/vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.update', 'uses' => 'Panel\VacacionesController@update']);
Route::delete('panel/vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.destroy', 'uses' => 'Panel\VacacionesController@destroy']);
Route::get('panel/vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.show', 'uses' => 'Panel\VacacionesController@show']);
Route::get('panel/vacaciones/{vacaciones}/edit', ['as'=> 'panel.vacaciones.edit', 'uses' => 'Panel\VacacionesController@edit']);


Route::get('panel/manuales', ['as'=> 'panel.manuales.index', 'uses' => 'Panel\ManualesController@index']);
Route::post('panel/manuales', ['as'=> 'panel.manuales.store', 'uses' => 'Panel\ManualesController@store']);
Route::get('panel/manuales/create', ['as'=> 'panel.manuales.create', 'uses' => 'Panel\ManualesController@create']);
Route::put('panel/manuales/{manuales}', ['as'=> 'panel.manuales.update', 'uses' => 'Panel\ManualesController@update']);
Route::patch('panel/manuales/{manuales}', ['as'=> 'panel.manuales.update', 'uses' => 'Panel\ManualesController@update']);
Route::delete('panel/manuales/{manuales}', ['as'=> 'panel.manuales.destroy', 'uses' => 'Panel\ManualesController@destroy']);
Route::get('panel/manuales/{manuales}', ['as'=> 'panel.manuales.show', 'uses' => 'Panel\ManualesController@show']);
Route::get('panel/manuales/{manuales}/edit', ['as'=> 'panel.manuales.edit', 'uses' => 'Panel\ManualesController@edit']);


Route::get('panel/videos', ['as'=> 'panel.videos.index', 'uses' => 'Panel\VideosController@index']);
Route::post('panel/videos', ['as'=> 'panel.videos.store', 'uses' => 'Panel\VideosController@store']);
Route::get('panel/videos/create', ['as'=> 'panel.videos.create', 'uses' => 'Panel\VideosController@create']);
Route::put('panel/videos/{videos}', ['as'=> 'panel.videos.update', 'uses' => 'Panel\VideosController@update']);
Route::patch('panel/videos/{videos}', ['as'=> 'panel.videos.update', 'uses' => 'Panel\VideosController@update']);
Route::delete('panel/videos/{videos}', ['as'=> 'panel.videos.destroy', 'uses' => 'Panel\VideosController@destroy']);
Route::get('panel/videos/{videos}', ['as'=> 'panel.videos.show', 'uses' => 'Panel\VideosController@show']);
Route::get('panel/videos/{videos}/edit', ['as'=> 'panel.videos.edit', 'uses' => 'Panel\VideosController@edit']);


Route::get('panel/informacions', ['as'=> 'panel.informacions.index', 'uses' => 'Panel\InformacionController@index']);
Route::post('panel/informacions', ['as'=> 'panel.informacions.store', 'uses' => 'Panel\InformacionController@store']);
Route::get('panel/informacions/create', ['as'=> 'panel.informacions.create', 'uses' => 'Panel\InformacionController@create']);
Route::put('panel/informacions/{informacions}', ['as'=> 'panel.informacions.update', 'uses' => 'Panel\InformacionController@update']);
Route::patch('panel/informacions/{informacions}', ['as'=> 'panel.informacions.update', 'uses' => 'Panel\InformacionController@update']);
Route::delete('panel/informacions/{informacions}', ['as'=> 'panel.informacions.destroy', 'uses' => 'Panel\InformacionController@destroy']);
Route::get('panel/informacions/{informacions}', ['as'=> 'panel.informacions.show', 'uses' => 'Panel\InformacionController@show']);
Route::get('panel/informacions/{informacions}/edit', ['as'=> 'panel.informacions.edit', 'uses' => 'Panel\InformacionController@edit']);


Route::get('panel/curiosidades', ['as'=> 'panel.curiosidades.index', 'uses' => 'Panel\CuriosidadesController@index']);
Route::post('panel/curiosidades', ['as'=> 'panel.curiosidades.store', 'uses' => 'Panel\CuriosidadesController@store']);
Route::get('panel/curiosidades/create', ['as'=> 'panel.curiosidades.create', 'uses' => 'Panel\CuriosidadesController@create']);
Route::put('panel/curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.update', 'uses' => 'Panel\CuriosidadesController@update']);
Route::patch('panel/curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.update', 'uses' => 'Panel\CuriosidadesController@update']);
Route::delete('panel/curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.destroy', 'uses' => 'Panel\CuriosidadesController@destroy']);
Route::get('panel/curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.show', 'uses' => 'Panel\CuriosidadesController@show']);
Route::get('panel/curiosidades/{curiosidades}/edit', ['as'=> 'panel.curiosidades.edit', 'uses' => 'Panel\CuriosidadesController@edit']);
