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
        $hartaK = DB::table('tbl_hartamsuk')
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
        $harta = DB::table('tbl_harta')->get();

        return view('HartaMasuk.create', compact('harta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateHarMask = $request->validate([
            'jumlah' => 'required',
            'keterangan' => 'required',
            'harta_id' => 'required|exists:tbl_harta,id',
            'tanggal_masuk' => 'required|date',
        ]);

        $hartaId = DB::table('tbl_harta')->where('id', $validateHarMask['harta_id'])->first();

        if ($hartaId) {
            $finalStok = $hartaId->stok += $validateHarMask['jumlah'];
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $finalStok
            ]);
        }

        DB::table('tbl_hartamsuk')->insert([
            'jumlah' => $validateHarMask['jumlah'],
            'keterangan' => $validateHarMask['keterangan'],
            'harta_id' => $validateHarMask['harta_id'],
            'tanggal_masuk' => $validateHarMask['tanggal_masuk'],
        ]);

        return redirect('hartaMasuk')->with('success', 'Data berhasil disimpan');
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
        $harMask = DB::table('tbl_hartamsuk')->where('id', $id)->first();
        $harta = DB::table('tbl_harta')->get();

        return view('HartaMasuk.edit', compact('harMask', 'harta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateHarMask = $request->validate([
            'jumlah' => 'required',
            'keterangan' => 'required',
            'harta_id' => 'required|exists:tbl_harta,id',
            'tanggal_masuk' => 'required|date',
        ]);

        $harMask = DB::table('tbl_hartamsuk')->where('id', $id)->first();

        $hartaId = DB::table('tbl_harta')->where('id', $harMask->harta_id)->first();


        if ($hartaId) {
            $stokAwal = $hartaId->stok -= $harMask->jumlah;
            $stokAkhir = $stokAwal += $validateHarMask['jumlah'];
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $stokAkhir
            ]);
        }

        // dd($request->all(), $harMask, $hartaId, $stokAkhir);

        DB::table('tbl_hartamsuk')->where('id', $id)->update([
            'jumlah' => $validateHarMask['jumlah'],
            'keterangan' => $validateHarMask['keterangan'],
            'harta_id' => $validateHarMask['harta_id'],
            'tanggal_masuk' => $validateHarMask['tanggal_masuk'],
        ]);

        return redirect('hartaMasuk')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $harMask = DB::table('tbl_hartamsuk')->where('id', $id)->first();


        $hartaId = DB::table('tbl_harta')->where('id', $harMask->harta_id)->first();

        if ($hartaId) {
            $finalStok = $hartaId->stok -= $harMask->jumlah;
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $finalStok
            ]);
        }

        DB::table('tbl_hartamsuk')->where('id', $id)->delete();

        return redirect('hartaMasuk')->with('success', 'Data berhasil dihapus :-)');
    }
}
