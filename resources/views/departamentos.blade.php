<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departamentos</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/departamentos.css" rel="stylesheet"></head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<div class="wrapper">
    <aside class="aside" id="aside">
        <div class="aside__logo"><i class="fas fa-bars aside__logo__burguer" id="burguer"></i>
            <a href="/" class="aside__logo__container">
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
            @if($canAddDepartamento)
                <div class="main__headerCrud"><i class="fas fa-bars main__headerCrud__burguer" id="trigger"></i>
                    <h2 class="header__title">Departamentos</h2><button class="ui green button lolo" @click="agregar()"><i class="address book icon"></i><span class="texto">Agregar Departamento</span></button>
                </div>
                <div class="main__results" id="app"><table class="ui selectable celled table">
                        <thead class="table__thead">
                        <tr class="table__thead__tr">
                            <th class="table__thead__tr">ID</th>
                            <th class="table__thead__tr">Nombre</th>
                            <th class="table__thead__tr">Clave</th>
                            <th class="table__thead__tr">Editar</th>
                        </tr>
                        </thead>
                        <tbody class="table__tbody">
                            @foreach($deps as $dep)
                                <tr class="table__tbody__tr">
                                    <td class="table__tbody__tr__td">{{$dep->id}}</td>
                                    <td class="table__tbody__tr__td">{{$dep->nombre}}</td>
                                    <td class="table__tbody__tr__td">{{$dep->clave}}</td>
                                    <td class="table__tbody__tr__td table__tbody__tr__td--editContainer">
                                        <a href="{{route('departamentos.edit', $dep)}}">
                                            <i class="table__tbody__tr__td--editContainer__icon table__tbody__tr__td--editContainer__icon--edit   fas fa-user-edit"></i>
                                        </a>
                                        <i class="table__tbody__tr__td--editContainer__icon table__tbody__tr__td--editContainer__icon--delete fas fa-user-minus " @click="eliminar({{$dep->id}})"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="ui mini test modal transition hidden eliminar">
                        <div class="header">¿Esta seguro?</div>
                        <div class="content"><p>Los empleados asociados a este departamento tambien seran eliminados sin posibilidad de recuperarlos</p></div>
                        <div class="actions">
                            <div class="ui negative button">Cancelar</div>
                            <div class="ui positive right labeled icon button">Si<i class="checkmark icon"></i></div>
                        </div>
                    </div>
                    <div class="ui modal agregar mini">
                        <div class="header">Agregar Departamento</div>
                        <div class="content">
                            <form class="ui form" action="{{route('departamentos.store')}}" id="form" METHOD="POST">
                                @csrf
                                <div class="field">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" placeholder="Nombre del departamento">
                                </div>
                                <div class="field">
                                    <label>Clave (Igual o mayor a 6 digitos)</label>
                                    <input type="password" name="clave" placeholder="Crea una Clave">
                                </div>
{{--                                <div class="ui yellow message errorValidacion">--}}
{{--                                    <div class="header">Action Forbidden</div>--}}
{{--                                    <p>You can only sign up for an account once with a given e-mail address.</p>--}}
{{--                                </div>--}}
                                <div class="actions">
                                    <div class="ui green submit button m-0">Guardar</div>
                                    <div class="ui red deny button ml-1" @click="cancelar">Cancelar</div>
                                </div>
                            </form></div>
                    </div>
                </div>
            @else
                <h2>Por favor registre una empresa</h2>
            @endif
        </main>
    </section>
</div>
<script type="text/javascript" src="/js/departamentos.js"></script></body>
</html>
