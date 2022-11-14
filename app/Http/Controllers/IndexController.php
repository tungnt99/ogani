<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Banners;
use Illuminate\Routing\Route;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $banners = DB::select('SELECT * FROM banners');
        $categories = DB::select('SELECT * FROM categories');
        $products = DB::select('SELECT * FROM products');
        
        return view('frontend.pages.home')->with([
            'banners' => $banners,
            'categories' => $categories,
            'products' => $products,
        ]);
    }


    // public function shop(Request $request) {
    //     return view('frontend.pages.shop');
    // }

    // public function shopdetail() {
    //     return view('frontend.pages.shop-detail');
    // }

    // public function cart() {
    //     return view('frontend.pages.cart');
    // }

    // public function checkout() {
    //     return view('frontend.pages.checkout');
    // }

    // public function blog() {
    //     return view('frontend.pages.blog');
    // }

    // public function blogdetail() {
    //     return view('frontend.pages.blog-detail');
    // }

    // public function contact() {
    //     return view('frontend.pages.contact');
    // }
}
