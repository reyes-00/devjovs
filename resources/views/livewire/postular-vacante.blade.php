<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
    @if (session()->has('message'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 text-center font-bold p-2 my-5">
            {{ session('message') }}
        </div>
    @else
        <form action="" class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')" />
                <x-input id="cv" wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
                @error('cv')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>
            <x-button class="my-5">
                {{ __('Postularme') }}
            </x-button>
        </form>
    @endif

</div>
