@extends('layouts.html')

@section('tittle', 'Jugadores | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')
    @vite('resources/css/_partials/formulario.css')

    @vite('resources/css/admin_players.css')
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
        {{-- Formulario nuevo jugador --}}
        <section class="container_new_player">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nuevo jugador')
                        @slot('despliegue_content')
                            <form id="playerForm" action="{{ route('admin_new_player') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid-container">
                                    <div class="lat_izquierdo">
                                        <div class="input-container">
                                            <label for="cedula"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Cédula:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-id-card"></i>
                                                <input required type="number" id="cedulaInputForm" name="cedula"
                                                    placeholder="Número de cédula" inputmode="numeric"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                    oninput="validarCedulaYLongitud(this.value)">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="fecha_nacimiento"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha de
                                                nacimiento:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-regular fa-calendar"></i>
                                                <input required type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="nombre"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Nombres:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-user"></i>
                                                <input required type="text" id="nombres" name="nombres"
                                                    placeholder="Ingrese sus 2 nombres"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="apellido"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Apellidos:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-user"></i>
                                                <input required type="text" id="apellido" name="apellidos"
                                                    placeholder="Ingrese sus 2 apellido"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="division_id"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">División:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-users"></i>
                                                <select required id="division_id" name="division_id"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                    <option value="-99">-- ninguna --</option>
                                                    @foreach ($activeDivisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->team->nombre }} |
                                                            {{ $division->rango }} |
                                                            {{ $division->tipo }} | {{ $division->genero }} |
                                                            @php
                                                                $inicio = \Carbon\Carbon::parse(
                                                                    $division->season->fecha_inicio,
                                                                );
                                                                $fin = \Carbon\Carbon::parse(
                                                                    $division->season->fecha_fin,
                                                                );
                                                                $mismoAnio = $inicio->year === $fin->year;
                                                            @endphp

                                                            {{ $division->season->nombre }}
                                                            @if ($mismoAnio)
                                                                {{ $inicio->format('m') }} - {{ $fin->format('m Y') }}
                                                            @else
                                                                {{ $inicio->format('m Y') }} - {{ $fin->format('m Y') }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid-container">
                                            <div class="input-container">
                                                <label for="url_foto"
                                                    class="mb-[10px] block text-base font-medium text-dark dark:text-white">Numero de
                                                    camiseta</label>
                                                <div class="grupo_inputs fotito">
                                                    <i class="fa-solid fa-hashtag"></i>
                                                    <input type="number" name="numero_camiseta" id="numero_camiseta" placeholder="###"
                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                </div>
                                            </div>
                                            <div class="input-container">
                                                <label for="url_foto"
                                                    class="mb-[10px] block text-base font-medium text-dark dark:text-white">Foto
                                                    carnet</label>
                                                <div class="grupo_inputs fotito">
                                                    <i class="fa-solid fa-image-portrait"></i>
                                                    <input type="file" name="imagen" id="imagen"
                                                        accept="image/png, image/jpg,  image/jpeg" required onchange="previewImage(this);"
                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="lat_derecho">
                                        <div class="grupo_inputs img_player">
                                            <img id="imagePreviewForm">
                                        </div>
                                    </div>
                                </div>
                                <div class="boton_container flex">
                                    <button id="submitButtonPlayer" class="submitButton" type="submit">Registrar</button>
                                </div>
                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        <section>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="conteinersito overflow-hidden dark:border-gray-700 md:rounded-lg">
                            <table class="tablita min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Cédula
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nombres
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Apellidos
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de Nacimiento
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Edad
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            División
                                        </th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Camiseta
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($players as $player)
                                        <tr>
                                            <td
                                                class="numerito py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $startNumberPlayers++ }}
                                            </td>
                                            <td class="imagensita_logo">
                                                <img src="{{ !empty($player->url_foto) ? asset('storage/images/players/' . $player->url_foto) : asset('img/siluetaFoto.png') }}"
                                                    alt="Foto" class="w-10 m-auto">
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $player->cedula }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $player->nombres }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $player->apellidos }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $player->fecha_nacimiento }}
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                @php
                                                    // Calcula la edad del jugador
                                                    $edad = \Carbon\Carbon::parse($player->fecha_nacimiento)->age;
                                                @endphp
                                                {{ $edad }} años
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                @if ($player->division_id)
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-orange-500 bg-orange-100/60 dark:bg-gray-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            height="15" viewBox="0 0 20 20" fill="none">
                                                            <path
                                                                d="M12.5 5.83339L7.08333 11.2501C6.75181 11.5816 6.56556 12.0312 6.56556 12.5001C6.56556 12.9689 6.75181 13.4185 7.08333 13.7501C7.41485 14.0816 7.86449 14.2678 8.33333 14.2678C8.80217 14.2678 9.25181 14.0816 9.58333 13.7501L15 8.33339C15.663 7.67034 16.0355 6.77107 16.0355 5.83339C16.0355 4.8957 15.663 3.99643 15 3.33339C14.337 2.67034 13.4377 2.29785 12.5 2.29785C11.5623 2.29785 10.663 2.67034 10 3.33339L4.58333 8.75005C3.58877 9.74461 3.03003 11.0935 3.03003 12.5001C3.03003 13.9066 3.58877 15.2555 4.58333 16.2501C5.57789 17.2446 6.92681 17.8034 8.33333 17.8034C9.73985 17.8034 11.0888 17.2446 12.0833 16.2501L17.5 10.8334"
                                                                stroke="#FF6347" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        <h2 class="text-sm font-normal">Ocupado</h2>
                                                    </div>
                                                @else
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                        <svg width="15" height="15" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <h2 class="text-sm font-normal">Disponible</h2>
                                                    </div>
                                                @endif
                                            </td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $player->numero_camiseta }}
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                @component('_components._partials.floatingWindow')
                                                    @slot('textShow', 'Editar')
                                                    @slot('textClose', 'Cerrar')
                                                    @slot('content')
                                                        <div class="despliegue_divisions">
                                                            <form id="playerForm"
                                                                action="{{ route('admin_update_player', ['id' => $player->id]) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="input-container">
                                                                    <label for="fecha_nacimiento"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Fecha
                                                                        de
                                                                        nacimiento:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-regular fa-calendar"></i>
                                                                        <input required type="date" id="fecha_nacimiento"
                                                                            name="fecha_nacimiento"
                                                                            value="{{ $player->fecha_nacimiento }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="nombre"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Nombres:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-user"></i>
                                                                        <input required type="text" id="nombres"
                                                                            name="nombres" placeholder="Ingrese sus 2 nombres"
                                                                            value="{{ $player->nombres }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="apellido"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Apellidos:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-user"></i>
                                                                        <input required type="text" id="apellidos"
                                                                            name="apellidos" placeholder="Ingrese sus 2 apellido"
                                                                            value="{{ $player->apellidos }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="division_id"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">División:</label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-users"></i>
                                                                        <select required id="division_id" name="division_id"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            <option value="-99">-- Ninguna --</option>
                                                                            @foreach ($activeDivisions as $division)
                                                                                <option value="{{ $division->id }}"
                                                                                    {{ $player->division_id == $division->id ? 'selected' : '' }}>
                                                                                    {{ $division->team->nombre }} |
                                                                                    {{ $division->rango }} |
                                                                                    {{ $division->tipo }} |
                                                                                    {{ $division->genero }} |
                                                                                    @php
                                                                                        $inicio = \Carbon\Carbon::parse(
                                                                                            $division->season
                                                                                                ->fecha_inicio,
                                                                                        );
                                                                                        $fin = \Carbon\Carbon::parse(
                                                                                            $division->season
                                                                                                ->fecha_fin,
                                                                                        );
                                                                                        $mismoAnio =
                                                                                            $inicio->year ===
                                                                                            $fin->year;
                                                                                    @endphp
                                                                                    {{ $division->season->nombre }}
                                                                                    @if ($mismoAnio)
                                                                                        {{ $inicio->format('m') }} -
                                                                                        {{ $fin->format('m Y') }}
                                                                                    @else
                                                                                        {{ $inicio->format('m Y') }} -
                                                                                        {{ $fin->format('m Y') }}
                                                                                    @endif
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="input-container">
                                                                    <label for="url_foto"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Numero de
                                                                        camiseta</label>
                                                                    <div class="grupo_inputs fotito">
                                                                        <i class="fa-solid fa-hashtag"></i>
                                                                        <input type="number" name="numero_camiseta" id="numero_camiseta" placeholder="###"
                                                                            value="{{ $player->numero_camiseta }}"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label for="url_foto"
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">Foto
                                                                        carnet</label>
                                                                    <div class="grupo_inputs fotito">
                                                                        <i class="fa-solid fa-image-portrait"></i>
                                                                        <input type="file" name="imagen" id="imagen"
                                                                            accept="image/png, image/jpg,  image/jpeg"
                                                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                                                    </div>
                                                                </div>


                                                                <div class="boton_container flex">
                                                                    <button id="submitButtonPlayer" class="submitButton"
                                                                        type="submit">Registrar</button>
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
            {{ $players->links() }}
        </section>

    </div>

    <script>
        function validarCedulaYLongitud(ced) {
            var inputCedula = document.getElementById("cedulaInputForm");
            var submitButton = document.getElementById("submitButtonPlayer");

            if (!ctrCedula(ced)) {
                inputCedula.style.borderColor = "red";
                submitButton.disabled = true; // Deshabilitar el botón
                submitButton.style.cursor = "not-allowed"; // Cambiar el cursor
                return;
            }

            inputCedula.style.borderColor = "green";
            submitButton.disabled = false; // Habilitar el botón
            submitButton.style.cursor = "pointer"; // Restaurar el cursor por defecto

            // Limitar la entrada a 10 dígitos
            if (ced.length > 10) {
                inputCedula.value = ced.slice(0, 10);
            }
        }



        function previewImage(input) {
            var preview = document.getElementById('imagePreviewForm');
            var grupoInputs = document.querySelector('.grupo_inputs.img_player');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.grupo_inputs.img_player').classList.add('with-image');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                document.querySelector('.grupo_inputs.img_player').classList.remove('with-image');
            }
        }



        function ctrCedula(ced) {
            var a, e, i, o, cont, j, u = 0,
                y = 0,
                r = 0,
                s = 0;
            var z = 0,
                k = 100000000;
            var ced1 = null;
            ced = ced.trim();
            try {
                ced1 = ced.substring(0, 9); //*1 *2 *3 *4 *5 *6 *7 *8 *9
                cont = ced1.length;
                //--------------------------------------
                a = parseInt(ced.substring(0, 2)); //*1 *2
                e = parseInt(ced.substring(2, 3)); //*3
                i = parseInt(ced.substring(3, 9)); //*4 *5 *6 *7 *8 *9
                o = parseInt(ced.substring(9, 10)); //*10
                //--------------------------------------
            } catch (err) {
                return false;
            }
            if (a >= 0 && a <= 24) {
                if (e >= 0 && e < 6) {
                    for (j = 0; j < cont; j++) {
                        if (j % 2 == 0) {
                            y = 2;
                        } else {
                            y = 1;
                        }
                        ced1 = ced.substring(j, j + 1);
                        z = parseInt(ced1);
                        u = (z * y);
                        if (u >= 10) {
                            u = u - 9;
                        }
                        r = r + u;
                    }
                    s = r;
                    //console.log(z+"   "+y+"    "+u+"    "+r);
                    for (j = 0; s % 10 != 0; j++) {
                        s = s + 1;
                    }
                    r = s - r;
                    //console.log(r);
                    if (r == 10) {
                        r = 0;
                    }
                    if (r == o) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            return false;
        }
    </script>
@endsection
