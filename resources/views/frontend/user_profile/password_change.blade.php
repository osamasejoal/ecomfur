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
                <h2 class="title mb-3">My Profile</h2>

                <ul class="d-block m-auto">
                    <li class="d-inline-block"><a href="{{ route('frontpage') }}">Home</a></li>
                    <span>&nbsp; > &nbsp;</span>
                    <li class="d-inline-block active">My Profile</li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Page Banner Section End -->

    <div class="row section-padding">
        <div class="container col-11">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">

                <!-- Profile Info -->
                <div class="col-xl-4">
                    <div class="card border-warning">
                        <div class="cart-header d-flex justify-content-center align-items-center"
                            style="height:10rem;background-color:#f2a100">
                            <img src="{{ asset($user->image) }}" alt="Profile Picture" class="rounded-circle"
                                style="width:100px;height:100px">
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>

                                        <!-- Name -->
                                        <tr>
                                            <th class="py-3" scope="row"> Name: </th>
                                            <td class="py-3">{{ $user->name }}</td>
                                        </tr>

                                        <!-- Email -->
                                        <tr>
                                            <th class="py-3" scope="row"> Email: </th>
                                            <td class="py-3">{{ $user->email }}</td>
                                        </tr>

                                        <!-- Phone -->
                                        <tr>
                                            <th class="py-3" scope="row"> Phone: </th>
                                            @if (isset(auth()->user()->phone))
                                                <td class="py-3">{{ $user->phone }}</td>
                                            @else
                                                <td class="py-3 text-secondary fst-italic fw-light">Null</td>
                                            @endif
                                        </tr>

                                        <!-- Gender -->
                                        <tr>
                                            <th class="py-3" scope="row"> Gender: </th>
                                            <td class="py-3">{{ $user->gender }}</td>
                                        </tr>

                                        <!-- Birth Day -->
                                        <tr>
                                            <th class="py-3 border-bottom-0" scope="row"> Birthday: </th>
                                            @if (isset($user->birthday))
                                                <td class="py-3 border-bottom-0">
                                                    {{ \Carbon\Carbon::parse($user->birthday)->format('d-F-Y') }}</td>
                                            @else
                                                <td class="py-3 border-bottom-0 text-secondary fst-italic fw-light">Null
                                                </td>
                                            @endif
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- End Profile Info -->

                <!-- Profile Update -->
                <div class="col-xl-8 mt-5 mt-xl-0">
                    <div class="card border-warning">
                        <div class="card-body px-4">

                            <div class="custom-heading">
                                <p>Password <span>Change</span> </p>
                            </div>

                            <form action="{{ route('user.password.update') }}" method="POST" class="mt-3">
                                @method('PUT')
                                @csrf

                                <!-- Current Password -->
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <label for="current_password" class="form-label">Current Password: <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            placeholder="Current Password" required>

                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <label for="password" class="form-label">New Password: <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="New Password" required>

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm New Password -->
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <label for="password_confirmation" class="form-label">Confirm Password: <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm Password" required>

                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="footer-action d-flex justify-content-between align-items-center pt-5 mb-4">
                                    <!-- other links -->
                                    <div class="other-links d-flex flex-column justify-content-between"
                                        style="color:#0039a6">
                                        <a href="#">Forgot Password?</a>
                                        <a href="{{ route('user.profile') }}">Update your Profile!</a>
                                    </div>
                                    <!-- Submit Button -->
                                    <div class="submit-button">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div> <!-- End Profile Update -->

            </div>

        </div>
    </div>
@endsection
