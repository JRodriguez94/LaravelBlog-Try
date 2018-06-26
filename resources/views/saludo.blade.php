<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@extends('layout')
@section('contenido')
<body>
    <h1>Hola, <?php echo $nombre; ?></h1>
    <h1>Hola, <?php echo e($nombre); ?></h1> {{-- agregando en subfijo e($"Variable") evitas que sea injectado condigo--}}
    <h1>Hola, {{ $nombre }}</h1> {{-- //Esta linea hace lo mismo que la anterior, pero es esta la forma correcta de hacerlo. --}}
    
    {{ $html }} {{--Escapa el contenido de la variable a codigo html--}}
    {!! $html !!} {{--Inserta el contenido de la variable injectada con el formato regular  (opuesto al de arriba)--}}

    {{--{{ $script }} {{--Escapa el contenido de la variable a codigo html--}}
  {{--  {!! $script !!} Inserta el contenido de la variable injectada con el formato regular  (opuesto al de arriba)--}}

    <ul>
        @foreach($consolas as $consola)
            <li>{{ $consola }}</li>
        @endforeach
    </ul>

    <ul>
        @forelse($bandas as $banda)
            <li>{{ $banda }}</li>
        @empty
            <p>No hay bandas :(</p>
        @endforelse
    </ul>

    @if(count($bandas) === 1)
        <p>Solo tienes una banda</p>
    @elseif(count($bandas) > 1)
        <p>El array tiene más de una banda e el arreglo</p>
    @else
        <p>No tienes ninguna banda en el arreglo</p>
    @endif

    @stop
</body>
</html>