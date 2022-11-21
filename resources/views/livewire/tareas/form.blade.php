<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Título</span>
        <x-jet-input wire:model="tarea.titulo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Título" />
        @error('tarea.titulo')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Descripción</span>
        <textarea wire:model="tarea.descripcion" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Descripción" />
        </textarea>
        @error('tarea.descripcion')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <div class="grid grid-cols-2 gap-2">
        <div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Fecha de Inicio</span>
                <x-jet-input type="date" wire:model="tarea.fecha_inicio" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre Completo" />
                @error('tarea.fecha_inicio')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{$message}}
                </span>
                @enderror
            </label>
        </div>

        <div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Fecha de Finalización</span>
                <x-jet-input type="date" wire:model="tarea.fecha_fin" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nombre Completo" />
                @error('tarea.fecha_fin')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{$message}}
                </span>
                @enderror
            </label>
        </div>
    </div>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Documentos</span>
        <x-jet-input wire:model="tarea.archivos" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" multiple/>
        @error('tarea.archivos')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

    <div class="grid grid-cols-2 gap-2">
        <div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Estado
                </span>
                <x-select wire:model="tarea.estado" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="Completada">Completada</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Finalizada">Finalizada</option>
                </x-select>
            </label>
        </div>

        <div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Prioridad
                </span>
                <x-select wire:model="tarea.prioridad" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="1">Alta</option>
                    <option value="2">Media</option>
                    <option value="3">Baja</option>
                </x-select>
            </label>
        </div>
    </div>


    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Responsable</span>
        <x-jet-input wire:model="tarea.responsable" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Responsable" />
        @error('responsable')
        <span class="text-xs text-red-600 dark:text-red-400">
            {{$message}}
        </span>
        @enderror
    </label>

</div>