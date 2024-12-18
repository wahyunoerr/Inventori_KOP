@extends('layouts.index')
@section('title', 'Manajemen Laporan')
@section('content')

    <!-- Tabel Data -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable @yield('title')</h3>
        </div>
        <div class="card-body">
            <!-- Form untuk memilih tanggal -->
            <form method="GET" action="{{ route('laporan.index') }}">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="start_date">Tanggal Mulai:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="end_date">Tanggal Selesai:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary form-control">Cari</button>
                    </div>
                </div>
            </form>

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
