<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;


class AddAuthor extends Component
{
    public $libro;
    public $authors;
    public $author_id="";

    protected $rules = [
        'author_id' => 'required|min:0',
    ];

    protected $listeners=['delete'];

    public function mount(){
        $this->authors = Author::all();
    }

    public function save(){
        $this->validate($this->rules);
        if($this->libro->authors->where('id',$this->author_id)->count() == 0){
            $this->libro->authors()->attach($this->author_id);
            $this->libro = $this->libro->fresh();
        }
        $this->author_id = "";
    }

    public function delete($pivot){
        $this->libro->authors()->detach($pivot);
        $this->libro = $this->libro->fresh();
    }

    public function render()
    {
        $autores = $this->libro->authors;
        return view('livewire.add-author',compact('autores'));
    }
}
