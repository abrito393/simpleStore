<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController as Client;
use App\Http\Controllers\PostController;
use App\Models\Products;
use App\Models\cart;
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

Route::get('/', function () {
    return view('welcome')->with('products',Products::paginate(10));
})->name('home');


Route::get('authentication', [UserController::class, 'viewAuthentication'])->name('form.login');
Route::get('register', [UserController::class, 'viewRegister'])->name('form.register');
Route::get('user/info', [UserController::class, 'viewUserInfo'])->name('user.info');

Route::group(['prefix' => 'admin'], function () {      
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('products', [AdminController::class, 'products'])->name('admin.products');
    
    Route::get('users/show/{id?}', [AdminController::class, 'userAdminShow'])->name('admin.user.show');
});

Route::group(['prefix' => 'admin'], function () {      
    Route::get('client/info', [AdminController::class, 'clientInfo'])->name('user.client.info');
});


Route::group(['prefix' => 'client'], function () {      
    Route::get('address/{id?}', [Client::class, 'address'])->name('client.address');
    Route::get('orders/{id?}', [Client::class, 'orders'])->name('client.orders');
    Route::get('data/{id?}', [Client::class, 'data'])->name('client.data');

    Route::get('direction/create', [Client::class, 'addressCreate'])->name('client.address.create');
    //Route::post('direction/save', [Client::class, 'addressSave'])->name('address.save');
    
});

Route::group(['prefix' => 'cart'], function () {      
    Route::get('pay/{id?}', [Client::class, 'carPay'])->name('cart.pay');
});

Route::group(['prefix' => 'posts'], function () {      
    Route::get('index', [PostController::class, 'posts'])->name('posts');
    Route::get('get/posts', [PostController::class, 'getPosts'])->name('posts.get');
    Route::get('show/posts', [PostController::class, 'showPosts'])->name('posts.show');
    
});
//posts



