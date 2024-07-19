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
                            <h4 class="mb-sm-0">Coupon</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Coupon</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-11 m-auto">

                        <div class="add-coupon mb-3 float-end">
                            <a href="{{ route('coupon.create') }}" class="btn btn-primary btn-md"> + add Coupon </a>
                        </div>

                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-info fw-bold">
                                    <th class="fw-bolder" scope="col">Name</th>
                                    <th class="fw-bolder" scope="col">code</th>
                                    <th class="fw-bolder" scope="col">discount</th>
                                    <th class="fw-bolder" scope="col">validity</th>
                                    <th class="fw-bolder" scope="col">limit</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                    <tr>

                                        <!-- Name -->
                                        <td style="vertical-align:middle">{{ $coupon->name }}</td>

                                        <!-- Code -->
                                        <td style="vertical-align:middle">{{ $coupon->code }}</td>

                                        <!-- Discount -->
                                        <td style="vertical-align:middle">{{ $coupon->discount . '%' }}</td>

                                        <!-- Validity -->
                                        <td style="vertical-align:middle">{{ $coupon->validity }}</td>

                                        <!-- Limit -->
                                        <td style="vertical-align:middle">{{ $coupon->limit }}</td>

                                        <!-- Status -->
                                        <td style="vertical-align:middle">{{ $coupon->status }}</td>

                                        <!-- Action -->
                                        <td style="vertical-align:middle;cursor:default;">
                                            <!-- Edit -->
                                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                style="color:deepskyblue;margin-right:5px"><abbr title="Edit"
                                                    style="cursor:pointer"><i data-feather="edit"
                                                        class="icon-xl"></i></abbr></a>
                                            <!-- Delete -->
                                            <form class="d-inline" action="{{ route('coupon.destroy', $coupon->id) }}"
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
