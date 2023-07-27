<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authlogin;
use App\Http\Controllers\{admins,CategoryController,SubcategoryController,SupplierController,QuantityController,ColorController,ProductController,users};
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
// ================================admin controller route===============================

Route::group(["middleware" => ['authlogin']], function () {
// ================================admin controller route===============================

    Route::controller(admins::class)->group(function(){
        Route::get("logout","logout");
    });
// ================================admin controller route===============================
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
Route::delete("remove/{id}",[ProductController::class,"remove"]);
});

// ================================admin controller route===============================

Route::controller(users::class)->group(function(){
    Route::get("/", "user");
    Route::get("about", "about");
    Route::get("blog", "blog");
    Route::get("cart", "cart");
    Route::get("cat", "cat");
    Route::get("checkout", "checkout");
    Route::get("contact", "contact");
    Route::get("dashboard", "dashboard");
    Route::get("forgot", "forgot");
    Route::get("userLogin", "login");
    Route::get("frontProduct/{id}", "frontProduct");
    Route::get("shop", "shop");
    Route::get("single", "single");
    Route::get("subcat", "subcat");
    Route::get("wishlist", "wishlist");
    Route::post("change", "change");
    Route::post("addcart", "addcart");
});
// ================================admin controller route===============================