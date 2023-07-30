@extends('layout')

@section('title', 'New Tokens')

@section('content')
    <h2>Token</h2>
    <p>{{ $token }}</p>
    <a href="{{route('tokens.index')}}">volver</a>
@endsection