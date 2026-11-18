<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganApiController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        return response()->json(Pelanggan::all(), 200);
    }

    // Menambahkan data pelanggan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan',
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string|max:100',
        ]);

        $pelanggan = Pelanggan::create($validated);

        return response()->json([
            'message' => 'Data pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ], 201);
    }

    // Menampilkan satu data pelanggan
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return response()->json($pelanggan, 200);
    }

    // Mengubah data pelanggan
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = $request->validate([
            'kode_pelanggan' => [
                'required',
                Rule::unique('pelanggans', 'kode_pelanggan')->ignore($pelanggan->id),
            ],
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string|max:100',
        ]);

        $pelanggan->update($validated);

        return response()->json([
            'message' => 'Data pelanggan berhasil diperbarui',
            'data' => $pelanggan
        ], 200);
    }

    // Menghapus data pelanggan
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();

        return response()->json([
            'message' => 'Data pelanggan berhasil dihapus'
        ], 200);
    }
}

