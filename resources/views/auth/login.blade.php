@extends('layout')

@section('contenido')

    <h1>Login</h1>
    <form action="/login" method="POST">
        {!! csrf_field() !!}
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Entrar">
    </form>
    <br>
@stop