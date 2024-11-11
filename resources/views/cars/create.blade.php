@extends('layouts.app')

@section('content')

<form action="{{ route('cars.create') }}" method="post">
    @csrf
    @method('GET')
    <fieldset>
        <label for="maker">Gyártó</label>
        <select name="maker" id="maker">
            @foreach($makers as $maker)
                <option value="{{$maker->id}}">{{$maker->name}}</option>
            @endforeach
        </select>
        <label for="model">Model</label>
        <select name="model" id="model">
            @foreach($models as $model)
                <option value="{{$model->id}}">{{$model->name}}</option>
            @endforeach
        </select>
        <label for="color">Szín</label>
        <select name="color" id="color">
            @foreach($colors as $color)
                <option value="{{$color->id}}">{{$color->name}}</option>
            @endforeach
        </select>
        <label for="body">Karosszéria</label>
        <select name="body" id="body">
            @foreach($bodies as $body)
                <option value="{{$body->id}}">{{$body->name}}</option>
            @endforeach
        </select>
        <label for="shift">Váltó</label>
        <select name="shift" id="shift">
            @foreach($shifts as $shift)
                <option value="{{$shift->id}}">{{$shift->name}}</option>
            @endforeach
        </select>
        <label for="fuel">Üzemanyag</label>
        <select name="fuel" id="fuel">
            @foreach($fuels as $fuel)
                <option value="{{$fuel->id}}">{{$fuel->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Csinálás</button>
</form>

@endsection