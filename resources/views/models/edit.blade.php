@extends('layouts.app')

@section('content')

<form action="{{ route('models.update', $model->id) }}" method="post">
    @csrf
    @method('PATCH')
    <fieldset>
        <label for="name">Model név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $model->name) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection