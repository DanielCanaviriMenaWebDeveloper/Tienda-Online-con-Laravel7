@extends('layouts.admin')

@section('title', 'Editar Publicación')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('posts.index')}}">Publicaciones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edición de Publicación</h3>
        </div><!-- Close card-header -->

        <!-- Código de Laravel colective que envia el formulário a la ruta especificada mediante el método POST, incluye envío de archivos. -->
        {!! Form::model(
            $post, 
            [
                'route'=>['posts.update', $post->id], 
                'method'=>'PUT', 
                'files'=>true
            ]
        ) !!}
        <div class="card-body">
            @include('admin.posts.form.form')  

            <div class="card bg-dark text-white">
                <img src="{{ $post->image->url }}" alt="Card image" class="card-img">
                <div class="card-img-overlay">
                    <h5 class="card-title">Imagen de publicación</h5>
                </div>
            </div>
        </div><!-- Close card-body -->
        
        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{route('posts.index')}}">Cancelar</a>
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div><!-- Close card -->
@endsection