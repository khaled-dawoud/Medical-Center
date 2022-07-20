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

							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{ asset('frontend/assets/img/login-banner.png') }}" class="img-fluid" alt="Login Banner">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Forgot Password?</h3>
											<p class="small text-muted">Enter your email to get a password reset link</p><br>
										</div>

										<!-- Forgot Password Form -->
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

											<div class="form-group form-focus">
												<input  class="form-control floating @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
												<label class="focus-label">Email</label><br>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>

											<div class="text-right mt-5">
												<a class="forgot-link" href="{{ route('login') }}">Remember your password?</a>
											</div>
											<button style="margin-bottom: 100px" class="btn btn-primary btn-block btn-lg login-btn mt-4" type="submit">Reset Password</button>
										</form>
										<!-- /Forgot Password Form -->

									</div>
								</div>
							</div>
							<!-- /Account Content -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

            @include('frontend.body.footer')
		</div>
		<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>

	</body>
</html>
