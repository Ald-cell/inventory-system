@extends('layouts.app')

@section('content')

<h2>Edit Ruangan</h2>

<form action="{{ route('rooms.update', $room->room_id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">
            Nama Ruangan
        </label>

        <input
            type="text"
            name="room_name"
            class="form-control"
            value="{{ $room->room_name }}">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Lantai
        </label>

        <input
            type="number"
            name="floor"
            class="form-control"
            value="{{ $room->floor }}">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Gedung
        </label>

        <select
            name="building_id"
            class="form-control">

            @foreach($buildings as $building)

                <option
                    value="{{ $building->building_id }}"
                    {{ $room->building_id == $building->building_id ? 'selected' : '' }}>

                    {{ $building->building_name }}

                </option>

            @endforeach

        </select>

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Update

    </button>

</form>

@endsection