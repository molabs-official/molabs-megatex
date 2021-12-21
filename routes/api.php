<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\CareerController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@SignUp');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
//  Category Routes
    Route::apiResource('/category', \App\Http\Controllers\admin\CategoryController::class);
    Route::get('/get/category/list','App\Http\Controllers\admin\CategoryController@getCategoryList');
//  Product Routes
    Route::apiResource('product' , \App\Http\Controllers\admin\ProductController::class);

    Route::post('stripe/payment','App\Http\Controllers\user\PaymentController@stripePayment');
    Route::get('get/stripe/key','App\Http\Controllers\user\PaymentController@getStripeKey');

    //check type route
    Route::get('/check/type','App\Http\Controllers\AuthController@checkType');
});
Route::post('/contact/email','App\Http\Controllers\user\ContactController@Contact')->name('contact.email');
Route::get('/get/product/list','App\Http\Controllers\admin\ProductController@getProductList');
Route::get('/product/details/{id?}','App\Http\Controllers\admin\ProductController@getProductDetail');
Route::get('/products/list/{id?}','App\Http\Controllers\admin\ProductController@getProductsList');
Route::post('/category/list','App\Http\Controllers\admin\ProductController@getProductCategoryList');
// Career Routes
Route::apiResource('/careers' , CareerController::class);
