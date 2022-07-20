@extends('backend.master')
@section('title' , 'Add Experience | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Experience</h1>
                <a class="btn btn-info" href="{{ route('admin.experience.index') }}">All Experiences</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Experience</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.experience.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Clinc Center</label>
                        <div class="col-sm-10">
                            <input name="place" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Period</label>
                        <div class="col-sm-10">
                            <input name="period" multiple class="form-control" type="text">
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Doctor Name</label>
                        <div class="col-md-10">
                            <select name="doctor_id" class="form-control">
                                <option>-- Select --</option>
                                @foreach ( $doctors as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Add Experience</button>
                </form>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
