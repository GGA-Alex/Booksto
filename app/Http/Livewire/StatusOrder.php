<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusOrder extends Component
{
    public $ordenes_usuario, $status;

    public function mount(){
        $this->status = $this->ordenes_usuario->status;
    }

    public function saved(){
        if($this->status < $this->ordenes_usuario->status){
            session()->flash('delete', 'Error al cambiar el status de la orden, seleccione una valida.');
            return redirect(route('ordenes-usuario.edit',$this->ordenes_usuario));
        }else{
            $this->ordenes_usuario->status = $this->status;
            $this->ordenes_usuario->save();
            session()->flash('create', 'El estatus de la orden se ha actualizado con exito.');
            return redirect(route('ordenes-usuario.edit',$this->ordenes_usuario));
        }
    }

    public function render()
    {
        return view('livewire.status-order');
    }
}
