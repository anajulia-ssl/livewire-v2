<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CriarUsuario extends Component
{
    public ?string $nome = '';
    public ?string $email = '';
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

        User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'password' => 'senha123',
        ]);

        $this->emit('user::created');
        $this->reset('nome', 'email');
    }

    public function render()
    {
        return view('livewire.criar-usuario');
    }
}
