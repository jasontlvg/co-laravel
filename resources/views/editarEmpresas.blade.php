<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/editarEmpresa.css" rel="stylesheet"></head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <div class="aside__logo__container"><i class="fas fa-poo-storm aside__logo__container__logo"></i>
                <h1 class="aside__logo__container__title">GEMINI</h1>
            </div>
        </div>
        <ul class="aside__ul" id="aside__ul">
            <li class="aside__ul__li"><a class="aside__ul__li__a" href="/empresa.html">
                    <i class="fas fa-city aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Empresa</h3></a></li>
            <li class="aside__ul__li"><a class="aside__ul__li__a" href="/empleados.html">
                    <i class="fas fa-user-tie aside__ul__li__a__icon"></i>
                    <h3 class="aside__ul__li__a__title">Empleados</h3></a></li>
            <li class="aside__ul__li"> <a class="aside__ul__li__a" href="/departamentos.html">
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
        <header class="header">
        </header>
        <main class="main" id="main">
            <div class="main__results" id="app"><div class="ui modal agregar mini">
                    <div class="header">Editar Empresa</div>
                    <div class="content">
                        <form class="ui form" action="{{route('empresa.update', $empresa->id)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="field">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Nombre de Empresa" value="{{$empresa->nombre}}">
                            </div>
                            <div class="field">
                                <label>Giro</label>
                                <input type="text" name="giro" placeholder="Modifica el Giro" value="{{$empresa->giro}}">
                            </div>
                            <div class="field">
                                <label>Proceso</label>
                                <select class="ui search dropdown" name="proceso"><option value="">Seleccione un Proceso</option>
                                    <option value="Microempresa">Microempresa</option>
                                    <option value="Mediana Empresa">Mediana Empresa</option>
                                    <option value="Pequeña Empresa">Pequeña Empresa</option>
                                    <option value="Grande Empresa">Grande Empresa</option>
                                </select>
                            </div>
{{--                            <div class="ui yellow message errorValidacion">--}}
{{--                                <div class="header">Action Forbidden</div>--}}
{{--                                <p>You can only sign up for an account once with a given e-mail address.</p>--}}
{{--                            </div>--}}
                            <div class="actions">
                                <div class="ui green submit button m-0">Guardar</div>
                                <a href="{{route('empresa.index')}}" class="ui red button ml-1">Cancelar</a>
                            </div>
                        </form></div>
                </div>
            </div>
        </main>
    </section>
</div>
{{--<script type="text/javascript" src="/js/editarEmpresa.js"></script>--}}
<script type="text/javascript" src="{{asset('js/editarEmpresa.js')}}"></script>
</body>
</html>
