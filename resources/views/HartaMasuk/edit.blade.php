@extends('layouts.index')
@section('title', 'Edit Harta Masuk')
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
                                    <label for="nama_harta">Nama Harta</label>
                                    <input type="text" class="form-control" id="nama_harta" placeholder="Nama harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tarnggal Masuk</label>
                                    <input type="date" class="form-control" id="tanggal" placeholder="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah">jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" placeholder="jumlah">
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
