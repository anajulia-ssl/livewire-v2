<div>
    <h1>Usuarios</h1>

    <div class="my-4">
        <x-text-input wire:model="search" placeholder="Pesquisar nome" ></x-text-input>
        <x-text-input wire:model="searchEmail" placeholder="Pesquisar email" ></x-text-input>
        <select class="text-black" wire:model="perPage">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="50">50</option>
        </select>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 cursor-pointer"
                    wire:click="sort('name')"
                >
                    Nome
                    @if($sortBy == 'name')
                        @if($sortDir == 'asc')
                            ⬇
                        @else
                            ⬆
                        @endif
                    @endif
                </th>
                <th scope="col" class="px-6 py-3 cursor-pointer"
                    wire:click="sort('email')"
                >
                    E-mail
                    @if($sortBy == 'email')
                        @if($sortDir == 'asc')
                            ⬇
                        @else
                            ⬆
                        @endif
                    @endif
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $usuario->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $usuario->email }}
                    </td>
                    <td class="px-6 py-4">
                        <livewire:editar-usuario :usuario="$usuario" wire:key="edit-user-{{ $usuario->id }}"/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $usuarios->links() }}
</div>
