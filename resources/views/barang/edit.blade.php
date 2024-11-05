@extends('layouts.index')
@section('title', 'Edit Barang')
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
                                    <label for="nama_kategori">Kode Harta</label>
                                    <input type="text" class="form-control" id="nama_kategori"
                                        placeholder="Nama kategori">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_harta">Nama Harta</label>
                                    <input type="text" class="form-control" id="nama_harta" placeholder="Nama harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" placeholder="kategori">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" class="form-control" id="nilai" placeholder="Nilai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">lokasi</label>
                                    <input type="text" class="form-control" id="lokasi" placeholder="Lokasi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" placeholder="kondisi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" placeholder="keterangan">
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
