<?php

namespace App\Http\Livewire;

use App\Rules\CustomRule;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class CriarUsuario extends Component
{
    public string $nome = '';
    public string $email = '';
//    protected array $rules = [
//        'nome' => ['required', 'min:3', 'max:255'],
//        'email' => ['required', 'email', 'max:255'],
//    ];

    protected function rules()
    {
        return [
            'nome' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
//            'email' => ['required', 'email', 'max:255', new CustomRule()],
        ];

    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function save()
    {
        $this->validate();
        if($this->nome === 'Teste'){
            $this->addError('nome', 'Deixe os testes pro ambiente de teste');
        }
    }

    public function render()
    {
        return view('livewire.criar-usuario');
    }
}
