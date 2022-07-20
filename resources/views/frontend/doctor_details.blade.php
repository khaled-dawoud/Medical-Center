@extends('frontend.master')
@section('title' , 'Doctor Details | ' . env('APP_NAME'))
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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{ asset('uploads/images/doctors/profile/'. $doctor->profile_image) }}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{ $doctor->name }}</h4>
										<p class="doc-speciality">{{ $doctor->major }}</p>
										<p class="doc-department">{{ $doctor->clinics->speciality_name }}</p>
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
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }} </p>
										</div>
									</div>
								</div>
								<div class="doc-info-right">
									<div class="clini-infos mb-4">
										<ul>
											<li><i class="far fa-thumbs-up"></i> 99%</li>
											<li><i class="far fa-comment"></i> 35 Feedback</li>
											<li><i class="fas fa-map-marker-alt"></i> {{ $doctor->address }}</li>
											<li><i class="far fa-money-bill-alt"></i> ${{ $doctor->price }} </li>
										</ul>
									</div>
									<div class="clinic-booking">
										<a class="apt-btn" href="booking.html">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->

					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">

							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->

							<!-- Tab Content -->
							<div class="tab-content pt-0">

								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">

											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p>{{ $doctor->about_me }}</p>
											</div>
											<!-- /About Details -->

											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
														@foreach ( $education as $educ)
                                                            <li>
                                                                <div class="experience-user">
                                                                    <div class="before-circle"></div>
                                                                </div>
                                                                <div class="experience-content">
                                                                    <div class="timeline-content">
                                                                        <a href="#/" class="name">{{ $educ->uni_name }}</a>
                                                                        <div>{{ $educ->uni_major }}</div>
                                                                        <span class="time">{{ $educ->start }} - {{ $educ->end }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
													</ul>
												</div>
											</div>
											<!-- /Education Details -->

											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach ($experiences as $experience)
                                                            <li>
                                                                <div class="experience-user">
                                                                    <div class="before-circle"></div>
                                                                </div>
                                                                <div class="experience-content">
                                                                    <div class="timeline-content">
                                                                        <a href="#/" class="name">{{ $experience->place }}</a>
                                                                        <span class="time">{{ $experience->period }}</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->

											<!-- Awards Details -->
											<div class="widget awards-widget">
												<h4 class="widget-title">Awards</h4>
												<div class="experience-box">
													<ul class="experience-list">
                                                        @foreach ($awards as $award)
                                                            <li>
                                                                <div class="experience-user">
                                                                    <div class="before-circle"></div>
                                                                </div>
                                                                <div class="experience-content">
                                                                    <div class="timeline-content">
                                                                        <p class="exp-year">{{ $award->date }}</p>
                                                                        <h4 class="exp-title">{{ $award->title }}</h4>
                                                                        <p>{{ $award->desc }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach

													</ul>
												</div>
											</div>
											<!-- /Awards Details -->

											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													<li>{{ $doctor->clinics->speciality_name }}</li>
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->

								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">

									<!-- Location List -->
									<div class="location-list">
										<div class="row">

											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													<h4 class="clinic-name"><a href="#">{{ $doctor->clinic_center }}</a></h4>
													<p class="doc-speciality">{{ $doctor->clinic_major }}</p>
													<div class="clinic-details mb-0">
														<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> {{ $doctor->clinic_address }} <br></h5>
													</div>
												</div>
											</div>
											<!-- /Clinic Content -->

                                            <!-- Clinic Timing -->
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Mon - Sat </span>
														</p>
														<p class="timings-times">
															<span>10:00 AM - 2:00 PM</span>
															<span>4:00 PM - 9:00 PM</span>
														</p>
													</div>
													<div>
													<p class="timings-days">
														<span>Sun</span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
													</p>
													</div>
												</div>
											</div>
											<!-- /Clinic Timing -->


											<div class="col-md-2">
												<div class="consult-price">
													${{ $doctor->price }}
												</div>
											</div>
										</div>
									</div>
									<!-- /Location List -->

								</div>
								<!-- /Locations Content -->

								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">

											<!-- Comment List -->
											<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{ asset('frontend/assets/img/patients/patient.jpg') }}">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">Richard Wilson</span>
															<span class="comment-date">Reviewed 2 Days ago</span>
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
															</div>
														</div>
														<p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p>
														<p class="comment-content">
															Lorem ipsum dolor sit amet, consectetur adipisicing elit,
															sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
															Ut enim ad minim veniam, quis nostrud exercitation.
															Curabitur non nulla sit amet nisl tempus
														</p>
													</div>
												</div>

											</li>
											<!-- /Comment List -->

										</ul>

										<!-- Show All -->
										<div class="all-feedback text-center">
											<a href="#" class="btn btn-primary btn-sm">
												Show all feedback <strong>(167)</strong>
											</a>
										</div>
										<!-- /Show All -->

									</div>
									<!-- /Review Listing -->

									<!-- Write Review -->
									@auth
                                        <div class="write-review">
                                            <h4>Write a review for <strong>D. {{ $doctor->name }}</strong></h4>

                                            <!-- Write Review Form -->
                                            <form method="post" action="{{ route('site.add_review') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                                    <label>Review</label>
                                                    <div class="star-rating">
                                                        <input id="star-5" type="radio" name="stars" value="5">
                                                        <label for="star-5" title="5 stars">
                                                            <i class="active fa fa-star"></i>
                                                        </label>
                                                        <input id="star-4" type="radio" name="stars" value="4">
                                                        <label for="star-4" title="4 stars">
                                                            <i class="active fa fa-star"></i>
                                                        </label>
                                                        <input id="star-3" type="radio" name="stars" value="3">
                                                        <label for="star-3" title="3 stars">
                                                            <i class="active fa fa-star"></i>
                                                        </label>
                                                        <input id="star-2" type="radio" name="stars" value="2">
                                                        <label for="star-2" title="2 stars">
                                                            <i class="active fa fa-star"></i>
                                                        </label>
                                                        <input id="star-1" type="radio" name="stars" value="1">
                                                        <label for="star-1" title="1 star">
                                                            <i class="active fa fa-star"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Your review</label>
                                                    <textarea name="commets" id="review_desc" maxlength="100" class="form-control" rows="5"></textarea>

                                                <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
                                                </div>
                                                <hr>
                                                <div class="submit-section">
                                                    <button type="submit" class="btn btn-primary submit-btn">Add Review</button>
                                                </div>

                                            </form>
                                            <!-- /Write Review Form -->

                                        </div>
                                    @endauth
									<!-- /Write Review -->

								</div>
								<!-- /Reviews Content -->

								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">

											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>5 Nov 2019</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Friday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<div class="time-items">
																<span class="time"><span class="badge bg-danger-light">Closed</span></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->

										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->

							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Main Wrapper -->
@stop
