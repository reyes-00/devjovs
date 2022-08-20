<div>
    @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="font-bold text-sm text-gray-600">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">{{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a href="{{ route('candidatos.index', $vacante) }}"
                    class="bg-slate-800 py-2 px-4 rounded text-white text-xs font-bold uppercase text-center">{{ $vacante->candidatos->count() }}
                    Candidatos</a>
                <a
                    href="{{ route('vacantes.edit', $vacante->id) }}"class="bg-blue-800 py-2 px-4 rounded text-white text-xs font-bold uppercase text-center">Editar</a>
                <button wire:click="$emit('mostrarAlerta',{{ $vacante->id }})"
                    class="bg-red-600 py-2 px-4 rounded text-white text-xs font-bold uppercase text-center">Eliminar</button>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600 text-sm">Aun no hay vacantes</p>
    @endforelse

    <div class="flex justify-center mt-5">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: 'Eliminar Vacante?',
                text: "Estas seguro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminalo!'
                // cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar vacante
                    Livewire.emit('eliminarVacante', vacanteId)
                    Swal.fire(
                        'Eliminado!',
                        'Se elimino correctamente',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
