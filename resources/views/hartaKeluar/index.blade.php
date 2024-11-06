@extends('layouts.index')
@section('title', 'Menejemen Harta Keluar')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable @yield('title')</h3>
                    <a href="{{route('hartaKeluar.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Harta</th>
                                <th>Tanggal Keluar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
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
