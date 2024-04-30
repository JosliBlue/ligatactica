@extends('layouts.html')

@section('tittle', 'Partidos | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')
    @vite('resources/css/_partials/formulario.css')

    @vite('resources/css/admin_games.css')
@endsection

@section('content')
    @component('_components._partials.preload')
    @endcomponent

    @component('_components.admin_header')
    @endcomponent

    @if (session('successMessage'))
        @component('_components._partials.sweetAlert')
            @slot('icon', 'success')
            @slot('message')
                {{ session('successMessage') }}
            @endslot
        @endcomponent
    @endif
    @if (session('errorMessage'))
        @component('_components._partials.sweetAlert')
            @slot('icon', 'error')
            @slot('message')
                {{ session('errorMessage') }}
            @endslot
        @endcomponent
    @endif

    <div class="contenido_padre">
        <section class="container_new_game">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nuevo partido')
                        @slot('despliegue_content')
                            <form action="{{ route('admin_new_game') }}" method="POST">
                                @csrf
                                <div class="grid-container">
                                    <div class="input-container">
                                        <label for="fecha" class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha y
                                            hora:</label>
                                        <div class="grupo_inputs">
                                            <i class="fa-regular fa-calendar"></i>
                                            <input required type="datetime-local" id="fecha" name="fecha"
                                            @if ($activeSeason)
                                            min="{{ date('Y-m-d\TH:i:s', strtotime($activeSeason->fecha_inicio)) }}"
                                            max="{{ date('Y-m-d\TH:i:s', strtotime($activeSeason->fecha_fin)) }}"
                                        @endif
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label for="location"
                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">Ubicación:</label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-map-marker-alt"></i>
                                            <select required id="location" name="location_id"
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                <option value="">-- Selecciona una ubicación --</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->barrio }} | {{ $location->calle_1 }} y
                                                        {{ $location->calle_2 }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-container">
                                    <div class="input-container">
                                        <label for="division_1_id"
                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">División
                                            1:</label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-users"></i>
                                            <select required id="division_1_id" name="division_1_id"
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                <option value="">-- Selecciona una división --</option>
                                                @foreach ($activeDivisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->team->nombre }} |
                                                        {{ $division->rango }} |
                                                        {{ $division->tipo }} | {{ $division->genero }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label for="division_2_id"
                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">División
                                            2:</label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-users"></i>
                                            <select required id="division_2_id" name="division_2_id"
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                <option value="">-- Selecciona otra división --</option>
                                                @foreach ($activeDivisions as $division)
                                                    <option value="{{ $division->id }}">{{ $division->team->nombre }} |
                                                        {{ $division->rango }}
                                                        |
                                                        {{ $division->tipo }} | {{ $division->genero }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="boton_container flex">
                                    <button id="submitButton" class="submitButton" type="submit">Registrar</button>
                                </div>
                            </form>




                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        <section class="container_show_games">
            <section class="container_show_users">
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="conteinersito overflow-hidden dark:border-gray-700 md:rounded-lg">
                                <table class="tablita min-w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Ubicación</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Fecha y Hora</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                División 1</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                División 2</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Resultado 1</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Resultado 2</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Estado</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach ($games as $game)
                                            <tr>
                                                <td
                                                    class="numerito py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $startNumberGames++ }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $game->location->barrio }} | {{ $game->location->calle_1 }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($game->fecha)->isoFormat('YYYY/MM/DD - h A') }}
                                                </td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $game->division1->team->nombre }} | {{ $game->division1->rango }}
                                                    {{-- | {{ $game->division1->tipo }}  | {{ $game->division1->genero }} --}}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $game->division2->team->nombre }} | {{ $game->division2->rango }}
                                                    {{-- | {{ $game->division2->tipo }}  | {{ $game->division2->genero }} --}}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $game->resultado_division_1 ?? '-' }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $game->resultado_division_2 ?? '-' }}</td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    @if ($game->status)
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <h2 class="text-sm font-normal">Pendiente</h2>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-gray-800">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 3L9 9M3 9L9 3" stroke="#FF6347"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <h2 class="text-sm font-normal">Finalizado</h2>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                                    @component('_components._partials.floatingWindow')
                                                        @slot('textShow', 'Editar')
                                                        @slot('textClose', 'Cerrar')
                                                        @slot('content')
                                                            <div>
                                                                <form
                                                                    action="{{ route('admin_update_game', ['id' => $game->id]) }}"
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="input-container">
                                                                        <label for="fecha"
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha
                                                                            y
                                                                            hora:</label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-regular fa-calendar"></i>
                                                                            <input required type="datetime-local" id="fecha"
                                                                                name="fecha"
                                                                                @if($activeSeason)
        min="{{ date('Y-m-d\TH:i:s', strtotime($activeSeason->fecha_inicio)) }}"
        max="{{ date('Y-m-d\TH:i:s', strtotime($activeSeason->fecha_fin)) }}"
    @endif
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                                                value="{{ $game->fecha }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-container">
                                                                        <label for="location_id"
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">Ubicación:</label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-map-marker-alt"></i>
                                                                            <select required id="location_id" name="location_id"
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                <option value="">-- Selecciona una ubicación
                                                                                    --</option>
                                                                                @foreach ($locations as $location)
                                                                                    <option value="{{ $location->id }}"
                                                                                        {{ $game->location_id == $location->id ? 'selected' : '' }}>
                                                                                        {{ $location->barrio }} |
                                                                                        {{ $location->calle_1 }} y
                                                                                        {{ $location->calle_2 }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-container">
                                                                        <label for="division_1_id"
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">División
                                                                            1:</label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-users"></i>
                                                                            <select required id="division_1_id_update"
                                                                                name="division_1_id"
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                <option value="">-- Selecciona una división
                                                                                    --</option>
                                                                                @foreach ($activeDivisions as $division)
                                                                                    <option value="{{ $division->id }}"
                                                                                        {{ $game->division_1_id == $division->id ? 'selected' : '' }}>
                                                                                        {{ $division->team->nombre }} |
                                                                                        {{ $division->rango }} |
                                                                                        {{ $division->tipo }} |
                                                                                        {{ $division->genero }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-container">
                                                                        <label for="division_2_id"
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">División
                                                                            2:</label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-users"></i>
                                                                            <select required id="division_2_id_update"
                                                                                name="division_2_id"
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                <option value="">-- Selecciona otra división
                                                                                    --</option>
                                                                                @foreach ($activeDivisions as $division)
                                                                                    <option value="{{ $division->id }}"
                                                                                        {{ $game->division_2_id == $division->id ? 'selected' : '' }}>
                                                                                        {{ $division->team->nombre }} |
                                                                                        {{ $division->rango }} |
                                                                                        {{ $division->tipo }} |
                                                                                        {{ $division->genero }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="grid-containerAndroid">
                                                                        <div class="input-container">
                                                                            <label for="resultado_division_1"
                                                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Resultado
                                                                                División
                                                                                1:</label>
                                                                            <div class="grupo_inputs">
                                                                                <i class="fa-solid fa-users"></i>
                                                                                <input type="number" id="resultado_division_1"
                                                                                    name="resultado_division_1"
                                                                                    value="{{ $game->resultado_division_1 }}"
                                                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-container">
                                                                            <label for="resultado_division_2"
                                                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Resultado
                                                                                División
                                                                                2:</label>
                                                                            <div class="grupo_inputs">
                                                                                <i class="fa-solid fa-users"></i>
                                                                                <input type="number" id="resultado_division_2"
                                                                                    name="resultado_division_2"
                                                                                    value="{{ $game->resultado_division_2 }}"
                                                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="boton_container flex">
                                                                        <button id="submitButton" class="submitButton"
                                                                            type="submit">Actualizar</button>
                                                                    </div>
                                                                </form>


                                                            </div>
                                                        @endslot
                                                    @endcomponent

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{ $games->links() }}

        </section>
    </div>
    <script>
        document.getElementById('division_1_id').addEventListener('change', function() {
            var division1 = this.value;
            var division2 = document.getElementById('division_2_id').value;

            // Si la división 1 se selecciona en la división 2, restablece la selección
            if (division1 === division2) {
                document.getElementById('division_2_id').value = '';
            }
        });

        document.getElementById('division_2_id').addEventListener('change', function() {
            var division2 = this.value;
            var division1 = document.getElementById('division_1_id').value;

            // Si la división 2 se selecciona en la división 1, restablece la selección
            if (division2 === division1) {
                document.getElementById('division_1_id').value = '';
            }
        });
    </script>
@endsection
