<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

        @yield('css-link')
    </head>
    <body>
        <div class="wrapper">
            <header class="head">
                <a class="head__logoContainer" href="{{route('home')}}">
{{--                    <div class="head__logoContainer__logo">--}}
{{--                        <i class="bolt icon"></i>--}}
{{--                    </div>--}}
{{--                    <h1 class="head__logoContainer__title">GEMINI</h1>--}}
                    <div class="aside__logo__container__symbol">
                        <div class="aside__logo__container__symbol__title">4P'S</div>
                    </div>

                    <h3 class="aside__logo__container__h">
                        Changeover
                    </h3>

                </a>
                <div class="head__menu">
                    <div class="head__menu__logoutContainer"><a class="ui red button" href="{{route('user.logout')}}">Cerrar Sesion</a></div>
                </div>
            </header>
            <main class="main">
                @yield('content')
            </main>
        </div>
        @yield('js-link')
    </body>
</html>
