@extends('frontend.master')
@section('main')
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
                                                <button class="delete-wishlist-item"><span class="icon_close"></span></button>
                                            </td>
                                            <td>
                                                <div class="wishlist__item__img">
                                                    <img src="{{ asset('uploads/cover')."/".$item->products->cover ?? "null"}}" alt="">
                                                </div>
                                            </td>
                                            <td class="wishlist__item__title">
                                                <input type="hidden" value="{{ $item->products->id }}" class="prod_id">
                                                <input type="hidden" value="1" class="qty-input">
                                                <h5>{{ $item->products->title }}</h5>
                                            </td>
                                            <td class="wishlist__price">
                                                ${{ $item->products->price }}
                                            </td>
                                            <td class="wishlist__add">
                                                <button class="round-black-btn addToCartBtn">Add to Cart</button>
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

            $('.addToCartBtn').click(function (e) {
				e.preventDefault();
				var product_id = $(this).closest('.product_data').find('.prod_id').val();
				var product_qty = $(this).closest('.product_data').find('.qty-input').val();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: "POST",
					url: "{{route('addToCart')}}",
					data: {
						'product_id': product_id,
						'product_qty': product_qty,
					},
					success: function (response) {
						swal(response.status);
					}
				});
			})
        });
	</script>
@endsection
