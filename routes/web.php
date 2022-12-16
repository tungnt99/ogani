<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/', 'IndexController@index')->name('home.index');
// Route::get('/category/{cate_id}/{prod_id}', 'IndexController@productview')->name('productview');
Route::get('/product_details/{id}', 'IndexController@productview')-> name('productview');
Route::get('/category/{id}', 'IndexController@viewcategory')->name('home.viewcategory');
Route::get('/shop', 'IndexController@shop')->name('home.shop');

Route::get('/checkout', 'IndexController@checkout')->name('home.checkout');


Route::get('/blog', 'IndexController@blog')->name('home.blog');

Route::get('/blog-detail/{id?}', 'IndexController@blogdetail')->name('home.blog-detail');

Route::get('/contact', 'IndexController@contact')->name('home.contact');

Route::get('/register', 'LoginController@register')->name('home.register');

Route::get('/account-user', 'IndexController@accountUser')->name('account-user');

Route::post('/account-user/updateImage','IndexController@upload');

Route::post('/post-account', [
    'as' => 'post-account',
    'uses' => 'App\Http\Controllers\LoginController@addAccount'
]);

Route::get('/login', 'LoginController@login')->name('home.login');
Route::post('/login-account', 'LoginController@loginAccount')->name('login-account');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@main')->name('backend.dashboard');
    Route::get('/login', 'App\Http\Controllers\Admin\AdminController@login')->name('backend.login');
    Route::post('/login-admin', 'App\Http\Controllers\Admin\AdminController@loginAdmin')->name('login-admin');
    Route::get('/logoutAdmin', 'App\Http\Controllers\Admin\AdminController@logoutAdmin')->name('logoutAdmin');
    // login admin
    Route::post('/post-account-admin', [
        'as' => 'post-account-admin',
        'uses' => 'App\Http\Controllers\Admin\AdminController@addAccountAdmin'
    ]);
    Route::get('/register', 'App\Http\Controllers\Admin\AdminController@register')->name('backend.register');

    Route::resources([
        'category' => 'App\Http\Controllers\Admin\CategoryController',
        'product' => 'App\Http\Controllers\Admin\ProductController',
        'banner' => 'App\Http\Controllers\Admin\BannerController',
        'account' => 'App\Http\Controllers\Admin\AccountController',
        'blog' => 'App\Http\Controllers\Admin\BlogController',
        'order' => 'App\Http\Controllers\Admin\OrderController',
        'feedback' => 'App\Http\Controllers\Admin\ContactController',
    ]);
    Route::post('/delete-user', [
        'as' => 'delete-user',
        'uses' => 'App\Http\Controllers\Admin\AccountController@deleteUser',
    ]);
    Route::post('/update-user', [
        'as' => 'update-user',
        'uses' => 'App\Http\Controllers\Admin\AccountController@updateUser',
    ]);
    Route::get('/edit-user', [
        'as' => 'edit-user',
        'uses' => 'App\Http\Controllers\Admin\AccountController@editUser',
    ]);

    // Category
    Route::post('/delete-category', [
        'as' => 'delete-category',
        'uses' => 'App\Http\Controllers\Admin\CategoryController@deleteCategory',
    ]);
    Route::post('/update-category', [
        'as' => 'update-category',
        'uses' => 'App\Http\Controllers\Admin\CategoryController@updateCategory',
    ]);
    Route::get('/edit-category', [
        'as' => 'edit-category',
        'uses' => 'App\Http\Controllers\Admin\CategoryController@editCategory',
    ]);
    // Blog
    Route::get('add-blog', [BlogController::class, 'create']);
    Route::post('/delete-blog', [
        'as' => 'delete-blog',
        'uses' => 'App\Http\Controllers\Admin\BlogController@deleteBlog',
    ]);
    Route::post('/update-blog', [
        'as' => 'update-blog',
        'uses' => 'App\Http\Controllers\Admin\BlogController@updateBlog',
    ]);
    Route::get('/edit-blog', [
        'as' => 'edit-blog',
        'uses' => 'App\Http\Controllers\Admin\BlogController@editBlog',
    ]);
    // Banner
    Route::post('/delete-banner', [
        'as' => 'delete-banner',
        'uses' => 'App\Http\Controllers\Admin\BannerController@deleteBanner',
    ]);
    Route::post('/update-banner', [
        'as' => 'update-banner',
        'uses' => 'App\Http\Controllers\Admin\BannerController@updateBanner',
    ]);
    Route::get('/edit-banner', [
        'as' => 'edit-banner',
        'uses' => 'App\Http\Controllers\Admin\BannerController@editBanner',
    ]);
    // Feedback
    Route::post('/delete-feedback', [
        'as' => 'delete-feedback',
        'uses' => 'App\Http\Controllers\Admin\ContactController@deleteFeedback',
    ]);

    // Product
    Route::post('/delete-product', [
        'as' => 'delete-product',
        'uses' => 'App\Http\Controllers\Admin\ProductController@deleteProduct',
    ]);

    Route::post('/update-product', [
        'as' => 'update-product',
        'uses' => 'App\Http\Controllers\Admin\ProductController@updateProduct',
    ]);

    Route::get('/edit-product', [
        'as' => 'edit-product',
        'uses' => 'App\Http\Controllers\Admin\ProductController@editProduct',
    ]);
    Route::get('/deletecover', [
        'as' => 'deletecover',
        'uses' => 'App\Http\Controllers\Admin\ProductController@deleteCover',
    ]);
    Route::get('/deleteimage', [
        'as' => 'deleteimage',
        'uses' => 'App\Http\Controllers\Admin\ProductController@deleteImage',
    ]);
    //Orde
    Route::get('view-order/{id}', [
        'as' => 'view-order/{id}',
        'uses' => 'App\Http\Controllers\Admin\OrderController@view',
    ]);
});

