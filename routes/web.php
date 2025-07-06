<?php
use Stripe\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FacebookAuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerMessageController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use App\Http\Controllers\Backend\RoleAndPermissionController;
use App\Http\Controllers\SslCommerzPaymentController;

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


Route::get('/google/login',[CustomerLoginController::class,'googleLogin'])->name('google.login');
Route::get('/google/redirect',[CustomerLoginController::class,'googleRedirect'])->name('google.redirect');

Route::get('/facebook/login',[CustomerLoginController::class,'facebookLogin'])->name('facebook.login');
Route::get('/facebook/redirect',[CustomerLoginController::class,'facebookRedirect'])->name('facebook.redirect');

Route::get('/facebook/email-form', [FacebookAuthController::class, 'showEmailForm'])->name('customer.email.form');
Route::post('/facebook/submit-email', [FacebookAuthController::class, 'submitEmailForm'])->name('customer.email.submit');



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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/shop', [ShopController::class, 'index'])->name('category.archive');


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
  Route::get('/{id?}', 'index')->name('index')->middleware('can:show-category');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store')->middleware('can:create-category');
  Route::get('/delete/{id}', 'destroy')->name('destroy')->middleware('can:delete-category');
});

// *Brands
Route::middleware('auth')->prefix('/backend/brand')->name('brand.')->controller(BrandController::class)
->group(function () {
  Route::get('/{id?}', 'index')->name('index')->middleware('can:show-brand');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store')->middleware('can:create-brand');
  Route::get('/delete/{id}', 'destroy')->name('destroy')->middleware('can:delete-brand');
});

// *PRODUCTS
Route::middleware('auth')->prefix('backend/products')->name('products.')->controller(ProductController::class)->group(function () {
  Route::get('/all-products', 'index')->name('index')->middleware('can:show-product');
  Route::post('/show/{id?}', 'show')->name('show')->middleware('can:show-product');
  Route::get('/create/{id?}', 'create')->name('create');
  Route::post('/storeOrUpdate/{id?}', 'storeOrUpdate')->name('store')->middleware('can:show-product');
  Route::get('/delete/{id}', 'delete')->name('delete')->middleware('can:show-product');
  Route::get('/products/data',  'getData')->name('data');

  Route::post('/live-categories', 'liveCategory')->name('live.category');
  Route::post('/live-brand', 'liveBrand')->name('live.brand');

});

// *permission
Route::middleware('auth')->prefix('permission')->controller(RoleAndPermissionController::class)->group(function (){

Route::get('/permission/{id?}', 'permission')->name('permission.index');
Route::get('/show/{id?}', 'permission')->name('permission');
Route::post('/store/{id?}', 'permissionStore')->name('permission.store');
Route::get('/users/{id?}', 'users')->name('roleAndPermission.users')->middleware('can:users-manage');

Route::get('/role/{id?}',  'showRole')->name('roleAndPermission.role');
Route::post('/role/create/{id?}',  'storeOrUpdateRole')->name('role.store');

// permission create
Route::get('/permissions/create/{id?}', [RoleAndPermissionController::class, 'createPermission'])->name('permission.create');
    Route::post('/permissions/store', [RoleAndPermissionController::class, 'storePermissionNew'])->name('permission.store.new');

// assign role to user
Route::get('/assign-role/show/{id?}',  'assignRoleShow')->name('assignRole.user');
Route::post('/assign-role',  'storeAssignedRole')->name('assign.role.store');
Route::get('/role/{id?}/users',  'assignRoleShow')->name('role.assigned.users');

});



// *users
Route::middleware(['auth', 'can:users-manage'])->group(function () {
    
   // Create
Route::get('/admin/users/create', [UserRegisterController::class, 'createUser'])->name('create.user'); //first time user create
Route::get('/admin/users/update/{id?}', [UserRegisterController::class, 'createUser'])->name('update.user');


Route::post('/admin/users/update/{id?}', [UserRegisterController::class, 'storeOrUpdate'])->name('admin.users.storeOrUpdate');
Route::post('/live-user',[UserRegisterController::class, 'liveUser'])->name('live.user');

Route::get('/user/image/{filename}', function ($filename) {
    $path = storage_path('app/private/users/images/' . $filename);
    if (!file_exists($path)) { abort(404);}
    return response()->file($path);
})->name('user.image');

Route::get('/user/signature/{filename}', function ($filename) {
    $path = storage_path('app/private/users/signatures/' . $filename);
    if (!file_exists($path)) {abort(404);}
    return response()->file($path);
})->name('user.signature');

});


// stock
Route::get('/stock', [StockController::class, 'index'])->name('low.stock.index');




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
//     return view('welcome');
// });

// SSLCOMMERZ Start

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
