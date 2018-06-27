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
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a><br>
            <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Alguien') }}">Saludos</a><br>
            <a class="{{ activeMenu('contactos') }}" href="{{ route('messages.create') }}">Contactos</a><br>
        </nav>
    </header>
    @yield('contenido')
<footer>Copyright R {{ date('Y') }}</footer>
</body>
</html>