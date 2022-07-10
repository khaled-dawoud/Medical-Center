@extends('backend.master')
@section('title' , 'Edit Profile | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Edit Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Row -->
					<div class="row">
						<div class="col-sm-12">

							<!-- Custom Boostrap Validation -->
							<div class="card">
								<div class="card-header d-flex algin-items-btween">
									<h5 class="card-title">Edit Your Profile</h5>
                                    {{-- <button class="btn btn-primary"> Return Backe</button> --}}
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm">
											<form class="needs-validation" method="POST" action="{{ route('admin.store_profile' , $user->id) }}"  enctype="multipart/form-data">
											@csrf
												<div class="form-row">
													<div class="col-md-4 mb-3">
														<label for="validationCustom01">Name</label>
														<input type="text" name="name" class="form-control" id="validationCustom01" placeholder="name" value="{{ $user->name }}" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustom02">Email</label>
														<input type="email" class="form-control" id="validationCustom02" name="email" placeholder="Email" value="{{ $user->email }}" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-4 mb-3">
														<label for="validationCustomUsername">Date Of Birth</label>
														<div class="input-group">
															<div class="input-group-prepend">
															</div>
															<input type="date" class="form-control" name="birth_date" id="validationCustomUsername" value="{{ $user->birth_date }}" placeholder="Date Of Birth" aria-describedby="inputGroupPrepend" required>
															<div class="invalid-feedback">
																Please choose a username.
															</div>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-md-6 mb-6">
														<label for="validationCustom03">Mobile</label>
														<input type="text" class="form-control" id="validationCustom03" placeholder="Mobile" value="{{ $user->mobile }}" name="mobile" required>
														<div class="invalid-feedback">
															Please provide a valid city.
														</div>
													</div>
													<div class="col-md-6 mb-6">
														<label for="validationCustom04">Address</label>
														<input type="text" class="form-control" id="validationCustom04" name="address" value="{{ $user->address }}" placeholder="Address" required>
														<div class="invalid-feedback">
															Please provide a valid state.
														</div>
													</div>
												</div>
                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-form-label col-md-2">Description</label>
                                                    <div class="col-md-10">
                                                        <textarea rows="5" name="description" cols="5" class="form-control">{{ $user->description }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label">Portfolio Image</label>
                                                    <div class="col-sm-10">
                                                        <input name="image" multiple class="form-control" type="file" id="image">
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row mb-3">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                                    <div class="col-sm-10">
                                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($user->image))? url('uploads/images/profile_images/'.$user->image):url('uploads/no_image.jpg') }}" alt="Card image cap">
                                                    </div>
                                                </div>


												<button class="btn btn-primary mt-5" type="submit">Submit form</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /Custom Boostrap Validation -->

						</div>
					</div>
		    <!-- /Row -->


        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
@section('scripts')
{{-- jquery --}}
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@stop
