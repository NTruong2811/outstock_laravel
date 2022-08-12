<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\products;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->name('client.')->group(function () {
   Route::get('', [HomeController::class, 'index'])->name('home');

   Route::prefix('/san-pham')->group(function () {
      Route::get('/', [ShopController::class, 'index'])->name('shop');
      Route::get('/search', [ShopController::class, 'search'])->name('shop_search');
      Route::get('/filter', [ShopController::class, 'filter'])->name('shop_filter');
      Route::get('/{id}', [ShopController::class, 'product_detail'])->name('product_detail');
      Route::post('/comments',[ShopController::class,'PostComment'])->name('PostComment');
   });
   Route::prefix('/cart')->name('cart.')->group(function(){
      Route::get('/', [CartController::class, 'index'])->name('index');
      Route::get('/add_to_cart/{id}',[CartController::class,'add_to_cart'])->name('add_to_cart');
      Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('delete'); 
   });
   
   Route::prefix('/order')->name('order.')->group(function(){
      Route::get('/', [OrderController::class,'index'])->name('order');
      Route::post('/confirm_order',[OrderController::class,'cf_order'])->name('cf_order');
      Route::get('/manage_order', [OrderController::class,'manage_order'])->name('manage_order');
      Route::put('/changestatus/{id}', [OrderController::class, 'changeStatusUser'])->name('changeStatusUser');
      });
});

Route::middleware('checkadmin')->prefix('/admin')->group(function(){
   Route::prefix('/products')->name('product.')->group(function () {
      Route::get('/', [ProductsController::class, 'index'])->name('list');
      Route::get('/create', [ProductsController::class, 'create'])->name('create');
      Route::post('/store', [ProductsController::class, 'store'])->name('store');
      Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
      Route::put('/update/{id}', [ProductsController::class, 'update'])->name('update');
      Route::delete('delete/{id}', [ProductsController::class, 'destroy'])->name('delete');
      Route::put('changestatus/{id}', [ProductsController::class, 'changeStatus'])->name('changestatus');
      Route::get('search', [ProductsController::class, 'search'])->name('search');
   });
   Route::prefix('/categories')->name('categories.')->group(function () {
      Route::get('/', [CategoriesController::class, 'index'])->name('list');
      Route::get('/create', [CategoriesController::class, 'create'])->name('create');
      Route::post('/store', [CategoriesController::class, 'store'])->name('store');
      Route::delete('delete/{id}', [CategoriesController::class, 'destroy'])->name('delete');
   });
   Route::prefix('/users')->name('user.')->group(function(){
      Route::get('/', [UserController::class, 'index'])->name('list');
      Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
      Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
      Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
   });
      Route::prefix('/order')->name('order.')->group(function(){
      Route::get('/', [OrderController::class, 'manage'])->name('manage');
      Route::put('/changestatus/{id}', [OrderController::class, 'changeStatus'])->name('change');
   });
});


Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {
   Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
   Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
   Route::post('/register', [AuthController::class, 'register'])->name('register');
   Route::post(('/login'), [AuthController::class, 'login'])->name('login');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
