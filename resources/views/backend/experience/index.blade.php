@extends('backend.master')
@section('title' , 'All Experiences | ' . env('APP_NAME'))
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
                <h1 class="h3 mb-0 text-gray-800">All Experiences</h1>
                <a class="btn btn-info" href="{{ route('admin.experience.create') }}">Add New Experience</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Experiences</li>
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
                                            <th >Clinc Center</th>
                                            <th >Period</th>
                                            <th >Doctor</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($experience as $experience)
                                        @can('view', $experience)
                                        <tr>
                                            <td>{{ $experience->id }}</td>>
                                            <td>{{ $experience->place }}</td>
                                            <td>{{ $experience->period }}</td>
                                            <td>{{ $experience->doctor->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.experience.edit', $experience->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fe fe-edit"></i> </a>
                                                <form class="d-inline" action="{{ route('admin.experience.destroy' , $experience->id) }}" method="POST">
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

                                {{-- {{ $experience->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop

