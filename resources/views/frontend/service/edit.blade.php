@extends('backend.layout.master')

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
                            <h4 class="mb-sm-0">Edit Service</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('service.view') }}">Service</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('service.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data" class="mt-5">
                            @method('PUT')
                            @csrf

                            <!-- Title -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="title" class="form-label">Title:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="title" value="{{ $service->title }}" id="title"
                                        class="form-control" placeholder="Service's Title">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sub Title -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="sub_title" class="form-label">Sub Title:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="sub_title" value="{{ $service->sub_title }}" id="sub_title"
                                        class="form-control" placeholder="Service's Sub Title">

                                    @error('sub_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="icon" class="form-label">Icon:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="icon" id="icon" class="form-control">

                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="showIcon" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <img src="{{ $service->icon }}"
                                        alt="Service Icon" id="showIcon"
                                        style="object-fit:cover;object-position:center;border-radius:1%">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-warning">Update Service</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection

    @section('footer-content')
        <!-- The script to show the image what have been chosen by user but didn't submit yet. -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#icon').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showIcon').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>
    @endsection
