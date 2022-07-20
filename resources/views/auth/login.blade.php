<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicons -->
		<link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/all.min.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="account-page">
        @include('frontend.body.header')

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-8 offset-md-2">

							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{ asset('frontend/assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Login">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>Doccure</span></h3>
										</div>

										<!-- Form -->
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

											<div class="form-group form-focus">
												<input class="form-control floating @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
												<label class="focus-label">Email</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div><br>

											<div class="form-group form-focus">
												<input class="form-control floating @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
												<label class="focus-label">Password</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div><br>

											<div class="text-right">
												<a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
											</div>

											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="text-center dont-have mb-5">Don’t have an account? <a href="{{ route('register') }}">Register</a></div>

										</form>

									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Main Wrapper -->
@include('frontend.body.footer')
		<!-- jQuery -->
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('frontend/assets/js/script.js') }}"></script>

	</body>
</html>
