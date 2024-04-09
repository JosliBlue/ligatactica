@extends('layouts.html')

@section('tittle', 'Login')

@section('content')

    <form action="/login" method="post">
        @csrf
        Nombre o correo electronico
        <input type="email" name="email" id="" value="{{ old('email') }}">

        Contraseña
        <input type="password" name="password" id="" value="{{ old('password') }}">
        @if ($errors->has('errorCredentials'))
            <p class="error-message">
                {{ $errors->first('errorCredentials') }}
            </p>
        @endif
        <input type="submit" value="Login">

    </form>

@endsection
