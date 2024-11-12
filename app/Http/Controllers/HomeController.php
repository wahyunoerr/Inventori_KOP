<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = DB::table('tbl_kategori')->get();
        $harta = DB::table('tbl_harta')->get();
        $hartaMasuk = DB::table('tbl_hartamsuk')->get();
        $hartaKeluar = DB::table('tbl_hartakeluar')->get();
        $users = DB::table('users')->get();
        return view('home', compact('kategori','harta','hartaMasuk','hartaKeluar','users'));
    }
}
