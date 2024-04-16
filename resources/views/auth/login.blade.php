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

    @if (!$errors->has('errorCredentials'))
        @component('_components.preload')
        @endcomponent
    @endif

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Sobre nosotros</h1>
                <!--
                    <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    -->
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="{{ route('postLogin') }}" method="post">
                @csrf
                <h1>Iniciar sesion</h1>

                <div class="labels">
                    <i class="fa-solid fa-user"></i>
                    <label for="email">Correo electronico</label>
                </div>
                <input type="email" name="email" id="email" placeholder="Ingresa tu correo electronico">
                <div class="labels">
                    <i class="fa-solid fa-lock"></i>
                    <label for="password">Contraseña</label>
                </div>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
                @if ($errors->has('errorCredentials'))
                    @component('_components.sweetAlert')
                        @slot('icon', 'error')
                        @slot('message')
                            {{ $errors->first('errorCredentials') }}
                        @endslot
                    @endcomponent
                @endif

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
                    <h1>{{ env('NOMBRE_LIGA') }}</h1>
                    <p>Bienvenido, accede para gestionar tu equipo</p>
                    <button class="hidden" id="register">Saber màs</button>
                </div>
            </div>
        </div>
    </div>

@endsection
