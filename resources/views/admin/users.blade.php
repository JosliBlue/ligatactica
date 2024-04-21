@extends('layouts.html')

@section('tittle', 'Home | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')

    @vite('resources/css/admin_home.css')
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
        @component('_components._partials.card')
            @slot('card_content')
                @component('_components._partials.despliegue')
                    @slot('title', 'Ingresar nuevo usuario')
                    @slot('despliegue_content')
                        <form action="{{ route('admin_new_user') }}" method="POST">
                            @csrf
                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                Correo electrónico
                            </label>
                            <div class="grupo_inputs">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" name="new_email" id="new_email" placeholder="Ingresa un nuevo correo electronico" required
                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                            </div>
                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                Nombre
                            </label>
                            <div class="grupo_inputs">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="nombre" id="nombre" placeholder="Ingresa un nuevo nombre de perfil" required
                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                            </div>
                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                Contraseña
                            </label>
                            <div class="grupo_inputs">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="new_pass" id="new_pass" placeholder="Ingresa una nueva contraseña" required
                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                            </div>
                            <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                Confirmar contraseña
                            </label>
                            <div class="grupo_inputs">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="confirm_new_pass" id="confirm_new_pass"
                                    placeholder="Confirma tu nueva contraseña" required
                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                            </div>
                            <div class="grid-container">
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Fecha de nacimiento
                                    </label>
                                    <div class="grupo_inputs date">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <input type="date" name="new_date_birth" id="new_date_birth" required
                                            min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                            max="{{ now()->subYears(17)->format('Y-m-d') }}"
                                            class="date w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Rol
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-key"></i>
                                        <select id="role" name="role" required
                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            <option value="PRESIDENT">Presidente</option>
                                            <option value="ADMIN">Administrador</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="boton_container flex">
                                <button id="submitButton" type="submit" disabled>Registrar</button>
                            </div>
                        </form>
                    @endslot
                @endcomponent


            @endslot
        @endcomponent

        @component('_components._partials.floatingWindow')
            @slot('textShow', 'XssD')
            @slot('content')
                <details>
                    <summary>Título de la sección</summary>
                    <div>
                        <p>Este es el contenido que se muestra inicialmente.</p>
                        <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                    </div>
                </details>
                <details>
                    <summary>Título de la sección</summary>
                    <div>
                        <p>Este es el contenido que se muestra inicialmente.</p>
                        <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                    </div>
                </details>
                <details>
                    <summary>Título de la sección</summary>
                    <div>
                        <p>Este es el contenido que se muestra inicialmente.</p>
                        <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                    </div>
                </details>


            @endslot
            @slot('textClose', 'Cerrarxdss')
        @endcomponent

        <section class="container mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>


                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Date
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Status
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Customer
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Purchase
                                        </th>

                                        <th scope="col" class="relative py-3.5 px-4">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <tr>

                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">Jan
                                            6,
                                            2022</td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                                <h2 class="text-sm font-normal">Paid</h2>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                <img class="object-cover w-8 h-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                                                    alt="">
                                                <div>
                                                    <h2 class="text-sm font-medium text-gray-800 dark:text-white ">Arthur
                                                        Melo
                                                    </h2>
                                                    <p class="text-xs font-normal text-gray-600 dark:text-gray-400">
                                                        authurmelo@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            Monthly subscription</td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <button
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                    Archive
                                                </button>

                                                <button
                                                    class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none">
                                                    Download
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="#"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>

                    <span>
                        previous
                    </span>
                </a>

                <div class="items-center hidden md:flex gap-x-3">
                    <a href="#"
                        class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
                    <a href="#"
                        class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
                </div>

                <a href="#"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <span>
                        Next
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
        </section>

        {{ $users->links() }}
    </div>
    <script>
        const newPasswordInput = document.getElementById('new_pass');
        const confirmPasswordInput = document.getElementById('confirm_new_pass');
        const botonRegistrarNuevo = document.getElementById('submitButton');

        newPasswordInput.addEventListener('keyup', validatePasswordInputs);
        confirmPasswordInput.addEventListener('keyup', validatePasswordInputs);

        function validatePasswordInputs() {
            if (newPasswordInput.value === '' || confirmPasswordInput.value === '') {
                newPasswordInput.style.borderColor = 'red';
                confirmPasswordInput.style.borderColor = 'red';
                return;
            }
            validatePasswordMatch(newPasswordInput.value, confirmPasswordInput.value);
        }

        function validatePasswordMatch(enteredPassword, confirmPassword) {
            if (enteredPassword === confirmPassword) {
                newPasswordInput.style.borderColor = 'green';
                confirmPasswordInput.style.borderColor = 'green';
                botonRegistrarNuevo.disabled = false;
                botonRegistrarNuevo.style.cursor = "pointer";
            } else {
                newPasswordInput.style.borderColor = 'red';
                confirmPasswordInput.style.borderColor = 'red';
                botonRegistrarNuevo.disabled = true;
                botonRegistrarNuevo.style.cursor = "no-drop";
            }
        }
    </script>
@endsection
