@extends('layouts.plantilla')
@section('title',"App - AppsStore")
@section('main')   
    <article class="article--app">
        <img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación">
        <h2 class="article--app__tittle">{{$app->name}}</h2>
        <p class="article--app__description">{{$app->description}}</p>
        <p class="article--app__price">Precio: ${{$app->price}}</p>
        
        @guest
            <button class="article--app__button">Comprar</button>            
        @endguest
        
        @if(Auth::check())
            @if(Auth::user()->permission == 1)
                <button class="article--app__button">Comprar</button>            
            @endif
        @endif

    </article>
@endsection