<div>
    <form method="POST" wire:submit.prevent="save">
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input
                wire:model="nome"
                id="name" class="block mt-1 w-full"
                type="text" name="name"/>
            <x-input-error :messages="$errors->get('nome')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input
                wire:model.lazy="email"
                id="email" class="block mt-1 w-full"
                type="text" name="email"
                autocomplete="email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3"
                              wire:target="save"
            >
                <span wire:loading wire:target="save" class="animate-bounce">
                    🔥
                </span>
                {{ __('Save') }}
            </x-primary-button>
        </div>

        @dump($saving)
        <div x-data="{open: @entangle('saving')}">
            <div x-show="open">
                Vai aparecer
            </div>
{{--            <button type="button" x-on:click="$wire.save">Saving 2</button>--}}
            <button type="button" wire:click="save">Saving 2</button>
            <br>
            <button type="button" x-on:click="open = false">Voltar</button>
        </div>
    </form>
</div>
