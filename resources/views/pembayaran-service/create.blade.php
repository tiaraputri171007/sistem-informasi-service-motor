@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Tambah Pembayaran Service</h2>

    <form action="{{ route('pembayaran-service.store') }}" method="POST">
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
            <label>Jumlah Biaya</label><br>
            <input type="number" name="jumlah_biaya"
                   placeholder="Contoh: 150000" min="0" required>
        </p>

        <p>
            <label>Jenis Pembayaran</label><br>
            <select name="jenis_pembayaran" required>
                <option value="">-- Pilih Pembayaran --</option>
                <option value="Cash">Cash</option>
                <option value="Non Tunai">Non Tunai</option>
            </select>
        </p>

        <p>
            <label>Keterangan</label><br>
            <textarea name="keterangan" rows="4"></textarea>
        </p>

        <button type="submit">Simpan</button>

        <a href="{{ route('pembayaran-service.index') }}">Kembali</a>
    </form>
</div>

@endsection
