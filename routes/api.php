<?php

use App\Http\Controllers\advertisementController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\jobapplicationController;
use App\Models\companies;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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



route::post('register',[ApiController::class, 'register']);

route::apiResource('users','App\Http\Controllers\ApiController');
route::apiResource('companies','App\Http\Controllers\companieController');
route::apiResource('advertisements','App\Http\Controllers\advertisementController');
route::apiResource('jobapplication', 'App\Http\Controllers\jobapplicationController');
route::apiResource('People','App\Http\Controllers\PeopleController');
route::post('login','App\Http\Controllers\ApiController@login');
route::post('register','App\Http\Controllers\ApiController@Register');
route::post('advertisements','App\Http\Controllers\advertisementController@store');
route::delete('advertisements/{id}',[advertisementController::class,'destroy']);
route::get('advertisements',[advertisementController::class,'index']);
route::delete('jobapplication/{id}',[jobapplicationController::class,'index']);
route::get('jobapplication',[jobapplicationController::class,'store']);
route::post('jobapplication',[jobapplicationController::class,'store']);
route::post('users', [ApiController::class,'register']);