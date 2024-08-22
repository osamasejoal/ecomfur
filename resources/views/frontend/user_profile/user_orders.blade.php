@extends('frontend.layout.master')

@section('header-content')
    <style>
        .custom-heading {
            display: inline-block;
            padding-bottom: 20px;
            margin: 1rem 1rem 1rem 0;
        }

        .custom-heading p {
            font-size: 1.5rem;
            font-weight: bolder;
            border-bottom: 2px solid #222;
            padding-bottom: 5px;
            padding-right: 70px;
        }

        .custom-heading p span {
            font-weight: 100;
        }

        .page-banner-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url({{ asset(bc_bg_img()->breadcrumb_bg_img) }});
        }

        @media (max-width: 767.99px) {}
    </style>
@endsection

@section('main-content')
    <!-- Page Banner Section Start -->
    <div class="section page-banner-section text-center"
        style="background-size:cover;background-position:center center;height:40vh;">
        <div class="container">

            <div class="page-banner-content" style="color: #fff">
                <h2 class="title mb-3">My Orders</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">My Orders</li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Page Banner Section End -->

    <div class="row section-padding">
        <div class="container col-11">

            <!-- Update User Orders -->
            <div class="card border-warning">
                <div class="card-body px-4">

                    <div class="custom-heading">
                        <p>Orders <span>List</span> </p>
                    </div>

                    <div class="table-responsive">


                        <table class="table table-nowrap text-center table-light table-bordered">
                            <thead>
                                <tr class="table-bordered border-warning">
                                    <th class="fw-bolder" scope="col">Order ID</th>
                                    <th class="fw-bolder" scope="col">Order Date</th>
                                    <th class="fw-bolder" scope="col">Products</th>
                                    <th class="fw-bolder" scope="col">Total Price</th>
                                    <th class="fw-bolder" scope="col">Status</th>
                                    <th class="fw-bolder" scope="col">View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($categories as $category) --}}
                                <tr>

                                    <!-- Name -->
                                    <td style="vertical-align:middle">Osama</td>

                                    <!-- Slug -->
                                    <td style="vertical-align:middle">osama</td>

                                    <!-- Image -->
                                    <td style="vertical-align:middle">Image</td>

                                    <!-- Image -->
                                    <td style="vertical-align:middle">Image</td>

                                    <!-- Image -->
                                    <td style="vertical-align:middle">Image</td>

                                    <!-- Image -->
                                    <td style="vertical-align:middle">
                                        <a href="{{ route('user.order.details', $orders->id) }}" class="btn btn-warning">View More</a>
                                    </td>
                                </tr>
                                {{-- @empty --}}
                                <tr>
                                    <td colspan="12" class="text-center text-danger">There is no data to show</td>
                                </tr>
                                {{-- @endforelse --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- End Update User Orders -->

        </div>
    </div>
@endsection
