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
                            <h4 class="mb-sm-0">Testimonial</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Testimonial</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-testimonial mb-3 float-end">
                            <a href="{{ route('testimonial.create') }}" class="btn btn-primary btn-md"> + add Testimonial </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-info fw-bold">
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">Profession</th>
                                    <th class="fw-bolder" scope="col">Image</th>
                                    <th class="fw-bolder" scope="col">Comment</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $testimonial->name }}</td>

                                        <!-- Profession -->
                                        <td style="vertical-align:middle">{{ $testimonial->profession }}</td>
                                        
                                        <!-- Image -->
                                        <td style="vertical-align:middle">
                                            @if ($testimonial->image)
                                            <img style="object-fit:cover;object-position:center;width:70px;height:70px;border-radius:10%"
                                            src="{{ asset($testimonial->image) }}" alt="" class="rounded-circle">
                                            @else
                                            <span class="fw-light fst-italic">Null</span>
                                            @endif
                                        </td>

                                        <!-- Comment -->
                                        <td style="vertical-align:middle">{{ $testimonial->comment }}</td>

                                        <!-- Status -->
                                        <td style="vertical-align:middle">{{ $testimonial->status }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                                style="color:deepskyblue;margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('testimonial.destroy', $testimonial->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none;background:transparent;color:deepskyblue;margin-left:5px"><abbr
                                                        title="Delete" style="cursor:pointer"><i data-feather="trash-2"
                                                            class="icon-xl"></i></abbr></button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-danger">There is no data to show</td>
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
