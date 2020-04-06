<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/results.css')}}" rel="stylesheet"></head>
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo">
            <i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <a href="/"  class="aside__logo__container">
{{--                <i class="fas fa-poo-storm aside__logo__container__logo"></i>--}}
{{--                <h1 class="aside__logo__container__title">GEMINI</h1>--}}
                <div class="aside__logo__container__symbol">
                    <h2 class="aside__logo__container__symbol__title">4P'S</h2>
                </div>
                <h3 class="aside__logo__container__h">Changeover</h3>
            </a>
        </div>
        @component('components.links')@endcomponent
    </aside>
    <div class="aside-overlay" id="aside-overlay"></div>
    <section class="section" id="section">
        <header class="header"><i class="fas fa-bars header__burguer" id="trigger"></i>
            <h2 class="header__title">Resultados</h2>
        </header>
        <main class="main" id="main">
        </main>
    </section>
</div>
<script type="text/javascript" src="{{asset('js/results.js')}}"></script></body>
</html>
