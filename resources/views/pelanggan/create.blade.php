
@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<h2>Tambah Data Pelanggan</h2>

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf

    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap"
           value="{{ old('nama_lengkap') }}" required>

    <label>Nomor HP</label>
    <input type="text" name="no_hp"
           value="{{ old('no_hp') }}" required>

    <label>Alamat</label>
    <textarea name="alamat" required>{{ old('alamat') }}</textarea>

    <label>Pekerjaan</label>
    <input type="text" name="pekerjaan"
           value="{{ old('pekerjaan') }}" required>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <button class="btn" type="submit">Simpan Data</button>
    <a href="{{ route('pelanggan.index') }}">Kembali</a>
</form>
@endsection
