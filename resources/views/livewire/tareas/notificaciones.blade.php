<x-jet-dialog-modal wire:model="showNotificaciones">
    <x-slot name="title">
        Tareas Próximas a vencer
    </x-slot>

    <x-slot name="content">
        
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">Descripción</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell">Fecha de Vencimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($tareas_por_vencer))
                            @foreach ($tareas_por_vencer as $tarea )
                            <tr>
                                <td class="px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $tarea->descripcion }}</td>
                                <td class="px-3 py-3.5 text-center text-sm text-gray-500 lg:table-cell">{{ $tarea->fecha_fin->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showNotificaciones')" wire:loading.attr="disabled">
            Cerrar
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>