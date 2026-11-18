<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->latest()->get();

        return view('daftar-service.index', compact('daftarServices'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('daftar-service.create', compact(
            'pelanggans',
            'kendaraans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_service' => 'required|unique:daftar_services,kode_service',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'keluhan_kendaraan' => 'required',
            'tanggal_service' => 'required|date',
        ]);

        DaftarService::create($request->all());

        return redirect()->route('daftar-service.index')
            ->with('success', 'Data service berhasil ditambahkan.');
    }
}
