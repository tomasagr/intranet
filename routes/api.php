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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('auth', 'App\Http\Controllers\AuthController@auth');

    $api->group(['middleware' => 'jwt.auth'], function ($api) {
        // AUTH ROUTES
        $api->get('me', 'App\Http\Controllers\AuthController@me');
    });
});
