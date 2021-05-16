@extends('layouts.admin')
@section('title', 'Detalles Publicación')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('posts.index')}}">Publicaciones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalle de Publicación</h3>
        </div><!-- Close card-header -->

        <div class="card-body">
            <div class="row">
                {{-- Post Content Column--}}
                <div class="col lg-8">
                    {{-- Title --}}
                    <h1 class="mt-1">{{$post->name}}</h1>

                    {{-- Author --}}
                    <p class="load">
                        Redactado por
                        <strong>{{$post->user->name}}</strong>
                    </p>

                    <hr>

                    {{-- Date/Time --}}
                    <p>Publicado el {{$post->updated_at->format('d/m/y')}}</p>

                    <hr>

                    {{-- Preview Image --}}
                    <img class="img-fluid rounded" src="{{$post->image->url}}" alt="Imagen del post">
                
                    {{-- Post Contend --}}
                    <p class="lead">{{$post->abstract}}</p>

                    <p>
                        {!!  htmlspecialchars_decode($post->body) !!}
                    </p>

                    <hr>
                </div>{{-- Close col --}}

                {{-- Sidebar Widget Column --}}
                <div class="col-md-4">
                    {{-- Categories Widget --}}
                    <div class="card my-4">
                        <h5 class="card-header">Categoría</h5>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>{{$post->category->name}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /.card-body --}}

        <div class="card-footer">
            <a href="{{route('posts.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div><!-- Close card -->
@endsection