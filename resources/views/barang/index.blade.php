@extends('layouts.index')
@section('title', 'Menejemen Barang')
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataBarang @yield('title')</h3>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Kode Harta</th>
                                <th>Nama Harta</th>
                                <th>Stok Harta</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($harta as $h)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $h->kode }}</td>
                                    <td>{{ $h->name }}</td>
                                    <td>{{ $h->stok }}</td>
                                    <td>{{ $h->namaKategori }}</td>
                                    <td>{{ number_format($h->nilai, 0, ',', '.') }}</td>
                                    <td>{{ $h->namaLokasi }}</td>
                                    <td>{{ $h->kondisi }}</td>
                                    <td>{{ $h->keterangan }}</td>
                                    <td>
                                        <a href="{{ route('barang.edit', $h->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('barang.destroy', $h->id) }}" data-confirm-delete="true"
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
                                <th>Kode Harta</th>
                                <th>Nama Harta</th>
                                <th>Stok Harta</th>
                                <th>Kategori</th>
                                <th>Nilai</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
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
