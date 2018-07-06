@extends('layout')

@section('contenido')
    <h1>Contactos</h1><br>
    <h4>Escribeme</h4>
    @if( session()->has('info'))
        <h3> {{ session('info') }} </h3>
    @else
    <form method="POST" action="{{ route('mensajes.store') }}">
        <h3>{!! csrf_field() !!}</h3>
        <p><label for="Nombre">
            Nombre
            <input class="form-control" type="text" name="nombre">
            {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Email">
            Email
            <input class="form-control" type="text" name="email">
            {!! $errors->first('email', '<span class=error>:message</span>') !!}
        </label></p>
        <p><label for="Mensaje">
            Mensaje
            <textarea class="form-control" name="mensaje"></textarea>
            {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
        </label></p>
        {{-- {!! csrf_field() !!} --}}
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
    @endif
@stop