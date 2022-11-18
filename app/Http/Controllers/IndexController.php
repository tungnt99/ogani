<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Banners;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Routing\Route;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
        $products = Products::with('category')->get();

        return view('frontend.pages.home')->with([
            'banners' => $banners,
            'categories' => $categories,
            'products' => $products,
        ]);
    }


    public function shop(Request $request) {
        $categories = DB::select('SELECT * FROM categories');
        $products = Products::with('category')->get();
        return view('frontend.pages.shop')->with([
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function shopdetail() {
        return view('frontend.pages.shop-detail');
    }

    public function cart() {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.pages.cart', compact('cartItems'));
    }

    public function checkout() {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.pages.checkout', compact('cartItems'));
    }

    public function blog() {
        return view('frontend.pages.blog');
    }

    public function blogdetail() {
        return view('frontend.pages.blog-detail');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
    public function productview($id)
    {
        $products = Products::find($id);
        return view('frontend.products.view',compact('products'));
    }
}
