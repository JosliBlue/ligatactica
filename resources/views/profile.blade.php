@extends('layouts.html')

@section('tittle', 'Mi perfil')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/profile.css')
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.header')
    @endcomponent



@endsection
