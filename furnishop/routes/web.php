<?php

use App\Http\Controllers\AdminCollectionColorController;
use App\Http\Controllers\AdminLookbookController;
use App\Http\Controllers\AdminSubcategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LookbookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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
Route::middleware("user.links")->group(function(){

    Route::get('/', [HomeController::class, "index"])->name("home");
    Route::get('/contact', [ContactController::class, "index"])->name("contact");
    Route::post('/contact/send', [ContactController::class, "sendMessage"])->name("contact.send");
    Route::get('/author', [BaseController::class, "author"])->name("author");

    Route::get('/shop', [ProductController::class, "index"])->name("shop");
    Route::get('/category/{category}', [ProductController::class, "index"])->name("category");
    Route::get('/product/{product}', [ProductController::class, "show"])->name("product");

    Route::get('/lookbook', [LookbookController::class, "index"])->name("lookbook");
    Route::get('/lookbook/{category}', [LookbookController::class, "index"])->name("lookbook.category");

    Route::get('/error/{code}', [ErrorController::class, "index"])->name("error");


    Route::middleware("is.guest")->group(function(){

        Route::get('/login', [LoginController::class, "index"])->name("login");
        Route::post('/login/auth', [LoginController::class, "auth"])->name("login.auth");
        Route::get('/register', [RegisterController::class, "index"])->name("register");
        Route::post('/register/store', [RegisterController::class, "store"])->name("register.store");

    });


    Route::middleware("is.user")->group(function(){


        Route::get("/logout",[LoginController::class, "logout"])->name("logout");

        Route::resource("cart", CartController::class);
    });


    Route::middleware("is.admin")->group(function (){

        Route::get("/admin", [AdminDashboardController::class, "index"])->name("admin");
        Route::put("/admin/change_featured_category", [AdminDashboardController::class, "changeFeaturedCategory"])->name("admin.change_cat");
        Route::get("/admin/log", [LogController::class, "index"])->name("admin.log");
        Route::resource("admin_product", AdminProductController::class);
        Route::resource("admin_user", AdminUserController::class);
        Route::resource("admin_subcategory", AdminSubcategoryController::class);
        Route::resource("admin_collection_color", AdminCollectionColorController::class);
        Route::resource("admin_lookbook", AdminLookbookController::class);





    });





});

