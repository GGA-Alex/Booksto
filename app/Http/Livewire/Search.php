<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class Search extends Component
{

    public $search;

    public $open = false;

    public function updatedSearch($value){
        if ($value) {
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {
        if($this->search){
            $books = Book::where('nombre','like','%' . $this->search . '%')
                                ->where('status','1')
                                ->take(8)
                                ->get();
        }else{
            $books=[];
        }
        return view('livewire.search',compact('books'));
    }
}
