@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .welcome {
        background: linear-gradient(120deg, #172554, #2563eb);
        color: white;
        padding: 28px;
        border-radius: 12px;
        margin-bottom: 25px;
    }

    .welcome h2 {
        margin: 0 0 10px;
        font-size: 25px;
    }

    .welcome p {
        margin: 0;
        color: #dbeafe;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
        gap: 18px;
        margin-bottom: 25px;
    }

    .dashboard-card {
        padding: 22px;
        border-radius: 10px;
        color: white;
        box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    }

    .dashboard-card h3 {
        margin: 0 0 15px;
        font-size: 15px;
    }

    .dashboard-card h1 {
        margin: 0;
        font-size: 30px;
    }

    .blue { background: #2563eb; }
    .green { background: #059669; }
    .orange { background: #ea580c; }
    .purple { background: #7c3aed; }
    .pink { background: #db2777; }
    .dark { background: #334155; }

    .section-title {
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .dashboard-table {
        overflow-x: auto;
    }

    .dashboard-table table {
        min-width: 600px;
    }
</style>

<div class="welcome">
    <h2>Selamat Datang di Dashboard</h2>
    <p>Sistem Informasi Service Motor</p>
    <p>Kelola pelanggan, kendaraan, service, dan pembayaran dengan mudah.</p>
</div>

<h3 class="section-title">Ringkasan Data</h3>

<div class="dashboard-grid">

    <div class="dashboard-card blue">
        <h3>Total Pelanggan</h3>
        <h1>{{ $jumlahPelanggan }}</h1>
    </div>

    <div class="dashboard-card green">
        <h3>Total Kendaraan</h3>
        <h1>{{ $jumlahKendaraan }}</h1>
    </div>

    <div class="dashboard-card orange">
        <h3>Daftar Service</h3>
        <h1>{{ $jumlahDaftarService }}</h1>
    </div>

    <div class="dashboard-card purple">
        <h3>Data Service</h3>
        <h1>{{ $jumlahDataService }}</h1>
    </div>

    <div class="dashboard-card pink">
        <h3>Pembayaran</h3>
        <h1>{{ $jumlahPembayaran }}</h1>
    </div>

    <div class="dashboard-card dark">
        <h3>Total Pemasukan</h3>
        <h1 style="font-size:24px;">
            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
        </h1>
    </div>

</div>

<h3 class="section-title">Daftar Service Terbaru</h3>

<div class="dashboard-table">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Service</th>
                <th>Nama Pelanggan</th>
                <th>No. Plat</th>
                <th>Tanggal Service</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($serviceTerbaru as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->kode_service }}</td>
                    <td>{{ $service->pelanggan->nama_lengkap ?? '-' }}</td>
                    <td>{{ $service->kendaraan->no_plat ?? '-' }}</td>
                    <td>{{ $service->tanggal_service }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">
                        Belum ada data service.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
