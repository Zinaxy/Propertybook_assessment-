<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/app.css')

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="hero">
        <div class="container">
            <a class="navbar-brand" href="/dashboard"><i class="bi bi-capsule  m-2"></i>BusinessAdmin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-autod pl-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('hero-content.index')}}>Hero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('about-us.index')}}>About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services.index')}}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('prices.index')}}">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class=" btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        {{ $slot }}
    </div>
    @vite('resources/js/app.js')
</body>

</html>