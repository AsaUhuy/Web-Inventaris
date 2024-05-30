<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $data = Petugas::with('Level')->get();$data = DB::table('Petugas')
        ->join('levels', 'petugas.idlevel', '=', 'levels.idlevel')
        ->select('petugas.*', 'levels.namalevel')
        ->whereNull('petugas.deleted_at')
        ->orderBy('idpetugas', 'desc')
        ->get();

        return view('petugas.tampil', compact('data'));
    }

    public function create()
    {
        $level = Level::all();
        $data = $level->map(function($item){
            return[
                'idlevel' => $item->idlevel,
                'namalevel' => $item->namalevel
            ];
        });

        return view('petugas.input', compact('data'));
    }

    public function store(Request $request)
    {
        DB::table('petugas')->insert([
            'namapetugas' => $request->namapetugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'idlevel' => $request->idlevel
        ]);

        return redirect('/petugas');
    }

    public function show(petugas $petugas)
    {
        
    }

    public function edit(string $id)
    {
        $data = DB::table('petugas')->where('idpetugas', $id)->get();
        $level = level::all();
        $detail_level = $level->map(function($item){
            return[
                'idlevel' => $item->idlevel,
                'namalevel' => $item->namalevel
            ];
        });
        return view("petugas.edit",['petugas' => $data], compact( 'detail_level'));
    }

    public function update(Request $request)
    {
        DB::table('petugas')->where('idpetugas',$request->idpetugas)->update([
            'namapetugas' => $request->namapetugas,
            'username' => $request->username,
            'idlevel' => $request->idlevel,
        ]);

        return redirect('/petugas');
    }

    public function destroy(string $id)
    {
        $petugas = Petugas::find($id); 
        
        if (!$petugas) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $petugas->deleted_at = now()->toDateTimeString();
        $petugas->save();

        return redirect('/petugas');
    }
}
