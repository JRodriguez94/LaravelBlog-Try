@extends('layout')

@section('contenido')
    <h1>Contactos</h1>
    <h2>Escribeme</h2>
    @if( session()->has('info'))
        <h3> {{ session('info') }} </h3>
    @else
    <form method="POST" action="{{ route('mensajes.store') }}">
        <h3>{!! csrf_field() !!}</h3>
        <p><label for="Nombre">
            Nombre
            <input type="text" name="nombre">
            {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Email">
            Email
            <input type="text" name="email">
            {!! $errors->first('email', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Mensaje">
            Mensaje
            <textarea name="mensaje"></textarea>
            {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
        </label></p>
        <input type="submit" value="Enviar">
    </form>
    @endif
@stop