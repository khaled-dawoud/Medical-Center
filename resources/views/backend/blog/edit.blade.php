@extends('backend.master')
@section('title' , 'Edit Blog | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Blog</h1>
                <a class="btn btn-info" href="{{ route('admin.blog.index') }}">All Blogs</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Blog</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Blog Title</label>
                        <div class="col-sm-10">
                            <input name="title" multiple class="form-control" type="text" value="{{ $blog->title }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Short Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="short_desc" rows="5">{{ $blog->short_desc }}</textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Long Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="long_desc" rows="5">{{ $blog->long_desc }}</textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Clinic</label>
                        <div class="col-md-10">
                            <select name="clinic_id" class="form-control">
                                <option>-- Select --</option>
                                @foreach ( $clinics as $item )
                                    <option selected value="{{ $item->id }}">{{ $item->speciality_name }}</option>
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
                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
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
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('uploads/images/blogs/'.$blog->image) }}" alt="Card image cap">
                        </div>
                    </div>

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Update Blog</button>
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

