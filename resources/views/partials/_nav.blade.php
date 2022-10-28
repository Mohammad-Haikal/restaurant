@php
    $categories = App\Models\Category::all();
@endphp

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fs-4" href="/">
            {{ env('NAME') }}
        </a>
        <button class="navbar-toggler d-lg-none" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" type="button" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('menu') ? 'active' : '' }}" id="menu" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="menu">
                        <a class="dropdown-item" href="/menu">All</a>
                        @foreach ($categories as $category)
                            <a class="dropdown-item" href="/category/{{ $category['id'] }}">{{ $category['name'] }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="/cart">My Basket</a>
                </li>
                <li class="nav-item">
                    {{-- coming soon --}}
                    <a class="nav-link disabled" href="#">Reach Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="border-bottom bg-white py-1">
    <div class="d-flex align-items-center justify-content-between container">
        @guest
            <ul class="nav d-flex align-items-center me-auto">
                <li class="nav-item">
                    <a class="btn btn-sm btn-danger px-2" href="/register">Sign Up</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="/login">Login</span></a>
                </li>
            </ul>
        @endguest

        @auth
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-capitalize" id="menu" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">{{ Auth::user()['name'] }}</a>
                    <div class="dropdown-menu" aria-labelledby="menu">
                        @if (Auth::user() && Auth::user()->role == 1)
                            <a class="dropdown-item fw-bold" href="/dashboard">Admin Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="/orderHistory">Order History</a>
                        <a class="dropdown-item" href="/settings">Account Settings</a>
                        <form action="/logout" method="post">
                            @csrf
                            <input class="dropdown-item text-danger" type="submit" value="Logout">
                        </form>
                    </div>
                </li>
            </ul>
        @endauth

        @if (!request()->is('cart'))
            <a class="text-dark pe-2 me-3 position-relative py-0" href="/cart">
                <i class="fs-3 bi bi-basket"></i>
                <span class="position-absolute start-100 translate-middle badge bg-danger rounded-1" style="top: 25%">
                    {{ session()->get('size', 0) }}
                </span>
            </a>
        @endif
    </div>
</div>
