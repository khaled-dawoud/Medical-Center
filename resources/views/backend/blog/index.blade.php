@extends('backend.master')
@section('title' , 'All Blogs | ' . env('APP_NAME'))
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
                <h1 class="h3 mb-0 text-gray-800">All Blogs</h1>
                <a class="btn btn-info" href="{{ route('admin.blog.create') }}">Add New Blog</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Blogs</li>
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
                                            <th >Doctor</th>
                                            <th >Title</th>
                                            <th >Clinic</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                        @can('view', $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td><img width="100" src="{{ asset('uploads/images/blogs/'.$blog->image) }}"></td>
                                            <td>{{ $blog->doctor->name }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->clinic->speciality_name }}</td>
                                            <td>
                                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fe fe-edit"></i> </a>
                                                <form class="d-inline" action="{{ route('admin.blog.destroy' , $blog->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"> <i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endcan
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

