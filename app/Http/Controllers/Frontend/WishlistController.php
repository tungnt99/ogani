<?php

namespace App\Http\Controllers\Frontend;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        $categories = DB::select('SELECT * FROM categories');
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.pages.wish-list', compact('wishlist','categories'));
    }

    public function addToWishlist(Request $request) {

        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Products::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Product added to wishlist']);
            }
            else
            {
                return response()->json(['status' => 'Product doesnot exist']);
            }
        }
        else
        {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function deleteWishlist(Request $request) {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    $wish = Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $wish->delete();
                    return response()->json(['status' => "Item removed from Wishlist"]);
                }
        }
        else{
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function wishlistCount()
    {
       $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
       return response()->json(['count' => $wishlistcount]);
    }
}
