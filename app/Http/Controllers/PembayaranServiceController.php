<?php

namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    public function index()
    {
        $pembayaranServices = PembayaranService::with('daftarService')
            ->latest()
            ->get();

        return view('pembayaran-service.index', compact('pembayaranServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::all();

        return view('pembayaran-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash,Non Tunai',
            'keterangan' => 'nullable',
        ]);

        PembayaranService::create($request->all());

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil ditambahkan.');
    }
}
