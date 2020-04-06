<!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title><link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet"></head>
<body>
<div class="containerGrid">
    <section class="welcome">
        <div class="welcome__titles">
            <div class="logoContainer">
                <h1 class="logoContainer__title">4P'S</h1>
            </div>
            <h2 class="welcome__titles__h">Changeover</h2>
        </div>
    </section>
    <section class="login">
        <div class="login__header">
            <h2>Inicio de sesión</h2>
        </div>
        <form class="ui form login__form " method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label>Correo</label><input type="text" name="email" placeholder="ejemplo@gmail.com" class="inpuText">
            </div>
            @if ($errors->has('email'))
                <span class="error-msg" role="alert">
                    <strong class="alert"> {{ $errors->first('email') }}</strong>
                </span>
            @endif
            <div class="field">
                <label>Contraseña</label><input type="password" name="password" placeholder="********" class="inpuText">
            </div>
            @if ($errors->has('password'))
                <span class="error-msg" role="alert">
                    <strong class="alert">{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <button class="ui button login__form__submit" type="submit">Iniciar sesión</button>
        </form>
        <div class="login__otherUser"><a class="login__otherUser__login" href="#"><i class="user secret icon"></i>
                <p>Administrador</p></a></div>
    </section>
{{--    <a class="access" href="{{route('admin.login')}}"><i class="user secret icon"></i></a>--}}
    <a class="access" href="{{route('empresa.index')}}"><i class="user secret icon"></i></a>
</div>
<script type="text/javascript" src="/js/login.js"></script></body>
</html>
