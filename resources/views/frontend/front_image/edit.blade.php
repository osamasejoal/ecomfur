@extends('backend.layout.master')

@section('header-content')
    <style>
        .fi-heading {
            display: inline-block;
            padding-bottom: 20px;
        }

        .fi-heading p {
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 1.8px solid #999;
            padding-bottom: 5px;
            padding-right: 70px;
            color: #666;
        }

        .fi-heading p span {
            font-weight: 100;
            color: #777;
        }

        .gallery img {
            width: 100%;
            height: auto;
            display: inline-block;
            object-fit: cover;
            object-position: center;
            vertical-align: middle;
            border-radius: 3px;
        }

        .welcome_img {
            width: 80%;
            margin: auto;
        }

        .product-icon {
            background-color: #f2a100;
            padding: 5px;
            border-radius: 3px;
        }

        .product-icon img {
            width: 60%;
            border-radius: 0;
            display: block;
            margin: auto;
        }

        @media (max-width: 991.99px) {
            .gallery_img {
                width: 80%;
                margin: auto;
            }

            .gallery_img-wrapper label {
                margin-top: 2rem;
            }

            .gallery_img-wrapper .first-label {
                margin-top: 0;
            }

            .gallery_img-wrapper .second-label {
                margin-top: 0;
            }
        }

        @media (max-width: 767.99px) {
            .gallery_img {
                width: 50%;
                margin: auto;
            }

            .product-icon {
                width: 50%;
                margin: auto;
            }

            .product-icon-wrapper label {
                margin-top: 2rem;
            }

            .product-icon-wrapper .first-label {
                margin-top: 0;
            }

            .gallery_img-wrapper .second-label {
                margin-top: 2rem;
            }
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
                            <h4 class="mb-sm-0">Edit Front Image</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('front.image.view') }}">Front Image</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row my-5">
                    <div class="col-lg-11 m-auto">
                        <div class="container-fluid">

                            <form action="{{ route('front.image.update', $front_img->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <!-- Welcome Image -->
                                <div class="col-12">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="fi-heading">
                                                <p>Welcome Offer <span>Image</span></p>
                                            </div>

                                            <div class="row" style="font-size:1rem">
                                                <div class="container mb-5">
                                                    <!-- Title -->
                                                    <div class="title col-12">
                                                        <label for="title" id="title">Title: <span class="text-danger">*</span></label>
                                                        <input type="text" name="welcome_title" id="title" class="form-control" value="{{ $front_img->welcome_title }}">
                                                        @error('welcome_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!-- Description -->
                                                    <div class="description col-12 mt-4">
                                                        <label for="description" id="description">Description: <span class="text-danger">*</span></label>
                                                        <textarea name="welcome_desc" id="description" rows="4" class="form-control">{{ $front_img->welcome_desc }}</textarea>
                                                        @error('welcome_desc')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="container">
                                                    <input type="file" name="welcome_img" id="image"
                                                        class="form-control">

                                                    @error('welcome_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="container mt-4">
                                                    <div class="gallery welcome_img">
                                                        <img src="{{ asset($front_img->welcome_img) }}"
                                                            id="showImage" alt="Welcome Image">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Gallery Image -->
                                <div class="col-12 mt-5 gallery_img-wrapper">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="fi-heading">
                                                <p>Gallery <span>Image</span></p>
                                            </div>

                                            <div class="row">

                                                <!-- Image-1 -->
                                                <div class="col-lg-3 col-md-6">

                                                    <label for="g_i_1"
                                                        class="form-label fs-5 d-block text-center mb-3 first-label"
                                                        style="font-weight:600">Image-1</label>

                                                    <input type="file" name="gallery_img_1" id="g_i_1"
                                                        class="form-control">

                                                    @error('gallery_img_1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery gallery_img mt-4">
                                                        <img src="{{ asset($front_img->gallery_img_1) }}"
                                                            id="show_g_i_1" alt="Gallery Image 1">
                                                    </div>
                                                </div>

                                                <!-- Image-2 -->
                                                <div class="col-lg-3 col-md-6">

                                                    <label for="g_i_2"
                                                        class="form-label fs-5 d-block text-center mb-3 second-label"
                                                        style="font-weight:600">Image-2</label>

                                                    <input type="file" name="gallery_img_2" id="g_i_2"
                                                        class="form-control">

                                                    @error('gallery_img_2')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery gallery_img mt-4">
                                                        <img src="{{ asset($front_img->gallery_img_2) }}"
                                                            id="show_g_i_2" alt="Gallery Image 2">
                                                    </div>
                                                </div>

                                                <!-- Image-3 -->
                                                <div class="col-lg-3 col-md-6">

                                                    <label for="g_i_3" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Image-3</label>

                                                    <input type="file" name="gallery_img_3" id="g_i_3"
                                                        class="form-control">

                                                    @error('gallery_img_3')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery gallery_img mt-4">
                                                        <img src="{{ asset($front_img->gallery_img_3) }}"
                                                            id="show_g_i_3" alt="Gallery Image 1">
                                                    </div>
                                                </div>

                                                <!-- Image-4 -->
                                                <div class="col-lg-3 col-md-6">

                                                    <label for="g_i_4" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Image-4</label>

                                                    <input type="file" name="gallery_img_4" id="g_i_4"
                                                        class="form-control">

                                                    @error('gallery_img_4')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery gallery_img mt-4">
                                                        <img src="{{ asset($front_img->gallery_img_4) }}"
                                                            id="show_g_i_4" alt="Gallery Image 1">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Product Icon -->
                                <div class="col-12 mt-5 product-icon-wrapper">
                                    <div class="card border-warning">
                                        <div class="card-body">

                                            <div class="fi-heading">
                                                <p>Product <span>Icon</span></p>
                                            </div>

                                            <div class="row">

                                                <!-- Icon-1 -->
                                                <div class="col-12 col-md">

                                                    <label for="p_i_1"
                                                        class="form-label fs-5 d-block text-center mb-3 first-label"
                                                        style="font-weight:600">Icon-1</label>

                                                    <input type="file" name="product_icon_1" id="p_i_1"
                                                        class="form-control">

                                                    @error('product_icon_1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery product-icon mt-4">
                                                        <img src="{{ asset($front_img->product_icon_1) }}"
                                                            id="show_p_i_1" alt="Product Icon 1">
                                                    </div>
                                                </div>

                                                <!-- Icon-2 -->
                                                <div class="col-12 col-md">

                                                    <label for="p_i_2" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Icon-2</label>

                                                    <input type="file" name="product_icon_2" id="p_i_2"
                                                        class="form-control">

                                                    @error('product_icon_2')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery product-icon mt-4">
                                                        <img src="{{ asset($front_img->product_icon_2) }}"
                                                            id="show_p_i_2" alt="Product Icon 2">
                                                    </div>
                                                </div>

                                                <!-- Icon-3 -->
                                                <div class="col-12 col-md">

                                                    <label for="p_i_3" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Icon-3</label>

                                                    <input type="file" name="product_icon_3" id="p_i_3"
                                                        class="form-control">

                                                    @error('product_icon_3')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery product-icon mt-4">
                                                        <img src="{{ asset($front_img->product_icon_3) }}"
                                                            id="show_p_i_3" alt="Product Icon 3">
                                                    </div>
                                                </div>

                                                <!-- Icon-4 -->
                                                <div class="col-12 col-md">

                                                    <label for="p_i_4" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Icon-4</label>

                                                    <input type="file" name="product_icon_4" id="p_i_4"
                                                        class="form-control">

                                                    @error('product_icon_4')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery product-icon mt-4">
                                                        <img src="{{ asset($front_img->product_icon_4) }}"
                                                            id="show_p_i_4" alt="Product Icon 4">
                                                    </div>
                                                </div>

                                                <!-- Icon-5 -->
                                                <div class="col-12 col-md">

                                                    <label for="p_i_5" class="form-label fs-5 d-block text-center mb-3"
                                                        style="font-weight:600">Icon-5</label>

                                                    <input type="file" name="product_icon_5" id="p_i_5"
                                                        class="form-control">

                                                    @error('product_icon_5')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <div class="gallery product-icon mt-4">
                                                        <img src="{{ asset($front_img->product_icon_5) }}"
                                                            id="show_p_i_5" alt="Product Icon 5">
                                                    </div>
                                                </div>

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

                                            <div class="row">
                                                <div class="container">
                                                    <input type="file" name="breadcrumb_bg_img" id="bc_bg_img"
                                                        class="form-control">

                                                    @error('breadcrumb_bg_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="container mt-4">
                                                    <div class="gallery welcome_img">
                                                        <img src="{{ asset($front_img->breadcrumb_bg_img) }}"
                                                            id="show_bc_bg_img" alt="Welcome Offer Image">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-5">
                                    <div class="update-button" style="padding: 5% 30% 0 30%">
                                        <button type="submit" class="btn btn-warning btn-lg d-block m-auto w-100">Update</button>
                                    </div>
                                </div>
                                
                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection

    @section('footer-content')
        <!-- The script to show the image what have been chosen by user but didn't submit yet. -->

        <!-- Welcome Offer Image -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Gallery Image 1 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#g_i_1').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_g_i_1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Gallery Image-2 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#g_i_2').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_g_i_2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Gallery Image-3 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#g_i_3').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_g_i_3').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Gallery Image-4 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#g_i_4').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_g_i_4').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Product Icon-1 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#p_i_1').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_p_i_1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Product Icon-2 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#p_i_2').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_p_i_2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Product Icon-3 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#p_i_3').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_p_i_3').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Product Icon-4 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#p_i_4').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_p_i_4').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Product Icon-5 -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#p_i_5').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_p_i_5').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>

        <!-- Breadcrumb Background Image -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#bc_bg_img').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_bc_bg_img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>
    @endsection
