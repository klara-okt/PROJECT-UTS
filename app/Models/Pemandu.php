<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    protected $table = 'pemandu';
    protected $fillable = [
        'nama',
        'bahasa_dikuasai',
        'tarif_per_hari',
        'pengalaman_tahun',
        'aktif'
    ];
}