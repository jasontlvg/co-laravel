<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title><meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/editarEmpleados.css" rel="stylesheet"></head>
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
            <div class="main__headerCrud"></div>
            <div class="main__results" id="app">
                <div class="ui modal agregar tiny">
                    <div class="header">Editar Empleado</div>
                    <div class="image content">
                        <form class="ui form" action="{{route('empleados.update', $empleado->id)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="field">
                                <label>Nombre Completo</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="nombre" placeholder="Nombre/s" class="inputToClean" value="{{$empleado->nombre}}">
                                    </div>

                                    <div class="field">
                                        <input type="text" name="apaterno" placeholder="A. Paterno" class="inputToClean" value="{{$empleado->apaterno}}">
                                    </div>

                                    <div class="field">
                                        <input type="text" name="amaterno" placeholder="A. Materno" class="inputToClean" value="{{$empleado->amaterno}}">
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('nombre'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Nombre Erroneo</div>
                                    <p>Apellido Paterno Erroneo</p>
                                </div>
                            @endif
                            @if($errors->has('apaterno'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Apellido Paterno</div>
                                    <p>Apellido Paterno Erroneo</p>
                                </div>
                            @endif
                            @if($errors->has('amaterno'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Apellido Materno</div>
                                    <p>Apellido Materno Erroneo</p>
                                </div>
                            @endif

                            <div class="field">
                                <label>Edad</label>
                                <input type="number" placeholder="Coloca la Edad" name="edad" class="inputToClean" value="{{$empleado->edad}}">
                            </div>
                            @if($errors->has('edad'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Edad Erroneo</div>
                                    <p>Error en la Edad</p>
                                </div>
                            @endif


                            <div class="field">
                                <label>Sexo</label>
                                <select class="ui search dropdown selectToClear" name="sexo">
                                    <option value="{{$empleado->sexo}}">Selecciona de Sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                            @if($errors->has('sexo'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Sexo Erroneo</div>
                                    <p>Error en Sexo</p>
                                </div>
                            @endif

                            <div class="field">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Ingresa un Email" class="inputToClean" value="{{$empleado->email}}">
                            </div>
                            @if($errors->has('email'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Email Erroneo</div>
                                    <p>Email Erroneo</p>
                                </div>
                            @endif


                            <div class="field">
                                <label>Cargo</label>
                                <select class="ui search dropdown selectToClear" name="cargo">
                                    <option value="{{$empleado->cargo}}">Selecciona un Cargo</option>
                                    @component('components.cargosEmpleados')@endcomponent
                                </select>
                            </div>
                            @if($errors->has('cargo'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Cargo Erroneo</div>
                                    <p>Cargo Erroneo</p>
                                </div>
                            @endif

                            <div class="field">
                                <label>Jornada</label>
                                <select class="ui search dropdown selectToClear" name="jornada">
                                    <option value="{{$empleado->jornada}}">Selecciona una Jornada</option>
                                    <option>Diurna</option>
                                    <option>Nocturna</option>
                                    <option>Mixta</option>
                                </select>
                            </div>
                            @if($errors->has('jornada'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Jornada Erroneo</div>
                                    <p>Jornada Erroneo</p>
                                </div>
                            @endif



                            <div class="field">
                                <label>Escolaridad</label>
                                <select class="ui search dropdown selectToClear" name="escolaridad">
                                    <option value="{{$empleado->escolaridad}}">Selecciona una Escolaridad</option>
                                    <option>Primaria</option>
                                    <option>Secundaria</option>
                                    <option>Preparatoria</option>
                                    <option>Tecnica</option>
                                    <option>Universidad</option>
                                    <option>Especialización</option>
                                    <option>Doctorado</option>
                                    <option>Maestría</option>
                                </select>
                            </div>
                            @if($errors->has('escolaridad'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Escolaridad Erroneo</div>
                                    <p>Escolaridad Erroneo</p>
                                </div>
                            @endif
                            <div class="field">
                                <label>Departamento</label>
                                <select class="ui search dropdown selectToClear" name="departamento" value="Electronica">
                                    @foreach($departamentos as $dep)
                                        @if($empleado->departamento->id == $dep->id)
{{--                                            <option selected="selected">Medicina</option>--}}
                                            <option selected="selected" value="{{$dep->id}}">{{$dep->nombre}}</option>
                                        @else
                                            <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('departamento'))
                                <div class="ui message {{$color}} errorValidacion">
                                    <i class="close icon"></i>
                                    <div class="header">Departamento Erroneo</div>
                                    <p>DepartamentoErroneo</p>
                                </div>
                            @endif


{{--                            <div class="ui yellow message errorValidacion">--}}
{{--                                <div class="header">Action Forbidden</div>--}}
{{--                                <p>You can only sign up for an account once with a given e-mail address.</p>--}}
{{--                            </div>--}}

                            <div class="actions">
                                <div class="ui green submit button m-0">Guardar</div>
                                <a href="{{route('empleados.index')}}" class="ui red button ml-1">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>
</div>
<script type="text/javascript" src="/js/editarEmpleados.js"></script>
<script>

</script>
</body>
</html>
