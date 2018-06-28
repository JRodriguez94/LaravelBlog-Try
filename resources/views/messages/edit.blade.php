@extends('layout')

@section('contenido')

<h1>Editar mensaje de {{ $message->nombre }}</h1>

<form method="POST" action="{{ route('messages.update', $message->id) }}">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <p><label for="Nombre">
            Nombre
            <input type="text" name="nombre" value="{{ $message->nombre }}">
            {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Email">
            Email
            <input type="text" name="email" value="{{ $message->email }}">
            {!! $errors->first('email', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Mensaje">
            Mensaje
            <textarea name="mensaje">{{ $message->mensaje }}</textarea>
            {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
        </label></p>
        <input type="submit" value="Enviar">
    </form>

@stop