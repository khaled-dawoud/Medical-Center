@extends('backend.master')
@section('title' , 'Profile | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image" src="{{ (!empty($user->image))? url('uploads/images/profile_images/'.$user->image):url('uploads/no_image.jpg') }}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $user->name }}</h4>
                                <h6 class="text-muted">{{ $user->email }}</h6>
                                <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $user->address }}</div>
                                <div class="about-text">{{ $user->description }}</div>
                            </div>
                            <div class="col-auto profile-btn">

                                <a href="{{ route('admin.edit_profile') }}" class="btn btn-primary">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">

                        <!-- Personal Details Tab -->
                        <div class="tab-pane fade show active" id="per_details_tab">

                            <!-- Personal Details -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span><br>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-10">{{ $user->name }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                <p class="col-sm-10">{{ $user->birth_date }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                <p class="col-sm-10">{{ $user->email }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                <p class="col-sm-10">{{ $user->mobile }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                <p class="col-sm-10 mb-0">{{ $user->address }}<br>
                                                {{-- Miami,<br>
                                                Florida - 33165,<br>
                                                United States.</p> --}}
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                            <!-- /Personal Details -->

                        </div>
                        <!-- /Personal Details Tab -->

                        <!-- Change Password Tab -->
                        <div id="password_tab" class="tab-pane fade">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5><br>

                                    <form action="{{ route('admin.update_password') }}" method="POST">
                                        @csrf

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif <br>

                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input class="form-control" id="new_password"  type="password" name="old_password" placeholder="Old Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input class="form-control" id="new_password"  type="password" name="new_password" placeholder="New Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control" id="confirm_password"  type="password" name="confirm_password" placeholder="Confirm Password">
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Change Password Tab -->

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
