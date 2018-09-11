{{-- {{ dd( auth()->user()->roles->toArray() ) }} --}} {{-- Esta función sirve para ver que me está mandando los roles que tiene asignados el usuario logueado --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }?>
       <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top|fixed-bottom|sticky-top">
           <a class="navbar-brand" href="{{ route('home') }}">CRUD</a>
           <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
               aria-expanded="false" aria-label="Toggle navigation"></button>
           <div class="container" {{--class="collapse navbar-collapse"--}} id="collapsibleNavId">
             <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               <li class="nav-item active">
                    <a class="nav-link" class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
                 {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
               </li>
               <li class="nav-item active">
                    <a class="nav-link" class="{{ activeMenu('saludos*') }}" href="{{ route('saludos', 'Alguien') }}">Saludos</a>
                 {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
               </li>
               <li class="nav-item active">
                    <a  class="nav-link" class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
                 {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
               </li>
               {{-- <li class="nav-item">
                 <a class="nav-link" href="#">Link</a>
               </li>
               <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                 <div class="dropdown-menu" aria-labelledby="dropdownId">
                   <a class="dropdown-item" href="#">Action 1</a>
                   <a class="dropdown-item" href="#">Action 2</a>
                 </div>
               </li> --}}
                 @if(auth()->check())
                    <li class="nav-item active">
                            <a class="nav-link" class="{{ activeMenu('mensajes*') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
                    </li>
                   
                    {{-- <li>
                            <a class="nav-link" href="/logout">Cerrar sesión de {{ auth()->user()->name }}</a>
                    </li> --}}
                    @if(auth()->user()->hasRoles(['admin','moderador']))
                     <li class="nav-item active">
                            <a class="nav-link" class="{{ activeMenu('usuarios*') }}" href="{{ route('usuarios.index') }}">Usuarios</a>
                    </li>
                    @endif
                 @endif
                    {{-- @if(auth()->guest())
                    <li>
                            <a class="nav-link" class="{{ activeMenu('login') }}" href="/login">Login</a>
                    </li>
                    @endif --}}
                   
             </ul>
             {{-- 77777777777777777777777777777777777777777777777777777777777777777777777777777777 --}}
             {{-- Código del login/logout que funciona sin el dropdown --}}

             {{-- <form class="navbar-nav mr-auto mt-2 mt-lg-0"
               @if(auth()->guest())
                    <a class="nav-link" class="{{ activeMenu('login') }}" href="/login">Login</a>
               @else
                    <a class="nav-link" href="/logout">Cerrar sesión de {{ auth()->user()->name }}</a>
               @endif
             </form> --}}
             {{-- 777777777777777777777777777777777777777777777777777777777777777777777777777777777 --}}
             <ul class="nav navbar-nav navbar-right">
               @if(auth()->guest())
                <li class="{{ activeMenu('login') }}">
                  <a href="/login">Login</a>
                </li>
               @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data_toogle="dropdown">{{ auth()->user()->name }}<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/logout">Cerrar sesión</a></li>
                    <li><a href="/usuarios/{{ auth()->id() }}"></a>Mi cuenta</li>
                  </ul>
                </li>
               @endif
             </ul>
           </div>
         </nav>
        
        
         {{-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
         {{-- <h1>{{ request() -> is('/') ? 'Estás en el home' : 'No estás en el home' }}</h1> --}}
    </header>
    <div class="container">
            @yield('contenido')
            <br><footer>Copyright R {{ date('Y') }}</footer>
    </div>
  <script src="/js/all.js"></script>
</body>
</html>