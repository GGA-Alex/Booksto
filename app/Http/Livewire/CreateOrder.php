<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Municipality;
use App\Models\State;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class CreateOrder extends Component
{
    public $contact, $phone, $address, $reference;

    public $states, $municipalities=[];

    public $state_id="", $municipality_id="";
    
    public $rules =[
        'contact' => 'required',
        'phone' => 'required|max:10',
        'state_id' => 'required',
        'municipality_id' => 'required',
        'address' => 'required|min:10',
        'reference' => 'required|min:15',
    ];

    public function updatedStateId($value){
        $this->municipalities = Municipality::where('state_id',$value)->get();
    }

    public function create_order(){
        $this->validate($this->rules);

        $order = new Order();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();
        $order->address = $this->address;
        $order->reference = $this->reference;
        $order->state_id = $this->state_id;
        $order->municipality_id = $this->municipality_id;


        $order->save();

        Cart::destroy();

        return redirect()->route('orden.show',$order);
    }

    public function mount(){
        $this->states = State::all();
    }
    


    public function render()
    {
        return view('livewire.create-order');
    }
}
