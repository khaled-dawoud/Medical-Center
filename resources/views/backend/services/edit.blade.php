@extends('backend.master')
@section('title' , 'Edit Service | ' . env('APP_NAME'))
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Service</h1>
                <a class="btn btn-info" href="{{ route('admin.service.index') }}">All Services</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Service</li>
            </ul>

            <div class="container">
                <form action="{{ route('admin.service.update', $services->id) }}" method="POST" >
                    @method('put')
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Service Name</label>
                        <div class="col-sm-10">
                            <input name="service" multiple class="form-control" type="text" value="{{ $services->service }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Doctor Name</label>
                        <div class="col-md-10">
                            <select name="doctor_id" class="form-control">
                                <option>-- Select --</option>
                                @foreach ( $doctors as $item )
                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Update Service</button>
                </form>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
