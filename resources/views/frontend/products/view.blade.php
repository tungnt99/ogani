@extends('frontend.master')
@section('main')
    <div class="pd-wrap">
		<div class="container">
	        <div class="heading-section">
	            <h2>{{ $products->title ?? 'null'}}</h2>
	        </div>
	        <div class="row product_data">
	        	<div class="col-md-6">
	        		<div id="slider" class="product-slider">
						<div class="item">
							<img src="{{ asset('uploads/cover')."/".$products->cover ?? " nothing images"}}" />
						</div>
					</div>
					<div id="thumb" class="owl-carousel product-thumb">
						<div class="item">
						  	<img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
						</div>
					</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name">Variable Product</div>
		        			<div class="reviews-counter">
								<div class="rate">
								    <input type="radio" id="star5" name="rate" value="5" checked />
								    <label for="star5" title="text">5 stars</label>
								    <input type="radio" id="star4" name="rate" value="4" checked />
								    <label for="star4" title="text">4 stars</label>
								    <input type="radio" id="star3" name="rate" value="3" checked />
								    <label for="star3" title="text">3 stars</label>
								    <input type="radio" id="star2" name="rate" value="2" />
								    <label for="star2" title="text">2 stars</label>
								    <input type="radio" id="star1" name="rate" value="1" />
								    <label for="star1" title="text">1 star</label>
								  </div>
								<span>3 Reviews</span>
							</div>
		        			<div class="product-price-discount">
                                <span>{{ $products->price ?? 'null'}}$</span>
                                <span class="line-through">{{ $products->discount ?? 'null'}}$</span>
                            </div>
		        		</div>
	        			<p>{{ $products->description ?? 'null'}}</p>
	        			<div class="product-count">
							<input type="hidden" value="{{ $products->id ?? 'null'}}" class="prod_id">
	        				<label for="size">Quantity</label>
							<div class="quantity">
								<div class="product-qty">
									<button class="dec-btn qtybtn">-</button>
									<input type="text" value="1" class="qty-input">
									<button class="inc-btn qtybtn">+</button>
								</div>
							</div>
							<button class="round-black-btn addToCartBtn">Add to Cart</button>
							<button class="heart-icon addToWishlist"><span class="icon_heart_alt"></span></button>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
						{{ $products->description ?? 'null'}}
				  	</div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				  		<div class="review-heading">REVIEWS</div>
				  		<p class="mb-20">There are no reviews yet.</p>
				  		<form class="review-form">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div>
		        			<div class="form-group">
			        			<label>Your message</label>
			        			<textarea class="form-control" rows="10"></textarea>
			        		</div>
			        		<div class="row">
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Name*">
					        		</div>
					        	</div>
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Email Id*">
					        		</div>
					        	</div>
					        </div>
					        <button class="round-black-btn">Submit Review</button>
			        	</form>
				  	</div>
				</div>
			</div>
			
			<div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
		</div>
	</div>
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
					url: "{{ route('load-cart-data') }}",
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
                    url: "{{ route('load-wishlist-count') }}",
                    success: function (response) {
                    $('#wishlistCount').html('');
                    $('#wishlistCount').html(response.count);
                    }
                });
            }
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

			$('.addToWishlist').click(function (e) {
				e.preventDefault();
				var product_id = $(this).closest('.product_data').find('.prod_id').val();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				
				$.ajax({
					type: "POST",
					url: "{{route('addToWishlist')}}",
					data: {
						'product_id': product_id,
					},
					success: function (response) {
						swal(response.status);
					}
				});
			})
		});
	</script>
@endsection