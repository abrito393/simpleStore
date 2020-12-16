<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\UserController as Client;
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


Route::group(['prefix' => 'v1', 'namespace' => 'api\v1'], function () {
	Route::group(['prefix' => 'user'], function () {      
        Route::post('create', [UserController::class, 'create'])->name('user.create');
        Route::post('login', [UserController::class, 'login'])->name('user.login');
        Route::post('show', [UserController::class, 'show'])->name('user.show');
        Route::post('password/forgot', [UserController::class, 'create'])->name('password.forgot');
    });
    
    Route::group(['middleware' => 'auth:api','prefix' => 'user'], function () {      
        Route::post('show', [UserController::class, 'show'])->name('user.show');
    });


});

Route::group(['middleware' => 'auth:api','prefix' => 'client'], function () {      
    Route::post('direction/save', [Client::class, 'addressSave'])->name('address.save');
    Route::post('product/add', [Client::class, 'addProduct'])->name('product.add');
    Route::post('check/cart', [Client::class, 'checkCart'])->name('check.cart');
});

Route::group(['prefix' => 'cart'], function () {      
    Route::get('review/{id?}', [Client::class, 'reviewCart'])->name('cart.review');
});