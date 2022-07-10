<!DOCTYPE html>
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> @yield('title' , env('APP_NAME')) </title>

		<!-- Favicons -->
		<link type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">

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
	<body>

			@include('frontend.body.header')

			@yield('content')

			@include('frontend.body.footer')

	   <!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Slick JS -->
		<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('frontend/assets/js/script.js') }}"></script>

	</body>
</html>
