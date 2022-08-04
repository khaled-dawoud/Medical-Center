@extends('backend.master')
@section('title' , 'Phone Number | ' . env('APP_NAME'))
@section('content')
        <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Phone Number</h1>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Phone Number</li>
            </ul>

            <div class="container">
                <form action="{{ route("admin.number_update" , $number->id) }}" method="POST" >
                    @csrf

                    <input type="hidden" name="id" value="{{ $number->id }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input name="number" multiple class="form-control" type="text" value="{{ $number->number }}">
                        </div>
                    </div>
                    <!-- end row -->

                    <button type="submit"  class="btn btn-primary btn-rounded waves-effect waves-light mt-5 mb-3">Update</button>
                </form>

            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop
