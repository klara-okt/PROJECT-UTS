<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama',
        'kapasitas',
        'kondisi',
        'biaya_sewa',
        'tersedia'
    ];
}