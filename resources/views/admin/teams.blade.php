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
                                            <img id="preview" src="{{ asset('img/selloLiga.png') }}" alt="Vista previa de la imagen">
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

        <section class="container_new_season">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nueva temporada')
                        @slot('despliegue_content')
                            <form id="seasonForm" action="{{ route('admin_new_season') }}" method="POST">
                                @csrf
                                <div class="input-container">
                                    <label for="nombre"
                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Nombre:</label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                        <input required type="text" id="nombre" name="nombre"
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
                                    <button id="submitButtonSeason" class="submitButton" type="submit">Registrar</button>
                                </div>
                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        <section class="container_new_division">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nueva division')
                        @slot('despliegue_content')
                            <form action="{{ route('admin_new_division') }}" method="POST" enctype="multipart/form-data">
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
                                                @foreach ($allTeams as $teamOne)
                                                    <option value="{{ $teamOne->id }}">{{ $teamOne->nombre }}</option>
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
                                            <input type="hidden" name="season_id" value="{{ $activeSeason ? $activeSeason->id : '' }}">
                                            <input type="text" name="season_name"
                                                value="{{ $activeSeason ? $activeSeason->nombre . '  DESDE  ' . $activeSeason->fecha_inicio . '  HASTA  ' . $activeSeason->fecha_fin : 'Sin temporadas actuales' }}"
                                                class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                disabled>
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
                                            Rango
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
                                        {{ $activeSeason ? '' : 'disabled' }}>Registrar</button>
                                </div>

                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
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
                grupoInputs.classList.add('fondo-default');
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
    </script>
@endsection
