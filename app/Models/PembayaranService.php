<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembayaranService extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftar_service_id',
        'jumlah_biaya',
        'jenis_pembayaran',
        'keterangan',
    ];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class);
    }
}
