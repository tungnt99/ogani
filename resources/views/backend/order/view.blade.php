@extends('layouts.admin');
@section('main')
    <div class="checkout__form">
        <h4>Billing Details</h4>
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="checkout__input">
                            <label>Full Name<span>*</span></label>
                            <div class="">{{ $orders->name }}</div>
                        </div>
                    </div>
                </div>
                <div class="checkout__input">
                    <label>Address<span>*</span></label>
                    <div class="">{{ $orders->address }}</div>
                </div>
                <div class="checkout__input">
                    <label>Phone<span>*</span></label>
                    <div class="">{{ $orders->phone_number }}</div>
                </div>
                <div class="checkout__input">
                    <label>Email<span>*</span></label>
                    <div class="">{{ $orders->email }}</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="checkout__order">
                    <h4>Your Order</h4>
                    <div class="checkout__order__products">
                        <ul>
                            <li>Products</li>
                            <li>Quantity</li>
                            <li>Total</li>
                        </ul>
                    </div>
                    <ul>
                        @php
                            $total = 0;
                            $taxRate = 10.00;
                        @endphp
                        @foreach ($orders->orderitems as $item)
                            <ul class="item">
                                <li>{{ $item->products->title }}</li>
                                <li>{{ $item->prod_qty }}</li>
                                <li>${{ $item->products->price * $item->prod_qty }}</li>
                            </ul>
                            @php
                                $total += $item->products->price * $item->prod_qty;
                            @endphp
                        @endforeach
                    </ul>
                    <div class="checkout__order__total">Total <span>${{ $orders->total_price}}</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
