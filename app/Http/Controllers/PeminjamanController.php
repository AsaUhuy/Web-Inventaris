<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Pegawai;
use App\Models\Peminjaman as p;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index(Request $request)
    // {
    //     if ($request->has('statuspeminjaman')) {
    //         if ($request->statuspeminjaman == 'Diproses') {
    //             $data = peminjaman::with('inventaris')
    //                 ->whereNotNull('tanggalpeminjaman')
    //                 ->whereNotNull('tanggalkembali')
    //                 ->get();
    //         } elseif ($request->statuspeminjaman == 'Dipinjam') {
    //             $data = peminjaman::with('inventaris')
    //                 ->whereNull('tanggalpeminjaman')
    //                 ->whereNull('tanggalkembali')
    //                 ->get();
    //         } else {
    //             // Default, tampilkan semua data
    //             $data = peminjaman::with('inventaris')->get();
    //         }
    //     } else {
    //         // Default, tampilkan semua data
    //         $data = peminjaman::with('inventaris')->get();
    //     }

    //     return view('peminjaman.list', compact('data'));
    // }

     public function index()
     {
         $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
         ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
         ->select('peminjamen.*', 'inventaris.nama')
         ->whereNull('peminjamen.deleted_at')
         ->orderBy('created_at', 'desc')
         ->get();
 
         return view('peminjaman.list', compact('data'));
     }
     

     public function p_index()
     {
         $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
         ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
         ->select('peminjamen.*', 'inventaris.nama')
         ->whereNull('peminjamen.tanggalpeminjaman')
         ->whereNull('peminjamen.tanggalkembali')
         ->orderBy('created_at', 'desc')
         ->get();
 
         return view('peminjaman.tampil', compact('data'));
     }

     public function k_index()
     {
         $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
          ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
          ->select('peminjamen.*', 'inventaris.nama')
          ->whereNotNull('peminjamen.tanggalpeminjaman')
          ->whereNull('peminjamen.tanggalkembali')
          ->orderBy('created_at', 'desc')
          ->where('peminjamen.statuspeminjaman', 'ProsesKembali')
          ->get();
     
          return view('pengembalian.tampil', compact('data'));
     }
     


    //  public function index()
    //  {
    //      $data = peminjaman::with('pegawai')->get();$data = DB::table('peminjamen')
    //      ->join('pegawais', 'peminjamen.idpegawai', '=', 'pegawais.idpegawai')
    //      ->select('peminjamen.*', 'pegawais.namapegawai')
    //      ->get();
 
    //      return view('peminjaman.tampil', compact('data'));
    //  }

     
    // public function index()
    // {
    //     $data = p::all();
    //     return view("peminjaman.tampil", compact('data'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //dd($request->all());
        $peminjaman = Peminjaman::all();
        $inventaris = Inventaris::all();
        $pegawai = Pegawai::all();
        $jumlah = 1;
        $idinventaris = request('idinventaris');
        $idpegawai = request('idpegawai');
        $i_detail = Inventaris::find($idinventaris);
        $p_detail = Pegawai::find($idpegawai);
        $act = request('act');
        $jumlah = request('jumlah');
        if ($act == 'min') {
            if ($jumlah <= 1) {
                $jumlah = 1;
            } else {
                $jumlah = $jumlah - 1;
            }
        } else {
            $jumlah = $jumlah + 1;
        }
        
        $data = $inventaris->map(function ($item) {
            return [
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama,
            ];
        });

        $datap = $pegawai->map(function ($item) {
            return [
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai,
            ];
        });
        return view('peminjaman.input', compact('i_detail','p_detail', 'data', 'datap', 'jumlah','peminjaman'));
    }

    protected function addpeminjaman(){
        $data = [
            'idinventaris' => auth()->user()->id,
            'nama' => auth()->user()->nama,
        ];

        p::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idinventaris' => 'required',
            'jumlah' => 'required',
            'statuspeminjaman' => 'required',
            'idpegawai' => 'required'
        ]);

        p::create([
            'idinventaris' => $request->idinventaris,
            'jumlah' => $request->jumlah,
            'statuspeminjaman' => $request->statuspeminjaman,
            'idpegawai' => $request->idpegawai
        ]);

        return Redirect::to('/peminjaman/list');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'idinventaris' => 'required',
    //         'jumlah' => 'required',
    //         'statuspeminjaman' => 'required',
    //         'idpegawai' => 'required'
    //     ]);
    
    //     Peminjaman::create($validatedData);
    
    //     return Redirect::to('/peminjaman');
    // }
    

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'idinventaris' => 'required',
    //         'jumlah' => 'required',
    //         'tanggalpeminjaman' => 'required',
    //         'tanggalkembali' => 'required',
    //         'statuspeminjaman' => 'required',
    //         'idpegawai' => 'required'
    //     ]);

    //     p::create([
    //         'idinventaris' => $request->idinventaris,
    //         'jumlah' => $request->jumlah,
    //         'tanggalpeminjaman' => $request->tanggalpeminjaman,
    //         'tanggalkembali' => $request->tanggalkembali,
    //         'statuspeminjaman' => $request->statuspeminjaman,
    //         'idpegawai' => $request->idpegawai
    //     ]);

    //     return Redirect::to('/peminjaman');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('peminjamen')->where('idpeminjaman', $id)->get();
        $peminjaman = Peminjaman::find($id); 
        $inventaris = Inventaris::all();
        $detail_inventaris = $inventaris->map(function($item){
            return[
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama
            ];
        });
        $pegawai = Pegawai::all();
        $detail_pegawai = $pegawai->map(function($item){
            return[
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai
            ];
        });
        
        return view("peminjaman.show",['peminjamen' => $data], compact( 'detail_inventaris','detail_pegawai', 'data','peminjaman','inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('peminjamen')->where('idpeminjaman', $id)->get();
        $peminjaman = Peminjaman::find($id); 
        $inventaris = Inventaris::all();
        $detail_inventaris = $inventaris->map(function($item){
            return[
                'idinventaris' => $item->idinventaris,
                'nama' => $item->nama
            ];
        });
        $pegawai = Pegawai::all();
        $detail_pegawai = $pegawai->map(function($item){
            return[
                'idpegawai' => $item->idpegawai,
                'namapegawai' => $item->namapegawai
            ];
        });
        
        return view("peminjaman.edit",['peminjamen' => $data], compact( 'detail_inventaris','detail_pegawai', 'data','peminjaman','inventaris'));
    }

    public function update(Request $request)
    {
        DB::table('peminjamen')->where('idpeminjaman',$request->idpeminjaman)->update([
            'idinventaris' => $request->idinventaris,
            'idpegawai' => $request->idpegawai,
            'jumlah' => $request->jumlah,
            'tanggalpeminjaman' => $request->tanggalpeminjaman,
            'tanggalkembali' => $request->tanggalkembali,
            'statuspeminjaman' => $request->statuspeminjaman
        ]);

        return redirect('/peminjaman/list');
    }

    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data Peminjaman tidak ditemukan');
        }

        $peminjaman->deleted_at = now()->toDateTimeString();
        $peminjaman->save();

        return redirect('/peminjaman/list');
    }

    

    public function allowPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);  
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Dipinjam';
        $peminjaman->tanggalpeminjaman = now()->toDateTimeString();
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Dipinjam');
    }

    public function allowProsesPengembalian($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'ProsesKembali';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi ProsesKembali');
    }

    public function allowPengembalian($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Dikembalikan';
        $peminjaman->tanggalkembali = now()->toDateTimeString();
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Dikembalikan');
    }

    public function TolakPengembalian($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data pengembalian tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Pengembalian Ditolak';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Pengembalian Ditolak');
    }

    public function TolakPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id); 
        
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
        }

        $peminjaman->statuspeminjaman = 'Peminjaman Ditolak';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah menjadi Peminajaman Ditolak');
    }

    public function tampilpdf(Request $request) {
        $tanggal = $request->input('tanggal'); 
        $startDate = $request->input('start_date'); 
        $endDate = $request->input('end_date'); 

        if ($tanggal) {
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris') 
            ->whereDate('peminjamen.created_at', $tanggal)
            ->get();

            return view('/peminjaman/tampilpdf', compact('data'));
        } elseif ($startDate && $endDate) { 
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris')
            ->whereBetween('peminjamen.created_at', [$startDate, $endDate])
            ->get();

            return view('/peminjaman/tampilpdf', compact('data'));
        } else {
            $peminjaman = Peminjaman::with('inventaris')->get();
            $data = DB::table('peminjamen')
            ->join('inventaris', 'peminjamen.idinventaris', '=', 'inventaris.idinventaris')
            ->select('peminjamen.*', 'inventaris.nama AS nama_inventaris')
            ->get();
            
            $peminjamen = [
                'title' => 'Laporan Data Peminjaman',
                'peminjaman' => $peminjaman
            ];
    
            return view('Peminjaman.tampilpdf', compact('peminjamen', 'data'));
        }
    }
}
