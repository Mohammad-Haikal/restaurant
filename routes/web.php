<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\App;
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


// Locale
Route::get('/ar', function () {
    session()->put('lang', 'ar');
    return back();
});

Route::get('/en', function () {
    session()->put('lang', 'en');
    return back();
});




Route::get('/', function () {
    App::setLocale(session()->get('lang', 'en'));
    return view('index', [
        'categories' => Category::all()
    ]);
});


Route::get('/about', function () {
    App::setLocale(session()->get('lang', 'en'));
    return view('about');
});

Route::get('/menu', function () {
    App::setLocale(session()->get('lang', 'en'));
    return view('menu', [
        'categories' => Category::all(),
    ]);
});


// Category
Route::get('/category/{category}', [CategoryController::class, 'show']);

Route::post('/addCategory', [CategoryController::class, 'store'])->middleware('admin');
Route::get('/editCategory/{category}', [CategoryController::class, 'edit'])->middleware('admin');
Route::put('/updateCategory/{category}', [CategoryController::class, 'update'])->middleware('admin');
Route::delete('/deleteCategory/{category}', [CategoryController::class, 'destroy'])->middleware('admin');


// Item
Route::get('/search', [ItemController::class, 'search']);
Route::get('/item/{item}', [ItemController::class, 'show']);
Route::get('/checkout', [ItemController::class, 'checkout'])->middleware('auth');


Route::post('/addItem', [ItemController::class, 'store'])->middleware('admin');
Route::get('/editItem/{item}', [ItemController::class, 'edit'])->middleware('admin');
Route::put('/updateItem/{item}', [ItemController::class, 'update'])->middleware('admin');
Route::delete('/deleteItem/{item}', [ItemController::class, 'destroy'])->middleware('admin');


// Cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/addToCart/{item}', [CartController::class, 'addToCart']);
Route::put('/updateCart/{item}', [CartController::class, 'updateCart']);
Route::delete('/deleteFromCart/{item}', [CartController::class, 'deleteFromCart']);


// User
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/auth', [UserController::class, 'authanticate']);
Route::get('/settings', [UserController::class, 'show'])->middleware('auth');
Route::put('/updateInfo/{user}', [UserController::class, 'updateInfo'])->middleware('auth');
Route::put('/updatePassword/{user}', [UserController::class, 'updatePassword'])->middleware('auth');


// Order
Route::get('/orderHistory', [OrderController::class, 'index'])->middleware('auth');
Route::post('/setOrder', [OrderController::class, 'store'])->middleware('auth');
Route::get('/order/{order}', [OrderController::class, 'show'])->middleware('auth');

Route::post('/confirmOrder/{order}', [OrderController::class, 'confirm'])->middleware('admin');
Route::post('/denyOrder/{order}', [OrderController::class, 'deny'])->middleware('admin');
Route::delete('/deleteOrder/{order}', [OrderController::class, 'destroy'])->middleware('admin');



// Admin Dashboard
Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
    Route::get('/orders', [DashboardController::class, 'orders'])->middleware('admin');
    Route::get('/items', [DashboardController::class, 'items'])->middleware('admin');
    Route::get('/categories', [DashboardController::class, 'categories'])->middleware('admin');
    Route::get('/customers', [DashboardController::class, 'customers'])->middleware('admin');
    Route::get('/promos', [DashboardController::class, 'promos'])->middleware('admin');
});




// Api
Route::prefix('/api')->group(function () {
    Route::get('/items', [ApiController::class, 'items'])->middleware('admin');
    Route::get('/orders', [ApiController::class, 'orders'])->middleware('admin');
    Route::get('/orderItems', [ApiController::class, 'orderItems'])->middleware('admin');
});


// Laravel Excel
// Route::get('users/export/', [UserController::class, 'export']);


// Drive
// Route::get('test', function () {
    // dd(Storage::disk('google')->put('story.jpg', File::get("imgs/story.jpg")));
    // dd(Storage::disk('google')->put('laravel.docx', 'Hello Laravel'));

    // $excelFile = Storage::disk('google')->get("1-40NCdbUIjlTsULmV4ZUvn3mLHOLlD3b");
    // File::put('tareq.xlsx', $excelFile);
// });


// Socialite - Google
Route::get('/redirect', [UserController::class, 'redirectToGoogle']);
Route::get('/callback', [UserController::class, 'handleGoogleCallback']);
