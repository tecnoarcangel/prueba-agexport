<x-jet-confirmation-modal wire:model="deleteTarea">
    <x-slot name="title">
        Eliminar tarea "{{$this->tarea->titulo ?? ''}}"
    </x-slot>

    <x-slot name="content">
        ¿Estás seguro de eliminar esta tarea?
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button  wire:click="$toggle('deleteTarea')" wire:loading.attr="disabled">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete"  wire:loading.attr="disabled">
            Eliminar
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>