<div>
    <x-text-input wire:model="text"></x-text-input>
    @error('text')
        <span class="text-red-400 font-bold font-mono">
            {{ $message }}
        </span>
    @enderror
</div>
