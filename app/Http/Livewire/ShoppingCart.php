<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{

    protected $listeners = ['render'];

    public function destroy()
    {
        Cart::destroy();
        $this->emitTo('drop-down-cart', 'render');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
