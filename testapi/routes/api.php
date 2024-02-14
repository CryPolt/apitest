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
Route::post('/v1/createusers', [Apiv1Controller::class, 'createusers']);
Route::get('/v1/users', [Apiv1Controller::class, 'users']);
Route::get('/v2/', [Apiv2Controller::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
