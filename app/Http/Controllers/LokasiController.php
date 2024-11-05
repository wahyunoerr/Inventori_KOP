<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = DB::table('tbl_lokasi')->get();

        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiLokasi = $request->validate([
            'name' => 'required'
        ]);

        DB::table('tbl_lokasi')->insert([
            'name' => $validasiLokasi['name'],
        ]);

        return redirect('lokasi')->with('success', 'Data berhasil disimpan :)');
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
        $lokasi = DB::table('tbl_lokasi')->where('id', $id)->first();

        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiLokasi = $request->validate([
            'name' => 'required'
        ]);

        DB::table('tbl_lokasi')->where('id', $id)->update([
            'name' => $validasiLokasi['name'],
        ]);

        return redirect('lokasi')->with('success', 'Data berhasil disimpan :)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tbl_lokasi')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus :)');
    }
}
