<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/empleados.css" rel="stylesheet">
</head>
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
        <header class="header"><i class="fas fa-bars header__burguer" id="trigger"></i>
            <h2 class="header__title">Empleados</h2>
            <button class="ui green button lolo" @click="agregar()"><i class="address book icon"></i>Agregar Empleado
            </button>
        </header>
        <main class="main" id="main">
            <div class="main__results" id="app">
                <table class="ui selectable celled table">
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
                        {{--                        <p>{{$e}}</p>--}}
                        <tr class="table__tbody__tr">
                            <td class="table__tbody__tr__td">{{$e->id}}</td>
                            <td class="table__tbody__tr__td">{{$e->nombre}}</td>
                            <td class="table__tbody__tr__td">{{$e->apaterno}}</td>
                            <td class="table__tbody__tr__td">{{$e->amaterno}}</td>
                            <td class="table__tbody__tr__td">{{$e->cargo}}</td>
                            <td class="table__tbody__tr__td">{{$e->jornada}}</td>
                            <td class="table__tbody__tr__td">{{$e->departamento->nombre}}</td>
                            <td class="table__tbody__tr__td table__tbody__tr__td--editContainer">
                                <i class="edit icon icon table__tbody__tr__td--editContainer__icon"></i>
                                <i class="trash icon table__tbody__tr__td--editContainer__icon lolo"
                                   @click="eliminar({{$e->id}})"></i>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <div class="ui mini test modal transition hidden">
                    <div class="header">Eliminar Empleado</div>
                    <div class="content"><p>Se eliminara al Empleado sin posibilidad de Revertirlo</p></div>
                    <div class="actions">
                        <div class="ui negative button">No</div>
                        <div class="ui positive right labeled icon button">Yes<i class="checkmark icon"></i></div>
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
                                        <input type="text" name="nombre" placeholder="Nombre/s" class="inputToClean">
                                    </div>
                                    <div class="field">
                                        <input type="text" name="apaterno" placeholder="A. Paterno"
                                               class="inputToClean">
                                    </div>
                                    <div class="field">
                                        <input type="text" name="amaterno" placeholder="A. Materno"
                                               class="inputToClean">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Edad</label>
                                <input type="number" placeholder="Coloca la Edad" name="edad" class="inputToClean">
                            </div>
                            <div class="field">
                                <label>Sexo</label>
                                <select class="ui search dropdown selectToClear" name="sexo">
                                    <option value="">Selecciona de Sexo</option>
                                    <option value="AF">Masculino</option>
                                    <option value="AX">Femenino</option>
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
                                    @component('components.cargosEmpleados')@endcomponent
                                </select></div>
                            <div class="field">
                                <label>Jornada</label>
                                <select class="ui search dropdown selectToClear" name="jornada">
                                    <option>Diurna</option>
                                    <option>Nocturna</option>
                                    <option>Mixta</option>
                                </select></div>
                            <div class="field">
                                <label>Escolaridad</label>
                                <select class="ui search dropdown selectToClear" name="escolaridad">
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
                                <div class="ui green submit button m-0">Submit</div>
                                <div class="ui red deny button ml-1" @click="cancelar">Cancelar</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
