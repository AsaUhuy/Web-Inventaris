<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Petugas;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $jumlahUserBaru = Petugas::whereNull('deleted_at')->count();
        $jumlahPeminjaman = Peminjaman::whereNull('deleted_at')->count();
        $jumlahPegawai = Pegawai::whereNull('deleted_at')->count();
        $jumlahInventaris = Inventaris::whereNull('deleted_at')->count();

        return view('beranda', [
            'jumlahUserBaru' => $jumlahUserBaru,
            'jumlahPeminjaman' => $jumlahPeminjaman,
            'jumlahPegawai' => $jumlahPegawai,
            'jumlahInventaris' => $jumlahInventaris,
        ]);
    }
}
