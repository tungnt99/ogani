<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ url('site') }}/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li>
                @if (Auth::check())
                <a href="{{ route('wishlist') }}">
                    <i class="fa fa-heart"></i>
                </a>
                <span id="wishlistCount">0</span>
                @else
                <a href="#">
                    <i class="fa fa-heart"></i>
                </a>
                <span id="wishlistCount">0</span>
                @endif
            </li>
            <li class="basket-item-count">
                @if (Auth::check())
                <a href="{{ route('home.cart') }}">
                    <i class="fa fa-shopping-bag"></i>
                </a>
                <span id="itemCount">0</span>
                @else
                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                </a>
                <span id="itemCount">0</span>
                @endif
            </li>
        </ul>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{ url('site') }}/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            @if (Auth::check())
            <div class="header__top__right__auth--list">
                <div class="auth-image">
                    <img src="{{ Auth::user()->photo}}" alt="">
                </div>
                {{ Auth::user()->name}}
                <ul>
                    <li><a href="#">Account</a></li>
                    <li>
                        <a href="{{ url('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
            @else
            <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Login</a>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="{{ Request::segment(1) == '/' ? 'active' : '' }}"><a href="{{ route('home.index') }}">Home</a>
            </li>
            <li><a href="{{ route('home.shop') }}">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ route('home.cart') }}">Shoping Cart</a></li>
                    <li><a href="{{ route('home.checkout') }}">Check Out</a></li>
                </ul>
            </li>
            <li><a href="{{ route('home.blog') }}">Blog</a></li>
            <li><a href="{{ route('home.contact') }}">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{ url('site') }}/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @if (Auth::check())
                            <div class="header__top__right__auth--list">
                                <div class="auth-image">
                                    <img src="{{ asset('uploads/account/'.Auth::user()->photo) }}" alt="">

                                </div>
                                <!-- {{ Auth::user()->photo}} -->
                                {{ Auth::user()->name}}
                                <ul>
                                    <li><a href="{{ url('account-user') }}">Profile</a></li>
                                    <li>
                                        <a href="{{ url('logout') }}">Logout</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @else
                        <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Login</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home.index') }}"><img src="{{ url('site') }}/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="{{ Request::segment(1) == 'shop' ? 'active' : '' }}"><a href="{{ route('home.shop') }}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{ route('home.cart') }}">Shoping Cart</a></li>
                                <li><a href="{{ route('home.checkout') }}">Check Out</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::segment(1) == 'blog' ? 'active' : '' }}"><a href="{{ route('home.blog') }}">Blog</a></li>
                        <li class="{{ Request::segment(1) == 'contact' ? 'active' : '' }}"><a href="{{ route('home.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li>
                            @if (Auth::check())
                            <a href="{{ route('wishlist') }}">
                                <i class="fa fa-heart"></i>
                            </a>
                            <span id="wishlistCount" class="wishlist-count"></span>
                            @else
                            <a href="{{ route('home.login') }}">
                                <i class="fa fa-heart"></i>
                            </a>
                            <span id="wishlistCount" class="wishlist-count"></span>
                            @endif
                        </li>
                        <li class="basket-item-count">
                            @if (Auth::check())
                            <a href="{{ route('home.cart') }}">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                            <span id="itemCount" class="cart-count"></span>
                            @else
                            <a href="{{ route('home.login') }}">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                            <span id="itemCount" class="cart-count"></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
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
                        <li><a href="{{ url('category/'.$item->id) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#" role="search">
                            <div class="form-group">
                                <input class="form-control input-search" type="text" placeholder="What do you need?">

                                <button type="submit" class="site-btn">SEARCH</button>
                            </div>
                        </form>
                        <div class="search-result">
                            <!-- <div class="product-search-list">

                            </div> -->

                        </div>
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
    <script>
        window.user = '{{ auth()->user() }}'
        $('.search-result').hide();
        $('.input-search').keyup(function() {
            var _text = $(this).val();
            var _url = "{{asset('uploads/cover')}}";
            if (_text != '') {
                $.ajax({
                    url: "{{route('ajax-search-product')}}?key=" + _text,
                    type: 'GET',
                    success: function(res) {
                        console.log(res);
                        var _html = '';
                        if (res.length === 0) {
                            _html += '<div class="not-product">';
                            _html += '<h3 class="text-center">Không có sản phẩm</h3>';
                            _html += '</div>';
                        } else {
                            _html += '<div class="product-search-list">';
                            for (var product of res) {
                                var slug = convertToSlug(product.title);
                                _html += '<a href="http://localhost:8080/ogani/public/product_details/' + product.id + '-' + slug + '" class="product-item">';
                                _html += '<div class="product-left">';
                                _html += '<img src="' + _url + '/' + product.cover + '" class="product-object" style="width:80px; height: 80px">';
                                _html += '</div>';
                                _html += '<div class="product-body">';
                                _html += '<h5 class="product-heading">' + product.title + '</h5>';
                                _html += '</div>';
                                _html += '</a>';
                            }
                            _html += '</div>';
                        }


                        $('.search-result').show();
                        $('.search-result').html(_html);
                    }
                });
            } else {
                $('.search-result').html('');
                $('.search-result').hide();
            }

        });

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            cartload();
            function cartload() {
                $.ajax({
                    type: "GET",
                    url: "{{route('load-cart-data')}}",
                    success: function(response) {
                        var _cart = '';
                        _cart += '<span class="total-count">' + response.count + '</span>';
                        $('.cart-count').html(_cart);
                    }
                });
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            loadwishlist();

            function loadwishlist() {
                $.ajax({
                    type: "GET",
                    url: "{{route('load-wishlist-count')}}",
                    success: function(response) {
                        var _wishlist = '';
                        _wishlist += '<span class="total-wishlist">' + response.count + '</span>';
                        $('.wishlist-count').html(_wishlist);
                    }
                });
            }
        });
    </script>
</section>
<!-- Hero Section End -->
