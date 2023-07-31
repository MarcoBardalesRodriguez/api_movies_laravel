@extends('layout')

@section('title', 'Welcome')

@section('content')
    <h1>Api</h1>
    <p>Fast and easy way to get information about movies</p>

    @auth
    <a
        role="button" 
        class="btn btn-light border border-secondary" 
        href="/api/documentation"
    >
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#AB7C94" d="M0 3.75A.75.75 0 0 1 .75 3h7.497c1.566 0 2.945.8 3.751 2.014A4.495 4.495 0 0 1 15.75 3h7.5a.75.75 0 0 1 .75.75v15.063a.752.752 0 0 1-.755.75l-7.682-.052a3 3 0 0 0-2.142.878l-.89.891a.75.75 0 0 1-1.061 0l-.902-.901a2.996 2.996 0 0 0-2.121-.879H.75a.75.75 0 0 1-.75-.75Zm12.75 15.232a4.503 4.503 0 0 1 2.823-.971l6.927.047V4.5h-6.75a3 3 0 0 0-3 3ZM11.247 7.497a3 3 0 0 0-3-2.997H1.5V18h6.947c1.018 0 2.006.346 2.803.98Z"></path>
            </svg>
            <span class="px-3">Go to documentation</span>
        </div>
    </a>
    @else
    <p>Sign in to get started</p>
    <a
        role="button" 
        class="btn btn-light border border-secondary" 
        href="{{ route('google.login') }}"
    >
        <div class="d-flex align-items-center">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" width="25px" height="25px"/>
            <span class="px-3">Continue with Google</span>
        </div>
    </a>
    @endauth
@endsection