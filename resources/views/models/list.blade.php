@extends('layouts.app')
@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modellek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>
                        <td>{{$entity->name}}</td>
                        <td>
                            <form action="{{ route('models.delete', $entity->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger" onclick="return confirm('Tutira töröljük?')">Törlés</button>
                            </form>
                        </td>
                        <td>
                        <a href="{{ route('models.edit', $entity->id) }}" class="button">Szerkesztés</a>
                        </td>
                    </tr>
                @endforeach
                {{$entities->links()}}
            </tbody>
        </table>
    </div>
@endsection
