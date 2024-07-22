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
                            <h4 class="mb-sm-0">Edit Testimonial</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('testimonial.view') }}">Testimonial</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data"
                        class="mt-5">
                        @method('PUT')
                        @csrf

                        <!-- Name -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="name" class="form-label">Name: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="name" value="{{ $testimonial->name }}" id="name"
                                    class="form-control" placeholder="Testimonial Name">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Profession -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="profession" class="form-label">Profession:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="profession" value="{{ $testimonial->profession }}" id="profession"
                                    class="form-control" placeholder="Testimonial Profession">

                                @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Comment -->
                        <div class="row mb-4">
                            <div class="col-lg-2">
                                <label for="comment" class="form-label">Comment: <span
                                        class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-10">
                                <textarea name="comment" id="comment" rows="3" class="form-control" placeholder="Testimonial Comment">{{$testimonial->comment}}</textarea>

                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="row mb-4 pt-1">
                            <div class="col-lg-2">
                                <label for="image" class="form-label">Image:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="file" name="image" id="image" class="form-control">

                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 pt-1">
                            <div class="col-lg-2">
                                <label for="showImage" class="form-label"></label>
                            </div>
                            <div class="col-lg-10">
                                <img
                                        src="{{ $testimonial->image ? asset($testimonial->image) : asset('upload/no-image.png') }}"
                                        alt="" class="rounded-circle " id="showImage" style="object-fit:cover;object-position:center;width:180px;height:180px;">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-warning">Update Testimonial</button>
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
