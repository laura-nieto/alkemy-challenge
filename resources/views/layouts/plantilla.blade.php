<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header>
        <nav class="nav">
            <h1><a href="/">AppStore</a></h1>
            <ul class="nav--ul">
                @guest
                <li class="nav--ul__li"><a href="/apps">Aplicaciones</a></li>
                <li class="nav--ul__li"><a href="/login">Iniciar sesion</a></li>
                @else
                <li class="nav--ul__li"><a href="/apps">Aplicaciones</a></li>
                <li class="nav--ul__li"><a href="/me/{{Auth::id()}}">Mis Aplicaciones</a></li>
                <li class="nav--ul__li"><a href="/logOut">Cerrar Sesión</a></li>
                @endguest
            </ul>
            <div class="nav--dropdown">
                <button class="button-dropdown"><i class="fas fa-chevron-down fa-3x"></i></button>
                <div class="dropdown--content">
                    <ul class="nav--ul--dropdown">
                        @guest
                        <li class="nav--ul__li--dropdown"><a href="/apps">Aplicaciones</a></li>
                        <li class="nav--ul__li--dropdown"><a href="/login">Iniciar sesion</a></li>
                        @else
                        <li class="nav--ul__li--dropdown"><a href="/apps">Aplicaciones</a></li>
                        <li class="nav--ul__li--dropdown"><a href="/me/{{Auth::id()}}">Mis Aplicaciones</a></li>
                        <li class="nav--ul__li--dropdown"><a href="/logOut">Cerrar Sesión</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    {{-- <footer>
        <a href="">Preguntas Frecuentes</a>
        <article class="contact">
            <h4>Contáctanos:</h4>
        </article>
    </footer> --}}
    <script src="{{asset('js/nav.js')}}"></script>
</body>
</html>