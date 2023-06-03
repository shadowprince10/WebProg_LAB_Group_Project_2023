<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JRamedia | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/homepage" style="color: darkcyan;">JRamedia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(auth()->user() && auth()->user()->role === 'admin')
            <div class="collapse navbar-collapse" id="navbarRightAlignExample">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}" style="color: darkcyan;">View Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transactions') }}" style="color: darkcyan;">View All Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accounts') }}" style="color: darkcyan;">View Accounts</a>
                    </li>
                    <form class="d-flex" role="search" action="{{ route('search') }}">
                      <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false" style="color: darkcyan;">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('home') }}" style="color: darkcyan;">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}" style="color: darkcyan;">View Products</a>
                    </li>
                    <form class="d-flex" role="search" action="{{ route('search') }}">
                      <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false" style="color: darkcyan;">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('cart') }}" style="color: darkcyan;">View Cart</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('home') }}" style="color: darkcyan;">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
<div class="container">
    @yield('container')
</div>

<footer class="text-center fixed-bottom">
    <div class="text-center p-3" style="background-color: white; color: darkcyan;">
        © 2022 JRamedia Book Store
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
