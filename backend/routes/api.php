<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(EmpresasController::class)->group(function(){
    Route::get('/company', 'index');
    Route::get('/company/search/{search_param}', 'search');
    Route::get('/company/show/{id}', 'show');
    Route::post('/company/store', 'store');
    Route::put('/company/update/{id}', 'update');
    Route::delete('/company/destroy/{id}', 'destroy');
});

Route::controller(ClientesController::class)->group(function(){
    Route::get('/client', 'index');
    Route::get('/client/search/{search_param}', 'search');
    Route::get('/client/show/{id}', 'show');
    Route::post('/client/store', 'store');
    Route::put('/client/update/{id}', 'update');
    Route::delete('/client/destroy/{id}', 'destroy');
});