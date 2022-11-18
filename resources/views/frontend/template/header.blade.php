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
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
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
            <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="{{ Request::segment(1) == '/' ? 'active' : '' }}"><a href="{{ route('home.index') }}">Home</a></li>
            <li><a href="{{ route('home.shop') }}">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ route('home.shop-detail') }}">Shop Details</a></li>
                    <li><a href="{{ route('home.cart') }}">Shoping Cart</a></li>
                    <li><a href="{{ route('home.checkout') }}">Check Out</a></li>
                    <li><a href="{{ route('home.blog-detail') }}">Blog Details</a></li>
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
                            <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Login</a>
                          

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
                        <li ><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li ><a href="{{ route('home.shop-detail') }}">Shop Details</a></li>
                                <li><a href="{{ route('home.cart') }}">Shoping Cart</a></li>
                                <li><a href="{{ route('home.checkout') }}">Check Out</a></li>
                                <li><a href="{{ route('home.blog-detail') }}">Blog Details</a></li>
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
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="{{ route('home.cart') }}">
                                <i class="fa fa-shopping-bag"></i> 
                            </a>
                            <span id="itemCount"></span>
                        </li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->