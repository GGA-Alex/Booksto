<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsuarioForm extends Component
{
    public $usuario;
    
    protected $rules = [
        'usuario.tipo' => 'required|string',
    ];
    
    public function render()
    {
        return view('livewire.usuario-form');
    }
}
