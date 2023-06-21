<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontuserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;

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


Route::get('/', [FrontuserController::class, 'home'])->name('home');


// route for userregister and login
Route::get('/userlogin', [FrontuserController::class, 'userlogin'])->name('userlogin');
Route::get('/userregister', [FrontuserController::class, 'userregister'])->name('user.register');
Route::post('/userregister', [FrontuserController::class, 'userstore'])->name('user.store');


// route for product store page
Route::get('/user/product', [FrontuserController::class, 'product'])->name('user.product');


Route::get('/user/wishlist', [WishlistController::class, 'index'])->name('user.wishlist');
Route::get('/user/wishlist/{id}', [WishlistController::class, 'store'])->name('user.wishlist.store');





// route for user profile
Route::get('/user/myprofile', [UserController::class, 'index'])->name('user.myprofile');
Route::get('/user/profileedit/{id}', [UserController::class, 'edit'])->name('user.profileedit');
Route::post('/user/profileedit/{id}/update', [UserController::class, 'update'])->name('user.profileedit.update');



// Route::get('/user/profileedit', [UserController::class, 'update'])->name('user.profileedit');




//Route for userside


Route::get('/', [FrontuserController::class, 'index'])->name('user.index');

Route::get('/user/about', [FrontuserController::class, 'about'])->name('user.about');
Route::get('/user/viewproduct/{product}', [FrontuserController::class, 'viewproduct'])->name('user.viewproduct');

// route ror user contact
Route::get('/user/contact', [ContactController::class, 'contactpage'])->name('user.contact');

// route for cart
Route::middleware(['auth'])->group(function(){
    Route::get('/mycart',[CartController::class,'mycart'])->name('user.mycart');
    Route::post('/mycart/store',[CartController::class,'store'])->name('cart.store');


    

});


//route for cart deletion and order'
Route::middleware(['auth'])->group(function(){
    
    Route::get('/mycart/{id}/destroy', [FrontuserController::class,'destroy'])->name('user.mycart.destroy');
 // route for user order store
Route::post('/mycart/orderedproduct', [FrontuserController::class, 'orderedproduct'])->name('order.orderedproduct');
// route for order display
Route::get('/orderedproduct',[FrontuserController::class,'ordertable'])->name('user.orderedproduct');
// route for checkout
Route::get('/checkout',[FrontuserController::class,'checkout'])->name('user.checkout');


// route for wish list
 Route::get('/wishlist',[FrontuserController::class,'wishliststore'])->name('user.wishlist');
 
});






Route::get('/user/viewcategory/{id}', [FrontuserController::class, 'viewcategory'])->name('user.viewcategory');




// route for admin side

Route::middleware('auth')->group(function () {
    // Route of category

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/{id}/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');


    // end of Route category

    // Route of product

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    // end of Route product

    //route for contact admin

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});












Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
















require __DIR__ . '/auth.php';
