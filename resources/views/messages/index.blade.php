@extends('layout')

@section('contenido')

    <h1> Todos los mensajes </h1><br>
    <table class="table">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Mensaje</th>
                <th>Created AT</th>
                <th>Updated AT</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                {{-- <td>{{ $messages->id }}</td>  | --}}
                <td>
                    <a href="{{ route('mensajes.show', $message->id) }}">
                        {{ $message->nombre }}
                    </a> 
                </td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->mensaje }}</td>
                <td>{{ $message->created_at }}</td>
                <td>{{ $message->updated_at }}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{ route('mensajes.edit', $message->id) }}">Editar</a>
                    <form style="display:inline" method="POST" action="{{ route('mensajes.destroy', $message->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop