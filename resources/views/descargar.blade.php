<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/descargar.css') }}" rel="stylesheet">
</head>
<body>
{{--    <h1></h1>--}}

    <div class="contenedor contenedor--titulo">
        <h1>{{$empresa->nombre}}</h1>
    </div>

    <div class="contenedor contenedor--acciones">
        <h2>Acciones de mejora para Changeover:</h2>
    </div>

    <div class="contenedor">
        <div class="columna">
            <p class="titulo">Departamento</p>
            <p class="descripcion">{{$departamento}}</p>
        </div>

        <div class="columna">
            <p class="titulo">Factor</p>
            <p class="descripcion">{{$encuesta}}</p>
        </div>

        <div class="columna">
            <p class="titulo">Media</p>
            <p class="descripcion">{{$media_encuesta}}</p>
        </div>

        <div class="columna">
            <p class="titulo">Fecha de Solicitud</p>
            <p class="descripcion">{{$date}}</p>
        </div>

        <div class="columna">
            <p class="titulo">Administrador</p>
            <p class="descripcion">{{$admin[0]->name}}</p>
        </div>

    </div>


    <div class="asd">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Variable</th>
                    <th scope="col">Recomendación</th>
                    <th scope="col">Media</th>
                </tr>
            </thead>
            <tbody>
                @foreach($f as $indicador)
                    <tr>
                        <th scope="row">{{$indicador->pregunta->nombre}}.</th>
                        <td>{{$indicador->indicador->indicador}}.</td>
                        <td>{{$indicador->media}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

{{--    <div class="conte">--}}
{{--        <div class="info">--}}
{{--            <p><strong>Fecha de Solicitud:</strong> {{$date}}</p>--}}
{{--            <p><strong>Administrador quien solicita reporte:</strong> {{$admin[0]->name}}</p>--}}
{{--        </div>--}}
{{--    </div>--}}


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/descargar.js') }}"></script>
</body>
</html>
