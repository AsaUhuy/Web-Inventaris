<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    //2Tanggal
    public function generatepdfPeminjaman(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if (!$startDate && !$endDate) {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris') 
            ->get();
        } elseif ($startDate && !$endDate) {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris')
            ->whereDate('peminjamen.created_at', $startDate)
            ->get();
        } elseif ($startDate && $endDate) {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris')
            ->whereBetween('peminjamen.created_at', [$startDate, $endDate])
            ->get();
        }  else {
            return response()->json(['error' => 'Mohon pilih tanggal awal.']);
        }

        $data = [
            'title' => 'Laporan Data Peminjaman',
            'peminjaman' => $data 
        ];

        $pdf = PDF::loadView('/peminjaman/generatepdf', $data);
        return $pdf->download('PeminjamanPDF.pdf');
    }

    //Satu Tanggal
    public function generatepdfPeminjaman1(Request $request)
    {
        $selectedDate = $request->input('tanggal');

        if (!$selectedDate) {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris') 
            ->get();
        } else {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris') 
            ->whereDate('peminjamen.created_at', $selectedDate)
            ->get();
        }

        $data = [
            'title' => 'Laporan Data Peminjaman',
            'peminjaman' => $data 
        ];

        $pdf = PDF::loadView('/peminjaman/generatepdf', $data);
        return $pdf->download('PeminjamanPDF.pdf');
    }

        // $peminjaman = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        //  ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
        //  ->select('peminjamen.*', 'inventaris.nama')
        //  ->get();

        //  $data = [
        //     'title' => 'Laporan Data Peminjaman',
        //     'peminjaman' => $peminjaman
        // ];

        // $pdf = Pdf::loadView('/peminjaman/generatepdf', $data);
        // return $pdf->download('PeminjamanPDF.pdf');

    public function generatepdfPetugas()
    {
        $petugas = Petugas::with('Level')->get();$petugas = DB::table('Petugas')
        ->join('levels', 'petugas.idlevel', '=', 'levels.idlevel')
        ->select('petugas.*', 'levels.namalevel')
        ->get();
        $data = [
            'title' => 'Laporan Data Petugas',
            'petugas' => $petugas
        ];
        $pdf = Pdf::loadView('/petugas/generatepdf', $data);
        return $pdf->download('PetugasPDF.pdf');
    }
}