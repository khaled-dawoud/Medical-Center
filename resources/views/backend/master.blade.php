<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> @yield('title' , env('APP_NAME')) </title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/feathericon.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
        {{-- toastr --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        @yield('styles')

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

            @include('backend.body.header')

			@include('backend.body.sidebar')

			<!-- Page Wrapper -->
            @yield('content')
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Slimscroll JS -->
        <script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

		<!-- Custom JS -->
		<script  src="{{ asset('backend/assets/js/script.js') }}"></script>

        {{-- toastr --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
         switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
         }
         @endif
        </script>
        @yield('scripts')
    </body>
</html>
