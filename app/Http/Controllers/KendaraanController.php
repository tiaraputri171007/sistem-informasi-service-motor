<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();

        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|unique:kendaraans,no_plat',
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required|numeric',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'no_plat' => 'required|unique:kendaraans,no_plat,' . $kendaraan->id,
            'jenis_kendaraan' => 'required',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required|numeric',
            'nama_pemilik' => 'required',
            'warna' => 'required',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus.');
    }
}