<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('backend.order.index', compact('orders'));
    }

    public function view ($id) {
        $orders =Order::where('id', $id)->first();
        return view('backend.order.view', compact('orders'));
    }
}
