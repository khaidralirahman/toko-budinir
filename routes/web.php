<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index']);
Route::get('/detail-produk/{slug}', [MainController::class, 'detail'])->name('product.detail');
Route::get('/cari', [SearchController::class, 'product'])->name('product.search');
Route::get('/kategori/{category}', [SearchController::class, 'category'])->name('product.category');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/proses', [LoginController::class, 'authenticate'])->name('authenticate');

Route::group(['middleware' => ['auth', 'ceklevel:super_admin']], function () {
    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/product/form', [ProductController::class, 'create']);
    Route::post('/admin/product/form/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/form/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/product/form/update{id}', [ProductController::class, 'update'])->name('product.update');
    // Route::get('/admin/product/seacrh', [ProductController::class, 'search'])->name('product.search');
    Route::post('/admin/product/toggle-status/{id}', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus');
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('/admin/poster', [PosterController::class, 'index']);
    Route::get('/admin/poster/form', [PosterController::class, 'create']);
    Route::post('/admin/poster/form/store', [PosterController::class, 'store'])->name('poster.store');
    Route::get('/admin/poster/form/edit/{id}', [PosterController::class, 'edit'])->name('poster.edit');
    Route::put('/admin/poster/form/update{id}', [PosterController::class, 'update'])->name('poster.update');
    Route::post('/admin/poster/toggle-status/{id}', [PosterController::class, 'toggleStatus'])->name('poster.toggleStatus');
    Route::delete('/admin/poster/delete/{id}', [PosterController::class, 'destroy'])->name('poster.delete');

    Route::get('/cari-product', [SearchController::class, 'admin'])->name('admin.search');

    Route::get('/admin/categories', [CategoriesController::class, 'index']);
    Route::get('/admin/categories/form', [CategoriesController::class, 'create']);
    Route::post('/admin/categories/form/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');

    Route::get('/admin/label', [LabelController::class, 'index']);
    Route::get('/admin/label/form', [LabelController::class, 'create']);
    Route::post('/admin/label/form/store', [LabelController::class, 'store'])->name('label.store');
    Route::get('/admin/label/edit/{id}', [LabelController::class, 'edit'])->name('label.edit');
    Route::put('/admin/label/update/{id}', [LabelController::class, 'update'])->name('label.update');
    Route::delete('/admin/label/delete/{id}', [LabelController::class, 'destroy'])->name('label.delete');

    Route::get('/admin/poster', [PosterController::class, 'index']);
    Route::get('/admin/poster/form', [PosterController::class, 'create']);

    Route::get('/admin/logo', [LogoController::class, 'index']);
    Route::get('/admin/logo/form', [LogoController::class, 'create']);
    Route::post('/admin/logo/store', [LogoController::class, 'store'])->name('logo.store');
    Route::get('/admin/logo/edit/{id}', [LogoController::class, 'edit'])->name('logo.edit');
    Route::put('/admin/logo/update/{id}', [LogoController::class, 'update'])->name('logo.update');
    Route::delete('/admin/logo/delete/{id}', [LogoController::class, 'destroy'])->name('logo.delete');
});

