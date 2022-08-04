@extends('backend.master')
@section('title' , 'All Awards | ' . env('APP_NAME'))
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
                <h1 class="h3 mb-0 text-gray-800">All Awards</h1>
                <a class="btn btn-info" href="{{ route('admin.award.create') }}">Add New Award</a>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">All Awards</li>
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
                                            <th >Date</th>
                                            <th >Title</th>
                                            <th >Doctor</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($awards as $award)
                                            <tr>
                                                <td>{{ $award->id }}</td>>
                                                <td>{{ $award->date }}</td>
                                                <td>{{ $award->title }}</td>
                                                <td>{{ $award->doctor->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.award.edit', $award->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fe fe-edit"></i> </a>
                                                    <form class="d-inline" action="{{ route('admin.award.destroy' , $award->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"> <i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- {{ $award->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@stop

