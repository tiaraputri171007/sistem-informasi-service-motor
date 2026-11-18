@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Tambah Data Kendaraan</h2>

    <form action="{{ route('kendaraan.store') }}" method="POST">
        @csrf

        <p>
            <label>No. Plat</label><br>
            <input type="text" name="no_plat" placeholder="BL 1234 AB" required>
        </p>

        <p>
            <label>Jenis Kendaraan</label><br>
            <select name="jenis_kendaraan" required>
                <option value="">-- Pilih Kendaraan --</option>
                <option value="Matic">Matic</option>
                <option value="Manual Transmisi">Manual Transmisi</option>
            </select>
        </p>

        <p>
            <label>No. STNK</label><br>
            <input type="text" name="no_stnk" required>
        </p>

        <p>
            <label>Tahun Pembuatan</label><br>
            <input type="number" name="tahun_pembuatan" required>
        </p>

        <p>
            <label>Nama Pemilik</label><br>
            <input type="text" name="nama_pemilik" required>
        </p>

        <p>
            <label>Warna</label><br>
            <input type="text" name="warna" required>
        </p>

        <button type="submit">Simpan</button>

        <a href="{{ route('kendaraan.index') }}">Kembali</a>
    </form>
</div>

@endsection
