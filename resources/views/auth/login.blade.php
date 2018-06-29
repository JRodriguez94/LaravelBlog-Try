@extends('layout')

@section('contenido')

    <h1>Login</h1><br>
    <form class="form-inline" action="/login" method="POST">
        {!! csrf_field() !!}
        <input class="form-control" type="email" name="email" placeholder="Email"><br>
        <input class="form-control" type="password" name="password" placeholder="Password"><br>
        <input class="btn btn-primary" type="submit" value="Entrar">
    </form>
    <br>
@stop