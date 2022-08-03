<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Doctor Appointments | Medical Center</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<!-- Favicons -->
		<link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/all.min.css') }}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/select2/css/select2.min.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

        {{-- toastr --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dachbord</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Appointment</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Appointment</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('uploads/images/doctors/profile/'.$doctor->profile_image) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{ $doctor->name }}</h3>

											<div class="patient-details">
												<h5 class="mb-0">{{ $doctor->major }}</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="{{ route('admin.index') }}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="{{ route('admin.doctor.index') }}">
													<i class="fas fa-calendar-check"></i>
													<span>Doctors</span>
												</a>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->

						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-between align-items-center mb-5">
                                                <h4 class="card-title">Doctor Appointment</h4>
                                                <button class="btn btn-info" onclick="history.back()">Return back</button>
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
																		<form method="POST" action="{{ route('admin.appointment.store') }}" >
																			@csrf

																			<div class="hours-info">
																				<div class="row form-row hours-cont">
																					<div class="col-12 col-md-10">
																						<div class="row form-row">
																							<div class="col-12 col-md-6">
																								<div class="form-group">
																									<label>Start Time</label>
																									<select class="form-control" name="start_time">
																										<option>-</option>
																										<option>10.00 am</option>
																										<option>10.30 am</option>
																										<option>11.00 am</option>
																										<option>11.30 am</option>
																										<option>12.00 am</option>
																										<option>12.30 am</option>
																										<option>1.00 am</option>
																										<option>1.30 am</option>
																										<option>2.00 am</option>
																										<option>2.30 am</option>
																									</select>
																								</div>
																							</div>
																							<div class="col-12 col-md-6">
																								<div class="form-group">
																									<label>End Time</label>
																									<select class="form-control" name="end_time">
																										<option>-</option>
																										<option>10.00 am</option>
																										<option>10.30 am</option>
																										<option>11.00 am</option>
																										<option>11.30 am</option>
																										<option>12.00 am</option>
																										<option>12.30 am</option>
																										<option>1.00 am</option>
																										<option>1.30 am</option>
																										<option>2.00 am</option>
																										<option>2.30 am</option>
																									</select>
																								</div>
																							</div>
																							<div class="col-12 col-md-6">
																								<div class="form-group">
																								<input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
																								</div>
																							</div>
																								<div class="col-12 col-md-6">
																									<div class="form-group">
																									<input type="hidden" name="day_id" value="{{ $day->id }}">
																									</div>
																								</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="submit-section text-center">
																				<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
																			</div>
																		</form>
                                                                        @foreach ($apps->where('day_id', $day->id)  as $item)
                                                                        <div class="doc-times">
                                                                            <div class="doc-slot-list">
                                                                                {{ $item->start_time }} - {{ $item->end_time }}
                                                                                <a href="{{ route('admin.appointment.destroy', $item->id) }}" class="delete_schedule">
                                                                                </a>
                                                                                <form class="d-inline delete_schedule" action="{{ route('admin.appointment.destroy', $item->id) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button class="btn btn-sm" onclick="return confirm('are you sure?')"> <i class="fa fa-times"></i></button>
                                                                                </form>
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
					</div>

				</div>

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Main Wrapper -->

		{{-- <!-- Add Time Slot Modal -->
		<div class="modal fade custom-modal" id="add_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="{{ route('admin.appointment.store') }}" >
                            @csrf

							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control" name="start_time">
														<option>-</option>
                                                        <option>10.00 am</option>
														<option>10.30 am</option>
                                                        <option>11.00 am</option>
														<option>11.30 am</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option>1.00 am</option>
														<option>1.30 am</option>
                                                        <option>2.00 am</option>
														<option>2.30 am</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control" name="end_time">
														<option>-</option>
														<option>10.00 am</option>
														<option>10.30 am</option>
                                                        <option>11.00 am</option>
														<option>11.30 am</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option>1.00 am</option>
														<option>1.30 am</option>
                                                        <option>2.00 am</option>
														<option>2.30 am</option>
													</select>
												</div>
											</div>
                                            <div class="col-12 col-md-6">
												<div class="form-group">
												<input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
												</div>
											</div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                    <input type="hidden" name="day_id" >
                                                    </div>
                                                </div>
										</div>
									</div>
								</div>
							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Time Slot Modal --> --}}

		<!-- Edit Time Slot Modal -->
		<div class="modal fade custom-modal" id="edit_time_slot">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Time Slots</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST"  >
                            @csrf
							<div class="hours-info">
								<div class="row form-row hours-cont">
									<div class="col-12 col-md-10">
										<div class="row form-row">
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Start Time</label>
													<select class="form-control" name="start_time">
														<option>10.00 am</option>
														<option>10.30 am</option>
                                                        <option>11.00 am</option>
														<option>11.30 am</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option>1.00 am</option>
														<option>1.30 am</option>
                                                        <option>2.00 am</option>
														<option>2.30 am</option>
													</select>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>End Time</label>
													<select class="form-control" name="end_time">
														<option>-</option>
														<option>10.00 am</option>
														<option>10.30 am</option>
                                                        <option>11.00 am</option>
														<option>11.30 am</option>
														<option>12.00 am</option>
														<option>12.30 am</option>
														<option>1.00 am</option>
														<option>1.30 am</option>
                                                        <option>2.00 am</option>
														<option>2.30 am</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
								</div>
                                <input type="hidden" name="doctor_id" id="{{ $doctor->id }}">

							</div>
							<div class="submit-section text-center">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Time Slot Modal -->

		<!-- jQuery -->
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

		<!-- Sticky Sidebar JS -->
        <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset('frontend/assets/plugins/select2/js/select2.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('frontend/assets/js/script.js') }}"></script>

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

	</body>
</html>
