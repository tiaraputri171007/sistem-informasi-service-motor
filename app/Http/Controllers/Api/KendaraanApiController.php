<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanApiController extends Controller
{
    // Menampilkan semua data kendaraan
    public function index()
    {
        return response()->json(Kendaraan::all(), 200);
    }

    // Menambahkan data kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat' => 'required|string|max:20|unique:kendaraans,no_plat',
            'jenis_kendaraan' => [
                'required',
                Rule::in(['Matic', 'Manual Transmisi']),
            ],
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'message' => 'Data kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 201);
    }

    // Menampilkan satu data kendaraan
    public function show(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return response()->json($kendaraan, 200);
    }

    // Mengubah data kendaraan
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'no_plat' => [
                'required',
                'string',
                'max:20',
                Rule::unique('kendaraans', 'no_plat')->ignore($kendaraan->id),
            ],
            'jenis_kendaraan' => [
                'required',
                Rule::in(['Matic', 'Manual Transmisi']),
            ],
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer',
            'nama_pemilik' => 'required|string|max:255',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan->update($validated);

        return response()->json([
            'message' => 'Data kendaraan berhasil diperbarui',
            'data' => $kendaraan
        ], 200);
    }

    // Menghapus data kendaraan
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        return response()->json([
            'message' => 'Data kendaraan berhasil dihapus'
        ], 200);
    }
}
