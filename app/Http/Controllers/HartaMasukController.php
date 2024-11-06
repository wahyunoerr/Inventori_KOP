<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HartaMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hartaK=DB::table('tbl_hartamsuk')
        ->join('tbl_harta', 'tbl_hartamsuk.harta_id', '=', 'tbl_harta.id')
        ->select('tbl_hartamsuk.*', 'tbl_harta.name as namaHarta')
        ->get();


        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('HartaMasuk.index', compact('hartaK'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi = DB::table('tbl_hartamsuk')->get();

        return view('HartaMasuk.create', compact('hartamsuk'));
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
        return view('HartaMasuk.edit');
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
