
@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Daftar Service Motor</h2>

    <a href="{{ route('daftar-service.create') }}"
       style="display:inline-block; padding:10px 15px; background:green; color:white; text-decoration:none; margin-bottom:15px;">
        + Tambah Service
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Service</th>
                <th>Nama Pelanggan</th>
                <th>No. Plat</th>
                <th>Keluhan Kendaraan</th>
                <th>Tanggal Service</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($daftarServices as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->kode_service }}</td>
                    <td>{{ $service->pelanggan->nama_lengkap ?? '-' }}</td>
                    <td>{{ $service->kendaraan->no_plat ?? '-' }}</td>
                    <td>{{ $service->keluhan_kendaraan }}</td>
                    <td>{{ $service->tanggal_service }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">
                        Belum ada daftar service.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
