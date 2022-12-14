<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Banners;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Routing\Route;
use App\Models\Cart;
use App\Models\Blogs;

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
        $products = Products::with('category')->paginate(12);
        $blogs = DB::select('SELECT * FROM blogs');
        // dd($blogs);
        return view('frontend.pages.home')->with([
            'banners' => $banners,
            'categories' => $categories,
            'products' => $products,
            'blogs' => $blogs
        ]);
    }



    public function shop(Request $request) {
        $categories = DB::select('SELECT * FROM categories');
        $products = Products::with('category')->paginate(9);

        $count = DB::table('products')->count();
        return view('frontend.pages.shop')->with([
            'categories' => $categories,
            'products' => $products,
            'count' => $count,
        ]);
    }

    public function cart() {
        $categories = DB::select('SELECT * FROM categories');
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.pages.cart', compact('cartItems', 'categories'));
    }

    public function checkout() {
        $categories = DB::select('SELECT * FROM categories');
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.pages.checkout', compact('cartItems', 'categories'));
    }

    public function blog() {
        $categories = DB::select('SELECT * FROM categories');
        $blogs = DB::select('SELECT * FROM blogs');

        return view('frontend.pages.blog')->with([
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function blogdetail($id) {
        $categories = DB::select('SELECT * FROM categories');
        $blogs = Blogs::find($id);
        $blog = Blogs::select('title', 'thumbnail', 'description', 'created_at', 'updated_at')->get()->take(3);
        return view('frontend.pages.blog-detail', compact('blogs', 'categories', 'blog'));
    }

    public function contact() {
        $categories = DB::select('SELECT * FROM categories');

        return view('frontend.pages.contact')->with([
            'categories' => $categories,
        ]);
    }
    public function viewcategory($id)
    {

        if(Categories::where("id", $id)->exists()){
            $categories = DB::select('SELECT * FROM categories');

            $category = Categories::where("id", $id)->first();
            $products = Products::where("category_id", $category->id)->paginate(6);
            // dd($products);
            return view('frontend.pages.product-cate', compact("category", 'products', 'categories'));
        }else{
            return redirect('/')->with('status', 'id doesnot exists');
        }

    }
    // public function productview($cate_id, $prod_id)
    // {
    //     $categories = DB::select('SELECT * FROM categories');
    //     if(Categories::where('id', $cate_id)->exists())
    //     {
    //         if(Products::where('id', $prod_id)->exists())
    //         {
    //             $products = Products::where('id',$prod_id)->first();
    //             return view('frontend.products.view',compact('products','categories'));
    //         }
    //         else
    //         {
    //             return redirect('/')->with('status', "the link was broken");
    //         }
    //     }
    //     else
    //     {
    //         return redirect('/')->with('status', "No such category found");
    //     }
    // }
    public function productview($id)
    {
        $categories = DB::select('SELECT * FROM categories');
        $products = Products::find($id);
        return view('frontend.products.view',compact('products', 'categories'));
    }
    public function accountUser() {
        return view('layouts.account_user');
    }

    public function upload(Request $request)
    {
        // if($request->hasFile('image')){
        //     $filename = $request->image->getClientOriginalName();
        //     $request->image->storeAs('images',$filename,'public');
        //     Auth()->user()->update(['image'=>$filename]);
        // }
        // return redirect()->back();
    }
}
