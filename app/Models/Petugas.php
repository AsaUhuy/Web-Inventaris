<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Petugas extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'idpetugas';
    
    protected $fillable = [
        'username',
        'password',
        'namapetugas',
        'idlevel',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }  

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'idpetugas');
    }
}
