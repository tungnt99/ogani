@extends('frontend.master')
@section('main')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('site') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.index') }}">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ url('place-order') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <label>Full Name<span>*</span></label>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <label>Address<span>*</span></label>
                                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <label>Phone<span>*</span></label>
                                        <input type="text" name="phone_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <label>Email<span>*</span></label>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <label>Order notes<span>*</span></label>
                                <input type="text" name="note"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
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
                                    @foreach ($cartItems as $item)
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
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $total }}</span></div>
                                <div class="checkout__order__shipping">Shipping <span>${{ $taxRate}}</span></div>
                                <div class="checkout__order__total">Total <span>${{ $total +  $taxRate}}</span></div>

                                <div class="checkout__input__checkbox">
                                    <label for="payment">Check Payment</label>
                                    <input type="checkbox" id="payment">
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">Paypal</label>
                                    <input type="checkbox" id="paypal">
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
@section('scripts')

@endsection
