<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice" style="margin-right: 30px">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> INVENTORY
                        <small class="float-right">Date: {{ date('d F Y') }}</small>
                    </h2>
                </div>
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama harta</th>
                                <th>Kategori</th>
                                <th>Jumlah Masuk</th>
                                <th>Jumlah keluar</th>
                                <th>Sisa Jumlah</th>
                                <th>Total Nilai Masuk</th>
                                <th>Total Nilai Keluar</th>
                                <th>Sisa Total Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->namaHarta }}</td>
                                    <td>{{ $k->namaKategori }}</td>
                                    <td>{{ $k->jumlahMasuk }}</td>
                                    <td>{{ $k->jumlahKeluar }}</td>
                                    <td>{{ $k->sisaJumlah }}</td>
                                    <td>{{ 'Rp. ' . number_format($k->TotalNilaiMasuk) }}</td>
                                    <td>{{ 'Rp. ' . number_format($k->TotalNilaiKeluar) }}</td>
                                    <td>{{ 'Rp. ' . number_format($k->SisaTotalNilai) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    <!-- Page specific script -->
    <script>
        window.addEventListener("load", function() {
            window.print();
        });
    </script>
</body>

</html>
