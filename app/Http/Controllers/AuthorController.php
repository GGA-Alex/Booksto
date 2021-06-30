<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Image;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
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
        session()->flash('flash.banner','Esto es un mensaje flash');
        $authors = Author::with('images:imageable_id,imageable_type,url','books')->get();
        return view('Booksto.Admin.author.author_index', compact('authors'));
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
        return view('Booksto.Admin.author.author_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nombre' => 'required|string|min:10|unique:authors',
            'pais' => 'required|string|min:5',
        ]);

        $newAuthor = new Author();
        $newAuthor->nombre = $request->nombre;
        $newAuthor->pais = $request->pais;
        $newAuthor->slug = Str::slug($request->nombre);

        $newAuthor->save();

        return redirect()->route('autores.index')->with('create','Autor agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $autore)
    {
        return view('Booksto.Admin.author.author_show',compact('autore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('Booksto.Admin.author.author_form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $autore)
    {
        foreach($autore->images as $image){
            Storage::delete([$image->url]);
            $image->delete();
        }
        $autore->delete();
        return redirect()->route('autores.index')->with('delete','Se ha eliminado con exito el autor.');
    }

    public function libros(Author $autor){
        return view('Booksto.Admin.author.author_books',compact('autor'));
    }
}
