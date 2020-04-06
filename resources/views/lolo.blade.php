@extends('layouts.admin')

@section('css-link')
    <link href="{{asset('css/empleados.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="crudContainer">
        @if($departamentosExists)
            <div class="crudContainer__header">
                <h2 class="crudContainer__header__title">Gestion de Empleados</h2>
                {{--      Agregar la Clase 'isOpen' al button para que se mustre abierto      --}}
                <button class="btn btn-primary crudContainer__header__button {{count($errors) <= 0 ? '': 'isOpen'}}" type="button" id="calabaza"><span>Agregar Empleado</span><i
                        class="crudContainer__header__button__icon fas fa-user-plus"></i>
                </button>
            </div>
            <div class="crudContainer__body">
                <div class="cajas">
                    <table class="table">
                        <thead class="table__thead thead-dark">
                        <tr class="table__thead__row">
                            <th class="table__thead__row__col" scope="col">#ID</th>
                            <th class="table__thead__row__col" scope="col">Nombre</th>
                            <th class="table__thead__row__col" scope="col">A. Paterno</th>
                            <th class="table__thead__row__col" scope="col">A. Materno</th>
                            <th class="table__thead__row__col" scope="col">Cargo</th>
                            <th class="table__thead__row__col" scope="col">Jornada</th>
                            <th class="table__thead__row__col" scope="col">Departamento</th>
                            <th class="table__thead__row__col" scope="col">Editar</th>
                        </tr>
                        </thead>
                        <tbody class="table__tbody">


                        @foreach($empleados as $e)
                            <tr class="table__tbody__row">
                                <th class="table__tbody__row__col">{{$e->id}}</th>
                                <td class="table__tbody__row__col">{{$e->nombre}}</td>
                                <td class="table__tbody__row__col">{{$e->apaterno}}</td>
                                <td class="table__tbody__row__col">{{$e->amaterno}}</td>
                                <td class="table__tbody__row__col">{{$e->cargo}}</td>
                                <td class="table__tbody__row__col">{{$e->jornada}}</td>
                                <td class="table__tbody__row__col">{{$e->departamento->nombre}}</td>
                                <td class="table__tbody__row__col table__tbody__row__col--mas">
                                    <a class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--info" href="{{route('empleados.show', $e->id)}}">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--edit" href="{{route('empleados.edit', $e->id)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <div class="table__tbody__row__col__a table__tbody__row__col--mas__a table__tbody__row__col--mas__a--trash" href="#">
                                        <form action="{{route('empleados.destroy', $e)}}" method="POST" id="form-trash">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" id="submit-button-destroy">
                                                <i class="fas fa-trash-alt" id="form-trash-button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div><!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('empleados.store')}}" id="form" method="POST">
                                    @csrf
                                    <div class="form-group form-group--datos">
                                        <label class="form-group__label">Datos</label>
                                        <div class="form-group__inputContainer">
                                            <input class="form-group__inputContainer__input form-control"
                                                   type="text" placeholder="Nombre/s" name="nombre" value="{{old('nombre')}}">
                                            @if($errors->has('nombre'))
                                                <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                    <strong>{{$errors->first('nombre')}}</strong>
                                                    <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                            <input class="form-group__inputContainer__input form-control"
                                                   type="text" placeholder="A. Paterno" name="apaterno">
                                            @if($errors->has('apaterno'))
                                                <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                    <strong>{{$errors->first('apaterno')}}</strong>
                                                    <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                            <input class="form-group__inputContainer__input form-control"
                                                   type="text" placeholder="A. Materno" name="amaterno">
                                            @if($errors->has('amaterno'))
                                                <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                    <strong>{{$errors->first('amaterno')}}</strong>
                                                    <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Edad</label>
                                        <input class="input form-control" type="number" min="18" max="90"
                                               name="edad">
                                        @if($errors->has('edad'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('edad')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="input custom-select" name="sexo" id="lala">
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                        @if($errors->has('sexo'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('sexo')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="input form-control" name="email" type="email"
                                               id="exampleInputPassword1" placeholder="">
                                        @if($errors->has('email'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('email')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select class="input custom-select" name="cargo">
                                            @component('components.cargosEmpleados')@endcomponent
                                        </select>
                                        @if($errors->has('cargo'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('cargo')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Jornada</label>
                                        <select class="input custom-select" name="jornada">
                                            <option>Diurna</option>
                                            <option>Nocturna</option>
                                            <option>Mixta</option>
                                        </select>
                                        @if($errors->has('jornada'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('jornada')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Escolaridad</label>
                                        <select class="input custom-select" name="escolaridad">
                                            <option>Primaria</option>
                                            <option>Secundaria</option>
                                            <option>Preparatoria</option>
                                            <option>Técnica</option>
                                            <option>Universidad</option>
                                            <option>Especialización</option>
                                            <option>Doctorado</option>
                                            <option>Maestría</option>
                                        </select>
                                        @if($errors->has('escolaridad'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('escolaridad')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Departamento</label>
                                        <select class="input custom-select" name="departamento">
                                            @foreach($departamentos as $dep)
                                                <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('departamento'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('departamento')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary agregar">Agregar</button>
                                    <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal" id="cancelar">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h2>Agrega Departamentos Primero!</h2>
        @endif
    </div>
@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/empleados.js')}}"></script>
@endsection

