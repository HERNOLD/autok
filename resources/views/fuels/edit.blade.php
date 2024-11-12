@extends('layouts.app')

@section('content')

<form action="{{ route('fuels.update', $fuel->id) }}" method="post">
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
        <label for="name">Benzin név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $fuel->name)}}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection