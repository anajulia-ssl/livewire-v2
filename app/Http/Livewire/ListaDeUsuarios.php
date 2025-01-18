<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ListaDeUsuarios extends Component
{
    protected $listeners = [
        'user::updated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.lista-de-usuarios',[
            'usuarios' => User::all()
        ]);
    }
}
