<div>
    <h1>Livewire count component</h1>
    <div>
        <x-text-input wire:model="nome" class="text-input-sm" />

        <x-primary-button wire:click="toggle('upper')">UPPER</x-primary-button>
        <x-primary-button wire:click="toggle('lower')">LOWER</x-primary-button>
        <x-primary-button wire:click="send()">SEND TO TO-DO</x-primary-button>
    </div>
</div>
