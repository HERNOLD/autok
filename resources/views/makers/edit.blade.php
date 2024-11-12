@extends('layouts.app')

@section('content')

<form action="{{ route('makers.update', $maker->id) }}" method="post">
    @csrf
    @method('PATCH')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <fieldset>
        <label for="name">Gyártó név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $maker->name) }}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection