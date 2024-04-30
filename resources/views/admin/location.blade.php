@extends('layouts.html')

@section('tittle', 'Estadios | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')
    @vite('resources/css/_partials/formulario.css')

    @vite('resources/css/admin_locations.css')
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

        <section class="container_new_location">
            @component('_components._partials.card')
                @slot('card_content')
                    @component('_components._partials.despliegue')
                        @slot('title', 'Ingresar nuevo estadio')
                        @slot('despliegue_content')
                            <form id="locationForm" action="{{ route('admin_new_location') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid-container">
                                    <div class="lat_izquierdo">
                                        <div class="input-container">
                                            <label for="barrio"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Barrio:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-home"></i>
                                                <input type="text" id="barrio" name="barrio" placeholder="Nombre del barrio" required
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="calle_1"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Calle 1:</label>
                                            <div class="grupo_inputs">
                                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                                </svg>
                                                <input type="text" id="calle_1" name="calle_1" placeholder="Nombre de la calle 1"
                                                    required
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="calle_2"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Calle 2:</label>
                                            <div class="grupo_inputs">
                                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                                </svg>
                                                <input type="text" id="calle_2" name="calle_2" placeholder="Nombre de la calle 2"
                                                    required
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="url_foto"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Foto:</label>
                                            <div class="grupo_inputs fotito">
                                                <i class="fa-solid fa-image"></i>
                                                <input type="file" name="imagen" id="imagen"
                                                    accept="image/png, image/jpg, image/jpeg" onchange="previewImage(this);"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lat_derecho">
                                        <div class="grupo_inputs img_location">
                                            <img id="imagePreviewForm">
                                        </div>
                                    </div>
                                </div>
                                <div class="boton_container flex">
                                    <button id="submitButtonLocation" class="submitButton" type="submit">Registrar</button>
                                </div>
                            </form>
                        @endslot
                    @endcomponent
                @endslot
            @endcomponent
        </section>

        <section class="container_show_locations">
            <div class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-4">
                @foreach ($locations as $location)
                    <div
                        class="mx-auto min-w-full w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 text-center">
                        @php
                            $fotoUrl = !empty($location->url_foto)
                                ? asset('storage/images/locations/' . $location->url_foto)
                                : asset('img/estadioDefault.jpg');
                        @endphp
                        <img class="object-cover object-center w-full h-56" src="{{ $fotoUrl }}"
                            alt="Foto del estadio">

                        <div class="px-4 py-4">
                            <div class="flex items-center text-gray-700 dark:text-gray-200">
                                <i class="fa-solid fa-home"></i>

                                <h1 class="px-2 text-sm">{{ $location->barrio }}</h1>
                            </div>
                            <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                </svg>
                                <h1 class="px-2 text-sm">Calle 1: {{ $location->calle_1 }}</h1>
                            </div>
                            <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                </svg>
                                <h1 class="px-2 text-sm">Calle 2: {{ $location->calle_2 }}</h1>
                            </div>
                        </div>
                        <div class="py-4">
                            @component('_components._partials.floatingWindow')
                                @slot('textShow', 'Editar')
                                @slot('textClose', 'Cerrar')
                                @slot('content')
                                    <form id="locationForm" action="{{ route('admin_update_location', ['id' => $location->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="input-container">
                                            <label for="barrio"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Barrio:</label>
                                            <div class="grupo_inputs">
                                                <i class="fa-solid fa-home"></i>
                                                <input type="text" id="barrio" name="barrio"
                                                    placeholder="Nombre del barrio" required value="{{ $location->barrio }}"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="calle_1"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Calle
                                                1:</label>
                                            <div class="grupo_inputs">
                                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                                </svg>
                                                <input type="text" id="calle_1" name="calle_1"
                                                    placeholder="Nombre de la calle 1" required value="{{ $location->calle_1 }}"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="calle_2"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Calle
                                                2:</label>
                                            <div class="grupo_inputs">
                                                <svg aria-label="location pin icon" class="w-6 h-6 fill-current"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.063 10.063 6.27214 12.2721 6.27214C14.4813 6.27214 16.2721 8.063 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16757 11.1676 8.27214 12.2721 8.27214C13.3767 8.27214 14.2721 9.16757 14.2721 10.2721Z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.3941 5.48178 3.79418C8.90918 0.194258 14.6059 0.0543983 18.2059 3.48179C21.8058 6.90919 21.9457 12.606 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.9732 6.93028 5.17326C9.59603 2.37332 14.0268 2.26454 16.8268 4.93029C19.6267 7.59604 19.7355 12.0269 17.0698 14.8268Z" />
                                                </svg>
                                                <input type="text" id="calle_2" name="calle_2"
                                                    placeholder="Nombre de la calle 2" required value="{{ $location->calle_2 }}"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <label for="url_foto"
                                                class="mb-[10px] block text-base font-medium text-dark dark:text-white">Foto:</label>
                                            <div class="grupo_inputs fotito">
                                                <i class="fa-solid fa-image"></i>
                                                <input type="file" name="imagen" id="imagen"
                                                    accept="image/png, image/jpg, image/jpeg"
                                                    class="w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] pr-3 pl-12 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
                                            </div>
                                        </div>

                                        <div class="boton_container flex">
                                            <button id="submitButtonLocation" class="submitButton"
                                                type="submit">Registrar</button>
                                        </div>
                                    </form>
                                @endslot
                            @endcomponent
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $locations->links() }}
        </section>

    </div>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagePreviewForm');
            var grupoInputs = document.querySelector('.grupo_inputs.img_location');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.grupo_inputs.img_location').classList.add('with-image');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                document.querySelector('.grupo_inputs.img_location').classList.remove('with-image');
            }
        }
    </script>
@endsection
