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

            {{-- Comments Form --}}
            <div class="card" my-4>
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            {{-- Single Comment --}}
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat harum aliquid quas, omnis necessitatibus porro error atque voluptatum voluptatem asperiores magnam reiciendis hic et, consectetur iusto deserunt mollitia odit itaque!
                </div>
            </div>
            
            {{-- Comment with nested comments --}}
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quis facilis tempore ab laborum impedit eveniet sint similique odio ullam, ad tempora perferendis iste nisi, laudantium voluptate fugit iusto quidem!</p>

                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias voluptatibus non nostrum nulla, quibusdam vel incidunt, eaque necessitatibus, velit tempora quis explicabo! Veniam iusto quibusdam tempora facilis nulla unde id.</p>
                        </div>
                    </div>

                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum odit eos aspernatur doloremque pariatur consequatur, dolores sapiente, minima repellat officiis quidem voluptate animi laboriosam a eligendi velit nostrum sit! Iusto?</p> 
                        </div>
                    </div>

                </div>
            </div>{{-- Close - Comment  --}}
        </div>
        {{-- /.card-body --}}

        <div class="card-footer">
            <a href="{{route('posts.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div><!-- Close card -->
@endsection