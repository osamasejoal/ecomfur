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
                            <h4 class="mb-sm-0">Color</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">Variant Box</li>
                                    <li class="breadcrumb-item active">Color</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-color mb-3 float-end">
                            <a href="{{ route('color.create') }}" class="btn btn-warning btn-md"> + Add Color </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">Title</th>
                                    <th class="fw-bolder" scope="col">Code</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($colors as $color)
                                    <tr>
                                        <!-- Title -->
                                        <td style="vertical-align:middle">{{ $color->title }}</td>

                                        <!-- Code -->
                                        <td style="vertical-align:middle">{{ $color->code }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('color.destroy', $color->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none;background:transparent"><abbr
                                                        title="Delete" style="cursor:pointer"><i data-feather="trash-2"
                                                            class="icon-xl c-f2a100"></i></abbr></button>
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
