<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Inventory Asset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .navbar-custom{
            background:#1e293b;
        }

        .card-dashboard{
            border:none;
            border-radius:15px;
            transition:0.3s;
        }

        .card-dashboard:hover{
            transform:translateY(-5px);
        }

        .icon{
            font-size:40px;
            opacity:.8;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
    <div class="container">
        <span class="navbar-brand fw-bold">
            Sistem Informasi Inventory Asset
        </span>
    </div>
</nav>

<div class="container mt-5">

    <h1 class="fw-bold mb-4">
        Dashboard Inventory Asset
    </h1>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card card-dashboard bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h2>{{ $totalBarang }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-dashboard bg-success text-white shadow">
                <div class="card-body">
                    <h5>Total Quantity</h5>
                    <h2>{{ $totalInventory }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-dashboard bg-info text-white shadow">
                <div class="card-body">
                    <h5>Barang Aktif</h5>
                    <h2>{{ $barangAktif }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-dashboard bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Barang Nonaktif</h5>
                    <h2>{{ $barangNonaktif }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mt-5">
        <div class="card-header bg-white">
            <h5 class="mb-0">Ringkasan Sistem</h5>
        </div>
        <div class="card-body">
            <p>
                Selamat datang di Sistem Informasi Inventory Asset.
                Dashboard ini digunakan untuk memantau jumlah barang,
                status inventaris, dan aktivitas pengelolaan aset secara real-time.
            </p>
        </div>
    </div>

</div>

</body>
</html>