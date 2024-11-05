@extends('layouts.index')
@section('title','Tambah lokasi')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form @yield('title')</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_lokasi">Nama Lokasi</label>
              <input type="text" class="form-control" id="nama_lokasi" placeholder="Nama Lokasi">
            </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

@endsection
