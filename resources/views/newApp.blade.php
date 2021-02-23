@extends('layouts.plantilla')
@section('title',"Nueva App - AppStore")
@section('main')
<article class="article--login">
    <form action="" method="post" enctype="multipart/form-data" class="article--login__form">
        @csrf
        <select name="category_id" id="categories" class="article--add__select">
            <option selected>-- Categoría --</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
          
        <input type="text" name="name" id="name" class="article--login--form--input" placeholder="Nombre de la aplicación" value="{{old('name')}}">
        @error('name')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()
        
        <input type="text" name="price" id="price" class="article--login--form--input" placeholder="Precio" value="{{old('price')}}">
        @error('price')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()
        
        <textarea name="description" id="description" rows="5" cols="50" class="margin-top input--text" placeholder="Descripción de la aplicación" autocapitalize="sentences"></textarea>
        @error('description')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()
        
        <input type="file" name="image" id="image" class="margin-top input--file">
        @error('image')
            <small id="emailHelp" class="error">{{$message}}</small>
        @enderror()

        <input type="submit" value="Crear aplicación" class="article--login--form__button margin-top">
        
    </form>
</article>
@endsection