<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Count extends Component
{
    public string $nome = 'Ana';

    public function getLastNameProperty(): string
    {
        return "ANA";
    }

    public function toggle(string $tipo): void
    {
        $this->nome = str($this->nome)->$tipo();
    }

    public function send(): void
    {
        $this->emitTo(
            Todo::class,
            'mudaai', $this->nome
        );
    }

    public function render(): View
    {
        return view('livewire.count');
    }
}
