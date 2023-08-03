<!DOCTYPE html>
<html>
<head>
    <title>ApiMovies - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body, html {
            overflow-x: hidden;
        }

        @keyframes moveLeft {
            0% {
                transform: translateX(-5%);
            }
            100% {
                transform: translateX(-50%);
            }
        }
    </style>
</head>
<body class="d-flex flex-column bg-white" style="min-height:100vh;">
    <header>
        @include('components.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-auto">
        @include('components.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
