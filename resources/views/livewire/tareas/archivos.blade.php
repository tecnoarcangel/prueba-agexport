<x-jet-dialog-modal wire:model="showArchivos">
    <x-slot name="title">
        Listado de Documentos
    </x-slot>

    <x-slot name="content">
        
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">Ruta</th>
                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 lg:table-cell"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($this->tarea->archivos))
                            @foreach ($this->tarea->archivos as $archivo )
                            <tr>
                                <td class="px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $archivo }}</td>
                                <td class="px-3 py-3.5 text-center text-sm text-gray-500 lg:table-cell">
                                    <a href="{{ asset('storage/'.$archivo) }}" target="_blank" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd" d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v4.19l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V10.5z" clip-rule="evenodd" />
                                        </svg>       
                                    </a>                               
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showArchivos')" wire:loading.attr="disabled">
            Cerrar
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>