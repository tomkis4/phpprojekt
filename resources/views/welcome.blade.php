<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Witaj w lodówce!</title>
    <!-- Dodaj link do pliku CSS z biblioteką Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Strona Główna
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <a class="dropdown-item" href="{{ route('home') }}">
                                    Lodówka
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="flex items-center justify-center space-x-">
    <div class="bg-white p-8 rounded shadow-md mx-auto max-w-md mt-10 mb-10">
        <!-- bloczek głowny-->
        <h1 class="text-2xl font-bold">Witaj w Lodówce!</h1>
        <!-- Napis pod spodem  -->
        <p class="mt-4">Aby zobaczyć co mamy do jedzenia musisz się zalogować</p>
    </div>

     <!-- Drugi bloczek po prawej stronie -->
    <div class="bg-white p-8 rounded shadow-md mx-auto max-w-md mt-10 mb-10">
    <!-- Napis główny-->
    <h1 class="text-2xl font-bold">Na lodówce przydałby się magnes</h1>
    <!-- Napis pod spodem  -->
    <p class="mt-4">Aby zobaczyć przykładowe obrazki na magnes <a href="{{ url('/fun') }}">Kliknij tutaj</a>! </p>
    </div>




</div>





</body>
</html>













<!--


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Witaj w lodówce!</title>
</head>
<body>
    <h1>Witaj w lodówce!</h1>
    
    <p>
        Aby zarządzać lodówką, 
        <a href="{{ route('login') }}">zaloguj się</a> 
        lub 
        <a href="{{ route('register') }}">zarejestruj się</a>.
    </p>

    <p>Chcesz się dobrze bawić? <a href="{{ url('/fun') }}">Kliknij tutaj</a>!</p>
</body>
</html>



-->

