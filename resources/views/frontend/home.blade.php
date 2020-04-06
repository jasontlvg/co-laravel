@extends('layouts.encuesta')

@section('css-link')
    <link href="{{asset('css/empleadoIndex.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="containerSurveys">
        @if(count($contestar)>0)
            <h2 class="main__title">Encuestas Disponibles</h2>
        @else
            <h2 class="main__title">No hay Encuestas Disponibles</h2>
            <div class="container">
                <img class="ui large centered circular image" src="{{asset('img/11.jpg')}}" alt="">
            </div>
        @endif
{{--        {{count($contestar)}}--}}
        <div class="ui special cards">
            @foreach($contestar as $encuesta)
{{--                <h2>{{$encuesta->encuesta->nombre}}</h2>--}}
                <div class="card">
                    <div class="blurring dimmable image">
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <a class="ui inverted button contestar-boton" href="{{route('encuesta.show',$encuesta->encuesta->id)}}">Contestar</a>
                                </div>
                            </div>
                        </div>
{{--                        {{$encuesta->encuesta->id}}--}}
                        @if($encuesta->encuesta->id == 1)
                            <img src="/img/personas.jpg" alt="">
                        @elseif($encuesta->encuesta->id == 2)
                            <img src="/img/producto.jpg" alt="">
                        @elseif($encuesta->encuesta->id == 3)
                            <img src="/img/act.jpg" alt="">
                        @elseif($encuesta->encuesta->id == 4)
                            <img src="/img/procesos.jpg" alt="">
                        @else
                            <img src="/img/practica.jpg" alt="">
                        @endif
                    </div>
                    <div class="content"><a class="header" href="{{route('encuesta.show',$encuesta->encuesta->id)}}">{{$encuesta->encuesta->nombre}}</a>
                        <div class="meta">
{{--                            <div class="date">Created in Sep 2014</div>--}}
                        </div>
{{--                        <div class="description">Encuesta sobre las Personas del ambiente laboral</div>--}}
                    </div>
                    <a class="ui green button" href="{{route('encuesta.show',$encuesta->encuesta->id)}}">¡Contestar!</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js-link')
    <script type="text/javascript" src="{{asset('js/empleadoIndex.js')}}"></script>
@endsection
