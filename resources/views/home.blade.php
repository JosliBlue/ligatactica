@extends('layouts.html')

@section('tittle', 'Home')

@section('content')
    <h1>Hola presidente</h1>
    @auth
        @if (auth()->user()->role == env('ROLE_ADMIN'))
            <div class="alert alert-success">
                <a href="{{ route('admin_home') }}">Gestionar mi liga</a>
            </div>
        @endif
    @endauth
    <!-- not necessary because guests do not have permission for any route
    @guest
        <div class="alert alert-info">
            No tienes permisos de administrador o presidente.
        </div>
    @endguest
    -->
@endsection
