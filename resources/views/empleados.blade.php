<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/empleados.css" rel="stylesheet"></head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <a href="/" class="aside__logo__container">
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
        </header>
        <main class="main" id="main">
            @if($canAddEmpleado) {{--    Si hay una Empresa registrada es true    --}}

                @if($departamentosExists) {{--    Si existe un departamento al menos    --}}
{{--                    <h2>Existe el depatamkdfsja</h2>--}}
                    <div class="main__headerCrud"><i class="fas fa-bars main__headerCrud__burguer" id="trigger"></i>
                        <h2 class="header__title">Empleados</h2><button class="ui green button lolo" @click="agregar()"><i class="address book icon"></i><span class="texto">Agregar Empleado</span></button>
                    </div>
                    <div class="main__results" id="app"><table class="ui selectable celled table">
                            <thead class="table__thead">
                            <tr class="table__thead__tr">
                                <th class="table__thead__tr">ID</th>
                                <th class="table__thead__tr">Nombre</th>
                                <th class="table__thead__tr">A. Paterno</th>
                                <th class="table__thead__tr">A. Materno</th>
                                <th class="table__thead__tr">Cargo</th>
                                <th class="table__thead__tr">Jornada</th>
                                <th class="table__thead__tr">Departamento</th>
                                <th class="table__thead__tr">Editar</th>
                            </tr>
                            </thead>
                            <tbody class="table__tbody">
                            @foreach($empleados as $e)
                                <tr class="table__tbody__tr">
                                    <td class="table__tbody__tr__td">{{$e->id}}</td>
                                    <td class="table__tbody__tr__td">{{$e->nombre}}</td>
                                    <td class="table__tbody__tr__td">{{$e->apaterno}}</td>
                                    <td class="table__tbody__tr__td">{{$e->amaterno}}</td>
                                    <td class="table__tbody__tr__td">{{$e->cargo}}</td>
                                    <td class="table__tbody__tr__td">{{$e->jornada}}</td>
                                    <td class="table__tbody__tr__td">{{$e->departamento->nombre}}</td>
                                    <td class="table__tbody__tr__td table__tbody__tr__td--editContainer">
                                        <a href="{{route('empleados.edit', $e->id)}}">
                                            <i class="table__tbody__tr__td--editContainer__icon table__tbody__tr__td--editContainer__icon--edit   fas fa-user-edit"></i>
                                        </a>
                                        <i class="table__tbody__tr__td--editContainer__icon table__tbody__tr__td--editContainer__icon--delete fas fa-user-minus" @click="eliminar({{$e->id}})"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
{{--                            {{$empleados->links()}}--}}
                        </table>
                        <div class="ui mini test modal transition hidden eliminar">
                            <div class="header">¿Esta seguro?</div>
                            <div class="content"><p>Se eliminara el elemento seleccionado permanentemente</p></div>
                            <div class="actions">
                                <div class="ui negative button">No</div>
                                <div class="ui positive right labeled icon button">Si, eliminalo<i class="checkmark icon"></i></div>
                            </div>
                        </div>
                        <div class="ui modal agregar tiny">
                            <i class="close icon"></i>
                            <div class="header">Agregar Empleado</div>
                            <div class="image content">
                                <form class="ui form" action="{{route('empleados.store')}}" id="form" method="POST">
                                    <div class="field">
                                        @csrf
                                        <label>Nombre Completo</label>
                                        <div class="two fields">
                                            <div class="field">
                                                <input type="text" name="nombre" placeholder="Nombre/s" class="inputToClean" value="{{old('nombre')}}">
                                            </div>
                                            <div class="field">
                                                <input type="text" name="apaterno" placeholder="A. Paterno" value="{{old('apaterno')}}"
                                                       class="inputToClean">
                                            </div>
                                            <div class="field">
                                                <input type="text" name="amaterno" placeholder="A. Materno" value="{{old('amaterno')}}"
                                                       class="inputToClean">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Edad</label>
                                        <input type="number" placeholder="Coloca la Edad" name="edad" class="inputToClean" value="{{old('edad')}}">
                                    </div>
                                    <div class="field">
                                        <label>Sexo</label>
                                        <select class="ui search dropdown selectToClear" name="sexo">
                                            @if(old('sexo'))
                                                <option value="{{old('sexo')}}">Sexo</option>
                                            @else
                                                <option value="">Sexo</option>
                                            @endif
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select></div>
                                    <div class="field">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Ingresa un Email" class="inputToClean">
                                    </div>
                                    @if($errors->has('email'))
                                        <div class="ui yellow message errorValidacion">
                                            <div class="header">Alerta</div>
                                            <p>{{$errors->first('email')}}</p>
                                        </div>
                                    @endif
                                    <div class="field">
                                        <label>Cargo</label>
                                        <select class="ui search dropdown selectToClear" name="cargo">
                                            @if(old('cargo'))
                                                <option value="{{old('cargo')}}">Selecciona un cargo</option>
                                            @else
                                                <option value="">Selecciona un cargo</option>
                                            @endif
                                            @component('components.cargosEmpleados')@endcomponent
                                        </select></div>
                                    <div class="field">
                                        <label>Jornada</label>
                                        <select class="ui search dropdown selectToClear" name="jornada">
                                            @if(old('jornada'))
                                                <option value="{{old('jornada')}}">Selecciona una jornada</option>
                                            @else
                                                <option value="">Selecciona una jornada</option>
                                            @endif
                                            <option>Diurna</option>
                                            <option>Nocturna</option>
                                            <option>Mixta</option>
                                        </select></div>
                                    <div class="field">
                                        <label>Escolaridad</label>
                                        <select class="ui search dropdown selectToClear" name="escolaridad">
                                            @if(old('escolaridad'))
                                                <option value="{{old('escolaridad')}}">Selecciona una escolaridad</option>
                                            @else
                                                <option value="">Selecciona una escolaridad</option>
                                            @endif
                                            <option>Primaria</option>
                                            <option>Secundaria</option>
                                            <option>Preparatoria</option>
                                            <option>Técnica</option>
                                            <option>Universidad</option>
                                            <option>Especialización</option>
                                            <option>Doctorado</option>
                                            <option>Maestría</option>
                                        </select></div>
                                    <div class="field">
                                        <label>Departamento</label>
                                        <select class="ui search dropdown selectToClear" name="departamento">
                                            @foreach($departamentos as $dep)
                                                <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                                            @endforeach
                                        </select></div>
                                    {{--                            <div class="ui yellow message">--}}
                                    {{--                                <div class="header">Action Forbidden</div>--}}
                                    {{--                                <p>You can only sign up for an account once with a given e-mail address.</p>--}}
                                    {{--                            </div>--}}
                                    <div class="actions">
                                        <div class="ui green submit button m-0">Guardar</div>
                                        <div class="ui red deny button ml-1" @click="cancelar">Cancelar</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <h2>Por favor registre al menos un departamento</h2>
                @endif

            @else
                <h2>Por favor registre una empresa</h2>
            @endif
        </main>
    </section>
</div>
<script type="text/javascript" src="/js/empleados.js"></script>
<script>
    @if($errors->has('email'))
    window.abrir(true)
    @endif
</script>
</body>
</html>