// Auth::routes(
//     [
//         'register' => false,
//         'verify' => false,
//         'reset' => false,
//     ]
// );

Route::post('/post-contact', [
    'as' => 'post-contact',
    'uses' => 'App\Http\Controllers\Admin\ContactController@addContact'
]);

// Image controller
Route::get('dropzone/image', 'ImageController@index');
Route::post('dropzone/store', 'ImageController@store');

Route::post('addToCart', 'App\Http\Controllers\Frontend\CartController@addToCart')->name('addToCart');
Route::post('deleteCart', 'App\Http\Controllers\Frontend\CartController@deleteCart')->name('deleteCart');
Route::post('updateCart', 'App\Http\Controllers\Frontend\CartController@updateCart')->name('updateCart');
Route::get('/load-cart-data', 'App\Http\Controllers\Frontend\CartController@loadCart')->name('load-cart-data');

Route::post('addToWishlist', 'App\Http\Controllers\Frontend\WishlistController@addToWishlist')->name('addToWishlist');
Route::post('deleteWishlist', 'App\Http\Controllers\Frontend\WishlistController@deleteWishlist')->name('deleteWishlist');
Route::get('/load-wishlist-count', 'App\Http\Controllers\Frontend\WishlistController@wishlistCount')->name('load-wishlist-count');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/cart', 'IndexController@cart')->name('home.cart');
    Route::post('/place-order', 'App\Http\Controllers\Frontend\CheckoutController@placeorder')->name('place-order');

    Route::get('/wishlist', 'App\Http\Controllers\Frontend\WishlistController@index')->name('wishlist');
});

// github login
Route::get('/auth/github/redirect', [AuthController::class, 'githubredirect'])->name('githublogin');
Route::get('/auth/github/callback', [AuthController::class, 'githubcallback']);

// google login
Route::get('/auth/google/redirect', [AuthController::class, 'googleredirect'])->name('googlelogin');
Route::get('/auth/google/callback', [AuthController::class, 'googlecallback']);

// Route::group(['namespace' => 'Administrators'], function () {
//     Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
//         Route::get('/home', 'HomesController@index')->name('backend.home');
//     });
// });
