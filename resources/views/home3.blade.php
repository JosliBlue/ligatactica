@extends('layouts.html')

@section('tittle', 'Home')

@section('imports')
    @vite('resources/css/complements/all.css')
@endsection

@section('content')
@component('_components.header')@endcomponent

    <h1>Hola presidente | Home3</h1>
    @auth
        @if (auth()->user()->role == env('ROLE_ADMIN'))
            <div class="alert alert-success">
                <a href="{{ route('admin_home') }}">Gestionar mi liga</a>
            </div>
        @endif
    @endauth

@endsection
