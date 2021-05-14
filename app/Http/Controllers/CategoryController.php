<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
/* https://laravel.com/docs/7.x/helpers#method-str-slug */
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderBy('id',  'DESC')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        /* https://laravel.com/docs/7.x/validation */
        $request->validate([
            /* Validación para que el campo sea requerido, unico y con un tamaño maximo de 20 caracteres. */
            'name'=>'required| unique:categories| max:20',
            'module'=>'required|max:20',
        ]);

        $category = new Category;
        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('categories.index')->with('info', 'Categoría creada correctamente');
    }

    public function module($module)
    {
        /* Obtiene todos los registros de la tabla categoria los cuales cuyo campo module sea 
        igual al valor recibido en la variable $module. */
        $categories = Category::where('module', $module)->orderBy('id',  'DESC')->paginate(15);
        /* dd($categories); */
        return view('admin.categories.index', compact('categories'));
    }
    
    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        /* Obtiene el primer registro que coincida con el id */
        $category = Category::where('id', $id)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            /* Validación para que el campo sea requerido, unico y con un tamaño maximo de 20 caracteres. */
            'name'=>'required| max:20',
            'module'=>'required|max:20',
        ]);

        $category = Category::findOrFail($id);

        $category->name = e($request->name);
        $category->module = e($request->module);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('info', 'Categoría actualizada correctamente');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return back()->with('info', 'Categoría borrada con éxito');
    }
}
