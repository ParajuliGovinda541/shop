<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontuserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider and all of them will    
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });





//Route for userside


Route::get('/',[FrontuserController::class,'index'])->name('user.index');
Route::get('/user/about',[FrontuserController::class,'about'])->name('user.about');



Route::middleware('auth')->group(function () {
    // Route of category
    
    Route::get('/category',[CategoryController::class,'index'])->name('admin.category.index');
    Route::get('/category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('/category',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('admin.category.destroy');
    
   
    // end of Route category

        // Route of product
    
        Route::get('/product',[ProductController::class,'index'])->name('admin.product.index');
        Route::get('/product/create',[ProductController::class,'create'])->name('admin.product.create');
        Route::post('/product',[ProductController::class,'store'])->name('product.store');
        Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('/product/{id}/update',[ProductController::class,'update'])->name('admin.product.update');
        Route::get('/product/{id}/destroy',[ProductController::class,'destroy'])->name('admin.product.destroy');
        
        // end of Route product









});












Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
















require __DIR__.'/auth.php';
