@extends('layouts.app')

@section('content')

<h2>Edit Gedung</h2>

<form action="{{ route('buildings.update', $building->building_id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Nama Gedung
        </label>

        <input
            type="text"
            name="building_name"
            value="{{ $building->building_name }}"
            class="form-control">

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Update

    </button>

</form>

@endsection