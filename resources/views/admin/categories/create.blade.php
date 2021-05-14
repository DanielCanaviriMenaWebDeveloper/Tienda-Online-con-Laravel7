@extends('layouts/admin')

@section('title', 'Crear Categoría')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('categories.index')}}">Categorías</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registro de Categoría</h3>
        </div>

        {!! Form::open(['route'=>'categories.store', 'method'=>'POST',  'files'=> true]) !!}
        <div class="card-body">
            @include('admin.categories.form.form')
        </div>

        <div class="card-footer">
            <a class="btn btn-danger float-right" href="{{route('categories.index')}}">Cancelar</a>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        {!! Form::close() !!}
    </div>
@endsection
