<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'IndexController@index')-> name('home.index');

Route::get('/shop', 'IndexController@shop')-> name('home.shop');

Route::get('/shopdetail', 'IndexController@shopdetail')-> name('home.shop-detail');

Route::get('/cart', 'IndexController@cart')-> name('home.cart');

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
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
    ]);
});

