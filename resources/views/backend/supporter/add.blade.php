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
                            <h4 class="mb-sm-0">Create Supporter</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('supporter.view') }}">Supporter</a></li>
                                    <li class="breadcrumb-item active">Create</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('supporter.store') }}" method="POST" enctype="multipart/form-data"
                            class="mt-5">
                            @csrf

                            <!-- Name -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="name" class="form-label">Name: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                                        class="form-control" placeholder="supporter's Name">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Url -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="url" class="form-label">Url:</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="url" name="url" value="{{ old('url') }}" id="url"
                                        class="form-control" placeholder="Supporter's Url">

                                    @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Logo -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="logo" class="form-label">Logo: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="logo" id="logo" class="form-control">

                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="showImage" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <img src="{{ asset('upload/no-image.png') }}" alt="No Image" class="rounded-circle "
                                        id="showImage"
                                        style="object-fit:cover;object-position:center;width:180px;height:180px;">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-warning">Create Supporter</button>
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
                $('#logo').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>
    @endsection
