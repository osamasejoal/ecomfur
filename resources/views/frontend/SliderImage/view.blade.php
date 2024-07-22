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
                            <h4 class="mb-sm-0">Slider Image</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Slider Image</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-slider-image mb-3 float-end">
                            <a href="{{ route('SliderImage.create') }}" class="btn btn-primary btn-md"> + add Slider Image
                            </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-info fw-bold">
                                    <th class="fw-bolder" scope="col">Title</th>
                                    <th class="fw-bolder" scope="col">Slogan</th>
                                    <th class="fw-bolder" scope="col">Image</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($SliderImages as $slider)
                                    <tr>
                                        <!-- Title -->
                                        <td style="vertical-align:middle">{{ $slider->title }}</td>

                                        <!-- Slogan -->
                                        <td style="vertical-align:middle">{{ $slider->slogan }}</td>

                                        <!-- Image -->
                                        <td style="vertical-align:middle">
                                            <img style="object-fit:cover;object-position:center;width:70px;height:70px;border-radius:10%"
                                                src="{{ asset($slider->image) }}" alt="" class="rounded-circle">
                                        </td>

                                        <!-- Status -->
                                        <td style="vertical-align:middle">{{ $slider->status }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('SliderImage.destroy', $slider->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none;background:transparent;color:deepskyblue"><abbr
                                                        title="Delete" style="cursor:pointer"><i data-feather="trash-2"
                                                            class="icon-xl"></i></abbr></button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-danger">There is no data to show</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @endsection
