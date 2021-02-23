@extends('layouts.plantilla')
@section('title',"AppStore - {{$category->name}}")
@section('main')
    <h3 class="apps--title">{{$category->name}}</h3>
    <article class="article--apps">
        @foreach ($apps as $app)
            <div class="article--apps__cards">
                <a href="/app/{{$app->id}}"><img src="{{asset("/img/$app->image")}}" alt=""></a>
                <h5><a href="/app/{{$app->id}}">{{$app->name}}</a></h5>
                <p class="article--apps__cards--p">Precio: ${{$app->price}}</p>
            </div>
        @endforeach
    </article>
    <a href="/apps" class="button center">Volver</a>
@endsection