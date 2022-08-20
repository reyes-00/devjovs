<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="editarVacante">
    <div>
        <x-label for="titulo" :value="__('Titulo Vacante')" />

        <x-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Titulo Vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="salario" :value="__('Salario Mensual')" />

        <select wire:model="salario" id="salario"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus-ring-opacity-50 w-full">
            <option value="">--Selecione Opcion--</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="categoria" :value="__('Categoria')" />

        <select wire:model="categoria" id="categoria"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus-ring-opacity-50 w-full">
            <option value="">--Selecione una Categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="empresa" :value="__('Empresa')" />

        <x-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Ejemplo: Netflix, Uber" />

        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

        <x-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="descripcion_puesto" :value="__('Descripcion del Puesto')" />

        <textarea id="descripcion_puesto" class="block mt-1 w-full h-72" wire:model="descripcion_puesto"
            :value="old('descripcion_puesto')" placeholder="Descripcion del puesto ">
        </textarea>
        @error('descripcion_puesto')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-label for="imagen" :value="__('Imagen Actual')" />

        <x-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />
        <div class="my-5 w-80">
            Imagen Actual: <img src="{{ asset('/storage/vacantes/' . $imagen) }}" alt="Imagen de {{ $titulo }}"
                srcset="">
        </div>

        <div wire:loading wire:target="imagen_nueva" class="mt-2 font-bold text-center">Cargando...</div>
        @if ($imagen_nueva)
            <div class="my-5 w-80">
                Imagen nueva: <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="Imagen de {{ $titulo }}"
                    srcset="">
            </div>
        @endif
        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <x-button> Guardar Cambios</x-button>

</form>
