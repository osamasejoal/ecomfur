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

        .welcome-offer-image {
            height: 696px;
            align-items: center;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-box-align: center;
            -webkit-align-items: center;
        }
        .section.call-to-action{
            height: 75vh;
        }
        .call-to-action-content p{
            margin-top: 3rem;
        }
        .product-icon-wrapper{
            padding: 70px 0;
        }
        .product-icon img{
            width: 10%;
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
            .call-to-action-content p{
                font-size: 12px;
                width: 80%;
                display: block;
                margin: auto;
                margin-top: 1.5rem;
            }
            .product-icon-wrapper{
                padding: 50px 0;
            }
        }

        @media (max-width: 480px) {
            .section.call-to-action {
                height: 20vh;
            }
            .product-icon-wrapper{
                padding: 30px 0;
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
                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01"
                        style="
                                background-image: url({{ asset('frontend') }}/assets/images/slider/slider-01.jpg);
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
                    </div>
                    <!-- Single Slider End  -->

                    <!-- Single Slider Start  -->
                    <div class="single-slider slider-02 swiper-slide animation-style-01"
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
                    </div>
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
                                                <a href="#"><img src="{{ $product->thumbnail }}" width="270"
                                                        height="303" alt="product" /></a>

                                                <ul class="product-meta">
                                                    <li style="margin-right: 10px">
                                                        <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li style="margin-left: 10px">
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title">
                                                    <a href="#">{{ $product->name }}</a>
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
                                    <button class="btn btn-primary btn-hover-dark" style="cursor:pointer">Shop Now</button>
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

    <!-- Welcome Offer Image -->
    <div class="section call-to-action"
        style="background: linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url({{ asset($welcome_offer_image->welcolme_or_offer_image) }});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="call-to-action-content text-center">
                        <h1 class="title" style="color:#f2a100;font-weight:600">Welcome To Store</h1>
                        <p style="color:#F9F6EE">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Welcome Offer Image -->



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

                    @forelse ($products as $product)    
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-product-02">
                                <div class="product-images">
                                    <a href="#"><img src="{{ $product->thumbnail }}" width="270"
                                            height="303" alt="product" /></a>

                                    <ul class="product-meta">
                                        <li style="margin-right: 10px">
                                            <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                        </li>
                                        <li style="margin-left: 10px">
                                            <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h4 class="title">
                                        <a href="#">{{ $product->name }}</a>
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

                </div>
            </div>

        </div>
    </div>
    <!-- End Sale Product Section Start -->

    <!-- Gallery Image -->
    <div class="section section-padding-02">
        <div class="gallery-image">
            <img src="{{ asset($gallery_images->gallery_image_1) }}" alt="Gallery Image 1">
            <img src="{{ asset($gallery_images->gallery_image_2) }}" alt="Gallery Image 2">
            <img src="{{ asset($gallery_images->gallery_image_3) }}" alt="Gallery Image 3">
            <img src="{{ asset($gallery_images->gallery_image_4) }}" alt="Gallery Image 4">
        </div>
    </div>
    <!-- End Gallery Image -->

    <!-- Blog Section Start -->
    <div class="section section-padding">
        <div class="container">
            <!-- Blog Wrapper End -->
            <div class="blog-active">
                <!-- Blog Top Wrapper Start -->
                <div class="blog-top-wrapper">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2 class="title"># Latest Blog</h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Swiper Arrows End -->
                    <div class="swiper-arrows">
                        <!-- Add Arrows -->
                        <div class="swiper-button-prev">
                            <i class="pe-7s-angle-left"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="pe-7s-angle-right"></i>
                        </div>
                    </div>
                    <!-- Swiper Arrows End -->
                </div>
                <!-- Blog Top Wrapper End -->

                <!-- Blog Items Wrapper End -->
                <div class="blog-items-wrapper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-01.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Unique products that will
                                                impress your home.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-02.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Interior designer Nancy,
                                                the witch of the unique
                                                space.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Single Blog Start -->
                                <div class="single-blog">
                                    <a href="blog-details-left-sidebar.html"><img
                                            src="{{ asset('frontend/assets') }}/images/blog/blog-03.jpg" width="370"
                                            height="230" alt="Blog" /></a>

                                    <div class="blog-content">
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="pe-7s-user"></i>
                                                <span>
                                                    BY:<a href="#">ADMIN</a></span>
                                            </li>
                                            <li>
                                                <i class="pe-7s-date"></i>
                                                <span>27 FEB 2023</span>
                                            </li>
                                        </ul>
                                        <h4 class="title">
                                            <a href="blog-details-left-sidebar.html">Decorate your home with the
                                                most modern furnishings.</a>
                                        </h4>
                                        <a href="blog-details-left-sidebar.html"
                                            class="btn btn-dark btn-hover-primary">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog Items Wrapper End -->
            </div>
            <!-- Blog Wrapper End -->
        </div>
    </div>
    <!-- Blog Section End -->
    
    <!-- Product Icon -->
    <div class="section product-icon-wrapper" style="background-color:#f2a100">
        <div class="container">
            <div class="product-icon d-flex justify-content-between">
                <img src="{{ asset($product_icon->product_icon_1) }}" alt="Product Icon 1">
                <img src="{{ asset($product_icon->product_icon_2) }}" alt="Product Icon 2">
                <img src="{{ asset($product_icon->product_icon_3) }}" alt="Product Icon 3">
                <img src="{{ asset($product_icon->product_icon_4) }}" alt="Product Icon 4">
                <img src="{{ asset($product_icon->product_icon_5) }}" alt="Product Icon 5">
            </div>
        </div>
    </div>
    <!-- End Product Icon -->

    <!-- Product Banner Section Start -->
@endsection
