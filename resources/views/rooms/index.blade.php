@extends('layouts.app')

@section('content')

<h2>Data Ruangan</h2>

<a href="{{ route('rooms.create') }}"
   class="btn btn-primary mb-3">
   Tambah Ruangan
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
<th>Nama Ruangan</th>
<th>Lantai</th>
<th>Gedung</th>
<th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @foreach($rooms as $room)
        <tr>

    <td>{{ $room->room_id }}</td>

    <td>{{ $room->room_name }}</td>

    <td>{{ $room->floor }}</td>

    <td>{{ $room->building->building_name }}</td>

    <td>

        <a href="{{ route('rooms.edit', $room->room_id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form
            action="{{ route('rooms.destroy', $room->room_id) }}"
            method="POST"
            style="display:inline">

            @csrf
            @method('DELETE')

            <button
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