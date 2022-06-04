<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('auth.login-show');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::view('/', 'cms.parent')->name('admin.home');
    /// category route //////////////////////
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    ///////////////////// subcategory route /////////////
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/subcategories/create', [SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/subcategories/store', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::put('/subcategories/{subcategory}/edit', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/subcategories/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.delete');

    ////////////producrs routes /////////////////
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');



    ///////////////contact route
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    //////////// USER Profile//////////////
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('edit-profile', [AuthController::class, 'editPassword'])->name('auth.edit-profile');
    Route::put('update-password', [AuthController::class, 'updatePassword'])->name('auth.update-profile');

    //////////////////// Social media Routes /////////
    Route::get('social-create', [SocialController::class, 'create'])->name('social-create');
    Route::post('social-create', [SocialController::class, 'store'])->name('social-store');
    Route::get('social', [SocialController::class, 'index'])->name('social-index');







});


Route::get('/', [FrontController::class, 'index']);
Route::post('/contact-us', [FrontController::class, 'contact'])->name('contact-us.store');
Route::get('/contact-us', [FrontController::class, 'contactUs'])->name('contact.page');
Route::get('/about-us', [FrontController::class, 'about'])->name('about.page');
