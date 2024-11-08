@extends('layouts.index')
@section('title', 'Edit Harta Keluar')
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
            <form action="{{ route('hartaKeluar.update', $harMask->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="jumlah_awal" value="{{ $harMask->jumlah }}"> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nama Harta</label>
                                <select name="harta_id" id="" class="form-control">
                                    @foreach ($harta as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $harMask->harta_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    value="{{ $harMask->jumlah }}" placeholder="jumlah">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">Tanggal keluar</label>
                                <input type="date" value="{{ $harMask->tanggal_keluar }}" name="tanggal_keluar"
                                    class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" name="keterangan" id="" cols="20" rows="5" class="form-control">{{ $harMask->keterangan }}</textarea>
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
