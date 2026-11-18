<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarService extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_service',
        'kendaraan_id',
        'pelanggan_id',
        'keluhan_kendaraan',
        'tanggal_service',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function dataService()
    {
        return $this->hasOne(DataService::class);
    }

    public function pembayaranService()
    {
        return $this->hasOne(PembayaranService::class);
    }
}
