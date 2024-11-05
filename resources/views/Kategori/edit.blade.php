@extends('layouts.index')
@section('title','Edit Kategori')
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
              <label for="nama_kategori">Nama Kategori</label>
              <input type="text" class="form-control" id="nama_kategori" placeholder="Nama Kategori">
            </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
@endsection
