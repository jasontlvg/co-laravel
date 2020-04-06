<!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/02ba78dad6.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
    @yield('css-link')
    {{--    <link href="/css/index.css" rel="stylesheet">--}}
</head>
<body>
<div class="wrap">
    <header class="header" id="header">
        <div class="header__brand"><a class="header__brand__container" href="{{route('empresa.index')}}"><i
                    class="header__brand__container__logo fas fa-bolt"></i>
                <h2 class="header__brand__container__title">GEMINI</h2></a></div>
        <nav class="header__nav">
            <h2 class="header__nav__title">Navegación </h2>
            <ul class="header__nav__ul">
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="{{route('empresa.index')}}"> <i
                            class="header__nav__ul__li__a__icon header__nav__ul__li__a__icon--1 fas fa-building"></i>
                        <p class="header__nav__ul__li__a__title">Empresa</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="{{route('empleados.index')}}"> <i
                            class="header__nav__ul__li__a__icon fas fa-users"></i>
                        <p class="header__nav__ul__li__a__title">Empleados</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="{{route('departamentos.index')}}"> <i
                            class="header__nav__ul__li__a__icon fas fa-layer-group"></i>
                        <p class="header__nav__ul__li__a__title">Departamentos</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a" href="{{route('resultados.index')}}">
                        <i class="header__nav__ul__li__a__icon fas fa-book-reader"></i>
                        <p class="header__nav__ul__li__a__title">Resultados</p></a></li>
                <li class="header__nav__ul__li"><a class="header__nav__ul__li__a header__nav__ul__li__a--off" href="{{route('admin.logout')}}">
                        <i class="header__nav__ul__li__a__icon header__nav__ul__li__a__icon--off fas fa-power-off"></i>
                        <p class="header__nav__ul__li__a__title header__nav__ul__li__a__title--off">Cerrar Sesion</p>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="main" id="main">
        <div class="main__header"><i class="fas fa-bars" id="toggleButton"></i></div>
        <div class="main__content" id="main__content">
            @yield('content')
        </div>
    </main>
</div>
@yield('js-link')
</body>
</html>
