<!DOCTYPE html>
<html lang="en">
<head>
	<title>Naem Furniture - Login Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('auth/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('auth/images/bg-01.jpg') }}');">
			<div class="wrap-login100">

                <!-- Login Form -->
				<form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                    @csrf

					<span class="login100-form-logo">
						{{-- <i class="zmdi zmdi-landscape"></i> --}}
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
					</span>

					<span class="login100-form-title">
						Sign Up
					</span>

                    <!-- Name -->
					<div class="wrap-input100 validate-input">
						<input type="name" name="name" value="{{ old('name') }}" id="name" class="input100" placeholder="name" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    @error('name')    
                        <div class="error-msg" style="position:relative;top:-38px">
                            <p style="color:#8B0000">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Gender -->
					<div class="wrap-input100 validate-input select-input">
                        <select name="gender" id="gender" class="input100" style="border:none" required>
                            <option value="">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
						<span class="focus-input100" data-placeholder="&#xf211;"></span>
					</div>
                    @error('gender')    
                        <div class="error-msg" style="position:relative;top:-38px">
                            <p style="color:#8B0000">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Email -->
					<div class="wrap-input100 validate-input">
						<input type="email" name="email" value="{{ old('email') }}" id="email" class="input100" placeholder="email" required>
						<span class="focus-input100" data-placeholder="&#xf15a;"></span>
					</div>
                    @error('email')    
                        <div class="error-msg" style="position:relative;top:-38px">
                            <p style="color:#8B0000">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Password -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input type="password" name="password" id="password" class="input100" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    @error('password')
                        <div class="error-msg" style="position:relative;top:-38px">
                            <p style="color:#8B0000">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Confirm Password -->
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input type="password" name="password_confirmation" id="password_confirmation" class="input100" placeholder="Confirm Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    @error('password_confirmation')
                        <div class="error-msg" style="position:relative;top:-38px">
                            <p style="color:#8B0000">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Remember Token -->
					{{-- <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> --}}

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign up
						</button>
					</div>

					<div class="text-center sign-up">
						<a class="txt1" href="{{ route('login') }}">
							Already have an account? <span>Login</span>
						</a>
					</div>
					<div class="text-center forgot-password">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
                <!-- End Login Form -->

			</div>
		</div>
	</div>

</body>
</html>