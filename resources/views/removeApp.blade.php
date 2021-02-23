@extends('layouts.plantilla')
@section('title',"Nueva App - AppStore")
@section('main')
<article class="article--remove">
    <form action="" method="post" class="article--remove__form">
        @csrf
        <h3>¿Seguro desea eliminar <i>{{$app->name}} </i>?</h3>

        <input type="submit" value="Si" class="button article--remove__button">
        <a href="/me/{{Auth::id()}}" class="button article--remove__a">No</a>
    </form>
</article>
@endsection