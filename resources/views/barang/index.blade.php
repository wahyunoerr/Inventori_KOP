@extends('layouts.index')
@section('title','Menejemen Barang')
@section('content')
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataBarang @yield('title')</h3>
          <a href="{{route('barang.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
<thead>
    <tr>
        <th width="10px">No</th>
        <th>Kode Harta</th>
        <th>Nama Harta</th>
        <th>Kategori</th>
        <th>Nilai</th>
        <th>Lokasi</th>
        <th>Kondisi</th>
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
                    <th>Kode Harta</th>
                    <th>Nama Harta</th>
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
