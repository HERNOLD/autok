@extends('layouts.app')

@section('content')

<form action="{{ route('cars.update', $car->id) }}" method="post">
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
        <label for="name">Autó gyártó</label>
        <select name="maker" id="maker">
            @foreach($makers as $maker)
                <option value="{{ $maker->id }}" 
                    @if($maker->id == $car->maker_id) selected @endif>
                    {{ $maker->name }}
                </option>
            @endforeach
        </select>
        <label for="model">Model</label>
        <select name="model" id="model">
            @foreach($models as $model)
                <option value="{{$model->id}}"
                    @if($model->id == $car->model_id) selected @endif>
                    {{$model->name}}
                </option>
            @endforeach
        </select>

        <label for="color">Szín</label>
        <select name="color" id="color_update">
            @foreach($colors as $color)
                <option value="{{$color->id}}"
                    @if($color->id == $car->color_id) selected @endif>
                    {{$color->name}}
                </option>
            @endforeach
        </select>

        <label for="body">Karosszéria</label>
        <select name="body" id="body_update">
            @foreach($bodies as $body)
                <option value="{{$body->id}}"
                    @if($body->id == $car->body_id) selected @endif>
                    {{$body->name}}
                </option>
            @endforeach
        </select>

        <label for="shift">Váltó</label>
        <select name="shift" id="shift_update">
            @foreach($shifts as $shift)
                <option value="{{$shift->id}}"
                    @if($shift->id == $car->gear_id) selected @endif>
                    {{$shift->name}}
                </option>
            @endforeach
        </select>

        <label for="fuel">Üzemanyag</label>
        <select name="fuel" id="fuel_update">
            @foreach($fuels as $fuel)
                <option value="{{$fuel->id}}"
                    @if($fuel->id == $car->fuel_id) selected @endif>
                    {{$fuel->name}}
                </option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Mentés</button>
</form>

@endsection