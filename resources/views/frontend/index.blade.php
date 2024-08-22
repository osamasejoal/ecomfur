@extends('frontend.layout.master')

@section('header-content')
    <style>
        .gallery-image {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }

        .gallery-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        .section.call-to-action {
            height: 75vh;
        }

        .call-to-action-content p {
            margin-top: 3rem;
        }

        .product-icon-wrapper {
            padding: 70px 0;
        }

        .product-icon img {
            width: 10%;
        }

        .cart-modal {
            max-width: 400px !important;
        }

        btn.cart_modal_close {
            width: 20%;
            font-size: 1rem;
            padding: .25rem;
            border-radius: 4px;
            color: #fff;
            background-color: #d73038;
            border: none;
        }

        btn.cart_modal_submit {
            width: 20%;
            font-size: 1rem;
            padding: .25rem;
            border-radius: 4px;
            color: #fff;
            background-color: #f2a100;
            border: none;
        }

        @media (max-width: 1200px) {
            .section.call-to-action {
                background-size: contain;
            }
        }

        @media (max-width: 991.99px) {
            .section.call-to-action {
                height: 40vh;
            }

            .call-to-action-content p {
                font-size: 12px;
                width: 80%;
                display: block;
                margin: auto;
                margin-top: 1.5rem;
            }

            .product-icon-wrapper {
                padding: 50px 0;
            }
        }

        @media (max-width: 575.99px) {
            .section.call-to-action {
                height: 20vh;
            }

            .product-icon-wrapper {
                padding: 30px 0;
            }

            .cart-modal {
                max-width: 90% !important;
            }
        }
    </style>
@endsection

