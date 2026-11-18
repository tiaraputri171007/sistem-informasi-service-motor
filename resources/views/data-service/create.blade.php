@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Tambah Data Service</h2>

    <form action="{{ route('data-service.store') }}" method="POST">
        @csrf

        <p>
            <label>Kode Service</label><br>
            <select name="daftar_service_id" required>
                <option value="">-- Pilih Kode Service --</option>

                @foreach ($daftarServices as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->kode_service }}
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
            <label>Estimasi Service</label><br>
            <input type="text" name="estimasi_service" required>
        </p>

        <p>
            <label>Nama Mekanik</label><br>
            <input type="text" name="nama_mekanik" required>
        </p>

        <p>
            <label>Sparepart Pengganti</label><br>
            <input type="text" name="sparepart_pengganti">
        </p>

        <button type="submit">Simpan</button>

        <a href="{{ route('data-service.index') }}">Kembali</a>
    </form>
</div>

@endsection
