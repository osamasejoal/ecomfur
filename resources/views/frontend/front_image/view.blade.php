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

                        <!-- Welcome Image -->
                        <div class="col-12">
                            <div class="card border-warning">
                                <div class="card-body">

                                    <div class="fi-heading">
                                        <p>Welcome <span>Image</span></p>
                                    </div>

                                    <div class="welcome-content p-3" style="font-size:1rem">
                                        <div class="title row">
                                            <div class="col-lg-2 d-flex justify-content-lg-end">
                                                <label for="title" class="form-label fw-bold">Title: </label>
                                            </div>
                                            <div class="col-lg-10">
                                                <p id="title">{{ $front_img->welcome_title }}</p>
                                            </div>
                                        </div>
    
                                        <div class="desc row">
                                            <div class="col-lg-2 d-flex justify-content-lg-end">
                                                <label for="description" class="form-label fw-bold">Description: </label>
                                            </div>
                                            <div class="col-lg-10">
                                                <p id="description">{{ $front_img->welcome_desc }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="gallery welcome-offer mt-3">
                                        <div><img src="{{ asset($front_img->welcome_img) }}" alt="Welcome Offer"></div>
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
                                        <div><img src="{{ asset($front_img->gallery_img_1) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_img->gallery_img_2) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_img->gallery_img_3) }}" alt="Gallery Image"></div>
                                        <div><img src="{{ asset($front_img->gallery_img_4) }}" alt="Gallery Image"></div>
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
                                        <div><img src="{{ asset($front_img->product_icon_1) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_img->product_icon_2) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_img->product_icon_3) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_img->product_icon_4) }}" alt="Product Icon"></div>
                                        <div><img src="{{ asset($front_img->product_icon_5) }}" alt="Product Icon"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <!-- Breadcrumb Background Image -->
                        <div class="col-12 mt-5">
                            <div class="card border-warning">
                                <div class="card-body">

                                    <div class="fi-heading">
                                        <p>Breadcrumb Background <span>Image</span></p>
                                    </div>

                                    <div class="gallery welcome-offer">
                                        <div><img src="{{ asset($front_img->breadcrumb_bg_img) }}" alt="Welcome Offer"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Action -->
                        <div class="col-12 mt-5">
                            <div class="edit-button" style="padding: 5% 30% 0 30%">
                                <a href="{{ route('front.image.edit', $front_img->id) }}" class="btn btn-warning btn-lg d-block">Edit</a>
                            </div>
                        </div>


                        
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
