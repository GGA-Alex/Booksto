<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Image;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class EditBook extends Component
{
    public $libro;
    public $categories;
    public $editorials;
    public $authors;

    protected $rules = [
        'libro.nombre' => 'required|string',
        'libro.isbn' => 'required|string',
        'libro.category_id' => 'required|integer',
        'libro.editorial_id' => 'required|integer',
        'libro.descripcion' => 'required',
        'libro.precio' => 'required',
        'libro.paginas' => 'required|integer',
        'libro.año' => 'required|integer',
        'libro.edicion' => 'required|integer'
    ];
    
    protected $listeners=['refreshBook'];

    public function mount(){
        $this->categories = Category::all();
        $this->editorials = Editorial::all();
        $this->authors = Author::all();
    }

    public function refreshBook(){
        $this->libro = $this->libro->fresh();
    }

    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();
        $this->libro = $this->libro->fresh();
    }

    public function render()
    {
        return view('livewire.edit-book');
    }
}
