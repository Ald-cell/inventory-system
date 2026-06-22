<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventory</title>

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

        input,
        select,
        textarea{
            width:100%;
            padding:12px;
            margin-top:5px;
            margin-bottom:20px;
            box-sizing:border-box;
        }

        .btn{
            padding:12px 20px;
            border:none;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        .btn-success{
            background:#16a34a;
        }
    </style>
</head>
<body>

<div class="header">
    Sistem Informasi Inventory Aset
</div>

<div class="container">

    <h1>Tambah Inventory</h1>
<pre>

</pre>
    <form
    action="{{ route('inventories.store') }}"
    method="POST"
    enctype="multipart/form-data"
>

        @csrf

        <label>Barang</label>

        <select name="item_id">
    @foreach($items as $item)
        <option value="{{ $item->item_id }}">
            {{ $item->item_name }}
        </option>
    @endforeach
</select>

        <label>Merk</label>

        <input
            type="text"
            name="merk"
        >

        <label>Quantity</label>

        <input
            type="number"
            name="quantity"
        >

        <label>Harga</label>

        <input
            type="number"
            name="price"
        >

        <label>Spesifikasi</label>

        <textarea
            name="specification"
        ></textarea>

        <label>Barcode</label>

<input
    type="text"
    name="barcode"
>

<label>Foto Barang</label>

<input
    type="file"
    name="foto"
    accept="image/*"
>

<label>Status</label>

<select name="status">

            <option value="Active">
                Active
            </option>

            <option value="Inactive">
                Inactive
            </option>

        </select>

        <button
            type="submit"
            class="btn btn-success"
        >
            Simpan
        </button>

    </form>

</div>

</body>
</html>