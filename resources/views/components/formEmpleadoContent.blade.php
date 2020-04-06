{{--empleados.blade.php no tiene este componente porque en esas vistas no necesitamos poner la info de la
base de datos, porque aun no existe--}}

<div class="form-group form-group--datos">
    <label class="form-group__label">Datos</label>
    <div class="form-group__inputContainer">
        <input class="form-group__inputContainer__input form-control"
               type="text" placeholder="Nombre/s" name="nombre" value="{{$empleado->nombre}}">
        <input class="form-group__inputContainer__input form-control"
               type="text" placeholder="A. Paterno" name="apaterno" value="{{$empleado->apaterno}}">
        <input class="form-group__inputContainer__input form-control"
               type="text" placeholder="A. Materno" name="amaterno" value="{{$empleado->amaterno}}">
    </div>
</div>
<div class="form-group">
    <label>Edad</label>
    <input class="input form-control" type="number" min="18" max="90"
           name="edad" value="{{$empleado->edad}}">
</div>
<div class="form-group">
    <label>Sexo</label>
    <select class="input custom-select" name="sexo" id="lala" selected="{{$empleado->sexo}}">
        <option>Masculino</option>
        <option>Femenino</option>
        <option value="{{$empleado->sexo}}" selected hidden>{{$empleado->sexo}}</option>
    </select></div>
<div class="form-group">
    <label>Email</label>
    <input class="input form-control" name="email" type="email"
           id="exampleInputPassword1" placeholder="" value="{{$empleado->email}}">
</div>
<div class="form-group">
    <label>Cargo</label>
    <select class="input custom-select" name="cargo">
        @component('components.cargosEmpleados')@endcomponent
        <option value="{{$empleado->cargo}}" selected hidden>{{$empleado->cargo}}</option>
    </select></div>
<div class="form-group">
    <label>Jornada</label>
    <select class="input custom-select" name="jornada">
        <option>Diurna</option>
        <option>Nocturna</option>
        <option>Mixta</option>
        <option value="{{$empleado->jornada}}" selected hidden>{{$empleado->jornada}}</option>
    </select></div>
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
    </select></div>
<div class="form-group">
    <label>Departamento</label>
    <select class="input custom-select" name="departamento">
        @foreach($departamentos as $d)
            <option value="{{$d->id}}">{{$d->nombre}}</option>
        @endforeach
        <option value="{{$empleado->id}}" selected hidden>{{$empleado->departamento->nombre}}</option>
    </select>
</div>
