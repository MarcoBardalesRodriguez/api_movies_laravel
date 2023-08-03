@extends('layout')

@section('title', 'Welcome')

@section('content')
    <!-- <div 
        class="overflow-visible"
        style="
            width: 100%;
            min-height: 125px;
            animation: moveLeft 4s linear infinite;
            overflow-x: hidden;
        "
    >
        <div
            style="
                background-image: url('https://th.bing.com/th/id/OIP.eEG7fUDBY87E_4f-4AZ3YQAAAA?pid=ImgDet&rs=1');
                position: relative;
                width: 300%;
                min-height: 125px;
                animation: moveLeft 20s ease-in-out infinite;
            " 
        >
        </div>
    </div> -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div 
        class="carousel-inner text-light"
        style="
            background-image: url('{{URL::asset('/image/banner_movies.jpg')}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 400px;
        "
        >
            <div 
            class="carousel-item active" 
            data-bs-interval="2000"
            style="height: 100%; background-color: rgba(0,0,0,0.75);"
            >
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.75);transform: ;msFilter:;"><path d="M18 11c0-.959-.68-1.761-1.581-1.954C16.779 8.445 17 7.75 17 7c0-2.206-1.794-4-4-4-1.516 0-2.822.857-3.5 2.104C8.822 3.857 7.516 3 6 3 3.794 3 2 4.794 2 7c0 .902.312 1.726.817 2.396A1.993 1.993 0 0 0 2 11v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-2.637l4 2v-7l-4 2V11zm-5-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zM6 5c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path></svg>
                    <span class="display-3">+ 7000 </span>
                    <span class="display-6">movies</span>
                </div>
            </div>
            <div 
            class="carousel-item" 
            data-bs-interval="2000"
            style="height: 100%; background-color: rgba(0,0,0,0.75);"
            >
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(255,255,255, 0.75);transform: ;msFilter:;"><path d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm1.5 1H8c-3.309 0-6 2.691-6 6v1h15v-1c0-3.309-2.691-6-6-6z"></path><path d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z"></path></svg>
                    <span class="display-3">+ 12000 </span>
                    <span class="display-6">actors and directors</span>
                </div>
            </div>
            <div 
            class="carousel-item" 
            data-bs-interval="2000"
            style="height: 100%; background-color: rgba(0,0,0,0.75);"
            >
                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 0.75);transform: ;msFilter:;"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                    <span class="display-3">+ 10 </span>
                    <span class="display-6">genres</span>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="d-flex flex-column align-items-center p-3">
        <h2>Fast and easy way to get information about movies</h2>
        @auth
            <a
                role="button" 
                class="btn btn-light border border-secondary mt-3" 
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
            <a
                role="button" 
                class="btn btn-light border border-secondary my-3" 
                href="{{ route('google.login') }}"
            >
                <div class="d-flex align-items-center">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" width="25px" height="25px"/>
                    <span class="px-3">Continue with Google</span>
                </div>
            </a>
            <h6>Sign in to get started</h6>
        @endauth
    </div>
@endsection