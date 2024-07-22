@extends('backend.layout.master')

@section('header-content')
    <style>
        .gallery-heading {
            width: 35%;
            padding-bottom: 50px;
        }

        .gallery-heading h3 {
            font-size: 3rem;
            font-weight: bolder;
            border-bottom: 3px solid #222;
            padding-bottom: 10px;
        }

        .gallery-heading h3 span {
            font-weight: 100;
        }

        .grid-wrapper img {
            max-width: 100%;
            height: auto;
            vertical-align: middle;
            display: inline-block;
        }

        .grid-wrapper>div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .grid-wrapper>div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .grid-wrapper {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            grid-auto-rows: 350px;
            grid-auto-flow: dense;
        }

        .grid-wrapper .wide {
            grid-column: span 2;
        }

        .grid-wrapper .tall {
            grid-row: span 2;
        }

        .grid-wrapper .big {
            grid-column: span 2;
            grid-row: span 2;
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
                    <div class="col-lg-10 m-auto">
                        <div class="col-12">

                            <!-- About -->
                            <div class="card border card-border-info mt-4" style="margin-bottom: 10rem">

                                <div class="card-header card-info text-center fs-4">About</div>

                                <div class="card-body row">
                                    <div class="container">

                                        <!-- Title -->
                                        <div class="title d-md-flex m-md-4 mb-5">
                                            <div class="col-md-3 col-12">
                                                <h5>Title:</h5>
                                            </div>
                                            <div class="col-md-9 col-12">{{ $about->title }}</div>
                                        </div>

                                        <!-- Description -->
                                        <div class="description d-md-flex m-md-4 mb-5">
                                            <div class="col-md-3 col-12">
                                                <h5>Description:</h5>
                                            </div>
                                            <div class="col-md-9 col-12">{{ $about->description }}</div>
                                        </div>

                                        <!-- Edit button for modal -->
                                        <div class="update-button col-12 m-auto text-end mt-5">
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Edit About
                                            </button>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" style="color:#222;">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="border-bottom: 2px solid #222;padding-bottom: 5px;padding-right:50px;color:#222">
                                                            Edit About
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <form action="{{ route('about.update', $about->id) }}" method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <!-- Title -->
                                                            <div class="mb-3 mt-4">
                                                                <label for="title" class="form-label h6">Title:</label>
                                                                <input type="text" name="title" value="{{ $about->title }}" class="form-control" id="title"
                                                                    placeholder="Write your About title">
                                                            </div>
                                                            <!-- Description -->
                                                            <div class="mb-3 mt-5">
                                                                <label for="description"
                                                                    class="form-label h6">Description:</label>
                                                                <textarea name="description" id="description" rows="8" class="form-control" placeholder="Write your About description">{{ $about->description }}</textarea>
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer mt-3">
                                                        <button type="button" class="btn btn-secondary m-3"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary m-3">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End Modal -->

                                    </div>

                                </div>
                            </div> <!-- End About -->

                            <!-- Gallery -->
                            <div class="gallery" style="margin-bottom: 5rem">
                                <div class="gallery-heading">
                                    <h3>Photo <span>Gallery</span></h3>
                                </div>
                                <div class="grid-wrapper mb-5">

                                    @if ($about->images)
                                        @foreach ($about->images as $image)
                                            <div><img src="{{ asset($image) }}" alt="Gallery Image"></div>
                                        @endforeach
                                    @else
                                        <p>No images available.</p>
                                    @endif

                                </div>
                                <div class="action-button text-end">
                                    <button type="button" class="btn btn-danger m-3">Delete Photo</button>
                                    <button type="button" class="btn btn-info m-3">Add Photo</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
