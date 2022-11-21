<x-jet-dialog-modal wire:model="updateTarea">
    <x-slot name="title">
        Editar Usuario
    </x-slot>

    <x-slot name="content">
        @include('livewire.tareas.form')
        @if ($errors->any())
            <div>
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('updateTarea')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
            Actualizar
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>