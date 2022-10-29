<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\CheckoutController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('login', [AuthController::class, 'createLogin']);
Route::post('login-account', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'createRegister']);
Route::post('register-account', [AuthController::class, 'register']);

Route::get('/', [HomeController::class, 'index']);

Route::get('category_products', [CategoryController::class, 'index']);
Route::get('category/{slug}', [CategoryController::class, 'render']);

Route::get('single-product/{slug}', [ProductController::class, 'show']);

Route::get('cart', [CartController::class, 'index']);
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('add-to-cart-single-prod/{id}', [CartController::class, 'singleProdAddToCart'])->name('add.to.cart.single.prod');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'removeCart']) ;
Route::get('continue-shopping', [CartController::class, 'shop']);

Route::get('wishlist', [WishlistController::class, 'index']);
Route::get('add-to-wishlist/{id}', [WishlistController::class, 'add']);
Route::delete('remove-wishlist', [WishlistController::class, 'remove']);

Route::get('checkout', [CheckoutController::class, 'index']);


//admin
Route::group(['namespace' => 'admin'], function () {
    Route::get('admin/category', [AdminCategoryController::class, 'categoryIndex']);
    Route::post('admin/add-cat', [AdminCategoryController::class, 'addCat']);
    Route::get('admin/edit_category/{slug}', [AdminCategoryController::class, 'editCat']);
    Route::put('admin/update_category/{id}', [AdminCategoryController::class, 'updateCat']);
    Route::get('admin/delete-cat/{id}', [AdminCategoryController::class, 'deleteCat']);

    Route::get('admin/sub_category', [AdminCategoryController::class, 'subCategoryIndex']);
    Route::post('admin/add-sub-cat', [AdminCategoryController::class, 'addSubCat']); 
    Route::get('admin/edit_subcategory/{slug}', [AdminCategoryController::class, 'editSubCat']);
    Route::put('admin/update_sub_category/{id}', [AdminCategoryController::class, 'updateSubCat']);

    Route::get('admin/add_product', [AdminProductController::class, 'adminIndex']);
    Route::get('admin/add_product_attribute', [AdminProductController::class, 'addAttr']);
    Route::get('admin/product_list', [AdminProductController::class, 'listProd']);
    
    Route::get('admin/delete-sub-cat/{id}', [AdminCategoryController::class, 'deleteSubCat']);
    Route::get('admin/delete-prod/{id}', [AdminProductController::class, 'deleteProd']);

    

    Route::post('admin/add-prod', [AdminProductController::class, 'addProd']);
    Route::post('admin/add-prod-attr', [AdminProductController::class, 'addProdAttr']);
    Route::get('admin/edit_product/{slug}', [AdminProductController::class, 'editProd']);
    Route::put('admin/update_product/{id}', [AdminProductController::class, 'updateProd']);
});