@extends('layouts.app')
@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Autók</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td id="{{$entity->id}}">{{$entity->id}}</td>

                        <td>{{$entity->maker->name}}</td>
                        <td>{{$entity->model->name}}</td>
                        <td>{{$entity->fuel->name}}</td>
                        <td>{{$entity->body->name}}</td>
                        <td>{{$entity->gear->name}}</td>
                        <td>{{$entity->color->name}}</td>

                        <td>
                            <form action="{{ route('cars.delete', $entity->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger" onclick="return confirm('Tutira töröljük?')">Törlés</button>
                            </form>
                        </td>
                        <td>
                        <a href="{{ route('cars.edit', $entity->id) }}" class="button">Szerkesztés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
