<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
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


Route::get('/', 'IndexController@index')-> name('home.index');
Route::get('/product_details/{id}', 'IndexController@productview')-> name('productview');
Route::get('/view-category/{id}', 'IndexController@viewcategory')-> name('home.viewcategory');
Route::get('/shop', 'IndexController@shop')-> name('home.shop');

Route::get('/shopdetail', 'IndexController@shopdetail')-> name('home.shop-detail');

Route::get('/checkout', 'IndexController@checkout')-> name('home.checkout');


Route::get('/blog', 'IndexController@blog')-> name('home.blog');

Route::get('/blogdetail', 'IndexController@blogdetail')-> name('home.blog-detail');

Route::get('/contact', 'IndexController@contact')-> name('home.contact');

Route::get('/register', 'LoginController@register')-> name('home.register');

Route::post('/post-account', [
    'as' => 'post-account',
    'uses' => 'App\Http\Controllers\LoginController@addAccount'
]);

Route::get('/login', 'LoginController@login')-> name('home.login');
Route::post('/login-account', 'LoginController@loginAccount')->name('login-account');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@dashboard')->name('backend.dashboard');

    Route::resources([
        'category' => 'App\Http\Controllers\Admin\CategoryController',
        'product' => 'App\Http\Controllers\Admin\ProductController',
        'banner' => 'App\Http\Controllers\Admin\BannerController',
        'account' => 'App\Http\Controllers\Admin\AccountController',
        'blog' => 'App\Http\Controllers\Admin\BlogController',
        'order' => 'OrderController',
        'feedback'=> 'App\Http\Controllers\Admin\ContactController',
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
});


//fb
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', 'FaceBookController@loginUsingFacebook')->name('login');
    Route::get('callback', 'FaceBookController@callbackFromFacebook')->name('callback');
});

Route::post('/post-contact', [
    'as' => 'post-contact',
    'uses' => 'App\Http\Controllers\Admin\ContactController@addContact'
]);


// Image controller
Route::get('dropzone/image','ImageController@index');
Route::post('dropzone/store','ImageController@store');

Route::post('addToCart', 'App\Http\Controllers\Frontend\CartController@addToCart')->name('addToCart');
Route::post('deleteCart', 'App\Http\Controllers\Frontend\CartController@deleteCart')->name('deleteCart');
Route::post('updateCart', 'App\Http\Controllers\Frontend\CartController@updateCart')->name('updateCart');
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', 'IndexController@cart')-> name('home.cart');
    Route::post('/place-order', 'App\Http\Controllers\Frontend\CheckoutController@placeorder')->name('place-order');
});