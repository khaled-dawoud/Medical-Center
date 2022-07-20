@extends('backend.master')
@section('title' , 'All Featuers | ' . env('APP_NAME'))
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
                <h1 class="h3 mb-0 text-gray-800">All Featuers</h1>
                <a class="btn btn-info" href="{{ route('admin.featuer.create') }}">Add New Featuer</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Featuers</li>
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
                                            <th >Image</th>
                                            <th >Name</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($featuers as $featuer)
                                        <tr>
                                            <td>{{ $featuer->id }}</td>
                                            <td><img width="100" src="{{ asset('uploads/images/featuers/'.$featuer->image) }}"></td>
                                            <td>{{ $featuer->featuer_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.featuer.edit', $featuer->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fe fe-edit"></i> </a>
                                                <form class="d-inline" action="{{ route('admin.featuer.destroy' , $featuer->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"> <i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
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

