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

Route::post('usuario/insertar','UserController@insertar');
Route::post('foto/insertar','FotoController@insertar');
Route::get('foto/listar-por-usuario','FotoController@listarPorUsuario');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
