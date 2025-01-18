<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditarUsuario extends Component
{
    public $show = false;
    public ?User $usuario = null;

    public function edit()
    {
        $this->usuario->name = fake()->name;
        $this->usuario->save();

        $this->emitUp('user::updated');
        $this->show = false;
    }

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
    }

    public function render()
    {
        return view('livewire.editar-usuario');
    }
}
