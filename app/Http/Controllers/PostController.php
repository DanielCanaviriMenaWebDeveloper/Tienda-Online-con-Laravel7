<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::orderBy('id',  'DESC')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        /* Solo obtendra las categorias cuyo modulo sea igual a  '1' => 'Blog' */
        $categories = Category::where('module', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        /* dd($categories); */
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required| unique:posts| max:60',
            'abstract'=>'required| max:500',
            'body'=>'required',
            'status'=>'required',
            'user_id'=>'required| integer',
            'category_id'=>'required| integer',
            'image'=> 'required|image|dimensions:min_width=1200, max-width=1200, min-height=490, max-height=490|mimes:jpeg,jpg,png'
        ]);
        
        /* $urlimage = []; */
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $nombre);
            $urlimage['url'] = '/images/'.$nombre;
        }

        $post = new Post;
        
        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);
        $post->abstract = e($request->abstract);
        $post->body = e($request->body);
        $post->status = e($request->status);
        $post->user_id=e($request->user_id);
        $post->category_id=e($request->category_id);
        $post->save();
        $post->image()->create($urlimage);
        return redirect()->route('posts.index')->with('info', 'Publicación creada correctamente');
    }

    public function show($id)
    {
        
        $post = Post::where('id', $id)->with('category', 'user', 'image')->firstOrFail();
        /* dd($post); */
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $categories = Category::where('module', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required| max:60',
            'abstract'=>'required| max:500',
            'body'=>'required',
            'status'=>'required',
            'user_id'=>'required| integer',
            'category_id'=>'required| integer',
            'image'=> 'image|dimensions:min_width=1200, max-width=1200, min-height=490, max-height=490|mimes:jpeg,jpg,png'
        ]);
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta, $nombre);
            $urlimage['url'] = '/images/'.$nombre;
        }

        $post = Post::findOrFail($id);

        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);
        $post->abstract = e($request->abstract);
        $post->body = e($request->body);
        $post->status = e($request->status);
        $post->user_id=e($request->user_id);
        $post->category_id=e($request->category_id);
        
        if($request->hasFile('image')) {
            $post->image()->delete();  
        }

        $post->save();
        if($request->hasFile('image')) {
            $post->image()->create($urlimage);
        }
        
        return redirect()->route('posts.index')->with('info', 'Publicación actualizada correctamente');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return back()->with('info', 'Publicación eliminada con éxito');
    }
}
