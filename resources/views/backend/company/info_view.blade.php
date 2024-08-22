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
                            <h4 class="mb-sm-0">Company Information</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Company Information</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <table class="table table-nowrap text-center table-light table-bordered mt-5">
                            <thead>
                                <tr class="table-bordered border-warning fw-bold">
                                    <th class="fw-bolder" scope="col">name</th>
                                    <th class="fw-bolder" scope="col">phone</th>
                                    <th class="fw-bolder" scope="col">email</th>
                                    <th class="fw-bolder" scope="col">location</th>
                                    <th class="fw-bolder" scope="col">logo</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($com_infos as $info)
                                    <tr>

                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $info->name }}</td>

                                        <!-- Phone -->
                                        <td style="vertical-align:middle">{{ $info->phone }}</td>

                                        <!-- Email -->
                                        <td style="vertical-align:middle">{{ $info->email }}</td>

                                        <!-- Location -->
                                        <td style="vertical-align:middle">{{ $info->location }}</td>

                                        <!-- Logo -->
                                        <td style="vertical-align:middle">
                                            <img style="object-fit:cover;object-position:center;border-radius:1%"
                                                src="{{ asset($info->logo) }}" alt="">
                                        </td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('com.info.edit', $info->id) }}"><abbr title="Edit" style="cursor:pointer"><i
                                                        data-feather="edit" class="icon-xl c-f2a100"></i></abbr></a>
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
