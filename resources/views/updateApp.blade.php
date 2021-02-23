@extends('layouts.plantilla')
@section('title',"Nueva App - AppStore")
@section('main')
<article class="article--login">
    <form action="" method="post" enctype="multipart/form-data" class="article--login__form">
        @csrf
        <h2 class="updateApp__h2">{{$app->name}}</h2>
        
        <h3 class="updateApp__h3">Imagen actual:</h3>
        <img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación" class="updateApp__img" value="{{$app->image}}">
        
        <input type="file" name="image" id="image" class="margin-top input--file">
        @error('image')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()

        <input type="text" name="price" id="price" class="article--login--form--input" placeholder="Precio: ${{$app->price}}" value="{{$app->price}}">
        @error('price')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()
        
        <textarea name="description" id="description" rows="5" cols="50" class="margin-top input--text">{{$app->description}}</textarea>
        @error('description')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()
        

        <input type="submit" value="Actualizar aplicación" class="article--login--form__button margin-top">
    </form>
</article>

<a href="/me/{{Auth::id()}}" class="button center">Volver</a>
@endsection