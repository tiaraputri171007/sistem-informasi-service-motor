@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Pembayaran Service Motor</h2>

    <a href="{{ route('pembayaran-service.create') }}"
       style="display:inline-block; padding:10px 15px; background:green; color:white; text-decoration:none; margin-bottom:15px;">
        + Tambah Pembayaran
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Service</th>
                <th>Jumlah Biaya</th>
                <th>Jenis Pembayaran</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($pembayaranServices as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->daftarService->kode_service ?? '-' }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_biaya, 0, ',', '.') }}</td>
                    <td>{{ $pembayaran->jenis_pembayaran }}</td>
                    <td>{{ $pembayaran->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        Belum ada data pembayaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
