<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <h3 class="text-2xl ">Candidatos al puesto de:
                            <span class="font-bold">
                                {{ $vacante->titulo }}
                            </span>
                        </h3>
                    </div>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y w-full divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                        <p class="text-sm font-medium text-gray-500">{{ $candidato->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-500">
                                            Dia que se postulo: {{ $candidato->user->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ asset('storage/cv/' . $candidato->cv) }}"
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                            target="_blank" rel="noreferrer noopener">Ver
                                            CV</a>
                                    </div>
                                </li>
                            @empty
                                <p class="text-center p-3 text-sm text-gray-500">No hay candidatos aun</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
