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
	Route::get('/galerias/informacion', 'SliderController@info');
	Route::post('/galerias/informacion/{id}', 'SliderController@saveInfo');
	Route::post('/foro/{foro}/tema/{tema}/comentario', 'TemaComentarioController@store');
	Route::post('users/{id}/vote', 'UsersController@vote');
	Route::get('/home', 'HomeController@index');
	Route::get('/notification/{uid}/mark', 'HomeController@mark');
	Route::get('/profile', 'UsersController@profile');
	Route::get('/profile/{id}', 'ProfileController@show');
	Route::get('/search', 'SearchController@search');
	Route::get('/about-us', 'AboutUsController@index');
	Route::get('/manuals', 'ManualsController@index');
	Route::get('/products', 'ProductssController@index');
	Route::get('/products/{id}', 'ProductssController@show');
	Route::get('/jobs', 'JobsController@index');
	Route::get('/jobs/{id}', 'JobsController@show');
	Route::get('/jobs/{id}/apply', 'JobsController@apply');
	Route::get('/solidaria', 'RSEController@solidaria');
	Route::get('/regional', 'RSEController@regional');
	Route::get('/begreen', 'RSEController@begreen');
	Route::get('/diary', 'DiaryController@index');
	Route::get('/informal', 'NewsController@informal');
	Route::get('/institutional', 'NewsController@institutional');
	Route::get('/informal/{id}', 'NewsController@showInformal');
	Route::get('/institutional/{id}', 'NewsController@showInstitucional');
	Route::get('/individual/{id}', 'NewsController@show');
	Route::get('/sector/{id}', 'NewsController@sector');
	Route::get('/rincon-japones', 'RinconController@index');
	Route::get('/forum', 'ForumController@index');
	Route::get('/forum/create', 'ForumController@create');
	Route::get('/forum/{id}', 'ForumController@show');
	Route::get('/topic/{id}', 'ForumController@topic');
	Route::post('/topic', 'ForumController@store');
	Route::get('/topic/{id}/delete', 'ForumController@delete');
	Route::post('/topic/{id}/user', 'ForumController@addUser');
	Route::get('/comentario/{id}/delete', 'ForumController@deleteComent');


	Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'isAdminOrEditor']], function() {
		Route::get('/', 'HomeController@panel');

		Route::get('users/{id}/toggle', 'UsersController@toggleStatus');

		Route::get('users', ['as'=> 'panel.users.index', 'uses' => 'Panel\UserController@index']);
		Route::post('users', ['as'=> 'panel.users.store', 'uses' => 'Panel\UserController@store']);
		Route::get('users/create', ['as'=> 'panel.users.create', 'uses' => 'Panel\UserController@create']);
		Route::put('users/{users}', ['as'=> 'panel.users.update', 'uses' => 'Panel\UserController@update']);
		Route::patch('users/{users}', ['as'=> 'panel.users.update', 'uses' => 'Panel\UserController@update']);
		Route::delete('users/{users}', ['as'=> 'panel.users.destroy', 'uses' => 'Panel\UserController@destroy']);
		Route::get('users/{users}', ['as'=> 'panel.users.show', 'uses' => 'Panel\UserController@show']);
		Route::get('users/{users}/edit', ['as'=> 'panel.users.edit', 'uses' => 'Panel\UserController@edit']);

		Route::get('noticias', ['as'=> 'panel.noticias.index', 'uses' => 'Panel\NoticiasController@index']);
		Route::post('noticias', ['as'=> 'panel.noticias.store', 'uses' => 'Panel\NoticiasController@store']);
		Route::get('noticias/create', ['as'=> 'panel.noticias.create', 'uses' => 'Panel\NoticiasController@create']);
		Route::put('noticias/{noticias}', ['as'=> 'panel.noticias.update', 'uses' => 'Panel\NoticiasController@update']);
		Route::patch('noticias/{noticias}', ['as'=> 'panel.noticias.update', 'uses' => 'Panel\NoticiasController@update']);
		Route::delete('noticias/{noticias}', ['as'=> 'panel.noticias.destroy', 'uses' => 'Panel\NoticiasController@destroy']);
		Route::get('noticias/{noticias}', ['as'=> 'panel.noticias.show', 'uses' => 'Panel\NoticiasController@show']);
		Route::get('noticias/{noticias}/edit', ['as'=> 'panel.noticias.edit', 'uses' => 'Panel\NoticiasController@edit']);

		Route::get('productos', ['as'=> 'panel.productos.index', 'uses' => 'Panel\NoticiasController@indexProductos']);
		Route::post('productos', ['as'=> 'panel.productos.store', 'uses' => 'Panel\NoticiasController@store']);
		Route::get('productos/create', ['as'=> 'panel.productos.create', 'uses' => 'Panel\NoticiasController@create']);
		Route::put('productos/{productos}', ['as'=> 'panel.productos.update', 'uses' => 'Panel\NoticiasController@update']);
		Route::patch('productos/{productos}', ['as'=> 'panel.productos.update', 'uses' => 'Panel\NoticiasController@update']);
		Route::delete('productos/{productos}', ['as'=> 'panel.productos.destroy', 'uses' => 'Panel\NoticiasController@destroy']);
		Route::get('productos/{productos}', ['as'=> 'panel.productos.show', 'uses' => 'Panel\NoticiasController@show']);
		Route::get('productos/{productos}/edit', ['as'=> 'panel.productos.edit', 'uses' => 'Panel\NoticiasController@edit']);

		Route::get('productos/{id}/archivos', 'Panel\ArchivosProductosController@index');
		Route::get('productos/{id}/archivos/create', 'Panel\ArchivosProductosController@create');
		Route::get('productos/{id}/archivos/{archivo}/edit', 'Panel\ArchivosProductosController@edit');
		Route::post('productos/{id}/archivos', 'Panel\ArchivosProductosController@store');
		Route::patch('productos/{id}/archivos/{archivo}', 'Panel\ArchivosProductosController@update');
		Route::delete('productos/{id}/archivos/{archivo}', 'Panel\ArchivosProductosController@destroy');

		Route::get('productos/{id}/imagenes', 'Panel\ImagenesProductosController@index');
		Route::get('productos/{id}/imagenes/create', 'Panel\ImagenesProductosController@create');
		Route::get('productos/{id}/imagenes/{imagen}/edit', 'Panel\ImagenesProductosController@edit');
		Route::post('productos/{id}/imagenes', 'Panel\ImagenesProductosController@store');
		Route::patch('productos/{id}/imagenes/{imagen}', 'Panel\ImagenesProductosController@update');
		Route::delete('productos/{id}/imagenes/{imagen}', 'Panel\ImagenesProductosController@destroy');

		Route::get('contenidos', ['as'=> 'panel.contenidos.index', 'uses' => 'Panel\ContenidoController@index']);
		Route::post('contenidos', ['as'=> 'panel.contenidos.store', 'uses' => 'Panel\ContenidoController@store']);
		Route::get('contenidos/create', ['as'=> 'panel.contenidos.create', 'uses' => 'Panel\ContenidoController@create']);
		Route::put('contenidos/{contenidos}', ['as'=> 'panel.contenidos.update', 'uses' => 'Panel\ContenidoController@update']);
		Route::patch('contenidos/{contenidos}', ['as'=> 'panel.contenidos.update', 'uses' => 'Panel\ContenidoController@update']);
		Route::delete('contenidos/{contenidos}', ['as'=> 'panel.contenidos.destroy', 'uses' => 'Panel\ContenidoController@destroy']);
		Route::get('contenidos/{contenidos}', ['as'=> 'panel.contenidos.show', 'uses' => 'Panel\ContenidoController@show']);
		Route::get('contenidos/{contenidos}/edit', ['as'=> 'panel.contenidos.edit', 'uses' => 'Panel\ContenidoController@edit']);


		Route::get('rSES', ['as'=> 'panel.rSES.index', 'uses' => 'Panel\RSEController@index']);
		Route::post('rSES', ['as'=> 'panel.rSES.store', 'uses' => 'Panel\RSEController@store']);
		Route::get('rSES/create', ['as'=> 'panel.rSES.create', 'uses' => 'Panel\RSEController@create']);
		Route::put('rSES/{rSES}', ['as'=> 'panel.rSES.update', 'uses' => 'Panel\RSEController@update']);
		Route::patch('rSES/{rSES}', ['as'=> 'panel.rSES.update', 'uses' => 'Panel\RSEController@update']);
		Route::delete('rSES/{rSES}', ['as'=> 'panel.rSES.destroy', 'uses' => 'Panel\RSEController@destroy']);
		Route::get('rSES/{rSES}', ['as'=> 'panel.rSES.show', 'uses' => 'Panel\RSEController@show']);
		Route::get('rSES/{rSES}/edit', ['as'=> 'panel.rSES.edit', 'uses' => 'Panel\RSEController@edit']);
		Route::get('rSES/{id}/apply', 'Panel\RSEController@apply');


		Route::get('eventos', ['as'=> 'panel.eventos.index', 'uses' => 'Panel\EventosController@index']);
		Route::post('eventos', ['as'=> 'panel.eventos.store', 'uses' => 'Panel\EventosController@store']);
		Route::get('eventos/create', ['as'=> 'panel.eventos.create', 'uses' => 'Panel\EventosController@create']);
		Route::put('eventos/{eventos}', ['as'=> 'panel.eventos.update', 'uses' => 'Panel\EventosController@update']);
		Route::patch('eventos/{eventos}', ['as'=> 'panel.eventos.update', 'uses' => 'Panel\EventosController@update']);
		Route::delete('eventos/{eventos}', ['as'=> 'panel.eventos.destroy', 'uses' => 'Panel\EventosController@destroy']);
		Route::get('eventos/{eventos}', ['as'=> 'panel.eventos.show', 'uses' => 'Panel\EventosController@show']);
		Route::get('eventos/{eventos}/edit', ['as'=> 'panel.eventos.edit', 'uses' => 'Panel\EventosController@edit']);


		Route::get('vacaciones', ['as'=> 'panel.vacaciones.index', 'uses' => 'Panel\VacacionesController@index']);
		Route::post('vacaciones', ['as'=> 'panel.vacaciones.store', 'uses' => 'Panel\VacacionesController@store']);
		Route::get('vacaciones/create', ['as'=> 'panel.vacaciones.create', 'uses' => 'Panel\VacacionesController@create']);
		Route::put('vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.update', 'uses' => 'Panel\VacacionesController@update']);
		Route::patch('vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.update', 'uses' => 'Panel\VacacionesController@update']);
		Route::delete('vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.destroy', 'uses' => 'Panel\VacacionesController@destroy']);
		Route::get('vacaciones/{vacaciones}', ['as'=> 'panel.vacaciones.show', 'uses' => 'Panel\VacacionesController@show']);
		Route::get('vacaciones/{vacaciones}/edit', ['as'=> 'panel.vacaciones.edit', 'uses' => 'Panel\VacacionesController@edit']);


		Route::get('starmeup', ['as'=> 'panel.starmeup.index', 'uses' => 'Panel\StarmeupController@index']);
		Route::post('starmeup', ['as'=> 'panel.starmeup.store', 'uses' => 'Panel\StarmeupController@store']);
		Route::get('starmeup/create', ['as'=> 'panel.starmeup.create', 'uses' => 'Panel\StarmeupController@create']);
		Route::put('starmeup/{starmeup}', ['as'=> 'panel.starmeup.update', 'uses' => 'Panel\StarmeupController@update']);
		Route::patch('starmeup/{starmeup}', ['as'=> 'panel.starmeup.update', 'uses' => 'Panel\StarmeupController@update']);
		Route::delete('starmeup/{starmeup}', ['as'=> 'panel.starmeup.destroy', 'uses' => 'Panel\StarmeupController@destroy']);
		Route::get('starmeup/{starmeup}', ['as'=> 'panel.starmeup.show', 'uses' => 'Panel\StarmeupController@show']);
		Route::get('starmeup/{starmeup}/edit', ['as'=> 'panel.starmeup.edit', 'uses' => 'Panel\StarmeupController@edit']);

		Route::get('/votos/refresh', 'Panel\StarmeupController@refresh');
		Route::get('/users/{id}/star', 'Panel\StarmeupController@star');

		Route::get('manuales', ['as'=> 'panel.manuales.index', 'uses' => 'Panel\ManualesController@index']);
		Route::post('manuales', ['as'=> 'panel.manuales.store', 'uses' => 'Panel\ManualesController@store']);
		Route::get('manuales/create', ['as'=> 'panel.manuales.create', 'uses' => 'Panel\ManualesController@create']);
		Route::put('manuales/{manuales}', ['as'=> 'panel.manuales.update', 'uses' => 'Panel\ManualesController@update']);
		Route::patch('manuales/{manuales}', ['as'=> 'panel.manuales.update', 'uses' => 'Panel\ManualesController@update']);
		Route::delete('manuales/{manuales}', ['as'=> 'panel.manuales.destroy', 'uses' => 'Panel\ManualesController@destroy']);
		Route::get('manuales/{manuales}', ['as'=> 'panel.manuales.show', 'uses' => 'Panel\ManualesController@show']);
		Route::get('manuales/{manuales}/edit', ['as'=> 'panel.manuales.edit', 'uses' => 'Panel\ManualesController@edit']);

		Route::get('videos', ['as'=> 'panel.videos.index', 'uses' => 'Panel\VideosController@index']);
		Route::post('videos', ['as'=> 'panel.videos.store', 'uses' => 'Panel\VideosController@store']);
		Route::get('videos/create', ['as'=> 'panel.videos.create', 'uses' => 'Panel\VideosController@create']);
		Route::put('videos/{videos}', ['as'=> 'panel.videos.update', 'uses' => 'Panel\VideosController@update']);
		Route::patch('videos/{videos}', ['as'=> 'panel.videos.update', 'uses' => 'Panel\VideosController@update']);
		Route::delete('videos/{videos}', ['as'=> 'panel.videos.destroy', 'uses' => 'Panel\VideosController@destroy']);
		Route::get('videos/{videos}', ['as'=> 'panel.videos.show', 'uses' => 'Panel\VideosController@show']);
		Route::get('videos/{videos}/edit', ['as'=> 'panel.videos.edit', 'uses' => 'Panel\VideosController@edit']);

		Route::get('informacions', ['as'=> 'panel.informacions.index', 'uses' => 'Panel\InformacionController@index']);
		Route::post('informacions', ['as'=> 'panel.informacions.store', 'uses' => 'Panel\InformacionController@store']);
		Route::get('informacions/create', ['as'=> 'panel.informacions.create', 'uses' => 'Panel\InformacionController@create']);
		Route::put('informacions/{informacions}', ['as'=> 'panel.informacions.update', 'uses' => 'Panel\InformacionController@update']);
		Route::patch('informacions/{informacions}', ['as'=> 'panel.informacions.update', 'uses' => 'Panel\InformacionController@update']);
		Route::delete('informacions/{informacions}', ['as'=> 'panel.informacions.destroy', 'uses' => 'Panel\InformacionController@destroy']);
		Route::get('informacions/{informacions}', ['as'=> 'panel.informacions.show', 'uses' => 'Panel\InformacionController@show']);
		Route::get('informacions/{informacions}/edit', ['as'=> 'panel.informacions.edit', 'uses' => 'Panel\InformacionController@edit']);

		Route::get('curiosidades', ['as'=> 'panel.curiosidades.index', 'uses' => 'Panel\CuriosidadesController@index']);
		Route::post('curiosidades', ['as'=> 'panel.curiosidades.store', 'uses' => 'Panel\CuriosidadesController@store']);
		Route::get('curiosidades/create', ['as'=> 'panel.curiosidades.create', 'uses' => 'Panel\CuriosidadesController@create']);
		Route::put('curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.update', 'uses' => 'Panel\CuriosidadesController@update']);
		Route::patch('curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.update', 'uses' => 'Panel\CuriosidadesController@update']);
		Route::delete('curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.destroy', 'uses' => 'Panel\CuriosidadesController@destroy']);
		Route::get('curiosidades/{curiosidades}', ['as'=> 'panel.curiosidades.show', 'uses' => 'Panel\CuriosidadesController@show']);
		Route::get('curiosidades/{curiosidades}/edit', ['as'=> 'panel.curiosidades.edit', 'uses' => 'Panel\CuriosidadesController@edit']);

		Route::get('salas', ['as'=> 'panel.salas.index', 'uses' => 'SalasController@index']);
		Route::get('salas/{id}', ['as'=> 'panel.salas.show', 'uses' => 'SalasController@show']);
		Route::post('salas/{id}/franja', 'SalaFranjaController@store');

		Route::get('reservas', ['as'=> 'panel.reservas.index', 'uses' => 'ReservasController@index']);
		Route::get('franja/{id}/delete', 'FranjaController@delete');
	});
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');



