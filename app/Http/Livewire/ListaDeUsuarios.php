<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListaDeUsuarios extends Component
{
    public ?string $search = null;

    protected $listeners = [
        'user::updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
    ];

    public function render()
    {
        return view('livewire.lista-de-usuarios',[
            'usuarios' => User::query()
                ->when($this->search, function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })->get()
//                ->when($this->search, fn (Builder $q) => $q->where('name', 'like', '%' . $this->search . '%'))
        ]);
    }
}
