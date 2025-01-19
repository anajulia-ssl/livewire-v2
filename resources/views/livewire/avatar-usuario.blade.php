<div>

    <form wire:submit.prevent="save">
        <div>
            <x-input-label for="avatar" :value="__('Avatar')"/>
            <x-text-input
                wire:model="avatar"
                id="avatar" class="block mt-1 w-full"
                type="file" name="avatar"/>
            <x-input-error :messages="$errors->get('avatar')" class="mt-2"/>
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-secondary-button wire:click="download" title="Clique para baixar o avatar atual">
                Download
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>
