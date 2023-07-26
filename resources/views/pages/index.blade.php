@extends('layout')

@section('title', 'Página de inicio')

@section('content')
    <h1>¡Bienvenido {{ auth()->user()->name }}!</h1>
    <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
    <p>Correo electrónico: {{ auth()->user()->email }}</p>
    <p>Google ID: {{ auth()->user()->google_id }}</p>
    <p>Token: {{ auth()->user()->token }}</p>
@endsection
