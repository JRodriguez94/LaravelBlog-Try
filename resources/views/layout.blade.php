<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .active
        {
            text-decoration: none;
            color: teal;
        }
        .error
        {
            color: red;
            font-size: 12px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <header>
        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }?>
    <h1>{{ request() -> is('/') ? 'Estás en el home' : 'No estás en el home' }}</h1>
        <nav>
             | <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
             | <a class="{{ activeMenu('saludos*') }}" href="{{ route('saludos', 'Alguien') }}">Saludos</a>
             | <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
            
            @if(auth()->check())
                 | <a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
                 | <a href="/logout">Cerrar sesión de {{ auth()->user()->name }}</a>
            @endif
            @if(auth()->guest())
                 | <a class="{{ activeMenu('login') }}" href="/login">Login</a>
            @endif
        </nav>
    </header>
    @yield('contenido')
<footer>Copyright R {{ date('Y') }}</footer>
</body>
</html>