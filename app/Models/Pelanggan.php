<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pelanggan',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'pekerjaan',
    ];

    public function daftarServices()
    {
        return $this->hasMany(DaftarService::class);
    }
}
