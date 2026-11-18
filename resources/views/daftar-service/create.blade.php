@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Tambah Daftar Service</h2>

    <form action="{{ route('daftar-service.store') }}" method="POST">
        @csrf

        <p>
            <label>Kode Service</label><br>
            <input type="text" name="kode_service"
                   placeholder="Contoh: SRV-001" required>
        </p>

        <p>
            <label>Nama Pelanggan</label><br>
            <select name="pelanggan_id" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">
                        {{ $pelanggan->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>No. Plat Kendaraan</label><br>
            <select name="kendaraan_id" required>
                <option value="">-- Pilih Kendaraan --</option>
                @foreach ($kendaraans as $kendaraan)
                    <option value="{{ $kendaraan->id }}">
                        {{ $kendaraan->no_plat }} - {{ $kendaraan->nama_pemilik }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Keluhan Kendaraan</label><br>
            <textarea name="keluhan_kendaraan"
                      rows="4" required></textarea>
        </p>

        <p>
            <label>Tanggal Service</label><br>
            <input type="date" name="tanggal_service" required>
        </p>

        <button type="submit">Simpan</button>

        <a href="{{ route('daftar-service.index') }}">Kembali</a>
    </form>
</div>

@endsection
