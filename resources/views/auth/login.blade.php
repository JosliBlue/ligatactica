@extends('layouts.html')

@section('tittle', 'Login')

@section('styles')
@vite('resources/css/app.css')
@endsection

@section('content')

    <form action="{{ route('postLogin') }}" method="post">
        @csrf
        <label for="email">Nombre o correo electronico</label>
        <input type="email" name="email" id="email" >

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        @if ($errors->has('errorCredentials'))
            <p class="error-message">
                {{ $errors->first('errorCredentials') }}
            </p>
        @endif
        <input type="submit" value="Login">


    </form>

@endsection
