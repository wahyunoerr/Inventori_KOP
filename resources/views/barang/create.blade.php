@extends('layouts.index')
@section('title', 'Tambah Barang')
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
                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_kategori">Kode Harta</label>
                                    <input type="number" class="form-control" id="nama_kategori" name="kode"
                                        placeholder="Kode Harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_harta">Nama Harta</label>
                                    <input type="text" class="form-control" id="nama_harta" name="name"
                                        placeholder="Nama harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori_id" id="" class="form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" class="form-control" id="nilai" name="nilai"
                                        placeholder="Nilai">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lokasi">lokasi</label>
                                    <select name="lokasi_id" id="" class="form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control">
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Kurang Baik">Kurang Baik</option>
                                        <option value="Buruk">Buruk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="stok">Stok</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="stok"
                                        placeholder="Masukkan Stok Harta">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <textarea name="keterangan" id="" cols="20" rows="5" class="form-control"
                                        placeholder="Masukkan Keterangan"></textarea>
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
