```php
@extends('layouts.app')

@section('content')

<h2>Data Jenis Barang</h2>

<a href="{{ route('item-types.create') }}"
   class="btn btn-primary mb-3">
    Tambah Jenis Barang
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Jenis Barang</th>
            <th>Deskripsi</th>
        </tr>
    </thead>

    <tbody>

        @foreach($itemTypes as $itemType)

        <tr>
            <td>{{ $itemType->item_type_id }}</td>
            <td>{{ $itemType->item_type_name }}</td>
            <td>{{ $itemType->description }}</td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection
```
