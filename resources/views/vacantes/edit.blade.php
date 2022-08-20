<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  border-gray-200 my-10">
                    <h1 class="font-bold text-center uppercase text-2xl ">Editar: {{ $vacante->titulo }}</h1>
                </div>
                <div class="md:flex md:justify-center p-5">
                    <livewire:editar-vacante :vacante="$vacante" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
