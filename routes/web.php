<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\PrincipalController@index')->name('dashboard');



Route::group(['middleware' => ['auth']], function () {
Route::resources([
    'planteles' => 'App\Http\Controllers\PlantelesController',
    'docentes' => 'App\Http\Controllers\DocentesController',
    'materias' => 'App\Http\Controllers\MateriasController',
    'principal' => 'App\Http\Controllers\PrincipalController',
    'reportes' => 'App\Http\Controllers\ReportesController',

]);
    Route::get('/','App\Http\Controllers\PrincipalController@index')->name('/');

    Route::get('/consulta/materias/{areas}','App\Http\Controllers\MateriasController@consulta_areas')->name('consulta.areas');
    Route::post('/comentario','App\Http\Controllers\PrincipalController@comentarios')->name('comentarios');
});