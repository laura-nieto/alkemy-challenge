@extends('layouts.plantilla')
@section('title',"App - AppsStore")
@section('main')   
    <article class="article--app">
        <img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación">
        <h2 class="article--app__tittle">{{$app->name}}</h2>
        <p class="article--app__description">{{$app->description}}</p>
        <p class="article--app__price">Precio: ${{$app->price}}</p>
        
        @guest
            <button class="article--app__button" id="button--buy">Comprar</button>            
        @endguest

        @if(Auth::check())
            @if(Auth::user()->role == 1)
                @if (!Auth::user()->appBuy->find($app->id))
                    <button class="article--app__button" id="button--buy">Comprar</button>  
                @endif
            @endif
        @endif

        <div class="div--buy">
            <form action="" method="post">
                @csrf
                <h3>¿Desea comprar {{$app->name}}?</h3>
                @if(Auth::check())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="app_id" value="{{$app->id}}">
                    <div class="answer">
                        <button type="submit" class="button" id="buy-yes">Sí</button>
                        <a href="/apps" class="button" id="buy-no">No</a>
                    </div>
                @endif
                @guest
                    <div class="answer">
                        <a href="/login">Iniciar Sesión</a>
                        <a href="/register">Crear Cuenta</a>
                    </div>
                @endguest
            </form>
        </div>
    </article>

    
@endsection