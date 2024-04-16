@extends('layouts.html')

@section('tittle', 'Inicio')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/home.css')
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.header')
    @endcomponent
    <h1>Hola {{ Auth::user()->nombre }}</h1>

@endsection
