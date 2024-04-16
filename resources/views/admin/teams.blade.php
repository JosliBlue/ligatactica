@extends('layouts.html')

@section('tittle', 'Equipos | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.admin_header')
    @endcomponent

@endsection
