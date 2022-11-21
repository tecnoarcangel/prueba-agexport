<div>

    <div class="container grid px-6 mx-auto space-y-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tareas
        </h2>
        <div class="flex flex-row space-x-2">
            <div class="flex-1">
                <x-jet-input wire:model="search" type="text" placeholder="Buscar tareas" class="block mt-1 w-full"/>
            </div>
            <div class="flex-1 flex justify-end">
                @can('Crear Usuarios')
                    <x-jet-button wire:click="$toggle('createTarea')" class="py-3"> Crear Nueva Tarea </x-jet-button>
                @endcan
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <x-table class="table-fixed">
                <x-slot name="head">
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('titulo')" :direction=" $sortField === 'titulo' ? $sortDirection : null">Título</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('fecha_inicio')" :direction=" $sortField === 'fecha_inicio' ? $sortDirection : null">Fecha de Inicio</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('fecha_fin')" :direction=" $sortField === 'fecha_fin' ? $sortDirection : null">Fecha de Finalización</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('estado')" :direction=" $sortField === 'estado' ? $sortDirection : null">Estado</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('prioridad')" :direction=" $sortField === 'prioridad' ? $sortDirection : null">Prioridad</x-table.heading>
                    <x-table.heading class="w-1/6" sortable wire:click="sortBy('responsable')" :direction=" $sortField === 'responsable' ? $sortDirection : null">Responsable</x-table.heading>
                    <x-table.heading class="w-1/6"> Opciones </x-table.heading>
                </x-slot>
                <x-slot name="body">
                    @forelse ($tareas as $tarea)
                    <x-table.row wire:loading.class.delay="opacity-50">
                        <x-table.cel>{{$tarea->titulo}}</x-table.cel>
                        <x-table.cel>{{$tarea->fecha_inicio->format('d/m/Y')}}</x-table.cel>
                        <x-table.cel>{{$tarea->fecha_fin->format('d/m/Y')}}</x-table.cel>
                        <x-table.cel>{{$tarea->estado}}</x-table.cel>
                        <x-table.cel>
                            @if ($tarea->prioridad == 1)
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    Alta
                                </span>
                            @elseif  ($tarea->prioridad == 2)
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                    Media
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Baja
                                </span>
                            @endif
                        </x-table.cel>
                        <x-table.cel>{{$tarea->responsable}}</x-table.cel>
                        <x-table.cel>
                            <div class="flex items-center space-x-4 text-sm">
                                @can('Editar Tarea')
                                <button
                                    wire:click="getTarea({{$tarea->id}},'update')"
                                    :maxWidth="2xl"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </button>
                                @endcan
                                @can('Eliminar Tarea')
                                <button
                                    wire:click="getTarea({{$tarea->id}},'delete')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                @endcan
                                <button
                                    wire:click="getTarea({{$tarea->id}},'archivo')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Show">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </x-table.cel>
                    </x-table.row>
                    @empty

                    <x-table.row>
                        <x-table.cel colspan="7">
                            <div class="flex justify-center items-center">
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">Sin Resultados</span>
                            </div>
                        </x-table.cel>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Mostrando {{$tareas->count()}} de {{$tareas->total()}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{$tareas->links()}}
                </span>
            </div>
        </div>
        <div>
            @include('livewire.tareas.notificaciones')
        </div>
        <div>
            @include('livewire.tareas.archivos')
        </div>
        <div>
            @include('livewire.tareas.create')
        </div>
        <div>
            @include('livewire.tareas.update')
        </div>
        <div>
            @include('livewire.tareas.delete')
        </div>
    </div>
</div>
