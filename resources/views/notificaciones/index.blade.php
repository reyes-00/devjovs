<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center text-2xl my-10 font-bold ">Mis notificaciones</h1>
                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p>Tienes un nuevo candidato en:
                                    <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                </p>
                                <p class="text-gray-600 font-bold text-sm">
                                    {{ $notificacion->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                    class="bg-indigo-500 text-white p-2 rounded font-bold text-sm">Ver
                                    candidatos</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray ">No hay notificaciones</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
