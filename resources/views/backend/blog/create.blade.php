@extends('backend.master')
@section('title' , 'Add Blog | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Blog</h1>
                <a class="btn btn-info" href="{{ route('admin.blog.index') }}">All Blog</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Blog</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input name="title" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_desc" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="long_desc" rows="5"></textarea>
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

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Doctor</label>
                        <div class="col-md-10">
                            <select name="doctor_id" class="form-control">
                                <option>-- Select --</option>
                                @foreach ( $doctors as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Blog Image</label>
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

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Add Blog</button>
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
@stop
