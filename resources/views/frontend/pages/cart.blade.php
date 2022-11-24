@extends('frontend.master')
@section('main')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach ($categories as $item)
                                <li><a href="{{ url('view-category/'.$item->id) }}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('site') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.index') }}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                    $taxRate = 10.00;
                                @endphp
                                @foreach ($cartItems as $item)
                                    <tr class="product_data">
                                        <td class="shoping__cart__item">
                                            <div class="shoping__cart__item--img">
                                                <img src="{{ asset('uploads/cover/'.$item->products->cover) }}" alt="">
                                            </div>
                                            <h5>{{ $item->products->title }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $item->products->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <input type="hidden" value="{{ $item->products->id }}" class="prod_id">
                                            <div class="quantity">
                                                <div class="product-qty">
                                                    <button class="dec-btn qtybtn changeQuantity">-</button>
                                                    <input type="text" value="{{ $item->prod_qty }}" class="qty-input">
                                                    <button class="inc-btn qtybtn changeQuantity">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ${{ $item->products->price * $item->prod_qty }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <button class="delete-cart-item"><span class="icon_close"></span></button>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $item->products->price * $item->prod_qty;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('home.shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <div id="totalajaxcall">
                            <div class="totalpricingload">
                                <ul>
                                    <li>Subtotal <span>${{ $total}}</span></li>
                                    <li>Shipping <span>${{ $taxRate}}</span></li>
                                    <li>Total <span>${{ $total +  $taxRate}}</span></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('home.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('scripts')
	<script>
		$(document).ready(function () {
			cartload();
			function cartload() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: "GET",
					url: "load-cart-data",
					success: function (response) {
					$('#itemCount').html('');
					$('#itemCount').html(response.count);
					}
				});
			}
            loadwishlist();
            function loadwishlist() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "load-wishlist-count",
                    success: function (response) {
                    $('#wishlistCount').html('');
                    $('#wishlistCount').html(response.count);
                    }
                });
            }
		});
	</script>
@endsection