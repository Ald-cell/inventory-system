<!DOCTYPE html>
<html>
<head>
    <title>Detail Inventory</title>
</head>
<body>

<h1>Detail Inventory</h1>

@if($inventory->foto)
    <img
        src="{{ asset('storage/'.$inventory->foto) }}"
        width="250"
    >
@endif

<table>

<tr>
    <td>Barang</td>
    <td>{{ $inventory->item->item_name }}</td>
</tr>

<tr>
    <td>Merk</td>
    <td>{{ $inventory->merk }}</td>
</tr>

<tr>
    <td>Barcode</td>
    <td>{{ $inventory->barcode }}</td>
</tr>

<tr>
    <td><b>QR Code</b></td>
    <td>
        {!! QrCode::size(150)->generate($inventory->barcode) !!}
    </td>
</tr>

<tr>
    <td>Quantity</td>
    <td>{{ $inventory->quantity }}</td>
</tr>

<tr>
    <td>Harga</td>
    <td>Rp {{ number_format($inventory->price,0,',','.') }}</td>
</tr>

<tr>
    <td>Status</td>
    <td>{{ $inventory->status }}</td>
</tr>

<tr>
    <td>Spesifikasi</td>
    <td>{{ $inventory->specification }}</td>
</tr>

</table>

<br>

<a href="{{ route('inventories.index') }}">
    Kembali
</a>

</body>
</html>