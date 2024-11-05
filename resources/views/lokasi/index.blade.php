@extends('layouts.index')
@section('title', 'Menejemen Lokasi')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable @yield('title')</h3>
                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Lokasi</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lokasi as $lok)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lok->name }}</td>
                                    <td>
                                        <a href="{{ route('lokasi.edit', $lok->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('lokasi.destroy', $lok->id) }}" data-confirm-delete="true"
                                            class="btn btn-sm btn-danger float-right">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Lokasi</th>
                                <th>Action</th>
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
