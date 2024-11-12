@extends('layouts.index')
@section('title', 'Menejemen Laporan')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable @yield('title')</h3>
                    <a href="#" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Harta</th>
                                <th>Kategori</th>
                                <th>Jumlah Masuk</th>
                                <th>Jumlah Keluar</th>
                                <th>Sisa Jumlah</th>
                                <th>Total Nilai Masuk</th>
                                <th>Total Nilai Keluar</th>
                                <th>Sisa Total Nilai</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($laporan as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->namaHarta }}</td>
                                    <td>{{ $k->namaKategori }}</td>
                                    <td>{{ $k->jumlahMasuk ?? 0 }}</td>
                                    <td>{{ $k->jumlahKeluar ?? 0 }}</td>
                                    <td>{{ $k->sisaJumlah ?? 0 }}</td>
                                    <td>{{ number_format($k->TotalNilaiMasuk, 0, ',', '.' ?? 0) }}</td>
                                    <td>{{ number_format($k->TotalNilaiKeluar, 0, ',', '.' ?? 0) }}</td>
                                    <td>{{ number_format($k->SisaTotalNilai, 0, ',', '.' ?? 0) }}</td>
                                    <td>
                                        <a href="{{ route('laporan.invoice', $k->id) }}" target="_blank"
                                            class="btn btn-sm btn-success"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Harta</th>
                                <th>Kategori</th>
                                <th>Jumlah Masuk</th>
                                <th>Jumlah Keluar</th>
                                <th>Sisa Jumlah</th>
                                <th>Total Nilai Masuk</th>
                                <th>Total Nilai Keluar</th>
                                <th>Sisa Total Nilai</th>
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
