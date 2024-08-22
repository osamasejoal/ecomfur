@extends('backend.layout.master')

@section('header-content')
    <!-- CSS -->
    <style>
        .custom-heading {
            display: inline-block;
            padding-bottom: 20px;
            margin: 1rem;
            margin-left: .6rem;
        }

        .custom-heading p {
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            padding-right: 70px;
        }

        .custom-heading p span {
            font-weight: 100;
        }

        .gallery-wrapper img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            display: inline-block;
        }

        .gallery-wrapper>div {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .gallery-wrapper>div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
            transition: all .3s;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;

        }

        .gallery-wrapper {
            display: grid;
            grid-gap: 15px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-auto-rows: 336px;
            grid-auto-flow: dense;
        }

        .gallery-wrapper .wide {
            grid-column: span 2;
        }

        .gallery-wrapper .tall {
            grid-row: span 2;
        }

        .gallery-wrapper .big {
            grid-column: span 2;
            grid-row: span 2;
        }

        /* Image Overlay */
        .overlay-single {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            border-radius: 5px;
        }

        .overlay-single button {
            color: #fff;
            background: transparent;
            border: none;
            outline: none;
            font-size: 3rem;
            text-decoration: none;
            transition: all .5s ease;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
        }
        
        .single-image:hover .overlay-single {
            opacity: 1;
        }
        .overlay-button:hover {
            transform: scale(1.5);
            -webkit-transform: scale(1.5);
            -moz-transform: scale(1.5);
            
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
                            <h4 class="mb-sm-0">About</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">About</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="row mb-5" style="font-size:1rem">

                            <!-- Edit -->
                            <div class="update-button col-12 m-auto text-end mb-4">
                                <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning px-5">Edit</a>
                            </div>

                            <!-- About Text -->
                            <div class="col-12">
                                <div class="card border-warning">
                                    <div class="card-body">

                                        <div class="custom-heading">
                                            <p>About <span>Text</span> </p>
                                        </div>

                                        <div class="table-responsive col-11 m-auto">
                                            <table class="table">
                                                <tbody>
                                                    <!-- Title -->
                                                    <tr>
                                                        <td class="pb-5">
                                                            <div class="d-inline-block fw-bold mb-3 border-bottom border-dark"
                                                                style="padding-right:10px">Title: </div>
                                                            <div class="mx-3">{{ $about->title }}</div>
                                                        </td>
                                                    </tr>
                                                    <!-- Description -->
                                                    <tr>
                                                        <td class="pt-5 pb-3 border-bottom-0">
                                                            <div class="d-inline-block fw-bold mb-3 border-bottom border-dark"
                                                                style="padding-right:10px">Description: </div>
                                                            <div class="mx-3">{{ $about->description }}</div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End About Text -->

                            <!-- About Images -->
                            <div class="col-12 mt-5">
                                <div class="card border-warning">
                                    <div class="card-body">

                                        <div class="gallery">

                                            <div class="custom-heading">
                                                <p>About <span>Images</span> </p>
                                            </div>

                                            @if ($about->images)
                                                <div class="gallery-wrapper">
                                                    @foreach ($about->images as $image)
                                                        <div class="single-image">
                                                            <img src="{{ asset($image) }}" alt="Product Image">

                                                            <div class="overlay-single">
                                                                <form action="{{ route('about.deleteImage') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <input type="hidden" name="image"
                                                                        value="{{ $image }}">
                                                                    <button type="submit" class="overlay-button"><i
                                                                            class="mdi mdi-delete"></i></button>

                                                                </form>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div>
                                                    <p class="text-center text-danger">There is no Image to show!</p>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End About Images -->

                        </div>
                    </div>

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
