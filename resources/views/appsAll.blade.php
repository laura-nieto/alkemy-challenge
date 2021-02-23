@extends('layouts.plantilla')
@section('title','Aplicaciones - AppsStore')
@section('main')
    
    <article class="category">
        <h3>Categorías:</h3>
        <ul class="category--ul">
            @foreach ($categories as $category)
                <li class="category--ul__li"><a href="/apps/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </article>
    <article class="article--apps">
        @foreach ($apps as $app)
            <div class="article--apps__cards">
                <a href="/app/{{$app->id}}"><img src="{{asset("/img/$app->image")}}" alt=""></a>
                <h5><a href="/app/{{$app->id}}">{{$app->name}}</a></h5>
                <p>{{$app->category->name}}</p>
                <p class="article--apps__cards--p">Precio: ${{$app->price}}</p>
            </div>
        @endforeach
    </article>
    {{$apps->links()}}
@endsection