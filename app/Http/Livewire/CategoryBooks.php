<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryBooks extends Component
{
    public $category;

    public $books = [];

    public function loadPosts(){
        $this->books = $this->category->books()->where('status','1')->take(10)->get();
        
        $this->emit('glider',$this->category->id);
    }

    public function render()
    {
        return view('livewire.category-books');
    }
}
