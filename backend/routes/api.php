<?php

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
    Route::post('/company/store', 'store');
    Route::put('/company/update/{id}', 'update');
    Route::patch('/company/update/{id}', 'update');
    Route::delete('/company/update/{id}', 'destroy');
});