@extends('layouts.html')

@section('tittle', 'Equipos | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')
    @vite('resources/css/_partials/formulario.css')


    @vite('resources/css/admin_teams.css')
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

        {{-- Formulario nueva temporada --}}
        <section class="container_new_season">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nueva temporada')
                        @slot('despliegue_content')
                            <form id="seasonForm" action="{{ route('admin_new_season') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <div class="input-container">
                                    <label for="nombre"
                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Nombre:</label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                        <input required type="text" id="nombre" name="nombre" placeholder="Nombre de la temporada"
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label for="fecha_inicio" class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha
                                        de
                                        Inicio:</label>
                                    <div class="grupo_inputs">
                                        <i class="fa-regular fa-calendar-plus"></i>
                                        <input required type="date" id="fecha_inicio" name="fecha_inicio"
                                            min="{{ \Carbon\Carbon::now()->toDateString() }}"
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label for="fecha_fin" class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha de
                                        Fin:</label>
                                    <div class="grupo_inputs">
                                        <i class="fa-regular fa-calendar-minus"></i>
                                        <input required type="date" id="fecha_fin" name="fecha_fin"
                                            min="{{ \Carbon\Carbon::now()->toDateString() }}"
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                    </div>
                                </div>


                                <div class="boton_container flex">
                                    <button id="submitButtonSeason" class="submitButton btm_green" type="submit">Registrar</button>
                                </div>
                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        {{-- Formulario nuevo team --}}
        <section class="container_new_team">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nuevo equipo')
                        @slot('despliegue_content')
                            <form action="{{ route('admin_new_team') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid-container">
                                    <div class="columna-izquierda">
                                        <div class="input-container">
                                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                Logo del equipo
                                            </label>
                                            <div class="grupo_inputs loguito">
                                                <i class="fa-solid fa-image"></i>
                                                <input type="file" name="imagen" id="imagen"
                                                    accept="image/png, image/jpg,  image/jpeg" required onchange="previewImage(this);"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                Nombre del equipo
                                            </label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-users"></i>
                                                <input type="text" name="nombre_equipo" id="nombre"
                                                    placeholder="Ingresa el nombre del equipo" required
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                Presidentes disponibles
                                            </label>
                                            <div class="grupo_inputs usersito">
                                                <i class="fa-solid fa-user"></i>
                                                <select name="user_id" id="user_id" required
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columna-derecha">
                                        <div class="grupo_inputs img_equipo">
                                            <img id="preview">
                                        </div>
                                    </div>

                                </div>
                                <div class="boton_container flex">
                                    <button id="submitButtonTeam" class="submitButton" type="submit">Registrar</button>
                                </div>
                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        {{-- Formulario nueva division --}}
        <section class="container_new_division">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nueva division')
                        @slot('despliegue_content')
                            <form action="{{ route('admin_new_division') }}" method="POST">
                                @csrf
                                <div class="grid-container">
                                    <div class="input-container">
                                        <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                            Equipo dueño
                                        </label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-users"></i>
                                            <select name="team_id" required
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                <option value="">-- Selecciona un equipo --</option>
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                            Temporada al que pertenece
                                        </label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-person-chalkboard"></i>
                                            <select name="season_id" id="" required
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                <option value="">-- Selecciona una temporada --</option>
                                                @foreach ($activeSeasons as $season)
                                                    <option value="{{ $season->id }}">
                                                        @php
                                                            $inicio = \Carbon\Carbon::parse($season->fecha_inicio);
                                                            $fin = \Carbon\Carbon::parse($season->fecha_fin);
                                                            $mismoAnio = $inicio->year === $fin->year;
                                                        @endphp

                                                        {{ $season->nombre }}
                                                        @if ($mismoAnio)
                                                            {{ $inicio->format('F') }} - {{ $fin->format('F Y') }}
                                                        @else
                                                            {{ $inicio->format('F Y') }} - {{ $fin->format('F Y') }}
                                                        @endif
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-container">
                                    <div class="input-container">
                                        <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                            Tipo de juego
                                        </label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-person-running"></i>
                                            <select name="tipo" required
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                @foreach ($tiposJuego as $tipo)
                                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                            Categoria
                                        </label>
                                        <div class="grupo_inputs">
                                            <i class="fa-solid fa-dumbbell"></i>
                                            <select name="rango" required
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                @foreach ($rangos as $rango)
                                                    <option value="{{ $rango }}">{{ $rango }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Genero
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-mars-and-venus"></i>
                                        <select name="genero" required
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            @foreach ($generos as $genero)
                                                <option value="{{ $genero }}">{{ $genero }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="boton_container flex">
                                    <button class="submitButton" id="submitButtonDivision" type="submit"
                                        {{ $activeSeasons ? '' : 'disabled' }}>Registrar</button>
                                </div>

                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        {{-- Titulo Temporadas --}}
        <section class="dark:bg-dark bg-dark pt-[25px]">
            <div class="mx-auto sm:container">
                <div class="border-primary border-l-[5px] pl-5">
                    <h2 class="text-dark mb-2 text-2xl font-semibold dark:text-white">
                        Temporadas
                    </h2>
                </div>
            </div>
        </section>

        {{-- Tabla temporadas --}}
        <section class="container_show_seasons">
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="conteinersito overflow-hidden dark:border-gray-700 md:rounded-lg">
                            <table class="tablita min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col">

                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Temporada
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de Inicio
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de Fin
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Estado
                                        </th>
                                        <th scope="col">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($seasons as $season)
                                        <tr>
                                            <td
                                                class="numerito py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $startNumberSeasons++ }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $season->nombre }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $season->fecha_inicio }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $season->fecha_fin }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                @if ($season->status)
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <h2 class="text-sm font-normal">Actual</h2>
                                                    </div>
                                                @else
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-gray-800">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3 3L9 9M3 9L9 3" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <h2 class="text-sm font-normal">Terminada</h2>
                                                    </div>
                                                @endif
                                            </td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                @component('_components._partials.floatingWindow')
                                                    @slot('textShow', 'Editar')
                                                    @slot('textClose', 'Cerrar')
                                                    @slot('content')
                                                        <div class="despliegue_seasons">

                                                            <form id="seasonFormAndroid"
                                                                action="{{ route('admin_update_season', ['id' => $season->id]) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="input-container">
                                                                    <label for="nombre"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Nombre:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-person-chalkboard"></i>
                                                                        <input required type="text" id="nombre"
                                                                            name="nombre" placeholder="Nombre de la temporada"
                                                                            value="{{ $season->nombre }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="fecha_inicio"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha
                                                                        de
                                                                        Inicio:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-regular fa-calendar-plus"></i>
                                                                        <input required type="date" id="fecha_inicio_android"
                                                                            name="fecha_inicio"
                                                                            value="{{ $season->fecha_inicio }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="fecha_fin"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha
                                                                        de
                                                                        Fin:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-regular fa-calendar-minus"></i>
                                                                        <input required type="date" id="fecha_fin_android"
                                                                            name="fecha_fin" value="{{ $season->fecha_fin }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="estado"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Estado:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-key"></i>
                                                                        <select name="status" required
                                                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            <option value="1"
                                                                                {{ $season->status == 1 ? 'selected' : '' }}>
                                                                                Activa</option>
                                                                            <option value="0"
                                                                                {{ $season->status == 0 ? 'selected' : '' }}>
                                                                                Terminada</option>
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="boton_container flex">
                                                                    <button id="submitButtonSeasonAndroid" class="submitButton"
                                                                        type="submit" class="btn_green">Actualizar temporada</button>
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
            {{ $seasons->links() }}
        </section>

        {{-- Titulo teams --}}
        <section class="dark:bg-dark bg-dark pt-[25px]">
            <div class="mx-auto sm:container">
                <div class="border-primary border-l-[5px] pl-5">
                    <h2 class="text-dark mb-2 text-2xl font-semibold dark:text-white">
                        Equipos
                    </h2>

                </div>
            </div>
        </section>

        {{-- Tabla teams --}}
        <section class="container_show_teams">
            <section class="container_pc">
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="conteinersito overflow-hidden dark:border-gray-700 md:rounded-lg">
                                <table class="tablita min-w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Equipo</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Presidente</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                </th>
                                              </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach ($teams as $team)
                                            <tr>
                                                <td
                                                    class="numerito py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $startNumberTeams++ }}
                                                </td>
                                                <td class="imagensita_logo">
                                                    <img src="{{ !empty($team->url_foto) ? asset('storage/images/teams/' . $team->url_foto) : asset('img/selloLiga.png') }}"
                                                        alt="Logo" class="w-10 m-auto">

                                                </td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $team->nombre }}
                                                </td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $team->user->nombre }}
                                                </td>

                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @component('_components._partials.floatingWindow')
                                                        @slot('textShow', 'Editar')
                                                        @slot('textClose', 'Cerrar')
                                                        @slot('content')
                                                            <div class="despliegue_divisions">
                                                                <form
                                                                    action="{{ route('admin_update_team', ['id' => $team->id]) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="grupo_inputs img_equipo android">
                                                                        <img id="preview_android"
                                                                            src="{{ !empty($team->url_foto) ? asset('storage/images/teams/' . $team->url_foto) : asset('img/selloLiga.png') }}"
                                                                            alt="Vista previa de la imagen">
                                                                    </div>
                                                                    <div class="input-container">
                                                                        <label
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                            Logo del equipo
                                                                        </label>
                                                                        <div class="grupo_inputs loguito">
                                                                            <i class="fa-solid fa-image"></i>
                                                                            <input type="file" name="imagen" id="imagen"
                                                                                accept="image/png, image/jpg,  image/jpeg"
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="grid-containerAndroid">
                                                                        <div class="input-container">
                                                                            <label
                                                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                                Nombre del equipo
                                                                            </label>
                                                                            <div class="grupo_inputs">
                                                                                <i class="fa-solid fa-users"></i>
                                                                                <input type="text" name="nombre_equipo"
                                                                                    value="{{ $team->nombre }}" id="nombre"
                                                                                    placeholder="Ingresa el nombre del equipo" required
                                                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="input-container">
                                                                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                                Presidente
                                                                            </label>
                                                                            <div class="grupo_inputs usersito">
                                                                                <i class="fa-solid fa-user"></i>
                                                                                <select name="user_id" id="user_id" required
                                                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                    <option value="{{ $team->user->id }}">{{ $team->user->nombre }}</option>
                                                                                    @foreach ($users as $user)
                                                                                        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-container">
                                                                        <label
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                            Estado
                                                                        </label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-key"></i>
                                                                            <select name="status" required
                                                                                class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                <option value="1"
                                                                                    {{ $team->status == 1 ? 'selected' : '' }}>
                                                                                    Activado</option>
                                                                                <option value="0"
                                                                                    {{ $team->status == 0 ? 'selected' : '' }}>
                                                                                    Desactivado</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="boton_container flex">
                                                                        <button id="submitButtonTeam" class="submitButton"
                                                                            type="submit">Actualizar equipo</button>
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

            {{ $teams->links() }}
        </section>

        {{-- Titulo divisiones --}}
        <section class="dark:bg-dark bg-dark pt-[25px]">
            <div class="mx-auto sm:container">
                <div class="border-primary border-l-[5px] pl-5">
                    <h2 class="text-dark mb-2 text-2xl font-semibold dark:text-white">
                        Divisiones
                    </h2>
                </div>
            </div>
        </section>

        {{-- Tabla divisiones --}}
        <section class="container_show_divisions">
            <section class="container_pc">
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
                                                Equipo</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Categoria</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Tipo</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Género</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Temporada</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Estado</th>
                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        @foreach ($divisions as $division)
                                            <tr>
                                                <td
                                                    class="numerito py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $startNumberDivisions++ }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $division->team->nombre }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $division->rango }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $division->tipo }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    {{ $division->genero }}</td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    @php
                                                        $inicio = \Carbon\Carbon::parse(
                                                            $division->season->fecha_inicio,
                                                        );
                                                        $fin = \Carbon\Carbon::parse($division->season->fecha_fin);
                                                        $mismoAnio = $inicio->year === $fin->year;
                                                    @endphp

                                                    {{ $division->season->nombre }} |
                                                    @if ($mismoAnio)
                                                        {{ $inicio->format('m') }} - {{ $fin->format('m Y') }}
                                                    @else
                                                        {{ $inicio->format('m Y') }} - {{ $fin->format('m Y') }}
                                                    @endif
                                                </td>
                                                <td
                                                    class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                    @if ($division->status)
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <h2 class="text-sm font-normal">Activo</h2>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-gray-800">
                                                            <svg width="12" height="12" viewBox="0 0 12 12"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 3L9 9M3 9L9 3" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <h2 class="text-sm font-normal">Inactivo</h2>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    @component('_components._partials.floatingWindow')
                                                        @slot('textShow', 'Editar')
                                                        @slot('textClose', 'Cerrar')
                                                        @slot('content')
                                                            <form
                                                                action="{{ route('admin_update_division', ['id' => $division->id]) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf

                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Equipo dueño
                                                                    </label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-users"></i>
                                                                        <select name="team_id" required
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            @foreach ($teams as $team)
                                                                                <option value="{{ $team->id }}"
                                                                                    @if ($division->team->id == $team->id) selected @endif>
                                                                                    {{ $team->nombre }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Temporada al que pertenece
                                                                    </label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-person-chalkboard"></i>
                                                                        <select name="season_id" id="" required
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            @foreach (\App\Models\Season::all() as $season)
                                                                                <option value="{{ $season->id }}"
                                                                                    @if ($division->season->id == $season->id) selected @endif>
                                                                                    @php
                                                                                        $inicio = \Carbon\Carbon::parse(
                                                                                            $season->fecha_inicio,
                                                                                        );
                                                                                        $fin = \Carbon\Carbon::parse(
                                                                                            $season->fecha_fin,
                                                                                        );
                                                                                        $mismoAnio =
                                                                                            $inicio->year ===
                                                                                            $fin->year;
                                                                                    @endphp

                                                                                    {{ $season->nombre }} |
                                                                                    @if ($mismoAnio)
                                                                                        {{ $inicio->format('F') }} -
                                                                                        {{ $fin->format('F Y') }}
                                                                                    @else
                                                                                        {{ $inicio->format('F Y') }} -
                                                                                        {{ $fin->format('F Y') }}
                                                                                    @endif
                                                                                </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="grid-containerAndroid">
                                                                    <div class="input-container">
                                                                        <label
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                            Tipo de juego
                                                                        </label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-person-running"></i>
                                                                            <select name="tipo" required
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                @foreach ($tiposJuego as $tipo)
                                                                                    <option value="{{ $tipo }}">
                                                                                        {{ $tipo }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-container">
                                                                        <label
                                                                            class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                            Categoria
                                                                        </label>
                                                                        <div class="grupo_inputs">
                                                                            <i class="fa-solid fa-dumbbell"></i>
                                                                            <select name="rango" required
                                                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                                @foreach ($rangos as $rango)
                                                                                    <option value="{{ $rango }}">
                                                                                        {{ $rango }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Genero
                                                                    </label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-mars-and-venus"></i>
                                                                        <select name="genero" required
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            @foreach ($generos as $genero)
                                                                                <option value="{{ $genero }}">
                                                                                    {{ $genero }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Estado
                                                                    </label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-key"></i>
                                                                        <select name="status" required
                                                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            <option value="1"
                                                                                {{ $division->status == 1 ? 'selected' : '' }}>
                                                                                Activado</option>
                                                                            <option value="0"
                                                                                {{ $division->status == 0 ? 'selected' : '' }}>
                                                                                Desactivado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="boton_container flex">
                                                                    <button class="submitButton" id="submitButtonDivision"
                                                                        type="submit">Actualizar Division</button>
                                                                </div>

                                                            </form>
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

            {{ $divisions->links() }}

        </section>

    </div>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var grupoInputs = document.querySelector('.grupo_inputs.img_equipo');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.grupo_inputs.img_equipo').classList.add('with-image');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                document.querySelector('.grupo_inputs.img_equipo').classList.remove('with-image');
            }
        }



        document.addEventListener('DOMContentLoaded', function() {
            const seasonForm = document.getElementById('seasonForm');
            const fechaInicioInput = document.getElementById('fecha_inicio');
            const fechaFinInput = document.getElementById('fecha_fin');
            const submitButtonSeason = document.getElementById('submitButtonSeason');

            fechaInicioInput.addEventListener('change', validateDates);
            fechaFinInput.addEventListener('change', validateDates);

            function validateDates() {
                const startDate = new Date(fechaInicioInput.value);
                const endDate = new Date(fechaFinInput.value);

                if (startDate > endDate) {
                    fechaInicioInput.style.borderColor = 'red';
                    fechaFinInput.style.borderColor = 'red';
                    submitButtonSeason.disabled = true;
                    submitButtonSeason.style.cursor = "no-drop";
                } else {
                    fechaInicioInput.style.borderColor = '';
                    fechaFinInput.style.borderColor = '';
                    submitButtonSeason.disabled = false;
                    submitButtonSeason.style.cursor = "pointer";
                }
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const seasonForm = document.getElementById('seasonFormAndroid');
            const fechaInicioInput = document.getElementById('fecha_inicio_android');
            const fechaFinInput = document.getElementById('fecha_fin_android');
            const submitButtonSeason = document.getElementById('submitButtonSeasonAndroid');

            fechaInicioInput.addEventListener('change', validateDates);
            fechaFinInput.addEventListener('change', validateDates);

            function validateDates() {
                const startDate = new Date(fechaInicioInput.value);
                const endDate = new Date(fechaFinInput.value);

                if (startDate > endDate) {
                    fechaInicioInput.style.borderColor = 'red';
                    fechaFinInput.style.borderColor = 'red';
                    submitButtonSeason.disabled = true;
                    submitButtonSeason.style.cursor = "no-drop";
                } else {
                    fechaInicioInput.style.borderColor = '';
                    fechaFinInput.style.borderColor = '';
                    submitButtonSeason.disabled = false;
                    submitButtonSeason.style.cursor = "pointer";
                }
            }
        });
    </script>
@endsection
