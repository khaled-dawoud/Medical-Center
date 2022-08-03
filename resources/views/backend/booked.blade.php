@extends('backend.master')
@section('title' , 'All bookings | ' . env('APP_NAME'))
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
                <h1 class="h3 mb-0 text-gray-800">All bookings</h1>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All bookings</li>
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
                                            <th >Patient Name</th>
                                            <th >Speciality Name</th>
                                            <th >Doctor Name</th>
                                            <th >Apointment Time</th>
                                            <th >Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookeds as $booked)
                                        <tr>
                                            <td>{{ $booked->id }}</td>
                                            <td>{{ $booked->user->name }}</td>
                                            <td>{{ $booked->doctor->clinics->speciality_name }}</td>
                                            <td>{{ $booked->doctor->name }}</td>
                                            <td>{{ $booked->time_start . " -- " . $booked->time_end}}</td>
                                            <td>${{ $booked->price }}</td>
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
