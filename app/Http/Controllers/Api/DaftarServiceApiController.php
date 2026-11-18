<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DaftarServiceApiController extends Controller
{
    public function index()
    {
        $data = DaftarService::with(['pelanggan', 'kendaraan'])->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_service' => 'required|string|unique:daftar_services,kode_service',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $service = DaftarService::create($validated);

        return response()->json([
            'message' => 'Daftar service berhasil ditambahkan',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ], 201);
    }

    public function show(string $id)
    {
        $service = DaftarService::with(['pelanggan', 'kendaraan'])
            ->findOrFail($id);

        return response()->json($service, 200);
    }

    public function update(Request $request, string $id)
    {
        $service = DaftarService::findOrFail($id);

        $validated = $request->validate([
            'kode_service' => [
                'required',
                'string',
                Rule::unique('daftar_services', 'kode_service')->ignore($service->id),
            ],
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_service' => 'required|date',
        ]);

        $service->update($validated);

        return response()->json([
            'message' => 'Daftar service berhasil diperbarui',
            'data' => $service->load(['pelanggan', 'kendaraan'])
        ], 200);
    }

    public function destroy(string $id)
    {
        $service = DaftarService::findOrFail($id);
        $service->delete();

        return response()->json([
            'message' => 'Daftar service berhasil dihapus'
        ], 200);
    }
}
