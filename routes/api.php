<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas de los videos
Route::get('/videos', 'App\Http\Controllers\VideoController@index');//trae todos los videsos
Route::post('/videos', 'App\Http\Controllers\VideoController@store');//Guarda un video
Route::get('/videos/{video}', 'App\Http\Controllers\VideoController@show');//traer un video
Route::put('/videos/{videoId}', 'App\Http\Controllers\VideoController@update');//actualizar los datos de un video
Route::delete('/videos/{video}', 'App\Http\Controllers\VideoController@destroy');//borrar un video


//comentarios
Route::get('/comentarios', 'App\Http\Controllers\ComentarioController@index');//mostrar los comentarios del video
Route::post('/comentarios', 'App\Http\Controllers\ComentarioController@store');//crear un comentario
Route::put('/videos/{id}/comentarios/{idComentario}', 'App\Http\Controllers\ComentarioController@update');//actualizar un comentario
Route::delete('/videos/{id}/comentarios/{idComentario}', 'App\Http\Controllers\ComentarioController@destroy');//eliminar
