<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';
    protected $fillable = [
        'nama',
        'asal_kota',
        'no_hp',
        'tanggal_kunjungan',
        'jumlah_orang'
    ];
}