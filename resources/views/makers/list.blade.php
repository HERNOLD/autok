@extends('layouts.app')
@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gyártó</th>
                </tr>
            </thead>
            <tbody>
                @foreach($makers as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                        <td><img src="{{$entity->logo}}" alt=""></td>
                        <td><button>Törlés</button></td>
                    </tr>
                @endforeach
                {{$makers->links()}}
            </tbody>
        </table>
    </div>
@endsection
