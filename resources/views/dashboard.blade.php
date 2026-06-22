<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Inventory</title>

    <style>
        body{
            font-family:Arial;
            padding:40px;
        }

        .card{
            width:220px;
            display:inline-block;
            margin:10px;
            padding:20px;
            border-radius:10px;
            background:#f3f4f6;
            box-shadow:0 2px 5px rgba(0,0,0,.1);
        }

        h2{
            margin:0;
        }
    </style>

</head>
<body>

<h1>Dashboard Inventory Asset</h1>

<div class="card">
    <h2>{{ $totalBarang }}</h2>
    <p>Total Barang</p>
</div>

<div class="card">
    <h2>{{ $totalInventory }}</h2>
    <p>Total Quantity</p>
</div>

<div class="card">
    <h2>{{ $barangAktif }}</h2>
    <p>Barang Aktif</p>
</div>

<div class="card">
    <h2>{{ $barangNonaktif }}</h2>
    <p>Barang Nonaktif</p>
</div>

</body>
</html>