@extends('layouts/admin')

@section('title', 'Crear Etiqueta')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('tags.index')}}">Etiquetas</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Etiquetas</h3>
        </div>

        {!! Form::open(['route'=>'tags.store', 'method'=>'POST',  'files'=> true]) !!}
        <div class="card-body">
            @include('admin.tags.form.form')
        </div>

        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{route('tags.index')}}">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        {!! Form::close() !!}
    </div>
@endsection
