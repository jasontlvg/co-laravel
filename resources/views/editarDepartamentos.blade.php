<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/editarDepartamentos.css" rel="stylesheet"></head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <div class="aside__logo__container"><i class="fas fa-poo-storm aside__logo__container__logo"></i>
                <h1 class="aside__logo__container__title">GEMINI</h1>
            </div>
        </div>
        @component('components.links')@endcomponent
    </aside>
    <div class="aside-overlay" id="aside-overlay"></div>
    <section class="section" id="section">
        <header class="header">
        </header>
        <main class="main" id="main">
            <div class="main__results" id="app">
                <div class="ui modal agregar mini">
                    <div class="header">Editar Departamento</div>
                    <div class="content">
                        <form class="ui form" action="{{route('departamentos.update', $id)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="field">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Nombre de departamento" value="{{$dep->nombre}}">
                            </div>
                            <div class="field">
                                <label>Clave (Igual o mayor a 6 digitos)</label>
                                <input type="password" name="clave" placeholder="Modifica la Clave">
                            </div>
{{--                            <div class="ui yellow message errorValidacion">--}}
{{--                                <div class="header">Action Forbidden</div>--}}
{{--                                <p>You can only sign up for an account once with a given e-mail address.</p>--}}
{{--                            </div>--}}
                            <div class="actions">
                                <div class="ui green submit button m-0">Guardar</div>
                                <a href="{{route('departamentos.index')}}" class="ui red button ml-1">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>
</div>
<script type="text/javascript" src="/js/editarDepartamentos.js"></script></body>
</html>
