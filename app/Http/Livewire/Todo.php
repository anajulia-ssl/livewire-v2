<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Todo extends Component
{
    public string $nome;

    protected $listeners = ['mudaai' => 'getNomeDeCima'];

    public function getNomeDeCima($nome)
    {
        $this->nome = $nome;
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
