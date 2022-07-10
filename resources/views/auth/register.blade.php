<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Register</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{ asset('backend/assets/img/logo-white.png') }}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>

								<!-- Form -->
								<form method="POST" action="{{ route('register') }}">
                                    @csrf

									<div class="form-group">
										<input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
										<input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" type="text" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
										<input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" type="password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									<div class="form-group">
										<input class="form-control " id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form -->

								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>

								<div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('backend/assets/js/script.js') }}"></script>

    </body>
</html>
