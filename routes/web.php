<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAuthController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewController;
use  App\Http\Controllers\Admin\OrderController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(["middleware"=>["isLogged"]],function (){
    Route::get("/logout",[UserAuthController::class,"logout"]);

    Route::get('/',[UserAuthController::class,'dashboard']);


    Route::get('/services',[ServiceController::class,'services']);
    Route::get('/add_services',[ServiceController::class,'add_services']);
    Route::post('/save_services',[ServiceController::class,'save_services']);
    Route::get('/unpublished-service/{id}',[ServiceController::class,'unpublished_service'])->name('unpublished-service');
    Route::get('/published-service/{id}',[ServiceController::class,'published_service'])->name('published-service');
    Route::get('/service-edit/{id}',[ServiceController::class,'service_edit'])->name('service-edit');
    Route::post('/update_service',[ServiceController::class,'update_service']);
    Route::get('/delete-service/{id}',[ServiceController::class,'delete_service'])->name('delete-service');


    Route::get("reviews",[ReviewController::class,"review"]);
    Route::get("unpublished-review/{id}",[ReviewController::class,"unpublished"])->name('unpublished-review');
    Route::get("published-review/{id}",[ReviewController::class,"published"])->name('published-review');
    Route::get("delete-review/{id}",[ReviewController::class,"delete"])->name('delete-review');

    Route::get("orders",[OrderController::class,"index"]);
    Route::get("add_orders",[OrderController::class,"add"]);
    Route::post('save_orders',[OrderController::class,'save']);
    Route::post('data',[OrderController::class,'data']);

    Route::get("unpublished-orders/{id}",[OrderController::class,"unpublished"])->name('unpublished-orders');
    Route::get("published-orders/{id}",[OrderController::class,"published"])->name('published-orders');
    Route::get("delivery_status/{id}",[OrderController::class,"delivery_status"])->name('delivery_status');
    Route::post("publication_status_changed",[OrderController::class,"publication_status_changed"]);
    Route::get("delete-order/{id}",[OrderController::class,"delete"])->name('delete-order');



});


Route::group(["middleware"=>["isLoggedOut"]],function (){
    Route::get("/login",[UserAuthController::class,"login"]);
    Route::get("/registration",[UserAuthController::class,"registration"]);
    Route::get("/forgotPassword",[ForgotPasswordController::class,"forgotPassword"]);
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


});


Route::post("/register",[UserAuthController::class,"register"]);
Route::post("/check",[UserAuthController::class,"check"])->name("auth.create");


