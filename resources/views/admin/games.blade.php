@extends('layouts.html')

@section('tittle', 'Partidos | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.admin_header')
    @endcomponent

@endsection
