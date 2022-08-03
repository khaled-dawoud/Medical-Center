<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>All Doctors</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicons -->
		<link href="{{ asset("frontend/assets/img/favicon.png") }}" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset("frontend/assets/css/bootstrap.min.css") }}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset("frontend/assets/plugins/fontawesome/css/fontawesome.min.css") }}">
		<link rel="stylesheet" href="{{ asset("frontend/assets/plugins/fontawesome/css/all.min.css") }}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset("frontend/assets/plugins/select2/css/select2.min.css") }}">

		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{ asset("frontend/assets/plugins/fancybox/jquery.fancybox.min.css") }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset("frontend/assets/css/style.css") }}">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="map-page">

	<!-- Loader -->
	<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Loader  -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

		@include('frontend.body.header')

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

	            <div class="row">
					<div class="col-xl-7 col-lg-12 order-md-last order-sm-last order-last map-left">

						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">
								<h4> <span class="badge badge-info">{{ count($doctors) }}</span> Doctors found</h4>
							</div>
						</div>

						<!-- Doctor Widget -->
                            @foreach ($doctors as $doctor)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="doctor-widget">
                                            <div class="doc-info-left">
                                                <div class="doctor-img">
                                                    <a href="{{ route('site.doctor_details', $doctor->id) }}">
                                                        <img src="{{ asset('uploads/images/doctors/profile/'.$doctor->profile_image) }}" class="img-fluid" alt="User Image">
                                                    </a>
                                                </div>
                                                <div class="doc-info-cont">
                                                    <h4 class="doc-name"><a href="{{ route('site.doctor_details', $doctor->id) }}">{{ $doctor->name }}</a></h4>
                                                    <p class="doc-speciality">{{ $doctor->major }}</p>
                                                    <h5 class="doc-department">{{ $doctor->clinics->speciality_name }}</h5>
                                                    <div class="rating">
                                                        @php
                                                            $stars = round($doctor->review->avg('stars'), 0);
                                                            $count = 1;
                                                            $result = "";
                                                            for($i = 1; $i <= 5; $i++){
                                                                if($stars >= $count){
                                                                    $result .= '<span><i class="fas fa-star filled"></i></span>';
                                                                } else {
                                                                    $result .= '<span><i class="fas fa-star"></i></span>';
                                                                }
                                                                $count++;
                                                            }
                                                            echo $result;
                                                        @endphp
                                                        <span class="d-inline-block average-rating">({{ round($doctor->review->avg('stars'), 0) }})</span>
                                                    </div>
                                                    <div class="clinic-details">
                                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="doc-info-right">
                                                <div class="clini-infos">
                                                    <ul>
                                                        <li><i class="far fa-comment"></i> {{ count($reviews ); }} </li>
                                                        <li><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</li>
                                                        <li><i class="far fa-money-bill-alt"></i> $ {{ $doctor->price }}  </li>
                                                    </ul>
                                                </div>
                                                <div class="clinic-booking">
                                                    <a class="view-pro-btn" href="{{ route('site.doctor_details', $doctor->id) }}">View Profile</a>
                                                    <a class="apt-btn" href="{{ route('site.book', $doctor->id) }}">Book Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
						<!-- /Doctor Widget -->

					{{-- <div class="load-more text-center">
						<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
					</div> --}}
	            </div>
	            <!-- /content-left-->
	        </div>
	        <!-- /row-->

				</div>

			</div>
			<!-- /Page Content -->

			<!-- Footer -->
			@include('frontend.body.header')
			<!-- /Footer -->

		</div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="{{ asset("frontend/assets/js/jquery.min.js") }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset("frontend/assets/js/popper.min.js") }}"></script>
		<script src="{{ asset("frontend/assets/js/bootstrap.min.js") }}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset("frontend/assets/plugins/select2/js/select2.min.js") }}"></script>

		<!-- Fancybox JS -->
		<script src="{{ asset("frontend/assets/plugins/fancybox/jquery.fancybox.min.js") }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset("frontend/assets/js/script.js") }}"></script>
	</body>
</html>
