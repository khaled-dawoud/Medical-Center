@php
    use Illuminate\Support\Carbon;
@endphp
@extends('frontend.master')
@section('title' , ' Booking | ' . env('APP_NAME'))
@section('content')
<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('site.index') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{ asset('uploads/images/doctors/profile/'. $doctor->profile_image) }}" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="{{ route('site.doctor_details', $doctor->id) }}">{{ $doctor->name }}</a></h4>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div>
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }} </p>
										</div>
									</div>
								</div>
							</div>
							<div class="row mb-3 ">
								<div class="col-6 col-sm-4 col-md-6">
									<h4 class="mb-1">
                                    @php
                                        $dt = Carbon::now();
                                        echo $dt->toFormattedDateString();
                                    @endphp
                                    </h4>
									<h5 class="text-muted"> @php
                                        echo $day
                                    @endphp </h5>
								</div>
                            </div>
							<!-- Schedule Widget -->

                            <div class="col-md-12 col-lg-8 col-xl-12">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h4 class="card-title btn btn-primary submit-btn">book an appointment</h4>
                                                </div>
                                                <div class="profile-box">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card schedule-widget mb-0">

                                                                <!-- Schedule Header -->
                                                                <div class="schedule-header">

                                                                    <!-- Schedule Nav -->
                                                                    <div class="schedule-nav">
                                                                        <ul class="nav nav-tabs nav-justified">
                                                                            @foreach ($days as $day)
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" data-toggle="tab" href="#slot_{{$day->name}}">{{ $day->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /Schedule Nav -->

                                                                </div>
                                                                <!-- /Schedule Header -->

                                                                <!-- Schedule Content -->
                                                                <div class="tab-content schedule-cont">

                                                                    @foreach ($days as $day)
                                                                        <!-- Sunday Slot -->
                                                                        <div id="slot_{{$day->name}}" class="tab-pane fade">
                                                                            @foreach ($apps->where('day_id', $day->id)  as $app)
                                                                            <div class="doc-times">
                                                                                <div class="doc-slot-list">
                                                                                <a  href="{{ route('site.checkout', [$app->doctor_id, $app->start_time, $app->end_time , $day->id]) }}"> {{ $app->start_time }} - {{ $app->end_time }} </a>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <!-- /Sunday Slot -->
                                                                    @endforeach
                                                                </div>
                                                                <!-- /Schedule Content -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

							<!-- /Schedule Widget -->

							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								{{-- <a href="{{ route('site.checkout', $doctor->id) }}" class="btn btn-primary submit-btn">Proceed to Pay</a> --}}
							</div>
							<!-- /Submit Section -->

						</div>
					</div>
				</div>

			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->
@stop
@section('scripts')
<script>
var taga = document.getElementById('selected');
taga.onclick() = function {
    taga.className == 'selected';
}
</script>

@stop
