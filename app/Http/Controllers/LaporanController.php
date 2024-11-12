<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = DB::table('tbl_laporan')
            ->join('tbl_harta', 'tbl_laporan.harta_id', '=', 'tbl_harta.id')
            ->join('tbl_kategori', 'tbl_laporan.kategori_id', '=', 'tbl_kategori.id')
            ->select('tbl_laporan.*', 'tbl_harta.name as namaHarta', 'tbl_kategori.name as namaKategori')
            ->get();
        return view('laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function generatePDF(string $id)
    {


        $laporan = DB::table('tbl_laporan')
            ->join('tbl_harta', 'tbl_laporan.harta_id', '=', 'tbl_harta.id')
            ->join('tbl_kategori', 'tbl_laporan.kategori_id', '=', 'tbl_kategori.id')
            ->select('tbl_laporan.*', 'tbl_harta.name as namaHarta', 'tbl_kategori.name as namaKategori')
            ->where('tbl_laporan.id', $id) // Filter by the specific id
            ->get();

        if (!$laporan) {
            return redirect()->back()->with('error', 'Data inventori tidak ditemukan.');
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
