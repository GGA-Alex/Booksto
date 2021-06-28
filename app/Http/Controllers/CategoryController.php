<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $categorias = Category::all();
        return view('Booksto.Admin.category.category_index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.category.category_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|min:5|max:255|unique:categories,nombre',
            'descripcion' => 'required|string|min:20|max:2000'
        ]);

        $newCategory = new Category();
        $newCategory->nombre = $request->nombre;
        $newCategory->descripcion = $request->descripcion;
        $newCategory->slug = Str::slug($request->nombre);
        $newCategory->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoria)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.category.category_show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categoria)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.category.category_form', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'nombre' => ['required','string','min:5','max:255',Rule::unique('categories')->ignore($categoria->nombre)],
            'descripcion' => 'required|string|min:20|max:2000'
        ]);
        
        Category::where('id', $categoria->id)->update($request->except('_token','_method'));
        return redirect()->route('categorias.show',$categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
