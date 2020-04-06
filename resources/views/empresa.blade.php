<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresa</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/empresa.css" rel="stylesheet"></head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
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
        <header class="header">
            <h2 class="header__title">Empresa</h2>
        </header>
        <main class="main" id="main">
            @if($canAddEmpresa)

                <div class="contaninerForRegisterCompany">
                    <div class="imgContainer"><img src="/img/enterprise.png" alt=""></div>
                    <div class="formContainer">
                        <form class="ui form formPrime" action="{{route('empresa.store')}}" id="form" method="POST">
                            @csrf
                            <h2>Por favor registre los datos de la empresa</h2>
                            <div class="field">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingrese el Nombre de la Empresa">
                            </div>
                            <div class="field">
                                <label>Proceso</label>
                                <input type="text" name="giro" placeholder="Last Name">
                            </div>
                            <div class="field">
                                <label>Giro</label>
                                <select class="ui search dropdown" name="proceso">
                                    <option value="" >Seleccione un Proceso</option>
                                    <option value="Microempresa">Microempresa</option>
                                    <option value="Mediana Empresa">Mediana Empresa</option>
                                    <option value="Pequeña Empresa">Pequeña Empresa</option>
                                    <option value="Grande Empresa">Grande Empresa</option>
                                </select>
                            </div>
                            <button class="ui button" type="submit">Guardar</button>
                        </form>
                    </div>
                </div>

            @else

                <div class="contaninerForRegistedCompany">
                    <div class="imgContainer"><img src="/img/enterprise.png" alt=""></div>
                    <div class="formContainer"><form class="ui form formPrime">
                            <h2>Datos de la empresa</h2><div class="field ready">
                                <label>Nombre</label>
                                <h2 class="sub">{{$empresa[0]->nombre}}</h2></div>
                            <div class="field ready">
                                <label>Giro</label>
                                <h2 class="sub">{{$empresa[0]->giro}}</h2></div>
                            <div class="field ready">
                                <label>Proceso</label>
                                <h2 class="sub">{{$empresa[0]->proceso}}</h2></div>
                            <div class="ui buttons">
                                <a href="{{route('empresa.edit',$empresa[0]->id)}}">
                                    <div class="ui button editar">Editar</div>
                                </a>
                                <div class="or" data-text="o"></div>
                                <a href="{{route('empresa.destruir',$empresa[0]->id)}}">
                                    <div class="ui button eliminar">Eliminar</div>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            @endif







        </main>
    </section>
</div>
{{--<script type="text/javascript" src="/js/empresa.js"></script>--}}
<script type="text/javascript" src="{{asset('js/empresa.js')}}"></script>
</body>
</html>
