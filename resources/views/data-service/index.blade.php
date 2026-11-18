@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Data Service Motor</h2>

    <a href="{{ route('data-service.create') }}"
       style="display:inline-block; padding:10px 15px; background:green; color:white; text-decoration:none; margin-bottom:15px;">
        + Tambah Data Service
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Service</th>
                <th>Keluhan Kendaraan</th>
                <th>Estimasi Service</th>
                <th>Nama Mekanik</th>
                <th>Sparepart Pengganti</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($dataServices as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->daftarService->kode_service ?? '-' }}</td>
                    <td>{{ $data->keluhan_kendaraan }}</td>
                    <td>{{ $data->estimasi_service }}</td>
                    <td>{{ $data->nama_mekanik }}</td>
                    <td>{{ $data->sparepart_pengganti ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        Belum ada data service.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
