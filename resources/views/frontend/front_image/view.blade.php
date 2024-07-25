@extends('backend.layout.master')

@section('header-content')
    <style>
        .fi-heading{
            display: inline-block;
            padding-bottom: 20px;
        }
        .fi-heading p{
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 1.8px solid #999;
            padding-bottom: 5px;
            padding-right: 70px;
            color: #666;
        }
        .fi-heading p span{
            font-weight: 100;
            color: #777;
        }
        .gallery img{
            width: 100%;
            height: auto;
            vertical-align: middle;
            display: inline-block;
            object-fit: cover;
        }
        .gallery>div{
            display: flex;
            justify-content: center;
            overflow: hidden;
        }
        .gallery-image{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(20px, 1fr));
            grid-auto-flow: dense;
        }
        .product-icon{
            display: grid;
            grid-gap: 17px;
            grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
            grid-auto-flow: dense;
        }
        .product-icon>div{
            padding: 5px;
            background-color: #f2a100;
            border-radius: 5px;
            align-items: center;
        }
    </style>
@endsection

@section('main-content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Service</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Front Image</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row my-5">
                    <div class="container">

                        <!-- Welcome / Offer Image -->
                        <div class="col-12">
                            <div class="card border-warning">
                                <div class="card-body">

                                    <div class="fi-heading">
                                        <p>Welcome Offer <span>Image</span></p>
                                    </div>

                                    <div class="gallery welcome-offer">
                                        <div><img src="{{ asset($front_images->welcolme_or_offer_image) }}" alt="Welcome Offer"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Gallery Image -->
                        <div class="col-12 mt-5">
                            <div class="card border-warning">
                                <div class="card-body">

                                    <div class="fi-heading">
                                        <p>Gallery <span>Image</span></p>
                                    </div>

                                    <div class="gallery gallery-image">
                                        <div><img src="{{ asset($front_images->gallery_image_1) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_images->gallery_image_2) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_images->gallery_image_3) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_images->gallery_image_4) }}" alt="Gallery Image"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Product Icon -->
                        <div class="col-12 mt-5">
                            <div class="card border-warning">
                                <div class="card-body">

                                    <div class="fi-heading">
                                        <p>Product <span>Icon</span></p>
                                    </div>

                                    <div class="gallery product-icon">
                                        <div><img src="{{ asset($front_images->product_icon_1) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_images->product_icon_2) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_images->product_icon_3) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_images->product_icon_4) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_images->product_icon_5) }}" alt="Product Icon"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Action -->
                        <div class="col-12 mt-5">
                            <div class="edit-button" style="padding: 5% 30% 0 30%">
                                <a href="{{ route('front.image.edit', $front_images->id) }}" class="btn btn-warning btn-lg d-block">Edit</a>
                            </div>
                        </div>


                        
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
