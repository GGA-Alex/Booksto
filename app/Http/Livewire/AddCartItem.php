<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $book;
    public $option = [];

    public function mount()
    {
        $this->option['image'] = Storage::url($this->book->images->first()->url);
    }

    public function addItem()
    {
        Cart::add(
            [
                'id' => $this->book->id,
                'name' => $this->book->name,
                'qty' => 1,
                'price' => $this->book->price,
                'weight' => 0,
                'options' => $this->option
            ]
        );
        $this->emitTo('drop-down-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
