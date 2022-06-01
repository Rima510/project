<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\BrokerPermissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use App\Models\Subcategory;
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


// //////////////////////Language Route //////////////////////////////
// Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('switch.language');


Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('login',[AuthController::class, 'showLogin'])->name('auth.login-show');
    Route::post('login',[AuthController::class, 'login'])->name('auth.login');

});
// Route::get('admin', function () {
//     return view('cms.categories.create');
// });
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('admins', AdminController::class);
    Route::resource('brokers', BrokerController::class);
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    ///////// Broker Direct  Permissions ///////////////////
    Route::get('brokers/{id}/permissions', [BrokerPermissionController::class,'edit'])->name('broker-permissions.edit');
    Route::put('brokers/{id}/permissions', [BrokerPermissionController::class,'update'])->name('broker-permissions.update');
    /////  /// //   ****    User Dirct Permissions
    Route::get('users/{id}/permissions', [UserPermissionController::class,'edit'])->name('user-permissions.edit');
    Route::put('users/{id}/permissions', [UserPermissionController::class,'update'])->name('user-permissions.update');
    Route::put('roles/{role}/permission', [RolePermissionController::class,'update'])->name('role-permission.update');
});
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::view('/','cms.parent');
    // Route::resource('categories', CategoryController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

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
    Route::get('/products/{subcategory}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{subcategory}/edit', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');



    Route::post('/contact-us}', [FrontController::class, 'contact'])->name('contact-us.store');
    Route::get('/contacts}', [ContactController::class, 'index'])->name('contact.index');


    //////////// USER Profile//////////////
    Route::get('logout',[AuthController::class, 'logout'])->name('auth.logout');
    Route::get('edit-profile',[AuthController::class, 'editPassword'])->name('auth.edit-profile');
    Route::put('update-password',[AuthController::class, 'updatePassword'])->name('auth.update-profile');

});

Route::get('/', function () {
     return view('front.index');
  });
  Route::get('/about-us', function () {
    return view('front.about');
 })->name('about_us');
 Route::get('/contact-us', function () {
    return view('front.contact');
 })->name('contact_us');
