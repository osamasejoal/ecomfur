<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Furbar - Furniture eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/images/favicon.png" />

    <!-- CSS
 ============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/font-awesome.min.css" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/odometer.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/ion.rangeSlider.min.css" />

    <!-- Main Style CSS -->
    {{-- <!-- <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css"> --> --}}
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.min.css" />

    
    <!-- Added by developer -->

    <!-- Icons Css -->
    <link href="{{ asset('backend/assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('header-content')

</head>


<body>
    <!-- Header Start  -->
    <div class="header-area header-white header-sticky d-none d-lg-block">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a href="{{ route('frontpage') }}"><img src="{{ asset('frontend') }}/assets/images/logo.png"
                                width="154" height="46" alt="Logo" /></a>
                    </div>
                    <!-- Header Logo End -->
                </div>
                <div class="col-lg-6">
                    <div class="header-menu">
                        <ul class="nav-menu">

                            <!-- Home -->
                            <li><a href="{{ route('frontpage') }}">Home</a></li>

                            <!-- About -->
                            <li><a href="about.html">About</a></li>

                            <!-- Categories -->
                            <li>
                                <a href="#">Categories </a>
                                <ul class="sub-menu">
                                    @forelse (categories() as $category)
                                        <li><a
                                                href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @empty
                                        <li class="text-center text-danger">There is no category!</li>
                                    @endforelse
                                </ul>
                            </li>

                            <!-- Contact -->
                            <li><a href="#">Contact</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">



                    <!-- Header Meta Start -->
                    <div class="header-meta">

                        @auth
                            <!-- My Account -->
                            <div class="dropdown">
                                <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i
                                        class="pe-7s-user"></i></a>

                                <ul class="dropdown-menu dropdown-profile">
                                    @auth
                                    
                                        <!-- Profile -->
                                        <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                    
                                        <!-- Orders -->
                                        <li><a href="{{ route('user.orders') }}">My Orders</a></li>
                                    
                                        <!-- Address -->
                                        <li><a href="{{ route('user.address') }}">Address</a></li>

                                        <!-- Logout -->
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}"
                                                style="display:inline-block;padding:3px 1.5rem;color:#373a3c"
                                                class="logout-button">
                                                @csrf
                                                <style>
                                                    .logout-button input:hover {
                                                        color: #f2a100
                                                    }
                                                </style>
                                                <input type="submit" value="logout"
                                                    style="border: none;background: transparent;padding: 0;">
                                            </form>
                                        </li>

                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                                    @endauth
                                </ul>
                            </div>

                            <!-- Wishlist -->
                            <a class="action" href="{{ route('wishlist.view') }}">
                                <i class="pe-7s-like"></i>
                                @if (count(wishlists()) > 0)
                                    <span class="number" style="right:1px;opacity:0.8">{{ count(wishlists()) }}</span>
                                @endif
                            </a>

                            <!-- Cart -->
                            <a class="action" href="{{ route('cart.view') }}">
                                <i class="pe-7s-shopbag"></i>
                                @if (count(carts()) > 0)
                                    <span class="number" style="right:1px;opacity:0.8">{{ count(carts()) }}</span>
                                @endif
                            </a>
                        @else
                            <div class="log-up user-select-none">
                                <a href="{{ route('login') }}">Login</a>
                                <span style="cursor:default">&nbsp;/&nbsp;</span>
                                <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                        @endauth

                    </div>
                    <!-- Header Meta End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->



    <!-- Header Mobile Start -->
    <div class="header-mobile section d-lg-none">
        <!-- Header Mobile top Start -->
        <div class="header-mobile-top header-sticky">
            <div class="container">
                <div class="row row-cols-3 gx-2 align-items-center">
                    <div class="col">
                        <!-- Header Toggle Start -->
                        <div class="header-toggle">
                            <button class="mobile-menu-open" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <!-- Header Toggle End -->
                    </div>
                    <div class="col">
                        <!-- Header Logo Start -->
                        <div class="header-logo text-center">
                            <a href="{{ route('frontpage') }}"><img
                                    src="{{ asset('frontend') }}/assets/images/logo.png" width="154"
                                    height="46" alt="Logo" /></a>
                        </div>
                        <!-- Header Logo End -->
                    </div>
                    <div class="col">
                        <!-- Header Action Start -->
                        <div class="header-meta">
                            <div class="dropdown">
                                <a class="action" href="#" role="button" data-bs-toggle="dropdown"><i
                                        class="pe-7s-user"></i></a>

                                <ul class="dropdown-menu dropdown-profile">
                                    <li>
                                        <a href="my-account.html">My Account</a>
                                    </li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Sign In</a></li>
                                </ul>
                            </div>
                            <a class="action" href="cart.html">
                                <i class="pe-7s-shopbag"></i>
                                <span class="number">3</span>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Mobile top End -->

        <!-- Header Mobile Bottom End -->
        <div class="header-mobile-bottom">
            <div class="container">
                <!-- Header Search Start -->
                <div class="header-search">
                    <form action="#">
                        <input type="text" placeholder="Enter your search key ... " />
                        <button><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- Header Search End -->
            </div>
        </div>
        <!-- Header Mobile Bottom End -->
    </div>
    <!-- Header Mobile End -->

    <!-- off Canvas Start -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
        <div class="offcanvas-header">
            <!-- Canvas Action Start -->
            <div class="canvas-action">
                <a class="action" href="compare.html"><i class="icon-sliders"></i> Compare
                    <span class="action-num">(3)</span></a>
                <a class="action" href="wishlist.html"><i class="icon-heart"></i> Wishlist
                    <span class="action-num">(3)</span></a>
            </div>
            <!-- Canvas Action end -->

            <!-- Canvas Close bar Start -->
            <div class="canvas-close-bar">
                <span>Menu</span>
                <button class="menu-close" data-bs-dismiss="offcanvas">
                    <i class="pe-7s-angle-left"></i>
                </button>
            </div>
            <!-- Canvas Close bar End -->
        </div>

        <div class="offcanvas-body">
            <!-- Canvas Menu Start -->
            <div class="canvas-menu">
                <nav>
                    <ul class="nav-menu">

                        <!-- Home -->
                        <li><a href="{{ route('frontpage') }}">Home</a></li>

                        <!-- About -->
                        <li><a href="about.html">About</a></li>

                        <!-- Categories -->
                        <li>
                            <a href="#">Categories </a>
                            <ul class="sub-menu">
                                @forelse (categories() as $category)
                                    <li><a
                                            href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a>
                                    </li>
                                @empty
                                    <li class="text-center text-danger">There is no category!</li>
                                @endforelse
                            </ul>
                        </li>

                        <!-- Contact -->
                        <li><a href="#">Contact</a></li>

                    </ul>
                </nav>
            </div>
            <!-- Canvas Menu End -->
        </div>
    </div>
    <!-- off Canvas End -->
