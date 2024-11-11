@extends('layouts.index')
@section('title', 'Menejemen User')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable @yield('title')</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th width="10px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $lok)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lok->name }}</td>
                                <td>{{$lok->email}}</td>
                                <td>
                                    <a href="#" data-confirm-delete="true"
                                        class="btn btn-sm btn-danger float-right">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th width="10px">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection
