@extends('layouts.plantilla')
@section('title',"AppStore - Registrarse")
@section('main')
    <article class="article--login">
        <form action="" method="post" class="article--login__form">
            @csrf
            <input type="text" name="name" id="name" class="article--login--form--input" placeholder="Nombre" value="{{old('name')}}">
            
            <input type="text" name="user" id="user-name" class="article--login--form--input" placeholder="Nombre de Usuario">
            @error('username')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror()
            
            <input type="password" name="password" id="password" class="article--login--form--input" placeholder="Contraseña">
            @error('password')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror()
            
            <input type="password" name="confirm" id="confirm" class="article--login--form--input" placeholder="Confirmar contraseña">
            @error('confirm')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror()
            
            <div class="article--register--form__permission">
                <label for="user" class="article--login--form__remember"><input type="radio" name="role" id="user" value="1">Usuario</label>
                <label for="developer" class="article--login--form__remember"><input type="radio" name="role" id="developer" value="0">Desarrollador</label>
            </div>
            @error('role')
                <small id="emailHelp" class="error">{{$message}}</small>
            @enderror()
            <input type="submit" value="Registrarse" class="article--login--form__button margin-top">
            
        </form>
    </article>
@endsection