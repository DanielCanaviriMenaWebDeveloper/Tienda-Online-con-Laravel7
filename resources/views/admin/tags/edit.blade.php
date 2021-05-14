@extends('layouts.admin')

@section('title', 'Editar Etiqueta')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('tags.index')}}">Etiquetas</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edición de Etiquetas</h3>
        </div><!-- Close card-header -->

        {!! Form::model(
            $tag, 
            [
                'route'=>['tags.update', $tag->id], 
                'method'=>'PUT', 
                'files'=>true
            ]
        ) !!}
        <div class="card-body">
            @include('admin.tags.form.form')  
        </div><!-- Close card-body -->
        
        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{route('tags.index')}}">Cancelar</a>
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div><!-- Close card -->
@endsection