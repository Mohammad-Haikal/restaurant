<!DOCTYPE html>
<html class="vh-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('NAME') }}</title>

    {{-- coming soon --}}
    {{-- Favicon --}}
    {{-- <link type="text/css" href="{{ asset('/css/custom.css') }}" rel="stylesheet" /> --}}

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

    <div class="container mt-5">
        {{-- coming soon --}}

        {{-- <footer class="bg-light border-top mt-auto py-3">
            <div class="text-muted d-flex flex-column flex-md-row justify-content-center align-items-start container">
                <p class="me-auto mb-0"></p>
                <p class="ms-md-auto mb-0">Designed & Developed by MUH HL</p>
            </div>
        </footer> --}}
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 border-top py-4 bg-light">
            <div class="col-md-4 mb-3">
                <a class="d-flex align-items-center link-dark text-decoration-none mb-3" href="/">
                    <h2>{{ env('NAME') }}</h2>
                </a>
                <p class="text-muted">Copyright &copy; 2022 {{ env('NAME') }}. All rights reserved</p>
            </div>

            <div class="col mb-3">
                <h5>Pages Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">Home</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">Features</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">Pricing</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">FAQs</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Terms and Conditions</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">Home</a></li>
                    <li class="nav-item mb-2"><a class="nav-link text-muted p-0" href="#">About</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Contact Us</h5>
                <ul class="list-group list-group-flush">
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-telephone"></i>
                            <span>0654231232</span>
                        </a>
                    </li>
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-facebook"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li>
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-instagram"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li>
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-whatsapp"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li>
                    {{-- <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-youtube"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li>
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-messenger"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li>
                    <li class="p-1 list-group-item bg-light">
                        <a class="text-reset text-decoration-none link-secondary" href="#">
                            <i class="fs-5 me-1 bi bi-google"></i>
                            <span>{{ env('NAME') }}</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </footer>
    </div>
    <div class="d-flex justify-content-center align-items-center py-2 bg-light">
        <p class="text-muted m-0">Designed & Developed by MUH HL</p>
    </div>
</body>

</html>
