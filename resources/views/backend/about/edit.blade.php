@extends('backend.layout.master')

@section('header-content')
    <!-- Quill JS Editor -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
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
                            <h4 class="mb-sm-0">Edit About</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('about.view') }}">About</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('about.update', $about->id) }}" method="POST" class="mt-5" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <!-- Title -->
                            <div class="row mb-4">
                                <div class="col-lg-2">
                                    <label for="title" class="form-label">Title: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="title" value="{{ $about->title }}" id="title"
                                        class="form-control" placeholder="About Title">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row pb-5">
                                <div class="col-lg-2">
                                    <label for="description" class="form-label">Description: <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-lg-10">

                                    {{-- <div id="editor" style="font-size:.875rem">
                                        {!! $about->description !!}
                                    </div>
                                    <textarea name="description" id="description" rows="8" class="form-control" hidden></textarea> --}}

                                    <textarea name="description" id="description" rows="8" class="form-control">{{ $about->description }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="images" class="form-label">Add Images: </label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>

                                    @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4 pt-1">
                                <div class="col-lg-2">
                                    <label for="showImages" class="form-label"></label>
                                </div>
                                <div class="col-lg-10">
                                    <div id="showImages" class="d-flex flex-wrap">
                                        <!-- Selected images will be displayed here -->
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-warning">Update About</button>
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
        <!-- Quill JS Editor -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        {{-- <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            const form = document.querySelector('form');
            form.onsubmit = function() {
                const description = document.querySelector('textarea[name=description]');
                description.value = quill.root.innerHTML;
            };
        </script> --}}

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const quill = new Quill('#editor', {
                    theme: 'snow'
                });

                const form = document.querySelector('form');
                form.onsubmit = function() {
                    // Update the hidden textarea with Quill's HTML content
                    const description = document.querySelector('textarea[name=description]');
                    description.value = quill.root.innerHTML;
                    console.log('Submitted HTML:', quill.root.innerHTML); // Debugging line
                };
            });
        </script> --}}

        <!-- Images to show -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#images').change(function(e) {
                    $('#showImages').empty(); // Clear any existing images
                    var files = e.target.files;

                    $.each(files, function(index, file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $('<img>').attr('src', e.target.result)
                                .addClass('rounded-2 me-2 mb-2')
                                .css({
                                    'object-fit': 'cover',
                                    'object-position': 'center',
                                    'width': '180px',
                                    'height': '180px'
                                });
                            $('#showImages').append(img);
                        }
                        reader.readAsDataURL(file);
                    });
                });
            });
        </script>
    @endsection
