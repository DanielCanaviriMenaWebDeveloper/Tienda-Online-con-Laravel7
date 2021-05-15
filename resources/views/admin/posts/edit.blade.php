@extends('layouts.admin')

@section('title', 'Editar Subcategoría')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('subcategories.index')}}">Subcategorías</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edición de Subcategorías</h3>
        </div><!-- Close card-header -->

        <!-- Código de Laravel colective que envia el formulário a la ruta especificada mediante el método POST, incluye envío de archivos. -->
        {!! Form::model(
            $subcategory, 
            [
                'route'=>['subcategories.update', $subcategory->id], 
                'method'=>'PUT', 
                'files'=>true
            ]
        ) !!}
        <div class="card-body">
            @include('admin.subcategories.form.form')  
        </div><!-- Close card-body -->
        
        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{route('subcategories.index')}}">Cancelar</a>
            <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
        {!! Form::close() !!}
    </div><!-- Close card -->
@endsection