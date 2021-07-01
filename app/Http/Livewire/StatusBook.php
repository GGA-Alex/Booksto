<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusBook extends Component
{
    public $libro,$status;

    public function mount(){
        $this->status = $this->libro->status;
    }

    public function saved(){
        $this->libro->status = $this->status;
        $this->libro->save();
        session()->flash('update', 'El estatus del libro se ha actualizado.');
        return redirect(route('libros.edit',$this->libro));
    }

    public function render()
    {
        return view('livewire.status-book');
    }
}
