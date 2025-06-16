<?php
// use Illuminate\Support\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\CustomerMessageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');



// customer route
Route::get('my-profile/{id?}',[CustomerProfileController::class,'index'])->name('frontend.userDashboard')->middleware('auth:customer');
Route::get('sign-in',[CustomerLoginController::class,'showLoginForm'])->name('customer.login');
Route::post('sign-in',[CustomerLoginController::class,'login'])->name('customer.login.req');
Route::get('sign-up',[CustomerRegisterController::class,'showRegistrationForm'])->name('customer.register');
Route::post('sign-up',[CustomerRegisterController::class,'register'])->name('customer.register.req');

Route::post('/customer/logout', [CustomerProfileController::class, 'logout'])->name('customer.logout');




// *stripe payment 
Route::post('/stripe-store', [StripeController::class, 'store'])->name('stripe.store');




// * Add Cart  Controller
Route::get('/add-to-cart/{id}',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/shopping-cart/{id?}',[CartController::class,'index'])->name('cart');
Route::get('/cart-summery',[CartController::class,'summery'])->name('cart.summery');
Route::delete('/remove-from-cart/{id}',[CartController::class,'removeFromCart'])->name('cart.removeFromCart');
Route::get('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');


// * Frontend Home Controller
Route::name('frontend.')->controller(HomeController::class)->group(function () {
Route::get('/category/{slug}', 'getCategoryProducts')->name('categories.products');
Route::get('/product/{slug}', 'getSingleProducts')->name('single_product');
Route::get('/product', 'getSingleProducts')->name('singleProducts');
Route::get('/live-search', 'searchProducts')->name('live_search');
Route::get('/search', 'search')->name('search');
});

Route::middleware('auth')->prefix('/backend/customer-message')->name('customerMessage.')->controller(CustomerMessageController::class)
->group(function () {
  Route::get('/{id?}', 'index')->name('index');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store');
  Route::get('/delete/{id}', 'destroy')->name('destroy');
});



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('category.archive');


// *Banners
Route::middleware('auth')->prefix('/backend/banner')->name('banner.')->controller(BannerController::class)
->group(function () {
  Route::get('/{id?}', 'index')->name('index');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store');
  Route::get('/delete/{id}', 'destroy')->name('destroy');
});

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



