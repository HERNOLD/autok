@extends('layouts.app')
@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Üzemanyagok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                        <td><button>Törlés</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
