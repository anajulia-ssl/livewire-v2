<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ListaDeUsuarios extends Component
{
    use WithPagination;

    public ?string $search = null;
    public ?string $searchEmail = null;
    public ?string $sortBy = null;
    public ?string $sortDir = 'asc';
    public ?int $perPage = 5;
    protected $listeners = [
        'user::updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'searchEmail' => ['except' => '', 'as' => 'eq'],
        'perPage' => ['except' => '5', 'as' => 'p'],
        'sortBy' => ['except' => ''],
        'sortDir' => ['except' => 'asc'],
    ];

    public function sort($coluna){
        $this->sortDir = $this->sortDir == 'asc' ? 'desc' : 'asc';
        $this->sortBy = $coluna;
    }

    public function updating(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.lista-de-usuarios',[
            'usuarios' => User::query()
                ->when($this->search, function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->when($this->searchEmail, function (Builder $query) {
                    $query->where('email', 'like', '%' . $this->searchEmail . '%');
                })
                ->when($this->sortBy, function (Builder $query) {
                    $query->orderBy($this->sortBy, $this->sortDir);
                })->paginate($this->perPage)

            ])->layout('layouts.app', ['header' => 'Usuários']);
//            ])->layout('layouts.app'); se fossse só isso, nao precisava colocar pq é padrão
    }
}
