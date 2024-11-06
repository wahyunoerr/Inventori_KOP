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
        $validateHarta = $request->validate([
            'kode' => 'required',
            'name' => 'required',
            'kategori_id' => 'required|exists:tbl_kategori,id',
            'nilai' => 'required',
            'lokasi_id' => 'required|exists:tbl_lokasi,id',
            'kondisi' => 'required|in:Sangat Baik,Baik,Kurang Baik,Buruk',
            'keterangan' => 'required',
            'stok' => 'required'
        ]);

        $newKode = time() . "KOP" . $validateHarta['kode'];

        DB::table('tbl_harta')->insert([
            'kode' => $newKode,
            'name' => $validateHarta['name'],
            'kategori_id' => $validateHarta['kategori_id'],
            'nilai' => $validateHarta['nilai'],
            'lokasi_id' => $validateHarta['lokasi_id'],
            'kondisi' => $validateHarta['kondisi'],
            'keterangan' => $validateHarta['keterangan'],
            'stok' => $validateHarta['stok'],
        ]);

        return redirect('barang')->with('success', 'Data berhasil disimpan :)');
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
        $harta = DB::table('tbl_harta')->where('id', $id)->first();
        $kategori = DB::table('tbl_kategori')->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('barang.edit', compact('harta', 'kategori', 'lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateHarta = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required|exists:tbl_kategori,id',
            'nilai' => 'required',
            'lokasi_id' => 'required|exists:tbl_lokasi,id',
            'kondisi' => 'required|in:Sangat Baik,Baik,Kurang Baik,Buruk',
            'keterangan' => 'required',
            'stok' => 'required'
        ]);

        $kode = DB::table('tbl_harta')->where('id', $id)->first();

        DB::table('tbl_harta')->where('id', $id)->update([
            'kode' => $kode->kode,
            'name' => $validateHarta['name'],
            'kategori_id' => $validateHarta['kategori_id'],
            'nilai' => $validateHarta['nilai'],
            'lokasi_id' => $validateHarta['lokasi_id'],
            'kondisi' => $validateHarta['kondisi'],
            'keterangan' => $validateHarta['keterangan'],
            'stok' => $validateHarta['stok'],
        ]);

        return redirect('barang')->with('success', 'Data berhasil diubah :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $harta = DB::table('tbl_harta')->where('id', $id)->delete();

        return redirect('barang')->with('success', 'Data berhasil dihapus :)');
    }
}
