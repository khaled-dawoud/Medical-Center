@extends('backend.master')
@section('title' , 'Edit Featuer | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Featuer</h1>
                <a class="btn btn-info" href="{{ route('admin.featuer.index') }}">All Featuer</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Featuer</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.featuer.update' ,$featuer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    $@method('put')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Featuer Name</label>
                        <div class="col-sm-10">
                            <input name="featuer_name" multiple class="form-control" type="text" value="{{ $featuer->featuer_name }}">
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Featuer Image</label>
                        <div class="col-sm-10">
                            <input name="image" multiple class="form-control" type="file" id="image">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ url('uploads/images/featuers/'.$featuer->image) }}" alt="Card image cap">
                        </div>
                    </div>

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Update Featuer</button>
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
