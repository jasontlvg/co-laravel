<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/reporteFinal.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="logo">
            <div class="logo__logo-container">
{{--                <h2 class="logo__logo-container__title">4P'S</h2>--}}
                <img src="{{ public_path('img/logo3.jpg') }}" alt="">
            </div>
{{--            <h1 class="logo__title">Changeover</h1>--}}
        </div>
        <div class="caja">
{{--            <div class="row m-0">--}}
{{--                <div class="col p-0">--}}
{{--                    <p class="h4" class="">Departamento: <span class="text-info">{{$departamento_name}}</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row m-0">--}}
{{--                <h1 class="h4">Media Global: <span class="text-info">{{$global->mediaGlobal}}</span></h1>--}}
{{--            </div>--}}
{{--            <div class="row m-0">--}}
{{--                <div class="col p-0">--}}
{{--                    <p class="h4" class="">Empresa: <span class="text-info">{{$empresa->nombre}}</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row m-0">--}}
{{--                <div class="col p-0">--}}
{{--                    <p class="h4" class="">Fecha de impresion de reporte: <span class="text-info">{{$date}}</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row m-0">--}}
{{--                <div class="col p-0">--}}
{{--                    <p class="h4" class="">Encuesta menor de Primera encuesta: <span class="text-info">{{$global->results[0]->encuestaMenor->encuesta->nombre}}</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row m-0">--}}
{{--                <div class="col p-0">--}}
{{--                    <p class="h4" class="">Encuesta menor de Retroalimentacion : <span class="text-info">{{$global->results[1]->encuestaMenor->encuesta->nombre}}</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}

            <h1 class="w-100 text-center h2 reporteFinal">Reporte Final</h1>
            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Departamento: </p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$departamento_name}}</p>
                </div>
            </div>

            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Media Global: </p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$global->mediaGlobal}}</p>
                </div>
            </div>

            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Empresa: </p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$empresa->nombre}}</p>
                </div>
            </div>

            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Fecha de impresion de reporte:</p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$date}}</p>
                </div>
            </div>

            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Encuesta menor de Primera encuesta: </p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$global->results[0]->encuestaMenor->encuesta->nombre}}</p>
                </div>
            </div>

            <div class="caja__container">
                <div class="caja__container__title">
                    <p class="h4" class="">Encuesta menor de Retroalimentacion: </p>
                </div>
                <div class="caja__container__value">
                    <p class="h4 text-info">{{$global->results[1]->encuestaMenor->encuesta->nombre}}</p>
                </div>
            </div>

        </div>

        <div class="page-break"></div>

    @foreach($global->results as $turno)
{{--            {{$turno->media}}--}}
{{--            {{$turno->encuestaMenor}}--}}
            <div class="box">
                <h2 class="w-100 text-center mb-3" >{{$turno->encuesta}}</h2>
                <div class="cont w-100 mb-3">
                    <div class="row m-0">
                        <div class="col p-0">
                            <p class="h5">Media: <span class="text-info">{{$turno->media}}</span></p>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col p-0">
                            <p class="h5">Encuesta menor: <span class="text-info">{{$turno->encuestaMenor->encuesta->nombre}}</span></p>
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col p-0">
                            <p class="h5">Acciones de mejora para Changeover:</p>
                        </div>
                    </div>
                </div>
                @foreach($turno->encuestas as $encuesta)
                    <div class="encuesta">
                        <div class="contenedor">

                            <div class="columna">
                                <p class="titulo">Factor</p>
                                <p class="descripcion">{{$encuesta->nombre}}</p>
                            </div>

                            <div class="columna">
                                <p class="titulo">Media</p>
                                <p class="descripcion">{{$encuesta->media}}</p>
                            </div>

                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Variable</th>
                                    <th>Recomendación</th>
                                    <th>Media</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($encuesta->indicadores as $indicador)
                                <tr>
                                    <td data-label="Name">{{$indicador->variable->nombre}}</td>
                                    <td data-label="Age">{{$indicador->recomendacion->indicador}}</td>
                                    <td data-label="Job">{{$indicador->media}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="page-break"></div>
                @endforeach
            </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
