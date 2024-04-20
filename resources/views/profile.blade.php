@extends('layouts.html')

@section('tittle', 'Mi perfil')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/components/sweetAlert.css')
    @vite('resources/css/components/confirmAlert.css')

    @vite('resources/css/profile.css')
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent
    @component('_components.header')
    @endcomponent

    @if (session('successMessage'))
        @component('_components.sweetAlert')
            @slot('icon', 'success')
            @slot('message')
                {{ session('successMessage') }}
            @endslot
        @endcomponent
    @endif
    @if (session('errorMessage'))
        @component('_components.sweetAlert')
            @slot('icon', 'error')
            @slot('message')
                {{ session('errorMessage') }}
            @endslot
        @endcomponent
    @endif

    <div class="contenido_padre">

        @component('_components._partials.card')
            @slot('card_content')
                <form action="{{ route('updateNombre') }}" method="post">
                    @csrf
                    @method('PUT')

                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                        Nombre
                    </label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-user"></i>
                        <input type="nombre" name="nombre" id="nombre" value="{{ Auth::user()->nombre }}"
                            placeholder="Ingresa un nombre de usuario" required
                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                    </div>
                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                        Correo Electronico
                    </label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="text" id="text" value="{{ Auth::user()->email }}" disabled
                            class="email w-full rounded-md border border-stroke dark:border-dark-3 py-[10px] px-5 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

                    </div>
                    <div class="boton_container flex">
                        <button id="buttonNombre">Cambiar Nombre</button>
                    </div>
                </form>
            @endslot
        @endcomponent


        @component('_components._partials.card')
            @slot('card_content')
                <form id="passwordForm" action="{{ route('updatePassword') }}" method="post">
                    @csrf
                    @method('PUT')


                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                        Contraseña Actual
                    </label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="current_password" id="current_password"
                            placeholder="Ingresa tu contraseña actual" required
                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                    </div>
                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                        Nueva contraseña
                    </label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="new_password" id="new_password" placeholder="Ingresa tu nueva contraseña"
                            value="{{ old('new_password') }}" required
                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                    </div>
                    <label class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                        Confirmar nueva contraseña
                    </label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-lock"></i>

                        <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Confirma tu nueva contraseña"
                            required
                            class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" />
                    </div>
                    <div class="boton_container flex">
                        <button id="submitButton" type="submit">Cambiar contraseña</button>
                    </div>
                </form>
            @endslot
        @endcomponent
    </div>

    <script>
        const botonNombre = document.getElementById('buttonNombre');
        const inputNombre = document.getElementById('nombre');

        inputNombre.addEventListener('keyup', function() {
            if (inputNombre.value === '') {
                botonNombre.disabled = true;
                botonNombre.style.cursor = "no-drop";
            } else {
                botonNombre.disabled = false;
                botonNombre.style.cursor = "pointer";
            }
        });


        const newPasswordInput = document.getElementById('new_password');
        const confirmPasswordInput = document.getElementById('pass_confirm');
        const boton = document.getElementById('submitButton');

        newPasswordInput.addEventListener('keyup', validatePasswordInputs);
        confirmPasswordInput.addEventListener('keyup', validatePasswordInputs);

        function validatePasswordInputs() {
            const enteredPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (enteredPassword === '' || confirmPassword === '') {
                newPasswordInput.style.borderColor = 'red';
                confirmPasswordInput.style.borderColor = 'red';
                return;
            }

            validatePasswordMatch(enteredPassword, confirmPassword);
        }

        function validatePasswordMatch(enteredPassword, confirmPassword) {
            if (enteredPassword === confirmPassword) {
                newPasswordInput.style.borderColor = 'green';
                confirmPasswordInput.style.borderColor = 'green';
                submitButton.disabled = false;
                submitButton.style.cursor = "pointer";
            } else {
                newPasswordInput.style.borderColor = 'red';
                confirmPasswordInput.style.borderColor = 'red';
                submitButton.disabled = true;
                submitButton.style.cursor = "no-drop";
            }
        }

        document.getElementById('submitButton').addEventListener('click', function(event) {
            // Evita el envío del formulario
            event.preventDefault();

            // Obtiene los valores de los campos de contraseña
            var currentPassword = document.getElementById('current_password').value;
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('pass_confirm').value;

            // Verifica si los campos de contraseña están vacíos
            if (currentPassword.trim() === '' || newPassword.trim() === '' || confirmPassword.trim() === '') {
                Swal.fire({
                    toast: true,
                    title: 'Datos faltantes',
                    icon: 'error',
                    position: 'bottom-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast'
                    },
                    showConfirmButton: false,
                    timer: 4500,
                    timerProgressBar: true
                });
                return;
            } else {
                // Si los campos no están vacíos, ejecuta el SweetAlert para confirmar la acción
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                        popup: "confirmAlert"
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: "¿Estás seguro de cambiar tu contraseña?",
                    text: "Una vez cambiada, se cerrara su sesion",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, cambiar contraseña",
                    cancelButtonText: "Cancelar",
                    reverseButtons: true
                }).then((result) => {
                    // Si se confirma, redirige al usuario a la acción del formulario
                    if (result.isConfirmed) {
                        // Redirige al usuario a la acción del formulario
                        document.getElementById('passwordForm').submit();
                    }
                });
            }
        });
    </script>
@endsection
