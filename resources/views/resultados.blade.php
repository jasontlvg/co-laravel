<!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/results.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo">
            <i class="fas fa-bars aside__logo__burguer" id="burguer"></i><a
                class="aside__logo__container" href="/">
                <div class="aside__logo__container__symbol">
                    <h2 class="aside__logo__container__symbol__title">4P'S</h2>
                </div>
                <h3 class="aside__logo__container__h">Changeover</h3></a>
        </div>

        @component('components.links')@endcomponent
    </aside>
    <div class="aside-overlay" id="aside-overlay"></div>
    <section class="section" id="section">
        <main class="main" id="main">
            <div id="app">
            </div>
        </main>
    </section>
</div>
{{--<script type="text/javascript" src="/js/results.js"></script></body>--}}
<script type="text/javascript" src="{{asset('js/results.js')}}"></script>
</body>
</html>


