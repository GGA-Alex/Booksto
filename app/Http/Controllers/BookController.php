<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BookController extends Controller
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
        $books = Book::with('category:id,nombre')->get();
        return view('Booksto.Admin.book.book_index',compact('books'));
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
        $categories = Category::all();
        $editorials = Editorial::all();
        return view('Booksto.Admin.book.book_FormCreate',compact('categories','editorials'));
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
            'nombre' => 'required|string|unique:books',
            'isbn' => 'required|string|unique:books',
            'category_id' => 'required|integer',
            'editorial_id' => 'required|integer',
            'descripcion' => 'required',
            'precio' => 'required|min:0',
            'paginas' => 'required|integer|min:0',
            'año' => 'required|integer|min:1990|max:2020',
            'edicion' => 'required|integer|min:1',
        ]);

        $newBook = new Book();
        $newBook->nombre = $request->nombre;
        $newBook->isbn = $request->isbn;
        $newBook->category_id = $request->category_id;
        $newBook->editorial_id = $request->editorial_id;
        $newBook->descripcion = $request->descripcion;
        $newBook->precio = $request->precio;
        $newBook->paginas = $request->paginas;
        $newBook->año = $request->año;
        $newBook->edicion = $request->edicion;
        $newBook->status = 2;
        $newBook->slug = Str::slug($request->nombre);

        $newBook->save();
        return redirect()->route('libros.edit',$newBook)->with('create','Libro agregado con exito');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $libro)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.book.book_show',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $libro)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        return view('Booksto.Admin.book.book_formEdit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $libro)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $request->validate([
            'nombre' => ['required','string',Rule::unique('books')->ignore($libro->id)],
            'isbn' => ['required','string',Rule::unique('books')->ignore($libro->id)],
            'category_id' => 'required|integer',
            'editorial_id' => 'required|integer',
            'descripcion' => 'required',
            'precio' => 'required',
            'paginas' => 'required|integer',
            'año' => 'required|integer',
            'edicion' => 'required|integer',
        ]);
        
        Book::where('id', $libro->id)->update($request->except('_token','_method'));
        return redirect()->route('libros.edit',$libro)->with('update','Se ha actualizado con exito el libro.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $libro)
    {
        if (!Gate::allows('admin')) {
            abort(403);
        }
        foreach($libro->images as $image){
            Storage::delete([$image->url]);
            $image->delete();
        }
        foreach($libro->authors as $author){
            $libro->authors()->detach($author->id);
        }
        $libro->delete();
        return redirect()->route('libros.index')->with('delete','Se ha eliminado con exito el libro.');
    }

    public function imagenes(Book $libro, Request $request){
        
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $url = Storage::put('public/images', $request->file('file'));
        
        $libro->images()->create([
            'url' => $url
        ]);
    }

}
