<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Ecomus | dev-ARSAL</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/logo/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')
</head>
<style>
    #quick_add .tf-product-info-item .image img {
        width: 62% !important;
        height: unset !important;
        padding-left: 19% !important;
    }
</style>

<body class="preload-wrapper popup-loader">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="header-default header-absolute">
            <div class="px_15 lg-px_40">
                <div class="row wrapper-header align-items-center">
                    <div class="col-md-4 col-3 tf-lg-hidden">
                        <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                <path d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-4 col-6">
                        <a href="{{ route('home') }}" class="logo-header">
                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo" class="logo">
                        </a>
                    </div>
                    <div class="col-xl-6 tf-md-hidden">
                        <nav class="box-navigation text-center">
                            <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                                <li class="menu-item">
                                    <a href="{{ route('home') }}" class="item-link">Home</i></a>

                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('products.view') }}" class="item-link">Products</i></a>

                                </li>
                                <li class="menu-item position-relative">
                                    <a href="{{ route('category.view') }}" class="item-link">Categories</i></a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-3 col-md-4 col-3 d-none d-xl-block">
                        <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                            <li class="nav-account position-relative">
                                <a href="#" class="nav-icon-item" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="icon icon-account"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                    @guest
                                    <li><a class="dropdown-item" href="{{ route('account.login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.register') }}">Register</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="#"><b>{{ Auth::user()->name }}</b></a></li>
                                    <li><a class="dropdown-item" href="{{ route('order.show') }}">Orders <span style="color:white; background-color: #db1215; padding: 4px; border-radius: 50%;">{{ App\Models\orders::count() }}</span></a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.logout') }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('account.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endguest
                                </ul>
                            </li>
                            <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i class="icon icon-bag"></i><span class="count-box">{{ count(session('cart', [])) }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /Header -->
        <!-- Content -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /Content -->
        <!-- Footer -->
        <footer id="footer" class="footer md-pb-70">
            <div class="footer-wrap">
                <div class="footer-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-infor">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="">
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <p>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</p>
                                        </li>
                                        <li>
                                            <p>Email: <a href="#">info@fashionshop.com</a></p>
                                        </li>
                                        <li>
                                            <p>Phone: <a href="#">(212) 555-1234</a></p>
                                        </li>
                                    </ul>
                                    <a href="" class="tf-btn btn-line">Get direction<i class="icon icon-arrow1-top-left"></i></a>
                                    <ul class="tf-social-icon d-flex gap-10">
                                        <li><a href="#" class="box-icon w_34 round social-facebook social-line"><i class="icon fs-14 icon-fb"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-twiter social-line"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-instagram social-line"><i class="icon fs-14 icon-instagram"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-tiktok social-line"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                        <li><a href="#" class="box-icon w_34 round social-pinterest social-line"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>Help</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>Help</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="" class="footer-menu_item">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item"> Returns + Exchanges </a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">FAQ's</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Compare</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">My Wishlist</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>About us</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>About us</h6>
                                </div>
                                <ul class="footer-menu-list tf-collapse-content">
                                    <li>
                                        <a href="" class="footer-menu_item">Our Story</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Visit Our Store</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="" class="footer-menu_item">Account</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="footer-newsletter footer-col-block">
                                    <div class="footer-heading footer-heading-desktop">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="footer-heading footer-heading-moblie">
                                        <h6>Sign Up for Email</h6>
                                    </div>
                                    <div class="tf-collapse-content">
                                        <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales, exclusive content, events and more!</div>
                                        <form class="form-newsletter subscribe-form" id="" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                                            <div class="subscribe-content">
                                                <fieldset class="email">
                                                    <input type="email" name="email-form" class="subscribe-email" placeholder="Enter your email...." tabindex="0" aria-required="true">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button id="" class="subscribe-button tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn" type="button">Subscribe<i class="icon icon-arrow1-top-left"></i></button>
                                                </div>
                                            </div>
                                            <div class="subscribe-msg"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                                    <div class="footer-menu_item">© 2024 Ecomus Store. All Rights Reserved</div>
                                    <div class="tf-payment">
                                        <img src="{{ asset('assets/images/payments/visa.png') }}" alt="">
                                        <img src="{{ asset('assets/images/payments/img-1.png') }}" alt="">
                                        <img src="{{ asset('assets/images/payments/img-2.png') }}" alt="">
                                        <img src="{{ asset('assets/images/payments/img-3.png') }}" alt="">
                                        <img src="{{ asset('assets/images/payments/img-4.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>

    <!-- gotop -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
        </svg>
    </div>
    <!-- /gotop -->

    <!-- toolbar-bottom -->
    <div class="tf-toolbar-bottom type-1150">
        <div class="toolbar-item ">
            <!-- #toolbarShopmb data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" -->
            <a href="{{ route('home') }}">
                <div class="toolbar-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="toolbar-label">Home</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="{{ route('category.view') }}">
                <div class="toolbar-icon">
                    <i class="fa-solid fa-list"></i>
                </div>
                <div class="toolbar-label">Categories</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="{{ route('order.show') }}">
                <div class="toolbar-icon">
                    <i class="fa-regular fa-folder-open"></i>
                    <div class="toolbar-count">{{ App\Models\orders::count() }}</div>
                </div>
                <div class="toolbar-label">Orders</div>
            </a>
        </div>
        <div class="toolbar-item">
            <a href="#shoppingCart" data-bs-toggle="modal">
                <div class="toolbar-icon">
                    <i class="icon-bag"></i>
                    <div class="toolbar-count">{{ count(session('cart', [])) }}</div>
                </div>
                <div class="toolbar-label">Cart</div>
            </a>
        </div>
        <div class="toolbar-item">
            @auth
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                <div class="toolbar-icon">
                    <i class="icon-account"></i>
                </div>
                <div class="toolbar-label">{{ Auth::user()->name }}</div>
            </a>
            @else
            <a href="{{ route('account.login') }}">
                <div class="toolbar-icon">
                    <i class="icon-account"></i>
                </div>
                <div class="toolbar-label">Login</div>
            </a>
            @endauth
        </div>

    </div>
    <!-- /toolbar-bottom -->

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="{{ route('home') }}" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('products.view') }}" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('category.view') }}" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Categories</span>
                        </a>
                    </li>
                    @guest
                    <li class="nav-mb-item">
                        <a href="{{ route('account.login') }}" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Login</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="{{ route('account.register') }}" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Register</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-mb-item">
                        <a href="{{ route('account.logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" class="collapsed mb-menu-link current" aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Logout</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('account.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
                <div class="mb-other-content">
                    <div class="mb-notice">
                        <a href="contact-1.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                        <li>Email: <b>info@fashionshop.com</b></li>
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->
    <!-- toolbarShopmb -->
    <div class="offcanvas offcanvas-start canvas-mb toolbar-shop-mobile" id="toolbarShopmb">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="#" class="tf-category-link mb-menu-link">
                            <div class="image">
                                <img src="{{ asset('assets/images/shop/cate/cate1.jpg') }}" alt="">
                            </div>
                            <span>Accessories</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-two">
                            <div class="image">
                                <img src="{{ asset('assets/images/shop/cate/cate6.jpg') }}" alt="">
                            </div>
                            <span>Men</span>
                        </a>
                        <div id="cate-menu-two" class="collapse list-cate">
                            <ul class="sub-nav-menu" id="cate-menu-navigation1">
                                <li>
                                    <a href="#" class="tf-category-link sub-nav-link">
                                        <div class="image">
                                            <img src="{{ asset('assets/images/shop/cate/cate1.jpg') }}" alt="">
                                        </div>
                                        <span>Accessories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#" class="tf-category-link mb-menu-link">
                            <div class="image">
                                <img src="{{ asset('assets/images/shop/cate/cate7.jpg') }}" alt="">
                            </div>
                            <span>Tee</span>
                        </a>
                    </li>
                    <li class="nav-mb-item">
                        <a href="#" class="tf-category-link has-children collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="cate-menu-three">
                            <div class="image">
                                <img src="{{ asset('assets/images/shop/cate/cate9.jpg') }}" alt="">
                            </div>
                            <span>Women</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mb-bottom">
                <a href="{{ route('products.view') }}" class="tf-btn fw-5 btn-line">View all collection<i class="icon icon-arrow1-top-left"></i></a>
            </div>
        </div>
    </div>
    <!-- /toolbarShopmb -->


    <!-- shoppingCart -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">Shopping cart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-mini-cart-threshold">
                        <div class="tf-progress-bar">
                            <span style="width: 50%;"></span>
                        </div>
                        <div class="tf-progress-msg">
                            Buy <span class="price fw-6">$75.00</span> more to enjoy <span class="fw-6">Free Shipping</span>
                        </div>
                    </div>
                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll">
                                <div class="tf-mini-cart-items">
                                    @if (empty(session('cart', [])))
                                    <div class="emptycart">
                                        <div class="emptycart-icon d-flex justify-content-center align-items-center flex-column">
                                            <img width="300px"
                                                src="{{asset('assets/vecteezy_young-man-shopping-push-empty-shopping-trolley_4964514.svg')}}"
                                                alt="">
                                            <h5 class="emptycart-icon-text">Your cart is empty</h5>
                                        </div>
                                    </div>
                                    @endif
                                    <?php
                                    // Get the cart items from the session
                                    $cartItems = session('cart', []);
                                    // Sort the items by quantity in descending order
                                    arsort($cartItems);
                                    ?>
                                    @foreach($cartItems as $id => $details)
                                    <div class="tf-mini-cart-item">
                                        <div class="tf-mini-cart-image">
                                            <a href="#">
                                                <img src="{{ asset('uploads/products/'. $details['image']) }}" alt="{{ $details['name'] }}">
                                            </a>
                                        </div>
                                        <div class="tf-mini-cart-info">
                                            <a class="title link" href="#">{{ $details['name'] }}</a>
                                            <label for="">Quantity:</label>
                                            <span>{{ $details['quantity'] }}x</span>
                                            <div class="tf-mini-cart-btns">
                                                <div class="tf-mini-cart-remove remove_btn" data-id="{{ $details['id'] }}">Remove</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                        <div class="tf-mini-cart-bottom">
                            @if (!empty(session('cart', [])))
                            <div class="tf-mini-cart-bottom-wrap">
                                <div class="tf-cart-totals-discounts">
                                    <div class="tf-cart-total">Subtotal</div>
                                    <div class="tf-totals-total-value fw-6">${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, session('cart', []))); }} USD</div>
                                </div>
                                <div class="tf-cart-tax">Taxes and <a href="#">shipping</a> calculated at checkout</div>
                                <div class="tf-mini-cart-line"></div>
                                <div class="tf-mini-cart-view-checkout">
                                    @auth
                                    <div class="w-100 dropdown">
                                        <button class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center dropdown-toggle" type="button" id="paymentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span>Check out</span>
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="paymentDropdown">
                                            <li><a class="dropdown-item" href="#">PayPal</a></li>
                                            <li><a class="dropdown-item" href="{{route('stripe.session')}}">Stripe</a></li>
                                        </ul>
                                    </div>
                                    @else
                                    <a href="{{route('account.login')}}" class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check out</span></a>
                                    @endauth
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /shoppingCart -->

    <!-- modal quick_add -->
    @if(!empty($products))
    @foreach($products as $product)
    <div class="modal fade modalDemo" id="quick_add_{{$product->id}}">
        <div class="modal-dialog modal-dialog-centered w-50 w-md-75 w-sm-100">
            <div class="modal-content" style="overflow: hidden;">

                <div class="header">
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">
                    <div class="tf-product-info-item" style="display: block !important;">
                        <div class="image text-center text-md-start">
                            <img class="img-fluid" style="max-width: 40%; width: 100%;" src="{{ asset('uploads/products/'. $product->image) }}" alt="">
                        </div>
                        <div class="content mt-3 mt-md-0">
                            <a href="#" class="d-block mb-2">{{$product->name}}</a>
                            <div class="tf-product-info-price">
                                <div class="price">${{$product->price}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-product-info-buy-button">
                        <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <input type="hidden" name="image" value="{{$product->image}}">
                            <div class="tf-product-info-quantity mb-3 w-100">
                                <div class="quantity-title fw-6 mb-2">Quantity</div>
                                <div class="wg-quantity d-flex justify-content-center justify-content-md-start">
                                    <span class="btn-quantity minus-btn">-</span>
                                    <input type="text" name="quantity" value="1">
                                    <span class="btn-quantity plus-btn">+</span>
                                </div>
                            </div>
                            <button type="submit" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn w-100"><span>Add to cart</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <!-- /modal quick_add -->
    <!-- auto popup  -->
    <div class="modal modalCentered fade auto-popup modal-newleter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top">
                    <img class="lazyload" data-src="{{ asset('assets/images/item/banner-newleter.jpg') }}" src="{{ asset('assets/images/item/banner-newleter.jpg') }}" alt="home-01">
                    <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="modal-bottom">
                    <h4 class="text-center">Don't mis out</h4>
                    <h6 class="text-center">Be the first one to get the new product at early bird prices.</h6>
                    <form id="subscribe-form" action="#" class="form-newsletter" method="post" accept-charset="utf-8" data-mailchimp="true">
                        <div id="subscribe-content">
                            <input type="email" name="email-form" id="subscribe-email" placeholder="Email *">
                            <button type="button" id="subscribe-button" class="tf-btn btn-fill radius-3 animate-hover-btn w-100 justify-content-center">Keep me updated</button>
                        </div>
                        <div id="subscribe-msg"></div>
                    </form>
                    <div class="text-center">
                        <a href="#" class="tf-btn btn-line fw-6">Not interested</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /auto popup  -->
    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lazysize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/count-down.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/multiple-modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.remove_btn').on('click', function() {
            var id = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/product/cart/remove',
                        type: 'POST',
                        data: {
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Removed!',
                                'The item has been removed from your cart.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'An error occurred while removing the item.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
        setTimeout(function() {
            $('.alert').fadeOut('slow', function() {
                $(this).alert('close');
            });
        }, 2000);
    </script>
    @stack('scripts')
</body>

</html>