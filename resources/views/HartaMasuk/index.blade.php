@extends('layouts.index')
@section('title', 'Menejemen Harta Masuk')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable @yield('title')</h3>
                    <a href="{{route('hartaMasuk.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Harta</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach ($hartaK as $k )
                           <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->name}}</td>
                            <td>{{$k->tanggal}}</td>
                            <td>{{$k->jumlah}}</td>
                            <td>{{$k->keterangan}}</td>
                            <td>
                                <a href="{{ route('hartaMasuk.edit', $h->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('hartaMasuk .destroy', $h->id) }}" data-confirm-delete="true"
                                    class="btn btn-sm btn-danger float-right">
                                    <i class="fas fa-trash"></i>
                            </td>
                        </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Harta</th>
                                <th>Tanggal Masuk</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
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