@extends('layouts.encuesta')

@section('css-link')
    <link href="{{asset('css/personasEncuesta.css')}}" rel="stylesheet">
@endsection

@section('content')
    <h1>Encuesta - {{$nombreEncuesta}}</h1>
{{--    {{$errors}}--}}
{{--    <div id="boton">Aplastar</div>--}}
    <form action="{{route('encuesta.store',$id)}}" method="POST" class="ui form" id="form">
        @csrf
        @foreach($preguntas as $p)
            <div class="grouped fields">
                <label class="pregunta">{{$p->pregunta}} ({{$p->id}})</label>
                @foreach($respuestas as $respuesta)
                    <div class="field">
                        <div class="ui radio checkbox">
{{--                            <input type="radio" name="{{$p->id}}" value="{{$respuesta->id}}" class="cb">--}}
                            <input type="radio" name="{{$p->id}}" value="{{$respuesta->id}}">
                            <label>{{$respuesta->respuesta}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button class="ui button enviar" type="submit">Enviar Respuestas</button>
    </form>
@endsection

@section('js-link')
{{--    <script type="text/javascript" src="{{asset('js/empleadoIndex.js')}}"></script>--}}
<script>


    let form= document.getElementById('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault()
        let totalQuestions= document.getElementsByClassName('pregunta').length
        var array = []
        var checkboxes = document.querySelectorAll('input[type=radio]:checked')
        for (var i = 0; i < checkboxes.length; i++) {
            array.push(checkboxes[i].value)
        }

        if(array.length == totalQuestions){
            form.submit();
        }else{
            console.log('Contesta todo porfavor')
        }

    })

    let btn= document.getElementById('boton')

    btn.addEventListener('click', function () {
        let totalQuestions= document.getElementsByClassName('pregunta').length
        var array = []
        var checkboxes = document.querySelectorAll('input[type=radio]:checked')
        for (var i = 0; i < checkboxes.length; i++) {
            array.push(checkboxes[i].value)
        }
        console.log(array)
    })


</script>
@endsection
