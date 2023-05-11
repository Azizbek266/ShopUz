<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    //DASHBOARD Route
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // CATEGORY Routes
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('category', [CategoryController::class, 'store']);
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{category}/update', [CategoryController::class, 'update']);
    Route::any('category/{category}/delete', [CategoryController::class, 'delete']);


    //Product Routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{product}/update', [ProductController::class, 'update']);
    Route::get('/products/{product_id}/delete', [ProductController::class, 'destroy']); 

    //Delete image
    Route::get('/product-image/{product_image_id}/delete',  [ProductController::class, 'destroyImage']);

    // Brand Routes
    Route::get('/brands', [BrandController::class, 'index']);
    Route::get('/brands/create', [BrandController::class, 'create']);
    Route::post('/brands', [BrandController::class, 'store']);
    Route::get('/brands/{dat}/edit', [BrandController::class, 'edit']);
    Route::post('/brands/{dat}/update', [BrandController::class, 'update']);
    Route::any('brands/{dat}/delete', [BrandController::class, 'delete']);

    //Color Routes
    Route::get('/colors', [ColorController::class, 'index']);
    Route::get('/colors/create', [ColorController::class, 'create']);
    Route::post('/colors', [ColorController::class, 'store']);
    Route::get('/colors/{color}/edit', [ColorController::class, 'edit']);
    Route::put('/colors/{color_id}/update', [ColorController::class, 'update']);
    Route::get('/colors/{color_id}/delete', [ColorController::class, 'destroy']); 
});
