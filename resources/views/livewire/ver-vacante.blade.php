<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-2xl text-gray-600 my-3">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-5 my-10">
            <p>Empresa:
                <span class="font-bold">{{ $vacante->empresa }}</span>
            </p>
            <p>Ultimo dia para postularse:
                <span class="font-bold">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>
            <p>Categoria:
                <span class="font-bold">{{ $vacante->categoria->categoria }}</span>
            </p>
            <p>Salario
                <span class="font-bold">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ $vacante->titulo }}" srcset="">
        </div>
        <div class="md:col-span-4 p-2">
            <h2 class="font-bold text-xl mb-5 ">Descripcion del puesto:</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-10 bg-gray-200 text-center p-5 rounded shadow-lg">
            Deseas aplicar a esta vacante?
            <a href="{{ route('register') }}" class="text-indigo-600 font-bold">Obten una cuenta y aplica a esta o varias
                vacantes </a>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot

</div>
