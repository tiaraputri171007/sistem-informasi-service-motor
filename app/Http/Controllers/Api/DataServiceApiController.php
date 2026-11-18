<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataServiceApiController extends Controller
{
    // Menampilkan semua data service
    public function index()
    {
        $data = DataService::with('daftarService')->get();

        return response()->json($data, 200);
    }

    // Menambahkan data service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id|unique:data_services,daftar_service_id',
            'keluhan_kendaraan' => 'required|string',
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ]);

        $dataService = DataService::create($validated);

        return response()->json([
            'message' => 'Data service berhasil ditambahkan',
            'data' => $dataService->load('daftarService')
        ], 201);
    }

    // Menampilkan satu data service
    public function show(string $id)
    {
        $dataService = DataService::with('daftarService')
            ->findOrFail($id);

        return response()->json($dataService, 200);
    }

    // Mengubah data service
    public function update(Request $request, string $id)
    {
        $dataService = DataService::findOrFail($id);

        $validated = $request->validate([
            'daftar_service_id' => [
                'required',
                'exists:daftar_services,id',
                Rule::unique('data_services', 'daftar_service_id')
                    ->ignore($dataService->id),
            ],
            'keluhan_kendaraan' => 'required|string',
            'estimasi_service' => 'required|string|max:255',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ]);

        $dataService->update($validated);

        return response()->json([
            'message' => 'Data service berhasil diperbarui',
            'data' => $dataService->load('daftarService')
        ], 200);
    }

    // Menghapus data service
    public function destroy(string $id)
    {
        $dataService = DataService::findOrFail($id);

        $dataService->delete();

        return response()->json([
            'message' => 'Data service berhasil dihapus'
        ], 200);
    }
}
