<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AuthorForm extends Component
{
    public $autore;

    protected $rules = [
        'autore.nombre' => 'required|string|min:10|unique:authors',
        'autore.pais' => 'required|string|min:5',
    ];

    protected $listeners=['refreshAutor'];

    public function refreshAutor(){
        $this->autore = $this->autore->fresh();
    }

    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();
        $this->autore = $this->autore->fresh();
    }

    public function render()
    {
        return view('livewire.author-form');
    }
}
