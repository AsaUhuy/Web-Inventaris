<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddetailpinjam';
    
    protected $fillable = [
        'idinventaris',
        'jumlah',
        'tanggalpeminjaman',
        'tanggalkembali',
        'idpegawai',
        'statuspeminjaman'
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }  

    public function inventaris()
    {
        return $this->belongsTo(inventaris::class);
    }

    public function peminjaman()
    {
        return $this->belongsTo(peminjaman::class);
    }
}
