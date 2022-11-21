<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id'=>$item->prod_id,
                'qty' => $item->prod_qty,
                'price'=>$item->products->price,
            ]);
            $prod = Products::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone_number = $request->input('phone_number');
            $user->address = $request->input('address');
            $user->update();
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('/shop')->with('status','Order placed successfully');
    }
}
