<?php

use App\Http\Controllers\Api\v1\Apiv1Controller;
use App\Http\Controllers\Api\v2\Apiv2Controller;
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
Route::get('/v1/', [Apiv1Controller::class, 'index']);
Route::get('/v2/', [Apiv2Controller::class, 'index']);


Route::controller(\App\Http\Controllers\Api\v1\AuthController::class)->group(function (){
    Route::post('/v1/register/', 'register');
    Route::post('/v1/login/', 'login');
    Route::get('/v1/users/', 'index');
});
//Route::middleware('auth:sanctum')->group(function() {
//    Route::get('/v1/users', [\App\Http\Controllers\Api\v1\AuthController::class,'index'])->name('index');
//});

