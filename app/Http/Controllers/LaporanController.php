<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan input tanggal dari permintaan
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Default laporan kosong jika belum ada filter
        $laporan = collect();

        // Cek jika filter tanggal ada dan valid
        if ($start_date && $end_date) {
            $query = DB::table('tbl_laporan')
                ->join('tbl_harta', 'tbl_laporan.harta_id', '=', 'tbl_harta.id')
                ->join('tbl_kategori', 'tbl_laporan.kategori_id', '=', 'tbl_kategori.id')
                ->leftJoin('tbl_hartaMsuk', 'tbl_harta.id', '=', 'tbl_hartaMsuk.harta_id')
                ->leftJoin('tbl_hartaKeluar', 'tbl_harta.id', '=', 'tbl_hartaKeluar.harta_id')
                ->select(
                    'tbl_laporan.*',
                    'tbl_harta.name as namaHarta',
                    'tbl_kategori.name as namaKategori',
                    'tbl_hartaMsuk.tanggal_masuk as tanggalMasuk',
                    'tbl_hartaKeluar.tanggal_keluar as tanggalKeluar'
                )
                ->where(function ($q) use ($start_date, $end_date) {
                    $q->whereBetween('tbl_hartaMsuk.tanggal_masuk', [$start_date, $end_date])
                        ->orWhereBetween('tbl_hartaKeluar.tanggal_keluar', [$start_date, $end_date]);
                });

            $laporan = $query->get(); // Mengambil data yang sudah difilter
        }

        // Mengirim data ke tampilan
        return view('laporan.index', compact('laporan', 'start_date', 'end_date'));
    }


    public function generatePDF(string $id)
    {


        $laporan = DB::table('tbl_laporan')
            ->join('tbl_harta', 'tbl_laporan.harta_id', '=', 'tbl_harta.id')
            ->join('tbl_kategori', 'tbl_laporan.kategori_id', '=', 'tbl_kategori.id')
            ->select('tbl_laporan.*', 'tbl_harta.name as namaHarta', 'tbl_kategori.name as namaKategori')
            ->where('tbl_laporan.id', $id) // Filter by the specific id
            ->get();

        if (!$laporan) {
            return redirect()->back()->with('error', 'Data inventaris tidak ditemukan.');
        }

        return view('laporan.invoice', compact('laporan'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
