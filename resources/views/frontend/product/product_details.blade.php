@extends('frontend.layout.master')

@section('header-content')
<style>
    .page-banner-section {
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset(bc_bg_img()->breadcrumb_bg_img) }});
    }
</style>
@endsection

@section('main-content')

    <!-- Page Banner Section Start -->
    <div class="section page-banner-section text-center"
        style="background-size:cover;background-position:center center;height:40vh;">
        <div class="container">

            <div class="page-banner-content" style="color: #fff">
                <h2 class="title mb-3">Product</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">Product</li>
                </ul>
            </div>
            
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Product Details Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <!-- Product Section Wrapper Start -->
            <div class="product-section-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Product Details Images Start -->
                        <div class="product-details-images">
                            <!-- Details Gallery Images Start -->
                            <div class="details-gallery-images" id="img-container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-1.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-2.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-3.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-3.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-4.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-5.jpg" width="570"
                                                height="604" alt="Product Image" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details Gallery Images End -->

                            <!-- Details Gallery Thumbs Start -->
                            <div class="details-gallery-thumbs">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-1.jpg" width="88"
                                                height="93" alt="Product Thumbnail" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-2.jpg" width="88"
                                                height="93" alt="Product Thumbnail" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-3.jpg" width="88"
                                                height="93" alt="Product Thumbnail" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-4.jpg" width="88"
                                                height="93" alt="Product Thumbnail" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('frontend') }}/assets/images/product-details/product-details-5.jpg" width="88"
                                                height="93" alt="Product Thumbnail" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-prev">
                                    <i class="pe-7s-angle-left"></i>
                                </div>
                                <div class="swiper-button-next">
                                    <i class="pe-7s-angle-right"></i>
                                </div>
                            </div>
                            <!-- Details Gallery Thumbs End -->
                        </div>
                        <!-- Product Details Images End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Product Details Description Start -->
                        <div class="product-details-description">
                            <h4 class="product-name">{{ $product->name }}</h4>
                            <div class="price">
                                <span class="sale-price"><i class="mdi mdi-currency-bdt"></i>&nbsp;{{ $product->price }}</span>
                            </div>

                            <!-- Customer Review sum up (Star) -->
                            {{-- <div class="review-wrapper">
                                <div class="review-star">
                                    <div class="star" style="width: 80%"></div>
                                </div>
                                <p>
                                    <a href="#reviews">( 1 Customer Review )</a>
                                </p>
                            </div> --}}

                            <div class="product-color">
                                <span class="lable">Color:</span>
                                <ul>
                                    <li>
                                        <input type="radio" name="colors" id="color1" />
                                        <label for="color1"><span class="color-blue"></span></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="colors" id="color2" />
                                        <label for="color2"><span class="color-gray"></span></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="colors" id="color3" />
                                        <label for="color3"><span class="color-dark-blue"></span></label>
                                    </li>
                                    <li>
                                        <input type="radio" name="colors" id="color4" />
                                        <label for="color4"><span class="color-gray-dark"></span></label>
                                    </li>
                                </ul>
                            </div>

                            <p>{{ $product->short_description }}</p>

                            <div class="product-meta">
                                <div class="meta-action">
                                    <a href="#" class="btn btn-dark btn-hover-primary">Buy Now</a>
                                </div>
                                <div class="meta-action">
                                    <a class="action" href="#"><i class="pe-7s-shopbag"></i></a>
                                </div>
                                <div class="meta-action">
                                    @auth
                                        @if (wishlist_exist($product->id))
                                            <a class="action" style="background-color:#f2a100;border-color:#f2a100;color:#fff"><i class="pe-7s-like"></i></a>
                                        @else
                                            <a class="action" href="{{ route('wishlist.store', $product->id) }}"><i class="pe-7s-like"></i></a>
                                        @endif
                                    @else
                                        <a class="action" href="{{ route('frontpage') }}"><i class="pe-7s-like"></i></a>
                                    @endauth
                                    
                                </div>
                            </div>

                            <div class="product-info">
                                <div class="single-info">
                                    <p class="fs-6"><span class="me-4 fw-bold" style="color:#495057">Product Code:</span>{{ $product->code }}</p>
                                </div>
                                <div class="single-info">
                                    <p class="fs-6 mt-0">
                                        <span class="me-4 fw-bold" style="color:#495057">Category:</span>
                                        <a href="{{ route('category.products', $product->category_id) }}">{{ $product->category->name }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details Description End -->
                    </div>
                </div>
            </div>
            <!-- Product Section Wrapper End -->
        </div>
    </div>
    <!-- Product Details Section End -->

    <!-- Product Details tab Section Start -->
    <div class="section section-padding-02">
        <div class="container">
            <!-- Product Details Tabs Start -->
            <div class="product-details-tabs">
                <ul class="nav justify-content-center">
                    {{-- <li>
                        <button data-bs-toggle="tab" data-bs-target="#information">
                            Information
                        </button>
                    </li> --}}
                    <li>
                        <button class="active" data-bs-toggle="tab" data-bs-target="#description">
                            Description
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#reviews">
                            Reviews (03)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description">
                        <!-- Description Content Start -->
                        <div class="description-content">
                            <p>{{ $product->description }}</p>
                        </div>
                        <!-- Description Content End -->
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <!-- Reviews Content Start -->
                        <div class="reviews-content">
                            <!-- Review Comment Start  -->
                            <div class="reviews-comment">
                                <!-- Single Comment Start  -->
                                <div class="single-reviews">
                                    <div class="comment-author">
                                        <img src="{{ asset('frontend') }}/assets/images/author/author-1.png" width="100" height="100"
                                            alt="author" />
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2023</span>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Esse deleniti itaque
                                            velit explicabo at eum incidunt vel
                                            reprehenderit maxime eos facere ut
                                            pariatur voluptas aut, porro quia
                                            molestias sequi cupiditate!
                                        </p>
                                    </div>
                                </div>
                                <!-- Single Comment End  -->
                                <!-- Single Comment Start  -->
                                <div class="single-reviews">
                                    <div class="comment-author">
                                        <img src="{{ asset('frontend') }}/assets/images/author/author-2.png" width="100" height="100"
                                            alt="author" />
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Aidyn Cody</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2023</span>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Esse deleniti itaque
                                            velit explicabo at eum incidunt vel
                                            reprehenderit maxime eos facere ut
                                            pariatur voluptas aut, porro quia
                                            molestias sequi cupiditate!
                                        </p>
                                    </div>
                                </div>
                                <!-- Single Comment End  -->
                                <!-- Single Comment Start  -->
                                <div class="single-reviews">
                                    <div class="comment-author">
                                        <img src="{{ asset('frontend') }}/assets/images/author/author-3.png" width="100" height="100"
                                            alt="author" />
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2023</span>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit. Esse deleniti itaque
                                            velit explicabo at eum incidunt vel
                                            reprehenderit maxime eos facere ut
                                            pariatur voluptas aut, porro quia
                                            molestias sequi cupiditate!
                                        </p>
                                    </div>
                                </div>
                                <!-- Single Comment End  -->
                            </div>
                            <!-- Review Comment End  -->

                            <!-- Review Form Start  -->
                            <div class="reviews-form">
                                <h3 class="reviews-title">Add a review</h3>

                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="text" placeholder="Enter your name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="email" placeholder="john.smith@example.com" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="review-rating">
                                                <label class="title">Rating:</label>
                                                <ul id="rating" class="rating">
                                                    <li class="star" title="Poor" data-value="1">
                                                        <i class="fa fa-star-o"></i>
                                                    </li>
                                                    <li class="star" title="Poor" data-value="2">
                                                        <i class="fa fa-star-o"></i>
                                                    </li>
                                                    <li class="star" title="Poor" data-value="3">
                                                        <i class="fa fa-star-o"></i>
                                                    </li>
                                                    <li class="star" title="Poor" data-value="4">
                                                        <i class="fa fa-star-o"></i>
                                                    </li>
                                                    <li class="star" title="Poor" data-value="5">
                                                        <i class="fa fa-star-o"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <textarea placeholder="Write your comments here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form">
                                                <button class="btn btn-dark btn-hover-primary">
                                                    Submit Review
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Review Form End  -->
                        </div>
                        <!-- Reviews Content End -->
                    </div>
                </div>
            </div>
            <!-- Product Details Tabs End -->
        </div>
    </div>
    <!-- Product Details tab Section End -->

    <!-- Sale Product Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="">
                <!-- Product Wrapper Start -->
                <div class="product-active-02">
                    <!-- Product Top Wrapper Start -->
                    <div class="product-top-wrapper">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="title"># Related Products</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Product Menu Start -->
                        <div class="product-menu">
                            <ul class="nav">
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#tab7">
                                        All Time
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#tab8">
                                        This Year
                                    </button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#tab9">
                                        This Month
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Menu End -->

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
                    <!-- Product Top Wrapper End -->

                    <!-- Product Tabs Content Start -->
                    <div class="product-tabs-content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab7">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-07.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Wooden decorations</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-08.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Herman Seater Sofa</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-09.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Reece Seater Sofa</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Round Swivel Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab8">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Elona bedside grey
                                                            table</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-02.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Simple minimal Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Pendant Chandelier
                                                            Light</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">High quality vase
                                                            bottle</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab9">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-04.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">High quality vase
                                                            bottle</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-03.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Pendant Chandelier
                                                            Light</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-01.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Elona bedside grey
                                                            table</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <div class="swiper-slide">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <a href="#"><img src="{{ asset('frontend') }}/assets/images/product/product-10.jpg"
                                                        width="270" height="303" alt="product" /></a>
                                                <div class="product-content">
                                                    <h4 class="title">
                                                        <a href="product-details.html">Round Swivel Chair</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span class="sale-price">$240.00</span>
                                                    </div>
                                                </div>
                                                <ul class="product-meta">
                                                    <li>
                                                        <a class="action" data-bs-toggle="modal"
                                                            data-bs-target="#quickView" href="#"><i
                                                                class="pe-7s-search"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i
                                                                class="pe-7s-shopbag"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="action" href="#"><i class="pe-7s-like"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Tabs Content End -->
                </div>
                <!-- Product Wrapper End -->
            </div>
        </div>
    </div>
    <!-- Sale Product Section End -->
@endsection
