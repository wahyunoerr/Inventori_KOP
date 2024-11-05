<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $harta = DB::table('tbl_harta')
            ->join('tbl_kategori', 'tbl_harta.kategori_id', '=', 'tbl_kategori.id')
            ->join('tbl_lokasi', 'tbl_harta.lokasi_id', '=', 'tbl_lokasi.id')
            ->select('tbl_harta.*', 'tbl_kategori.name as namaKategori', 'tbl_lokasi.name as namaLokasi')
            ->get();

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('barang.index', compact('harta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi = DB::table('tbl_lokasi')->get();
        $kategori = DB::table('tbl_kategori')->get();

        return view('barang.create', compact('lokasi', 'kategori'));
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
    public function edit()
    {
        //
        return view('barang.edit');
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
