<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
/* https://laravel.com/docs/7.x/helpers#method-str-slug */
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::orderBy('id',  'DESC')->paginate(15);
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        /* dd($categories);  */
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required| unique:subcategories| max:20',
        ]);

        $subcategory = new Subcategory;

        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id=e($request->category_id);
        $subcategory->save();
        return redirect()->route('subcategories.index')->with('info', 'Subcategoría creada correctamente');
    }

    public function show(Subcategory $subcategory)
    {
        //
    }

    public function edit($id)
    {
        $subcategory = Subcategory::where('id', $id)->firstOrFail();
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required| max:20',
        ]);

        $subcategory = Subcategory::findOrFail($id);

        $subcategory->name = e($request->name);
        $subcategory->slug = Str::slug($request->name);
        $subcategory->category_id=e($request->category_id);
        $subcategory->save();

        return redirect()->route('subcategories.index')->with('info', 'Subcategoría actualizada correctamente');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id)->delete();
        return back()->with('info', 'Subcategoría eliminada con éxito');
    }
}
