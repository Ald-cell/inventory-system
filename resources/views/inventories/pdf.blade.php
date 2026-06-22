<!DOCTYPE html>
<html>
<head>
    <title>Detail Inventory</title>

    <style>
        body{
            font-family: Arial;
        }

        table{
            width:100%;
        }

        td{
            padding:8px;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>

<h2>LAPORAN INVENTORY ASET</h2>

@if($inventory->foto)
    <center>
        <img
            src="{{ public_path('storage/'.$inventory->foto) }}"
            width="200"
        >
    </center>
@endif

<br>

<table>

<tr>
    <td>Barang</td>
    <td>: {{ $inventory->item->item_name }}</td>
</tr>

<tr>
    <td>Merk</td>
    <td>: {{ $inventory->merk }}</td>
</tr>

<tr>
    <td>Barcode</td>
    <td>: {{ $inventory->barcode }}</td>
</tr>

<tr>
    <td>Quantity</td>
    <td>: {{ $inventory->quantity }}</td>
</tr>

<tr>
    <td>Harga</td>
    <td>: Rp {{ number_format($inventory->price,0,',','.') }}</td>
</tr>

<tr>
    <td>Status</td>
    <td>: {{ $inventory->status }}</td>
</tr>

<tr>
    <td>Spesifikasi</td>
    <td>: {{ $inventory->specification }}</td>
</tr>

</table>

</body>
</html>