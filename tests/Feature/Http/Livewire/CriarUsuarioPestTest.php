<?php

use App\Http\Livewire\CriarUsuario;
use Livewire\Livewire;

test('component can render', function (){
    Livewire::test(CriarUsuario::class)
        ->assertSuccessful();
});

it('should be able to create an user', function (){
    Livewire::test(CriarUsuario::class)
        ->set('nome', 'Jeremias')
        ->set('email', 'jeremias@email.com')
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('users', [
        'name' => 'Jeremias',
        'email' => 'jeremias@email.com'
    ]);
});

test('name should be required', function (){
    Livewire::test(CriarUsuario::class)
        ->set('nome', null)
        ->call('save')
        ->assertHasErrors([ 'nome' => 'required' ]);
});

it('should make sure that live validation is working', function (){
    Livewire::test(CriarUsuario::class)
        ->set('nome', 'Jeremias')
        ->assertHasNoErrors()
        ->set('nome','')
        ->assertHasErrors([ 'nome' => 'required' ]);
});

it('should emit an event after creating', function (){
    Livewire::test(CriarUsuario::class)
        ->set('nome', 'Jeremias')
        ->set('email', 'jeremias@email.com')
        ->call('save')
        ->assertHasNoErrors()
        ->assertEmitted('user::created');
});

it('should make sure that the form is being reset', function (){
    Livewire::test(CriarUsuario::class)
        ->set('nome', 'Jeremias')
        ->set('email', 'jeremias@email.com')
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('nome', '')
        ->assertSet('email', '');
});

it('should check the html if has a certain message', function () {
    Livewire::test(CriarUsuario::class)
        ->set('nome', 'Teste')
        ->set('email', 'teste@email.com')
        ->call('save')
        ->assertSee('Deixe os testes pro ambiente de teste');
});
