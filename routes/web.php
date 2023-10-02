<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authlogin;
use App\Http\Middleware\userauth;
use App\Http\Middleware\emailVerified;
use App\Http\Middleware\emailNotVerified;
use App\Http\Controllers\{admins,CategoryController,SubcategoryController,SupplierController,QuantityController,ColorController,ProductController,users,userController};
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
// ================================admin controller route===============================

Route::controller(admins::class)->group(function(){
    Route::get("login", "login");
    Route::post("admin", "admin");
});


Route::group(["middleware" => ['authlogin']], function () {


    Route::controller(admins::class)->group(function(){
        Route::get("logout","logout");
    });

// ================================recources controller route===============================
Route::resources([
    "/category"=>CategoryController::class,
    "/subcategory"=>SubcategoryController::class,
    "/supplier"=>SupplierController::class,
    "/quantity"=>QuantityController::class,
    "/color"=>ColorController::class,
    "/product"=>ProductController::class,
]);
// ================================recources controller route===============================
// ================================admin controller route===============================

Route::delete("remove/{id}",[ProductController::class,"remove"]);
});

// ================================user controller route===============================

Route::controller(users::class)->group(function(){
    Route::get("/", "user");
    Route::get("about", "about");
    Route::get("blog", "blog");
    Route::get("cat", "cat");
    Route::get("contact", "contact");
    Route::get("forgot", "forgot");
    Route::get("userLogin", "userLogin");
    Route::get("frontProduct/{id}", "frontProduct");
    Route::get("single", "single");
    Route::get("subcat", "subcat");
    Route::post("change", "change");
    Route::post("user", "login");
    Route::get("register", "registerView");
    Route::post("register", "register");
});

Route::group(["middleware" => ['userauth','emailNotVerified']], function () {
Route::get('must-verify', [Users::class, 'verifyEmail']);
Route::get('sendMail', [Users::class, 'sendMail']);
Route::get('verified', [Users::class, 'verified']);
Route::get('resend', [Users::class, 'resend']);
});

Route::group(["middleware" => ['userauth','emailVerified']], function () {
    Route::controller(users::class)->group(function(){
    Route::get("cart", "cart");
    Route::get("checkout", "checkout");
    Route::get("dashboard", "dashboard");
    Route::get("shop", "shop");
    Route::get("wishlist", "wishlist");
    Route::post("addcart", "addcart");
    Route::get("userLogout","userLogout");
    });
});
// ================================user controller route===============================