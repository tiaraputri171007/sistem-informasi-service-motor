
@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
<h2>Data Pelanggan</h2>

<a href="{{ route('pelanggan.create') }}" class="btn">
    + Tambah Pelanggan
</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Pelanggan</th>
            <th>Nama Lengkap</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($pelanggans as $pelanggan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pelanggan->kode_pelanggan }}</td>
            <td>{{ $pelanggan->nama_lengkap }}</td>
            <td>{{ $pelanggan->no_hp }}</td>
            <td>{{ $pelanggan->alamat }}</td>
            <td>{{ $pelanggan->pekerjaan }}</td>
            <td>
                <a class="btn" href="{{ route('pelanggan.edit', $pelanggan->id) }}">Edit</a>

                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn danger"
                        onclick="return confirm('Hapus pelanggan ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Belum ada data pelanggan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
