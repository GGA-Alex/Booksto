<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class EditBook extends Component
{
    public $libro;
    public $categories;
    public $editorials;

    protected $rules = [
        'libro.nombre' => 'required|string',
        'libro.isbn' => 'required|string',
        'libro.category_id' => 'required|integer',
        'libro.editorial_id' => 'required|integer',
        'libro.descripcion' => 'required',
        'libro.precio' => 'required',
        'libro.paginas' => 'required|integer',
        'libro.año' => 'required|integer',
        'libro.edicion' => 'required|integer',
    ];
    

    public function mount(){
        $this->categories = Category::all();
        $this->editorials = Editorial::all();
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
