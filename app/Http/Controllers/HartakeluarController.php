<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HartakeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hartaK = DB::table('tbl_hartakeluar')
            ->join('tbl_harta', 'tbl_hartakeluar.harta_id', '=', 'tbl_harta.id')
            ->select('tbl_hartakeluar.*', 'tbl_harta.name as namaHarta')
            ->get();


        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);

        return view('hartaKeluar.index', compact('hartaK'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $harta = DB::table('tbl_harta')->get();
        return view('hartaKeluar.create', compact('harta'));
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
            'tanggal_keluar' => 'required|date',
        ]);

        $hartaId = DB::table('tbl_harta')->where('id', $validateHarMask['harta_id'])->first();

        if ($hartaId) {
            $finalStok = $hartaId->stok -= $validateHarMask['jumlah'];
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $finalStok
            ]);
        }

        DB::table('tbl_hartakeluar')->insert([
            'jumlah' => $validateHarMask['jumlah'],
            'keterangan' => $validateHarMask['keterangan'],
            'harta_id' => $validateHarMask['harta_id'],
            'tanggal_keluar' => $validateHarMask['tanggal_keluar'],
        ]);

        $laporan = DB::table('tbl_laporan')->where('harta_id', $hartaId->id)->first();

        if ($laporan) {
            $UjumlahKeluar =  $validateHarMask['jumlah'] - $laporan->jumlahKeluar;
            $UtotalNilaiKeluar = ($validateHarMask['jumlah'] * $hartaId->nilai) - $laporan->TotalNilaiKeluar;

            DB::table('tbl_laporan')->where('id', $laporan->id)->update([
                'harta_id' => $validateHarMask['harta_id'],
                'kategori_id' => $hartaId->kategori_id,
                'jumlahKeluar' => $UjumlahKeluar,
                'sisaJumlah' => $hartaId->stok,
                'TotalNilaiKeluar' => $UtotalNilaiKeluar,
                'SisaTotalNilai' => $hartaId->stok * $hartaId->nilai,
            ]);
        } else {
            DB::table('tbl_laporan')->insert([
                'harta_id' => $validateHarMask['harta_id'],
                'kategori_id' => $hartaId->kategori_id,
                'jumlahKeluar' => $validateHarMask['jumlah'],
                'sisaJumlah' => $hartaId->stok,
                'TotalNilaiMasuk' => 0,
                'TotalNilaiKeluar' => $validateHarMask['jumlah'] * $hartaId->nilai,
                'SisaTotalNilai' => $hartaId->stok * $hartaId->nilai,
            ]);
        }


        return redirect('hartaKeluar')->with('success', 'Data berhasil disimpan');
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
        $harMask = DB::table('tbl_hartakeluar')->where('id', $id)->first();
        $harta = DB::table('tbl_harta')->get();

        return view('hartaKeluar.edit', compact('harMask', 'harta'));
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
            'tanggal_keluar' => 'required|date',
        ]);

        $harMask = DB::table('tbl_hartakeluar')->where('id', $id)->first();

        $hartaId = DB::table('tbl_harta')->where('id', $harMask->harta_id)->first();


        if ($hartaId) {
            $stokAwal = $hartaId->stok += $harMask->jumlah;
            $stokAkhir = $stokAwal -= $validateHarMask['jumlah'];
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $stokAkhir
            ]);
        }

        DB::table('tbl_hartakeluar')->where('id', $id)->update([
            'jumlah' => $validateHarMask['jumlah'],
            'keterangan' => $validateHarMask['keterangan'],
            'harta_id' => $validateHarMask['harta_id'],
            'tanggal_keluar' => $validateHarMask['tanggal_keluar'],
        ]);

        return redirect('hartaKeluar')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $harMask = DB::table('tbl_hartakeluar')->where('id', $id)->first();


        $hartaId = DB::table('tbl_harta')->where('id', $harMask->harta_id)->first();

        if ($hartaId) {
            $finalStok = $hartaId->stok += $harMask->jumlah;
            DB::table('tbl_harta')->where('id', $hartaId->id)->update([
                'stok' => $finalStok
            ]);
        }

        DB::table('tbl_hartakeluar')->where('id', $id)->delete();

        return redirect('hartaKeluar')->with('success', 'Data berhasil dihapus :-)');
    }
}
