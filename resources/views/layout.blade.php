<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .activate
        {
            text-decoration: none;
            color: green;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <header>
    <h1>{{ request() -> is('/') ? 'Estás en el home' : 'No estás en el home' }}</h1>
        <nav>
            <a class="activate" href="{{ route('home') }}">Home</a><br>
            <a href="{{ route('saludos', 'Alguien') }}">Saludos</a><br>
            <a href="{{ route('contactos') }}">Contactos</a><br>
        </nav>
    </header>
    @yield('contenido')
<footer>Copyright R {{ date('Y') }}</footer>
</body>
</html>