Route::resource('foros', 'ForoController');

Route::get('panel/avisos', ['as'=> 'panel.avisos.index', 'uses' => 'Panel\AvisosController@index']);
Route::post('panel/avisos', ['as'=> 'panel.avisos.store', 'uses' => 'Panel\AvisosController@store']);
Route::get('panel/avisos/create', ['as'=> 'panel.avisos.create', 'uses' => 'Panel\AvisosController@create']);
Route::put('panel/avisos/{avisos}', ['as'=> 'panel.avisos.update', 'uses' => 'Panel\AvisosController@update']);
Route::patch('panel/avisos/{avisos}', ['as'=> 'panel.avisos.update', 'uses' => 'Panel\AvisosController@update']);
Route::delete('panel/avisos/{avisos}', ['as'=> 'panel.avisos.destroy', 'uses' => 'Panel\AvisosController@destroy']);
Route::get('panel/avisos/{avisos}', ['as'=> 'panel.avisos.show', 'uses' => 'Panel\AvisosController@show']);
Route::get('panel/avisos/{avisos}/edit', ['as'=> 'panel.avisos.edit', 'uses' => 'Panel\AvisosController@edit']);


Route::resource('sliders', 'SliderController');

Route::resource('sliders', 'SliderController');

Route::get('panel/productos', ['as'=> 'panel.productos.index', 'uses' => 'Panel\ProductosController@index']);
Route::post('panel/productos', ['as'=> 'panel.productos.store', 'uses' => 'Panel\ProductosController@store']);
Route::get('panel/productos/create', ['as'=> 'panel.productos.create', 'uses' => 'Panel\ProductosController@create']);
Route::put('panel/productos/{productos}', ['as'=> 'panel.productos.update', 'uses' => 'Panel\ProductosController@update']);
Route::patch('panel/productos/{productos}', ['as'=> 'panel.productos.update', 'uses' => 'Panel\ProductosController@update']);
Route::delete('panel/productos/{productos}', ['as'=> 'panel.productos.destroy', 'uses' => 'Panel\ProductosController@destroy']);
Route::get('panel/productos/{productos}', ['as'=> 'panel.productos.show', 'uses' => 'Panel\ProductosController@show']);
Route::get('panel/productos/{productos}/edit', ['as'=> 'panel.productos.edit', 'uses' => 'Panel\ProductosController@edit']);



Route::resource('sectores', 'SectoresController');

Route::resource('sectores', 'SectoresController');

Route::resource('sectores', 'SectoresController');