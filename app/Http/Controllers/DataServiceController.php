<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('daftarService')
            ->latest()
            ->get();

        return view('data-service.index', compact('dataServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::all();

        return view('data-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:data_services,daftar_service_id',
            'keluhan_kendaraan' => 'required',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'nullable',
        ]);

        DataService::create($request->all());

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan.');
    }
}
