<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EditorialController extends Controller
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
        $editoriales = Editorial::all();
        return view('Booksto.Admin.editorial.editorial_index', compact('editoriales'));
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
        return view('Booksto.Admin.editorial.editorial_form');
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
            'nombre' => 'required|string|min:5|max:255|unique:editorials',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'email' => 'required|email|min:12|max:255|unique:editorials',
            'ciudad' => 'required|string|max:255'
        ]);

        $newEditorial = new Editorial();
        $newEditorial->nombre = $request->nombre;
        $newEditorial->direccion = $request->direccion;
        $newEditorial->telefono = $request->telefono;
        $newEditorial->email = $request->email;
        $newEditorial->ciudad = $request->ciudad;
        $newEditorial->slug = Str::slug($request->nombre);
        $newEditorial->save();

        return redirect()->route('editoriales.index')->with('create','Editorial agregada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function show(Editorial $editoriale)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.editorial.editorial_show', compact('editoriale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Editorial $editoriale)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.editorial.editorial_form',compact('editoriale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editorial $editoriale)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }

        $request->validate([
            'nombre' => ['required','string','min:5','max:255',Rule::unique('editorials')->ignore($editoriale->id)],
            'direccion' => 'string|max:255',
            'telefono' => 'required|string|max:10',
            'email' => ['required','email','min:12','max:255',Rule::unique('editorials')->ignore($editoriale->id)],
            'ciudad' => 'required|string|max:255'
        ]);

        Editorial::where('id', $editoriale->id)->update($request->except('_token','_method'));

        return redirect()->route('editoriales.index')->with('update','Editorial actualizada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editorial $editoriale)
    {
        $editoriale->delete();
        return redirect()->route('editoriales.index')->with('delete','Editorial eliminada con exito.');
    }

    public function libros(Editorial $editorial){
        return view('Booksto.Admin.editorial.editorial_books',compact('editorial'));
    }
}
