<!DOCTYPE html>
<html>
<head>
    <title>Inventory Asset</title>

    <style>
        body{
            font-family: Arial;
            margin:0;
        }

        .header{
            background:#1f2937;
            color:white;
            padding:25px 80px;
            font-size:24px;
        }

        .container{
            padding:50px 80px;
        }

        table{
            border-collapse: collapse;
            width:100%;
        }

        table th,
        table td{
            border:1px solid #ccc;
            padding:12px;
            text-align:left;
        }

        .btn{
            padding:10px 15px;
            border:none;
            text-decoration:none;
            color:white;
            border-radius:5px;
        }

        .btn-primary{
    background:#2563eb;
}

.btn-warning{
    background:#eab308;
    color:black;
}

        .btn-danger{
            background:#dc2626;
        }
    </style>
</head>
<body>

<div class="header">
    Sistem Informasi Inventory Aset
</div>

<div class="container">

    <h1>Data Inventory</h1><br>

<form method="GET">

    <input
        type="text"
        name="search"
        placeholder="Cari barang..."
        value="{{ request('search') }}"
        style="padding:10px;width:250px;"
    >

    <button
        type="submit"
        class="btn btn-primary"
    >
        Cari
    </button>

    <a
        href="{{ route('inventories.index') }}"
        class="btn btn-warning"
    >
        Reset
    </a>

</form>

<br>

    <br>

    <a href="{{ route('inventories.create') }}"
       class="btn btn-primary">
        Tambah Inventory
    </a>

    <br><br>

    <table>

        <tr>
    <th>ID</th>
    <th>Barang</th>
    <th>Foto</th>
    <th>Merk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

       @foreach($inventories as $inventory)
<tr>
    <td>{{ $inventory->inventory_id }}</td>

    <td>{{ $inventory->item->item_name }}</td>

    <td>
        @if($inventory->foto)
            <img
                src="{{ asset('storage/'.$inventory->foto) }}"
                width="80"
            >
        @endif
    </td>

    <td>{{ $inventory->merk }}</td>
    <td>{{ $inventory->quantity }}</td>
    <td>Rp {{ number_format($inventory->price,0,',','.') }}</td>
    <td>{{ $inventory->status }}</td>

    <td>

    <a
        href="{{ route('inventories.detail',$inventory->inventory_id) }}"
        class="btn btn-primary"
    >
        Detail
    </a>

    <a
        href="{{ route('inventories.edit',$inventory->inventory_id) }}"
        class="btn btn-warning"
    >
        Edit
    </a>

    <form
        action="{{ route('inventories.destroy',$inventory->inventory_id) }}"
        method="POST"
        style="display:inline;"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger"
        >
            Hapus
        </button>

    </form>

    <a
    href="{{ route('inventories.pdf',$inventory->inventory_id) }}"
    class="btn btn-primary"
>
    PDF
</a>

</td>
</tr>
@endforeach

    </table>

</div>

</body>
</html>