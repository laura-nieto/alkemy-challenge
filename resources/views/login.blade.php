@extends('layouts.plantilla')
@section('title',"AppStore - Iniciar Sesión")
@section('main')
    <article class="article--login">
        <form action="" method="post" class="article--login__form">
            @csrf
            @error('username')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror
            @error('password')
                <small id="emailHelp" class="error">{{$message}}</small>    
            @enderror
            <input type="text" name="username" id="username" class="article--login--form--input" placeholder="Usuario">
            <input type="password" name="password" id="password" class="article--login--form--input" placeholder="Contraseña">
            <input type="submit" value="Iniciar Sesión" class="article--login--form__button margin-top">
            <label for="remember" class="article--login--form__remember"><input type="checkbox" name="remember" id="remember">Permanecer Conectado</label>
            <div class="article--login--form__links">
                <a href="">¿Olvidaste tu contraseña?</a>
                <a href="/register">Crear cuenta</a>
            </div>
        </form>
    </article>
@endsection