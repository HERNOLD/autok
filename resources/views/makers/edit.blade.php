@extends('layouts.app')

@section('content')

<form action="{{ route('makers.update', $maker->id) }}" method="post">
    @csrf
    @method('PATCH')
    <fieldset>
        <label for="name">Gyártó név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $maker->name) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection