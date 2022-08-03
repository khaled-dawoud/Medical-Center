@extends('backend.master')
@section('title' , 'Search Doctor | ' . env('APP_NAME'))
@section('content')
    @can('viewAny' , $search_doctor)
        <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Search Doctor</h1>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Search Doctor</li>
            </ul>

            <div class="container">
                <form action="{{ route('Search_Doctor_update', $search_doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input name="title" multiple class="form-control" type="text" value="{{ $search_doctor->title }}">
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5">{{ $search_doctor->description }}</textarea>
                        </div>
                    </div>
                    <!-- end row -->


                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Update</button>
                </form>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
    @endcan
@stop
