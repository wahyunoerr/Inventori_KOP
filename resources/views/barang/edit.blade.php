@extends('layouts.index')
@section('title', 'Edit Harta')
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
                <form action="{{ route('barang.update', $harta->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode">Kode Harta</label>
                                    <input type="text" class="form-control" name="kode" value="{{ $harta->kode }}"
                                        id="kode" placeholder="Kode Harta" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_harta">Nama Harta</label>
                                    <input type="text" class="form-control" name="name" id="nama_harta"
                                        value="{{ $harta->name }}" placeholder="Nama harta">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori_id" id="" class="form-control">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $harta->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" class="form-control" name="nilai" value="{{ $harta->nilai }}"
                                        id="nilai" placeholder="Nilai">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lokasi">lokasi</label>
                                    <select name="lokasi_id" id="" class="form-control">
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $harta->lokasi_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" class="form-control">
                                        <option
                                            value="Sangat Baik"{{ $harta->kondisi == 'Sangat Baik' ? 'selected' : '' }}>
                                            Sangat Baik</option>
                                        <option value="Baik" {{ $harta->kondisi == 'Baik' ? 'selected' : '' }}>Baik
                                        </option>
                                        <option value="Kurang Baik"
                                            {{ $harta->kondisi == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                        <option value="Buruk" {{ $harta->kondisi == 'Buruk' ? 'selected' : '' }}>
                                            Buruk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="stok">Stok</label>
                                <div class="form-group">
                                    <input type="number" name="stok" class="form-control" name="stok"
                                        value="{{ $harta->stok }}" placeholder="Masukkan Stok Harta">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <textarea name="keterangan" id="" cols="20" rows="5" class="form-control"
                                        placeholder="Masukkan Keterangan">{{ $harta->keterangan }}</textarea>
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
