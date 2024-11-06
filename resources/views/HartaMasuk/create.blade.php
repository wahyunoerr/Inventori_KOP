@extends('layouts.index')
@section('title', 'Tambah Harta Masuk')
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
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Harta</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nama harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" placeholder="jumlah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <textarea name="keterangan" id="" cols="20" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        @endsection
