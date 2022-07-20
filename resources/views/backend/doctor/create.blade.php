@extends('backend.master')
@section('title' , 'Add Doctor | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Doctor</h1>
                <a class="btn btn-info" href="{{ route('admin.doctor.index') }}">All Doctors</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Doctor</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Major</label>
                        <div class="col-sm-10">
                            <input name="major" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input name="address" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Available</label>
                        <div class="col-sm-10">
                            <input name="available" multiple class="form-control" type="date">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" multiple class="form-control" type="number">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Clinic</label>
                        <div class="col-md-10">
                            <select name="clinic_id" class="form-control">
                                <option>-- Select --</option>
                                @foreach ( $clinics as $item )
                                    <option value="{{ $item->id }}">{{ $item->speciality_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">About Me</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="about_me" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Clinic Center</label>
                        <div class="col-sm-10">
                            <input name="clinic_center" multiple class="form-control" type="name">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Clinic Major</label>
                        <div class="col-sm-10">
                            <input name="clinic_major" multiple class="form-control" type="name">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Clinic Address</label>
                        <div class="col-sm-10">
                            <input name="clinic_address" multiple class="form-control" type="name">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input name="image" multiple class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input name="profile_image" multiple class="form-control" type="file" id="profile_image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showProfieImage" class="rounded avatar-lg" src="{{ url('uploads/no_image.jpg') }}" alt="Card image cap">
                        </div>
                    </div>

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Add Doctor</button>
                </form>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
@section('scripts')
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#profile_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showProfieImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@stop
