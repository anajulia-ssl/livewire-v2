<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class Hello extends Component
{
    public ?string $text = '';
    protected array $rules = [
        'text' => 'required'
    ];

    public function render()
    {
        return view('livewire.hello');
    }

    public function boot()
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
    }
    public function booted()
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
    }

    public function mount()
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
    }

    public function hydrate()
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
    }
    public function dehydrate()
    {

    }

    public function updating()
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
    }
    public function updated($prop, $valor)
    {
        Debugbar::info(__METHOD__ . '::' . now()->toString());
        $this->validateOnly($prop);
    }
}
