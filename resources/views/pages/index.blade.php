@extends('layout')

@section('title', 'Home')

@section('content')
    <h1>Welcome {{ auth()->user()->name }}!</h1>
    <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
@endsection
