@extends('layouts.html')

@section('tittle', 'Login')

@section('imports')
    @vite('resources/css/complements/all.css')

    @vite('resources/css/login.css')
    @vite('resources/js/login.js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    @if (!session('errorMessage'))
        @component('_components.preload')
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


    <div class="container" id="container">
        <div class="form-container sign-up">
            <p class="titulito">Sobre nosotros</p>
            <p class="liga_description">En {{ env('NOMBRE_LIGA') }}, creemos que el éxito reside en el trabajo en equipo.<br><br>
                Somos un grupo apasionado y
                dedicado de personas comprometidas, unidos por el objetivo común de buena comunicacion para fomentar el
                deporte sano entre conocidos y amigos<br><br>
                Visitanos en nuestras redes sociales:
            </p>
            <div class="social-icons">
                <a href="#" class="icon gulugulu"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon facebuk"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon githab"><i class="fa-brands fa-github"></i></a>
            </div>
        </div>
        <div class="form-container sign-in">
            <form action="{{ route('postLogin') }}" method="post">
                @csrf
                <p class="titulito">Iniciar sesion</p>

                <div class="labels">
                    <label for="email">Correo electronico</label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Ingresa tu correo electronico">
                    </div>
                </div>
                <div class="labels">
                    <label for="password">Contraseña</label>
                    <div class="grupo_inputs">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
                    </div>
                </div>

                <button>Iniciar sesion</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <div class="imgLogo"></div>
                    <button class="hidden" id="login">Regresar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <p class="titulito">{{ env('NOMBRE_LIGA') }}</p>
                    <p>Bienvenido, accede para gestionar tu equipo</p>
                    <button class="hidden" id="register">Saber màs</button>
                </div>
            </div>
        </div>
    </div>

@endsection
