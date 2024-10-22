@extends('layouts.app')

@section('content')

<form action="{{ route('fuels.update', $fuel->id) }}" method="post">
    @csrf
    @method('PATCH')
    <fieldset>
        <label for="name">Benzin név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $fuel->name) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection