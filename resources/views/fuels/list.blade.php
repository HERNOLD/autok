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
                        <td>
                            <form action="{{ route('fuels.delete', $entity->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger" onclick="return confirm('Tutira töröljük?')">Törlés</button>
                            </form>
                        </td>
                        <td>
                        <a href="{{ route('fuels.edit', $entity->id) }}" class="button">Szerkesztés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
