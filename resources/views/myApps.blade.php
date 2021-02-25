@extends('layouts.plantilla')
@section('title',"Mis Apps - AppStore")
@section('main')
<h2 class="myApps__h2">Mis Aplicaciones</h2>
@if(Auth::user()->role == 1)
    <article class="myApps">
        @foreach ($user->appBuy as $app)
            <div class="myApps--div">
                <img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación">
                <h4 class="myApps--div__title"><a href="/app/{{$app->id}}">{{$app->name}}</a></h4>
            </div>  
        @endforeach
    </article>  
    
    @else
    <article class="myApps">
        <a class="myApps__button button" href="/new/app">Nueva aplicación</a>    
        @foreach ($user->appDev as $app)
                           
                <div class="myApps--div--dev">
                    <img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación">
                    <h4 class="myApps--div--dev__title">{{$app->name}}</h4>
                    <a class="myApps--div--dev__button button" href="/update/{{$app->id}}">Modificar</a>
                    <a class="myApps--div--dev__button button" href="/remove/{{$app->id}}">Eliminar</a>
                </div>
             
        @endforeach
    </article>    
        
        
@endif
@endsection