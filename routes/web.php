<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontuserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\RecommendationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;




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

// Route::get('payement', function () {
//     return view('khalti');
// });


Route::get('/user/searchs', [FrontuserController::class, 'search'])->name('user.searchs');
Route::get('/user/orderedproduct', [OrderController::class, 'ordersearch'])->name('user.orderedproduct');



Route::get('/', [FrontuserController::class, 'home'])->name('home');

// route for userregister and login
Route::get('/userlogin', [FrontuserController::class, 'userlogin'])->name('userlogin');
Route::get('/user/userregister', [FrontuserController::class, 'userregister'])->name('user.userregister');
Route::post('/userregister', [FrontuserController::class, 'userstore'])->name('user.store');


// route for product store page
Route::get('/user/product', [FrontuserController::class, 'product'])->name('user.product');

// route for user profile
Route::get('/user/myprofile', [UserController::class, 'index'])->name('user.myprofile');
Route::get('/user/profileedit/{id}', [UserController::class, 'edit'])->name('user.profileedit');
Route::post('/user/profileedit/{id}/update', [UserController::class, 'update'])->name('user.profileedit.update');


// routes/web.php or routes/api.php


Route::get('/user/recommendation', [FrontuserController::class, 'recentlyAdded']);



//Route for userside


Route::get('/', [FrontuserController::class, 'index'])->name('user.index');
Route::get('/user/about', [FrontuserController::class, 'about'])->name('user.about');
Route::get('/user/recommendation', [FrontuserController::class, 'recommendation'])->name('user.recommendation');

Route::get('/user/viewproduct/{product}', [FrontuserController::class, 'viewproduct'])->name('user.viewproduct');

Route::get('/user/search', [FrontuserController::class, 'search'])->name('user.search');



Route::get('/user/khalti', [FrontuserController::class, 'khalti'])->name('user.khalti');

// Route::post('/user/khalti',function (Request $request){


// return response()->json($request);


// })->name('user.khalti.verify');

Route::post('/khalti', function (Request $request) {
    // Process the request

    // Define the response data
    $responseData = [
        'message' => 'Payment verification successful',
        'data' => $request->all()
    ];

    // Return the response
    return response()->json($responseData);
})->name('user.khalti.verify');





// route ror user contact
Route::get('/user/contact', [ContactController::class, 'contactpage'])->name('user.contact');

// route for cart
Route::middleware(['auth'])->group(function () {
    Route::get('/mycart', [CartController::class, 'mycart'])->name('user.mycart');
    Route::post('/mycart/store', [CartController::class, 'store'])->name('cart.store');
    // route for wishlist
    Route::get('/user/wishlist', [WishlistController::class, 'index'])->name('user.wishlist');
    Route::POST('/user/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/user/wishlist', [WishlistController::class, 'show'])->name('user.wishlist');
});


//route for cart deletion and order'
Route::middleware(['auth'])->group(function () {

    Route::get('/mycart/{id}/destroy', [FrontuserController::class, 'destroy'])->name('user.mycart.destroy');
    // route for user order store
    Route::post('/mycart/orderedproduct', [FrontuserController::class, 'orderedproduct'])->name('order.orderedproduct');
    // route for order display
    Route::get('/orderedproduct', [FrontuserController::class, 'ordertable'])->name('user.orderedproduct');
    // route for checkout
    Route::get('/checkout', [FrontuserController::class, 'checkout'])->name('user.checkout');
});



// route for new arrivals


// Route:: get('/newarrivals',[])
// // route foor viewing category

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

    Route::get('/registeruser', [RegisterUserController::class, 'index'])->name('registeruser.index');
    Route::get('/registeruser/{id}/details', [RegisterUserController::class, 'details'])->name('admin.registeruser.details');

    // Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    // Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    //  route for order
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');

    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::get('/order/{id}/details', [OrderController::class, 'details'])->name('admin.order.details');
    Route::post('/order/{id}/update', [OrderController::class, 'update'])->name('admin.order.update');
    Route::get('/order/status/{id}/{status}', [OrderController::class, 'status'])->name('admin.order.status');


    
});












Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
















require __DIR__ . '/auth.php';
