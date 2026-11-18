@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Data Kendaraan</h2>

    <a href="{{ route('kendaraan.create') }}"
       style="display:inline-block; padding:10px 15px; background:green; color:white; text-decoration:none; margin-bottom:15px;">
        + Tambah Kendaraan
    </a>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Plat</th>
                <th>Jenis Kendaraan</th>
                <th>No. STNK</th>
                <th>Tahun Pembuatan</th>
                <th>Nama Pemilik</th>
                <th>Warna</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($kendaraans as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->no_plat }}</td>
                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                    <td>{{ $kendaraan->no_stnk }}</td>
                    <td>{{ $kendaraan->tahun_pembuatan }}</td>
                    <td>{{ $kendaraan->nama_pemilik }}</td>
                    <td>{{ $kendaraan->warna }}</td>
                    <td>
                        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}">Edit</a>

                        <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" align="center">
                        Belum ada data kendaraan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
