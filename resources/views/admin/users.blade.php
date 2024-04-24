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
                            <div class="grid-container">
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Correo electrónico
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-envelope"></i>
                                        <input type="email" name="new_email" id="new_email"
                                            placeholder="Ingresa un nuevo correo electronico" required
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Nombre
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-user"></i>
                                        <input type="text" name="nombre" id="nombre" placeholder="Ingresa un nuevo nombre de perfil"
                                            required
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="grid-container">
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Contraseña
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-lock"></i>
                                        <input type="password" name="new_pass" id="new_pass" placeholder="Ingresa una nueva contraseña"
                                            required
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                    </div>
                                </div>
                                <div class="input-container">
                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                        Confirmar contraseña
                                    </label>
                                    <div class="grupo_inputs">
                                        <i class="fa-solid fa-lock"></i>
                                        <input type="password" name="confirm_new_pass" id="confirm_new_pass"
                                            placeholder="Confirma tu nueva contraseña" required
                                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                                    </div>
                                </div>
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

        <section class="container-pc mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nombre</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Correo Electrónico</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Rol</th>
                                        <th scope="col"
                                            class="fechNac px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de Nacimiento</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Estado</th>
                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $user->nombre }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $user->email }}</td>
                                            <td
                                                class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $user->role }}</td>
                                            <td
                                                class="fechNac px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                {{ $user->date_birth }}</td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                @if ($user->status)
                                                    <div
                                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-gray-800">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <h2 class="text-sm font-normal">Activado</h2>
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
                                                        <h2 class="text-sm font-normal">Desactivado</h2>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 text-sm whitespace-nowrap">
                                                @component('_components._partials.floatingWindow')
                                                    @slot('textShow', 'Editar')
                                                    @slot('textClose', 'Cerrar')
                                                    @slot('content')
                                                        <div style="width: 400px">
                                                            <form action="{{ route('admin_update_user', ['id' => $user->id]) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <label
                                                                    class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                    Correo electrónico
                                                                </label>
                                                                <div class="grupo_inputs">
                                                                    <i class="fa-solid fa-envelope"></i>
                                                                    <input type="email" name="new_email" id="new_email"
                                                                        placeholder="Ingresa un nuevo correo electronico" required
                                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                                        value="{{ $user->email }}" />
                                                                </div>
                                                                <label
                                                                    class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                    Nombre
                                                                </label>
                                                                <div class="grupo_inputs">
                                                                    <i class="fa-solid fa-user"></i>
                                                                    <input type="text" name="nombre" id="nombre"
                                                                        placeholder="Ingresa un nuevo nombre de perfil" required
                                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                                        value="{{ $user->nombre }}" />
                                                                </div>


                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Fecha de nacimiento
                                                                    </label>
                                                                    <div class="grupo_inputs date">
                                                                        <i class="fa-solid fa-calendar-days"></i>
                                                                        <input type="date" name="new_date_birth"
                                                                            id="new_date_birth" required
                                                                            min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                                                            max="{{ now()->subYears(17)->format('Y-m-d') }}"
                                                                            class="date w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                                            value="{{ $user->date_birth }}">
                                                                    </div>
                                                                </div>
                                                                <div class="input-container">
                                                                    <label
                                                                        class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                                        Rol
                                                                    </label>
                                                                    <div class="grupo_inputs">
                                                                        <i class="fa-solid fa-key"></i>
                                                                        <select id="role" name="role" required
                                                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            <option value="PRESIDENT"
                                                                                {{ $user->role == 'PRESIDENT' ? 'selected' : '' }}>
                                                                                Presidente</option>
                                                                            <option value="ADMIN"
                                                                                {{ $user->role == 'ADMIN' ? 'selected' : '' }}>
                                                                                Administrador</option>
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
                                                                        <select id="status" name="status" required
                                                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                                            <option value="1"
                                                                                {{ $user->status == 1 ? 'selected' : '' }}>
                                                                                Activado</option>
                                                                            <option value="0"
                                                                                {{ $user->status == 0 ? 'selected' : '' }}>
                                                                                Desactivado</option>
                                                                        </select><br><br>
                                                                    </div>
                                                                </div>

                                                                <div class="boton_container flex">
                                                                    <button type="submit" class="btn_green">Actualizar
                                                                        Usuario</button>
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

        <section class="container-movil">
            @component('_components._partials.card')
                @slot('card_content')
                    @foreach ($users as $user)
                        @component('_components._partials.despliegue')
                            @slot('title')
                                {{ $user->nombre }}
                            @endslot
                            @slot('despliegue_content')
                                <p class="etiqueta_movil"><strong>Correo: </strong>{{ $user->email }}</p>
                                <p class="etiqueta_movil"><strong>Rol: </strong>{{ $user->role }}</p>
                                <p class="etiqueta_movil"><strong>Fecha de nacimiento: </strong>{{ $user->date_birth }}</p>
                                @if ($user->status == 1)
                                    <p class="etiqueta_movil green"><strong>Estado: </strong>Activado</p>
                                @else
                                    <p class="etiqueta_movil red"><strong>Estado: </strong>Desactivado</p>
                                @endif
                                @component('_components._partials.floatingWindow')
                                    @slot('textShow', 'Editar')
                                    @slot('textClose', 'Cerrar')
                                    @slot('content')
                                        <div style="width: 400px">
                                            <form action="{{ route('admin_update_user', ['id' => $user->id]) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                    Correo electrónico
                                                </label>
                                                <div class="grupo_inputs">
                                                    <i class="fa-solid fa-envelope"></i>
                                                    <input type="email" name="new_email" id="new_email"
                                                        placeholder="Ingresa un nuevo correo electronico" required
                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                        value="{{ $user->email }}" />
                                                </div>
                                                <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                    Nombre
                                                </label>
                                                <div class="grupo_inputs">
                                                    <i class="fa-solid fa-user"></i>
                                                    <input type="text" name="nombre" id="nombre"
                                                        placeholder="Ingresa un nuevo nombre de perfil" required
                                                        class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                        value="{{ $user->nombre }}" />
                                                </div>


                                                <div class="input-container">
                                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                        Fecha de nacimiento
                                                    </label>
                                                    <div class="grupo_inputs date">
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        <input type="date" name="new_date_birth" id="new_date_birth" required
                                                            min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                                            max="{{ now()->subYears(17)->format('Y-m-d') }}"
                                                            class="date w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"
                                                            value="{{ $user->date_birth }}">
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
                                                            <option value="PRESIDENT" {{ $user->role == 'PRESIDENT' ? 'selected' : '' }}>
                                                                Presidente</option>
                                                            <option value="ADMIN" {{ $user->role == 'ADMIN' ? 'selected' : '' }}>
                                                                Administrador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-container">
                                                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                                                        Estado
                                                    </label>
                                                    <div class="grupo_inputs">
                                                        <i class="fa-solid fa-key"></i>
                                                        <select id="status" name="status" required
                                                            class="role w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>
                                                                Activado</option>
                                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>
                                                                Desactivado</option>
                                                        </select><br><br>
                                                    </div>
                                                </div>

                                                <div class="boton_container flex">
                                                    <button type="submit" class="btn_green">Actualizar
                                                        Usuario</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    @endforeach
                @endslot
            @endcomponent
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
