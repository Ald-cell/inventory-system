@extends('layouts.app')

@section('content')

<h2>Data Gedung</h2>

<a href="{{ route('buildings.create') }}"
   class="btn btn-primary mb-3">
    Tambah Gedung
</a>

<table class="table table-bordered">
<thead>
<tr>
    <th>ID</th>
    <th>Nama Gedung</th>
    <th>Aksi</th>
</tr>
</thead>

    <tbody>
@foreach($buildings as $building)
<tr>

    <td>{{ $building->building_id }}</td>

    <td>{{ $building->building_name }}</td>

    <td>

        <a href="{{ route('buildings.edit',$building->building_id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('buildings.destroy', $building->building_id) }}"
      method="POST"
      style="display:inline">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin hapus data?')">

        Hapus

    </button>

</form>

    </td>

</tr>
@endforeach
</tbody>
</table>

@endsection