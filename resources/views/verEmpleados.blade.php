@extends('layouts.admin')
@section('css-link')
    <link rel="stylesheet" href="{{asset('css/verEmpleados.css')}}">
@endsection
@section('content')
    <div class="crudContainer">
        <div class="crudContainer__body"><!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="formContainer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="clone" id="clone">
                                <label for="">Modificar</label>
                                <input type="checkbox" name="" @click="prime" id="checkboxPrime">
                            </div>
                        </div>
                        <div class="modal-body" id="tlx">
                            <form action="{{route('empleados.update', $empleado->id)}}" method="POST">
                                @csrf
                                {{method_field('PUT')}}
                                {{--  ----------------------------------------------SEPARADOR----------------------------------------------                 --}}
                                <div class="form-group form-group--datos">
                                    <label class="form-group__label">Datos</label>
                                    <div class="form-group__inputContainer">
                                        <input class="form-group__inputContainer__input form-control"
                                               type="text" placeholder="Nombre/s" name="nombre" value="{{$empleado->nombre}}">
                                        @if($errors->has('nombre'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('nombre')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <input class="form-group__inputContainer__input form-control"
                                               type="text" placeholder="A. Paterno" name="apaterno" value="{{$empleado->apaterno}}">
                                        @if($errors->has('apaterno'))
                                            <div class="alert alert-warning alert-dismissible fade show alert-danger p-2 px-3 align-items-center" role="alert">
                                                <strong>{{$errors->first('apaterno')}}</strong>
                                                <button type="button" class="close p-0 position-relative" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <input class="form-group__inputContainer__input form-control"
                                               type="text" placeholder="A. Materno" name="amaterno" value="{{$empleado->amaterno}}">
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
                                           name="edad" value="{{$empleado->edad}}">
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
                                    <select class="input custom-select" name="sexo" id="lala" selected="{{$empleado->sexo}}">
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                            <option value="{{$empleado->sexo}}" selected hidden>{{$empleado->sexo}}</option>
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
                                           id="exampleInputPassword1" placeholder="" value="{{$empleado->email}}">
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
                                        <option value="{{$empleado->cargo}}" selected hidden>{{$empleado->cargo}}</option>
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
                                        <option value="{{$empleado->jornada}}" selected hidden>{{$empleado->jornada}}</option>
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
                                        <option value="{{$empleado->escolaridad}}" selected hidden>{{$empleado->escolaridad}}</option>
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
                                        @foreach($departamentos as $d)
                                            <option value="{{$d->id}}">{{$d->nombre}}</option>
                                        @endforeach
                                            <option value="{{$empleado->departamento->id}}" selected hidden>{{$empleado->departamento->nombre}}</option>
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
                                {{--  ----------------------------------------------SEPARADOR----------------------------------------------                 --}}
                                <button type="submit" class="btn btn-primary agregar" :class={activated:activatedSaveButton} id="editarBoton">Guardar</button>
                                <a class="btn btn-secondary cancelar" href="{{route('empleados.index')}}" id="regresarBoton">Regresar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/verEmpleados.js')}}"></script>
@endsection