@section('main-content')
    <!-- Slider Section Start -->
    <div class="section slider-section-02">
        <div class="slider-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    @foreach ($sliders as $slider)
                        <!-- Single Slider Start  -->
                        <div class="single-slider slider-02 swiper-slide animation-style-01"
                            style="background-image: url({{ asset($slider->image) }});">
                            <div class="container">
                                <!-- Slider Content Start -->
                                <div class="slider-content-02 text-center">
                                    <h2 class="title">{{ $slider->title }}</h2>
                                    <p>{{ $slider->slogan }}</p>
                                </div>
                                <!-- Slider Content End -->
                            </div>
                        </div>
                        <!-- Single Slider End  -->
                    @endforeach


                    <!-- Single Slider Start  -->
                    {{-- <div class="single-slider slider-02 swiper-slide animation-style-01"
                        style="
                                background-image: url({{ asset('frontend') }}/assets/images/slider/slider-02.jpg);
                            ">
                        <div class="container">
                            <!-- Slider Content Start -->
                            <div class="slider-content-02 text-center">
                                <h2 class="title">
                                    Stylish Kitchen Furniture
                                </h2>
                                <p>
                                    Unique Furniture Style Design for Your
                                    Family and Welcome <br />
                                    Our Shop, 30% Offer All Stylish Kitchen
                                    Furniture
                                </p>
                                <a href="shop-grid-4-column.html" class="btn btn-primary btn-hover-dark btn-margin">purchase
                                    now</a>
                            </div>
                            <!-- Slider Content End -->
                        </div>
                    </div> --}}
                    <!-- Single Slider End  -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next">Next</div>
                    <div class="swiper-button-prev">Prev</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->

    <!-- Benefit Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <!-- Benefit Wrapper Start -->
            <div class="benefit-wrapper">
                <div class="row">

                    <!-- Single Benefit Start -->
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-benefit">
                                <img src="{{ $service->icon }}" width="70" height="92" alt="Service Icon" />
                                <h3 class="title">{{ $service->title }}</h3>
                                <p>{{ $service->sub_title }}</p>
                            </div>
                        </div>
                    @endforeach <!-- Single Benefit End -->

                </div>
            </div>
            <!-- Benefit Wrapper End -->
        </div>
    </div>
    <!-- Benefit Section End -->

    <!-- New Product Section Start -->
    <div class="section section-padding-02">
        <div class="container">

            <!-- Section Title Start -->
            <div class="product-top-wrapper">
                <div class="section-title">
                    <h2 class="title" style="font-size: 40px"># New Products</h2>
                </div>
            </div>
            <!-- Section Title End -->

            <!-- Product Wrapper 02 Start -->
            <div class="product-wrapper-02">
                <!-- Product Menu End -->

                <!-- Product Tabs Content Start -->
                <div class="product-tabs-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="row">

                                <!-- Single Product Start -->
                                @forelse ($products as $product)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single-product-02">
                                            <div class="product-images">
                                                <a href="{{ route('product.details', $product->id) }}"><img
                                                        src="{{ $product->thumbnail }}" style="width:276px;height:303px"
                                                        alt="product" /></a>

                                                <ul class="product-meta">
                                                    <li style="margin-right: 10px">
                                                        @auth
                                                            @if (cart_exist($product->id))
                                                                <a class="action"
                                                                    style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i
                                                                        class="pe-7s-shopbag"></i></a>
                                                            @else
                                                                @if ($product->variant->count() > 0)
                                                                    @php
                                                                        $hasStock = $product->variant->contains(
                                                                            function ($variant) {
                                                                                return $variant->stock > 0;
                                                                            },
                                                                        );
                                                                    @endphp

                                                                    @if ($hasStock)
                                                                        <form action="{{ route('cart.store', $product->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="action">
                                                                                <i class="pe-7s-shopbag"></i>
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                        <script>
                                                                            swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Out of Stock',
                                                                                text: 'This product is currently out of stock!'
                                                                            })
                                                                        </script>
                                                                    @endif
                                                                @else
                                                                    <button type="submit" class="action outOfStockButton"><i
                                                                            class="pe-7s-shopbag"></i></button>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <a class="action" href="{{ route('login') }}"><i
                                                                    class="pe-7s-shopbag"></i></a>
                                                        @endauth
                                                    </li>
                                                    <li style="margin-left: 10px">
                                                        @auth
                                                            @if (wishlist_exist($product->id))
                                                                <a class="action"
                                                                    style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i
                                                                        class="pe-7s-like"></i></a>
                                                            @else
                                                                <a class="action"
                                                                    href="{{ route('wishlist.store', $product->id) }}"><i
                                                                        class="pe-7s-like"></i></a>
                                                            @endif
                                                        @else
                                                            <a class="action" href="{{ route('login') }}"><i
                                                                    class="pe-7s-like"></i></a>
                                                        @endauth
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title">
                                                    <a
                                                        href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                                </h4>
                                                <div class="price">
                                                    <span class="sale-price">{{ '$' . $product->price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-danger text-center">There is no Product to show!</p>
                                    </div>
                                @endforelse
                                <!-- Single Product End -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Tabs Content End -->
            </div>
            <!-- Product Wrapper 02 End -->
        </div>
    </div>
    <!-- New Product Section End -->

    <!-- Banner Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">

                <!-- Single Banner Start -->
                @foreach ($featured_category as $fc)
                    <div class="col-lg-6">
                        <div class="single-banner-03">
                            <a href="{{ route('frontpage') }}" style="cursor:default">
                                <img src="{{ $fc->image }}" width="570" height="299" alt="Banner" />

                                <div class="banner-content" style="width:50%">
                                    <h3 class="title" style="font-size:2rem">{{ $fc->name }}</h3>
                                    <button class="btn btn-primary btn-hover-dark" style="cursor:pointer">Shop
                                        Now</button>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- Single Banner End -->

                {{-- <div class="col-lg-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-03">
                        <img src="{{ asset('frontend') }}/assets/images/banner/banner-06.jpg" width="570"
                            height="299" alt="Banner" />

                        <div class="banner-content">
                            <h6 class="sub-title">Best-Quality</h6>
                            <h3 class="title">
                                <a href="shop-grid-left-sidebar.html">Bed Room <br />
                                    Furniture</a>
                            </h3>
                            <a class="btn btn-primary btn-hover-dark" href="shop-grid-left-sidebar.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div> --}}

            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Welcome Image -->
    <div class="section call-to-action"
        style="background: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url({{ asset($welcome_imgs->welcome_img) }})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="call-to-action-content text-center">
                        <h1 class="title" style="color:#f2a100;font-weight:600">{{ $welcome_imgs->welcome_title }}</h1>
                        <p style="color:#F9F6EE">{{ $welcome_imgs->welcome_desc }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Welcome Image -->

    <!-- Sale Product Section Start -->
    <div class="section section-padding-02">
        <div class="container">

            <div class="product-top-wrapper">
                <div class="section-title">
                    <h2 class="title" style="font-size:35px">#Sale Products</h2>
                </div>
            </div>

            <div class="product-wrapper-02">
                <div class="row">

                    @forelse ($sale_products as $product)
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-product-02">
                                <div class="product-images">
                                    <a href="#"><img src="{{ $product->thumbnail }}"
                                            style="width:276px;height:303px" alt="product" /></a>

                                    <ul class="product-meta">
                                        <li style="margin-right: 10px">
                                            @auth
                                                @if (cart_exist($product->id))
                                                    <a class="action"
                                                        style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i
                                                            class="pe-7s-shopbag"></i></a>
                                                @else
                                                    @if ($product->variant->count() > 0)
                                                        @php
                                                            $hasStock = $product->variant->contains(function (
                                                                $variant,
                                                            ) {
                                                                return $variant->stock > 0;
                                                            });
                                                        @endphp

                                                        @if ($hasStock)
                                                            <form action="{{ route('cart.store', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="action">
                                                                    <i class="pe-7s-shopbag"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <script>
                                                                swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Out of Stock',
                                                                    text: 'This product is currently out of stock!'
                                                                })
                                                            </script>
                                                        @endif
                                                    @else
                                                        <button type="submit" class="action outOfStockButton2"><i
                                                                class="pe-7s-shopbag"></i></button>
                                                    @endif
                                                @endif
                                            @else
                                                <a class="action" href="{{ route('login') }}"><i
                                                        class="pe-7s-shopbag"></i></a>
                                            @endauth
                                        </li>
                                        <li style="margin-left: 10px">
                                            @auth
                                                @if (wishlist_exist($product->id))
                                                    <a class="action"
                                                        style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i
                                                            class="pe-7s-like"></i></a>
                                                @else
                                                    <a class="action" href="{{ route('wishlist.store', $product->id) }}"><i
                                                            class="pe-7s-like"></i></a>
                                                @endif
                                            @else
                                                <a class="action" href="{{ route('login') }}"><i class="pe-7s-like"></i></a>
                                            @endauth
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h4 class="title">
                                        <a href="#">{{ $product->name }}</a>
                                    </h4>
                                    <div class="price">
                                        <span class="sale-price"><i
                                                class="mdi mdi-currency-bdt"></i>{{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-danger text-center">There is no Product to show!</p>
                        </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
    <!-- End Sale Product Section Start -->

    <!-- Gallery Image -->
    <div class="section section-padding-02">
        <div class="gallery-image">
            <img src="{{ asset($gallery_imgs->gallery_img_1) }}" alt="Gallery Image 1">
            <img src="{{ asset($gallery_imgs->gallery_img_2) }}" alt="Gallery Image 2">
            <img src="{{ asset($gallery_imgs->gallery_img_3) }}" alt="Gallery Image 3">
            <img src="{{ asset($gallery_imgs->gallery_img_4) }}" alt="Gallery Image 4">
        </div>
    </div>
    <!-- End Gallery Image -->

    <!-- Testimonial Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Testimonial Wrapper Start -->
            <div class="testimonial-wrapper testimonial-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($testimonials as $testimonial)
                            <!-- single Testimonial Start -->
                            <div class="single-testimonial swiper-slide">
                                <img class="quote" src="{{ asset('frontend') }}/assets/images/icon/quote.png" alt="Icon" />
                                <p>{{ $testimonial->comment }}</p>
                                <img class="author-thumb" src="{{ asset($testimonial->image) }}" width="100" height="100" alt="Author" />
                                <h6 class="name">{{ $testimonial->name }}</h6>
                                <span class="designation">{{ $testimonial->profession }}</span>
                            </div>
                            <!-- single Testimonial End -->
                        @endforeach

                        {{-- <!-- single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <img class="quote" src="assets/images/icon/quote.png" alt="Icon" />
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore dolorelo magna aliqua.
                                Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit
                            </p>
                            <img class="author-thumb" src="assets/images/author-1.jpg" width="100" height="100" alt="Author" />
                            <h6 class="name">Taelynn Thorpe</h6>
                            <span class="designation">Customer</span>
                        </div>
                        <!-- single Testimonial End -->

                        <!-- single Testimonial Start -->
                        <div class="single-testimonial swiper-slide">
                            <img class="quote" src="assets/images/icon/quote.png" alt="Icon" />
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore dolorelo magna aliqua.
                                Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit
                            </p>
                            <img class="author-thumb" src="assets/images/author-1.jpg" width="100" height="100" alt="Author" />
                            <h6 class="name">Taelynn Thorpe</h6>
                            <span class="designation">Customer</span>
                        </div>
                        <!-- single Testimonial End --> --}}
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- Testimonial Wrapper End -->
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Product Icon -->
    <div class="section product-icon-wrapper" style="background-color:#f2a100">
        <div class="container">
            <div class="product-icon d-flex justify-content-between">
                <img src="{{ asset($product_icons->product_icon_1) }}" alt="Product Icon 1">
                <img src="{{ asset($product_icons->product_icon_2) }}" alt="Product Icon 2">
                <img src="{{ asset($product_icons->product_icon_3) }}" alt="Product Icon 3">
                <img src="{{ asset($product_icons->product_icon_4) }}" alt="Product Icon 4">
                <img src="{{ asset($product_icons->product_icon_5) }}" alt="Product Icon 5">
            </div>
        </div>
    </div>
    <!-- End Product Icon -->

    <!-- Product Banner Section Start -->
@endsection

@section('footer-content')
    <script>
        document.querySelectorAll('.outOfStockButton').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Out of Stock',
                    text: 'This product is currently out of stock!',
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.outOfStockButton2').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Out of Stock',
                    text: 'This product is currently out of stock!',
                });
            });
        });
    </script>
@endsection
