<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <link href="/css/index.css" rel="stylesheet"></head>--}}
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <div class="aside__logo__container"><i class="fas fa-poo-storm aside__logo__container__logo"></i>
                <h1 class="aside__logo__container__title">GEMINI</h1>
            </div>
        </div>
        <ul class="aside__ul" id="aside__ul">
            <li class="aside__ul__li"><a class="aside__ul__li__a" href="">
                    <i class="fas fa-city aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Empresa</h3></a></li>
            <li class="aside__ul__li"> <a class="aside__ul__li__a" href="">
                    <i class="fas fa-user-tie aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Empleados</h3></a></li>
            <li class="aside__ul__li"> <a class="aside__ul__li__a" href="">
                    <i class="fas fa-mail-bulk aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Departamentos</h3></a></li>
            <li class="aside__ul__li"> <a class="aside__ul__li__a" href="/results.html">
                    <i class="fas fa-clipboard-list aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Resultados</h3></a></li>
            <li class="aside__ul__li aside__ul__li__logout"><a class="aside__ul__li__a" href="">
                    <i class="fas fa-power-off aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Cerrar Sesion</h3></a></li>
        </ul>
    </aside>
    <div class="aside-overlay" id="aside-overlay"></div>
    <section class="section" id="section">
        <header class="header"><i class="fas fa-bars header__burguer" id="trigger"></i>
        </header>
        <main class="main" id="main">
        </main>
    </section>
</div>
<script type="text/javascript" src="/js/index.js"></script></body>
</html>
