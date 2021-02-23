@extends('layouts.plantilla')
@section('title',"AppStore")
@section('main')
    <section>
        <h2 class="welcome">Bienvenido 
            @guest
            @else
                {{Auth::user()->name}}
            @endguest
        </h2>
        
        <article class="category">
            <h3>Categorías:</h3>
            <ul class="category--ul">
                @foreach ($categorias as $categoria)
                    <li class="category--ul__li"><a href="/apps/{{$categoria->name}}">{{$categoria->name}}</a></li>
                @endforeach
            </ul>
        </article>
        
        <article class="article">
            <h3>Las últimas novedades:</h3>
            @foreach ($apps as $app)
                <div class="article--cards">
                    <a href="/app/{{$app->id}}"><img src="{{asset("/img/$app->image")}}" alt="Imágen de la aplicación" class="article--cards__img"></a>
                    <h6><a href="/app/{{$app->id}}">{{$app->name}}</a></h6>
                </div>
            @endforeach
            
            <button class="see-more"><a href="/apps">Ver más</a></button>
        </article>
        
    </section>
@endsection