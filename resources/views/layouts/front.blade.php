<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ env('APP_NAME') }}</title>
    @yield('head_script')

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('stripe_css')
</head>

<body>
    <!-- Responsive navbar-->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('front.index') }}">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 ">

                </ul>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-dark">
                    <i class="bi-cart-fill me-1"></i>
                    Panier <span class="badge bg-dark text-white ms-1 rounded-pill">{{ Cart::count() }}</span>
                </a>
                @guest
                @if (Route::has('login'))
                <ul class="navbar-nav">
                    <li class="ml-2">
                        <a class="btn btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                </ul>
                @else
                <div class="dropdown ml-2">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i>
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Mes preférences</a></li>
                        <li><a class="dropdown-item" href="#">Mes Commandes</a></li>
                    </ul>
                </div>
                @endif
                @endguest
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">@yield('title', '')</h1>
                {{-- <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p> --}}
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container my-4">
        @if (Session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif (Session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @yield('content')
    </div>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    <!-- Core theme JS-->
</body>

</html>