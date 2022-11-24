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
                            {{-- @foreach ($categories as $item)
                                <li><a href="{{ url('view-category/'.$item->id) }}">{{$item->name}}</a></li>
                            @endforeach --}}
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
                        <h2>WishList Page</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.index') }}"> Home</a>
                            <span>Wishlist</span>
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
                    @if ($wishlist->count() > 0)
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlist as $item)
                                        <tr class="product_data">
                                            <td class="wishlist__item__close">
                                                <button class="delete-cart-item"><span class="icon_close"></span></button>
                                            </td>
                                            <td>
                                                <div class="wishlist__item__img">
                                                    <img src="{{ asset('uploads/cover')."/".$item->products->cover ?? "null"}}" alt="">
                                                </div>
                                            </td>
                                            <td class="wishlist__item__title">
                                                <h5>{{ $item->products->title }}</h5>
                                            </td>
                                            <td class="wishlist__price">
                                                ${{ $item->products->price }}
                                            </td>
                                            <td class="wishlist__add">
                                                Add to cart
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>There are no products in your Wishlist</h4>
                    @endif
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
		});
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
	</script>
@endsection