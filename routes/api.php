<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\OrderController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all_services',[ServiceController::class,'all_services']);


Route::post("customer_register",[CustomerController::class,'register']);
Route::post("customer_login",[CustomerController::class,'login']);

//Route protected by middleware
Route::group(["middleware"=>["auth:api"]],function (){

    Route::get("customer_profile/{id}",[CustomerController::class,'profile']);

    Route::post('review',[ReviewController::class,'create']);

    Route::get('show_review',[ReviewController::class,'show_review']);

    Route::post('orders',[OrderController::class,'create']);

    Route::get('all_orders',[OrderController::class,'all_orders']);
    Route::post('single_order',[OrderController::class,'single_order']);




    Route::post("customer_logout",[CustomerController::class,'logout']);


});

