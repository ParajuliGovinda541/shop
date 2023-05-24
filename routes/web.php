<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;



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

Route::get('/adminindex', function () {
    return view('admin.index');
});

Route::get('index', function () {
    return view('user.index');
});

Route::get('/body',function(){
    return view('user.body');
});







// // route for category
// Route::get('/category', function () {
//     return view('admin.category.index');
// });

// Route::get('/category/create', function () {
//     return view('admin.category.create');
// });



Route::middleware('auth')->group(function () {


    

    // Route of category
    
    route::get('/category',[CategoryController::class,'index'])->name('admin.category.index');
    route::get('/category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/category',[CategoryController::class,'store'])->name('admin.category.store');
    route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
    route::post('/category/{id}/update',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('admin.category.destroy');
    
    // end of route category

        // Route of product
    
        route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
        route::get('/product/create',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('/product',[ProductController::class,'store'])->name('product.store');
        route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
        route::post('/product/{id}/update',[ProductController::class,'update'])->name('admin.product.update');
        Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->name('admin.product.destroy');
        
        // end of route product









});












Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
















require __DIR__.'/auth.php';
