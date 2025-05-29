<?php
// use Illuminate\Support\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\BrandController;

// use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/shop', [ContactController::class, 'index'])->name('shop');




Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');

// *Categories
Route::middleware('auth')->prefix('/backend/categories')->name('category.')->controller(CategoriesController::class)
->group(function () {
  Route::get('/{id?}', 'index')->name('index');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store');
  Route::get('/delete/{id}', 'destroy')->name('destroy');
});
// *Brands
Route::middleware('auth')->prefix('/backend/brand')->name('brand.')->controller(BrandController::class)
->group(function () {
  Route::get('/{id?}', 'index')->name('index');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store');
  Route::get('/delete/{id}', 'destroy')->name('destroy');
});


// *PRODUCTS
Route::middleware('auth')->prefix('backend/products')->name('products.')->controller(ProductController::class)->group(function () {
  Route::get('/all-products', 'index')->name('index');
  Route::post('/show/{id?}', 'show')->name('show');
  Route::get('/create/{id?}', 'create')->name('create');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store');
  Route::get('/delete/{id}', 'delete')->name('delete');
  Route::get('/products/data',  'getData')->name('data');

  Route::post('/live-categories', 'liveCategory')->name('live.category');
  Route::post('/live-brand', 'liveBrand')->name('live.brand');

});



