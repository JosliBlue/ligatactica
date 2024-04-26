@extends('layouts.html')

@section('tittle', 'Mi equipo')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/my_team.css')
@endsection

@section('content')
    @component('_components._partials.preload')
    @endcomponent

    @component('_components.header')
    @endcomponent



@endsection
