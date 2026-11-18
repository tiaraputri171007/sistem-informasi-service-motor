<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PembayaranServiceApiController extends Controller
{
    // Menampilkan semua data pembayaran
    public function index()
    {
        $data = PembayaranService::with('daftarService')->get();

        return response()->json($data, 200);
    }

    // Menambahkan data pembayaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:pembayaran_services,daftar_service_id',
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => [
                'required',
                Rule::in(['Cash', 'Non Tunai']),
            ],
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'message' => 'Pembayaran service berhasil ditambahkan',
            'data' => $pembayaran->load('daftarService')
        ], 201);
    }

    // Menampilkan satu data pembayaran
    public function show(string $id)
    {
        $pembayaran = PembayaranService::with('daftarService')
            ->findOrFail($id);

        return response()->json($pembayaran, 200);
    }

    // Mengubah data pembayaran
    public function update(Request $request, string $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                Rule::unique('pembayaran_services', 'daftar_service_id')
                    ->ignore($pembayaran->id),
            ],
            'jumlah_biaya' => 'required|numeric|min:0',
            'jenis_pembayaran' => [
                'required',
                Rule::in(['Cash', 'Non Tunai']),
            ],
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);

        return response()->json([
            'message' => 'Pembayaran service berhasil diperbarui',
            'data' => $pembayaran->load('daftarService')
        ], 200);
    }

    // Menghapus data pembayaran
    public function destroy(string $id)
    {
        $pembayaran = PembayaranService::findOrFail($id);

        $pembayaran->delete();

        return response()->json([
            'message' => 'Pembayaran service berhasil dihapus'
        ], 200);
    }
}
