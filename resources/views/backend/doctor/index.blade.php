@extends('backend.master')
@section('title' , 'All Doctors | ' . env('APP_NAME'))
@section('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
</style>
@stop
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">All Doctors</h1>
                <a class="btn btn-info" href="{{ route('admin.doctor.create') }}">Add New Doctor</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Doctors</li>
            </ul>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th >id</th>
                                            <th >Name</th>
                                            <th >Image</th>
                                            <th >Profie Image</th>
                                            <th >Address</th>
                                            <th >Available</th>
                                            <th >Price</th>
                                            <th >Clinic</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->id }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td><img width="100" src="{{ asset('uploads/images/doctors/'.$doctor->image) }}"></td>
                                            <td><img width="100" src="{{ asset('uploads/images/doctors/profile/'.$doctor->profile_image) }}"></td>
                                            <td>{{ $doctor->address }}</td>
                                            <td>{{ $doctor->available }}</td>
                                            <td>{{ $doctor->price }}</td>
                                            <td>{{ $doctor->clinics->speciality_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.doctor.edit', $doctor->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fe fe-edit"></i> </a>
                                                <form class="d-inline" action="{{ route('admin.doctor.destroy' , $doctor->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"> <i class="fa fa-trash"></i></button>
                                                </form>                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop

