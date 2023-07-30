<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" style="justify-content: space-between">
        <a class="navbar-brand" href="{{ route('/') }}">ApiMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (Route::has('google.login'))
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tokens.index') }}">Tokens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('google.logout') }}">Log out</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('google.login') }}">Log in</a>
                </li>
                @endauth
            </ul>
        </div>
        @endif
    </div>
</nav>