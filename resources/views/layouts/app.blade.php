<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Service Motor</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #172554;
            color: white;
            padding: 20px 35px;
        }

        header h2 {
            margin: 0;
        }

        nav {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            background: #1e40af;
            transition: 0.3s;
        }

        nav a:hover {
            background: #3b82f6;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
        }

        .btn {
            display: inline-block;
            padding: 9px 15px;
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .danger {
            background: #dc2626;
        }

        .success {
            background: #dcfce7;
            padding: 12px;
            margin-bottom: 15px;
            color: #166534;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #e2e8f0;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        .error {
            color: #dc2626;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            main {
                margin: 15px;
                padding: 15px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>SISTEM INFORMASI SERVICE MOTOR</h2>

    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
        <a href="{{ route('kendaraan.index') }}">Data Kendaraan</a>
        <a href="{{ route('daftar-service.index') }}">Daftar Service</a>
        <a href="{{ route('data-service.index') }}">Data Service</a>
        <a href="{{ route('pembayaran-service.index') }}">Pembayaran Service</a>
    </nav>
</header>

<main>
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
