<!DOCTYPE html>
<html class="vh-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alhanayen Restaurant</title>

    {{-- coming soon --}}
    {{-- Favicon --}}
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image">
    <link rel="apple-touch-icon" href="favicon.ico" />
    
    @if (app()->isLocale('ar'))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    @else
        <link type="text/css" href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    @endif

    <link type="text/css" href="{{ asset('/css/custom.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="position-relative vh-100 d-flex flex-column">

    <header>
        @include('partials._nav')
    </header>

    {{ $slot }}

    {{-- Flash Message --}}
    <x-flash-message />

    {{-- Demo Message --}}
    {{-- <x-demo-message /> --}}

    <div class="container mt-5">
        {{-- coming soon --}}
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 border-top bg-light py-4">
            <div class="col-md-4 mb-3">
                <a class="d-flex align-items-center link-dark text-decoration-none mb-3" href="/">
                    <h2>Alhanayen Restaurant</h2>
                </a>
                <p class="">See <a class="text-decoration-none active" href="/about">Restaurant Description</a></p>
            </div>

            <div class="col mb-3">
                <h5>Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="/">Home</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="/menu">Menu</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="/cart">My Basket</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="/about">About Us</a></li>
                    {{-- <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="#">Reach Us</a></li> --}}
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Support</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="#">Terms and Conditions</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="#">Privacy Policy</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="#">Return and exchange</a></li>
                    <li class="nav-item mb-2"><a class="nav-link link-secondary p-0" href="#">Shipping and delivery</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Reach Us</h5>
                <ul class="nav flex-column">
                    <li class="nav-item bg-light p-1">
                        <a class="text-reset text-decoration-none link-secondary" href="tel:+96265423132" target="_blank">
                            <i class="fs-5 me-1 bi bi-telephone"></i>
                            <span>065423132</span>
                        </a>
                    </li>
                    <li class="nav-item bg-light p-1">
                        <a class="text-reset text-decoration-none link-secondary" href="https://www.facebook.com/Hanayen.Restaurant" target="_blank">
                            <i class="fs-5 me-1 bi bi-facebook"></i>
                            <span>Alhanayen</span>
                        </a>
                    </li>
                    <li class="nav-item bg-light p-1">
                        <a class="text-reset text-decoration-none link-secondary" href="https://www.instagram.com/hanayen.restaurant/" target="_blank">
                            <i class="fs-5 me-1 bi bi-instagram"></i>
                            <span>@hanayen.restaurant</span>
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    <div class="d-flex justify-content-center align-items-center bg-light py-2">
        {{-- <p class="text-muted m-0">Designed & Developed by MUH HL</p> --}}
        <p class="text-muted m-0">Copyright &copy; 2022 Alhanayen. All rights reserved</p>
    </div>
</body>

</html>
