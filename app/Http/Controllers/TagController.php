<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id',  'DESC')->paginate(15);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.tags.create', compact('categories'));
    }

    public function store(Request $request)
    {
        /* https://laravel.com/docs/7.x/validation */
        $request->validate([
            'name'=>'required| unique:tags| max:20',
        ]);

        $tag = new Tag;
        $tag->name = e($request->name);
        $tag->slug = Str::slug($request->name);
        $tag->category_id=e($request->category_id);
        $tag->save();
        return redirect()->route('tags.index')->with('info', 'Etiqueta creada correctamente');
    }

    /* public function module($module)
    {
        $tags = Tag::where('module', $module)->orderBy('id',  'DESC')->paginate(15);
        return view('admin.tags.index', compact('tags'));
    } */
    
    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.tags.edit', compact('tag', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required| max:20',
        ]);

        $tag = Tag::findOrFail($id);

        $tag->name = e($request->name);
        $tag->slug = Str::slug($request->name);
        $tag->category_id=e($request->category_id);
        $tag->save();

        return redirect()->route('tags.index')->with('info', 'Etiqueta actualizada correctamente');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id)->delete();
        return back()->with('info', 'Etiqueta eliminada con éxito');
    }
}
