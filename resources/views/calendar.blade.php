@extends('layouts.html')

@section('tittle', 'Calendario')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/calendar.css')
    @vite('resources/css/complements/tailwind.css')

@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.header')
    @endcomponent


@endsection
