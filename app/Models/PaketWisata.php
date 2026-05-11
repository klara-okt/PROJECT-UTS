<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';
    
    public function getRouteKeyName()
{
    return 'id';
}
    
    protected $fillable = [
        'nama_paket',
        'durasi_jam',
        'harga',
        'min_peserta',
        'aktif'
    ];
}