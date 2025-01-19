<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarUsuario extends Component
{
    use WithFileUploads;

    public $avatar;

    public function save()
    {
        $caminho = $this->avatar->store('public');
        $usuario = auth()->user();
        $usuario->avatar = $caminho;
        $usuario->save();
    }

    public function download()
    {
        Debugbar::info(auth()->user());
        return response()->download(
            storage_path('app/' . auth()->user()->avatar)
        );
        //return Storage::download(
        //  auth()->user()->avatar
        //);
    }

    public function render()
    {
        return view('livewire.avatar-usuario');
    }
}
