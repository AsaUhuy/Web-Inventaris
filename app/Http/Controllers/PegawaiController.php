<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index(){
        $data = Pegawai::whereNull('deleted_at')
        ->orderBy('idpegawai', 'desc')
        ->get();
        return view('pegawai.tampil', compact('data'));
    }

    public function create(){
        $data = Pegawai::all();
        return view('Pegawai.input', compact('data'));
    }

    public function store(Request $request){
        DB::table('pegawais')->insert([
            'namapegawai' => $request->namapegawai,
            'nip' => $request->nip,
            'alamat' => $request->alamat
        ]);

        return redirect('/pegawai');
    }

    public function edit(string $id)
    {
        $pegawai = Pegawai::find($id); 

        return view("pegawai.edit", compact('pegawai')); 
    }

    public function update(Request $request)
    {
            DB::table('pegawais')->where('idpegawai', $request->idpegawai)->update([
            'namapegawai' => $request->namapegawai,
            'nip' => $request->nip,
            'alamat' => $request->alamat, 
        ]);

        return redirect('/pegawai');
    }

    //KONFIRMASI DENGAN CARA LAIN
    // public function destroy(string $id)
    // {
    //     $pegawai = Pegawai::find($id); 

    //     if (!$pegawai) {
    //         return redirect()->back()->with('error', 'Data Pegawai tidak ditemukan');
    //     }

    //     // Menampilkan pesan konfirmasi
    //     Session::flash('confirmation', 'Apakah Anda yakin ingin menghapus data pegawai ini?');

    //     return redirect()->route('pegawai.confirm.delete', ['id' => $id]);
    // }

    // public function confirmDelete(string $id)
    // {
    //     $pegawai = Pegawai::find($id);

    //     if (!$pegawai) {
    //         return redirect()->back()->with('error', 'Data Pegawai tidak ditemukan');
    //     }

    //     return view('pegawai.confirm-delete', compact('pegawai'));
    // }

    // public function delete(string $id)
    // {
    //     $pegawai = Pegawai::find($id);

    //     if (!$pegawai) {
    //         return redirect()->back()->with('error', 'Data Pegawai tidak ditemukan');
    //     }

    //     $pegawai->deleted_at = now()->toDateTimeString();
    //     $pegawai->save();

    //     return redirect('/pegawai')->with('success', 'Data Pegawai berhasil dihapus');
    // }

    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->back()->with('error', 'Data Pegawai tidak ditemukan');
        }

        $pegawai->deleted_at = now()->toDateTimeString();
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Data Pegawai berhasil dihapus');
    }
}
