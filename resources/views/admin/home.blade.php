@extends('layouts.html')

@section('tittle', 'Home | Admin')

@section('content')
    <h1>Hola admin</h1>
    <div class="alert alert-success">
        <a href="{{ route('home') }}">Gestionar mi equipo</a>
    </div>

@endsection
