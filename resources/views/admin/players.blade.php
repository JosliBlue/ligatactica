@extends('layouts.html')

@section('tittle', 'Jugadores | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
@endsection

@section('content')
    @component('_components._partials.preload')
    @endcomponent

    @component('_components.admin_header')
    @endcomponent

@endsection
