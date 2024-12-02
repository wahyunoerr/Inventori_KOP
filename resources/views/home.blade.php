<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
@extends('layouts.index')
@section('title', 'Dashboard')
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3> {{ count($kategori) }}</h3>

                    <p>Total Kategori</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cube"></i>
                </div>
                <a href="{{ route('kategori') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ count($harta) }}</h3>

                    <p>Total Daftar Harta</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="{{ route('barang') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($hartaMasuk) }}</h3>


                    <p>Total Harta Masuk</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-recycle"></i>
                </div>
                <a href="{{ route('hartaMasuk') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ count($hartaKeluar) }}</h3>

                    <p>Total Harta Keluar</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cubes"></i>
                </div>
                <a href="{{ route('hartaKeluar') }}" class="small-box-footer">Lihat <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
