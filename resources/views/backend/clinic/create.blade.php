@extends('backend.master')
@section('title' , 'Add Speciality | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Speciality</h1>
                <a class="btn btn-info" href="{{ route('admin.speciality.index') }}">All Speciality</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Speciality</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.speciality.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Speciality Name</label>
                        <div class="col-sm-10">
                            <input name="speciality_name" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Speciality Image</label>
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

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Add Speciality</button>
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
