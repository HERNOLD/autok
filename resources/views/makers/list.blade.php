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
                        <td>
                            <form action="{{ route('makers.delete', $entity->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger" onclick="return confirm('Tutira töröljük?')">Törlés</button>
                            </form>               
                        </td>
                    </tr>
                @endforeach
                {{$makers->links()}}
            </tbody>
        </table>
    </div>
@endsection
