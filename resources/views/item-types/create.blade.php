```php
@extends('layouts.app')

@section('content')

<h2>Tambah Jenis Barang</h2>

<form action="{{ route('item-types.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">
        <label>Nama Jenis Barang</label>

        <input
            type="text"
            name="item_type_name"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>

        <textarea
            name="description"
            class="form-control"></textarea>
    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection
```
