@php
    use Illuminate\Support\Carbon;
@endphp
@extends('frontend.master')
@section('title' , 'Checkout | ' . env('APP_NAME'))
@section('styles')
<style>
.alink {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 100px;
    margin-top: 80px;
    font-size: 20px

}
</style>
@stop
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
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-12 col-lg-12">
                                <!-- Booking Summary -->
                                <div class="card booking-card">
                                    <div class="card-header">
                                        <h4 class="card-title text-center">Booking Summary</h4>
                                    </div>
                                    <div class="card-body">

                                        <!-- Booking Doctor Info -->
                                        <div class="booking-doc-info">
                                            <a href="doctor-profile.html" class="booking-doc-img">
                                                <img src="{{ asset('uploads/images/doctors/profile/'.$doctor->profile_image ) }}" alt="User Image">
                                            </a>
                                            <div class="booking-info">
                                                <h4><a href="doctor-profile.html">{{ $doctor->name }}</a></h4>
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating">({{ round($doctor->review->avg('stars'), 0) }})</span>
                                                </div>
                                                <div class="clinic-details">
                                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i>{{ $doctor->address }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Booking Doctor Info -->

                                        <div class="booking-summary">
                                            <div class="booking-item-wrap">
                                                <ul class="booking-date">
                                                    <li>Date <span>@php
                                                        $dt = Carbon::now();
                                                        echo $dt->toFormattedDateString();
                                                    @endphp</span></li>
                                                    <li>Time <span>{{ $start . ' - ' . $end }}</span></li>
                                                </ul>
                                                <ul class="booking-fee">
                                                    <li>Consulting Fee <span>${{ $doctor->price }}</span></li>
                                                </ul>
                                                <div class="booking-total">
                                                    <ul class="booking-total-list">
                                                        <li>
                                                            <span>Total</span>
                                                            <span class="total-cost">${{ $doctor->price }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Booking Summary -->

                            </div>

					</div>


                    @if (Auth::user())
                        <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                        <form action="{{ route('site.checkout_thanks', [$doctor->id, $start , $end ,$day]) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>


                    @else
                        <div class="alink">
                            <a href="{{ route('login') }}">You must be logged in to complete the payment</a>
                        </div>


                    @endif

				</div>

			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->
@stop
