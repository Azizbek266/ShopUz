<?php

use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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
Route::prefix('/admin')->middleware('auth','isAdmin')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    //DASHBOARD Route
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // CATEGORY Routes
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/category/create',[CategoryController::class,'create']);
    Route::post('category', [CategoryController::class,'store']);
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
    Route::post('/category/{category}/update', [CategoryController::class, 'update']);
    Route::any('category/{category}/delete', [CategoryController::class, 'delete']);

    Route::get('/products',[ProductController::class,'index']);
    Route::get('/products/create',[ProductController::class,'create']);

   

});