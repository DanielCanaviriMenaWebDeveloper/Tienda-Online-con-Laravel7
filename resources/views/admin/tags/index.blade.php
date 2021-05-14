@extends('layouts.admin')

@section('title', 'Gestión de etiquetas')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sección de etiquetas</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-tool" href="{{route('tags.create')}}">
                    <h3 class="card-title">Agregar <i class="fas fa-plus"></i></h3>
                </a>
            </div><!-- Close card-tools -->
        </div><!-- Close card-header -->

        <div class="card-body table-responsive p-0"> 
            {{-- <ul class="nav nav-tabs">
                @foreach (getModulesArray() as $module => $item)
                    <li>
                        <a class="nav-link" href="{{route('categories.module', $module)}}">{{$item}}</a>
                    </li>
                @endforeach
            </ul> --}}

            <table class="table table-head-fixed">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td scope="row">{{$tag->id}}</td>

                        <td>{{$tag->name}}</td>
                        <td>{{$tag->category_id}}</td>
                        <td width="10px">
                            <a class="btn btn-info" href="{{route('tags.edit', $tag->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>

                        <td width="10px">
                            {!! Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) !!}
                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- Close table -->

            {{ $tags->render() }}
        </div><!-- Close card-body -->

        <div class="card-footer">
            Footer
        </div>
    </div><!-- Close card -->
@endsection
