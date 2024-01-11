<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lodówka</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Styl dla lodówki */
        .fridge {
            width: 300px;
            height: 500px;
            background-color: #f0f0f0;
            border: 5px solid #ccc;
            position: relative;
            margin: 50px auto;
            overflow: hidden; /* Ukrywamy zawartość, która wyjeżdża poza granice lodówki */
        }

        /* Styl dla zamrażarki (górnej części lodówki) */
        .freezer {
            width: 100%;
            height: 30%;
            background-color: #b0e0e6; /* Jasnoniebieski kolor */
        }

        /* Styl dla sekcji chłodziarki (pozostała część lodówki) */
        .fridge-section {
            width: 100%;
            height: 70%;
            background-color: #ffffff; /* Biały kolor */
            position: relative;
            padding: 20px; /* Dodajemy odstęp dla formularza i listy */
        }

        /* Nowy styl dla suwaka */
        .food-list {
            overflow-y: auto; /* Dodajemy przewijanie pionowe */
            max-height: calc(70% - 40px); /* Maksymalna wysokość listy (70% wysokości lodówki minus odstęp dla formularza) */
        }

        /* Styl dla przycisku wylogowania */
        .logout-btn {
            margin-top: 20px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* Styl dla przycisku do /fun */
        .fun-btn {
            margin-top: 20px;
            position: absolute;
            top: 10px;
            right: 100px;
        }
    </style>
</head>
<body>



    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Strona Główna                                               <!-- dodana zmiana nazwy -->
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





























    <div class="flex items-center justify-center space-x-">
        <div class="bg-white p-8 rounded shadow-md mx-auto max-w-md mt-10 mb-10">
            <!-- bloczek głowny-->
            <h1 class="text-2xl font-bold">Zarządzanie lodówką</h1>
            <!-- Napis pod spodem  -->
            <p class="mt-4"></p>
        </div>
    





    
    
    <div class="fridge" id="fridge">
        <div class="freezer"></div>
        <div class="fridge-section">
            <!-- Formularz dodawania i zabierania jedzenia -->
            <form action="{{ route('addFood') }}" method="post">
                @csrf
                <label for="name">Nazwa jedzenia:</label>
                <input type="text" id="name" name="name" required>
                <label for="description">Opis jedzenia:</label>
                <input type="text" id="description" name="description">
                <button type="submit">Dodaj jedzenie</button>
            </form>

            <!-- Zmodyfikowana lista jedzenia z dodanym suwakiem -->
            @if(count($foods) > 0)
                <div class="food-list">
                    <ul>
                        @foreach ($foods as $food)
                            <li>
                                {{ $food->name }} - {{ $food->description }}
                                <a href="{{ route('takeFood', ['foodIndex' => $food->id]) }}" onclick="return confirm('Czy na pewno chcesz zabrać to jedzenie?')">Zabierz</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p>Brak dostępnego jedzenia w lodówce.</p>
            @endif
        </div>
    </div>

    <!-- Formularz wylogowania 
    <form class="logout-btn" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Wyloguj się</button>
    </form>

    Przycisk do /fun 
    <a href="{{ route('fun') }}" class="fun-btn">Słodkie kotki</a>

-->

    <script>
        // Funkcja sprawdzająca długość pola 'name'
        function checkNameLength() {
            var nameInput = document.getElementById('name');
            var nameLength = nameInput.value.length;

            if (nameLength > 100) {
                alert("Błąd: Pole 'Nazwa jedzenia' nie może przekraczać 100 znaków.");
                nameInput.value = nameInput.value.substring(0, 100); // Ucinamy tekst do 100 znaków
            }
        }

        // Funkcja sprawdzająca długość pola 'description'
        function checkDescriptionLength() {
            var descriptionInput = document.getElementById('description');
            var descriptionLength = descriptionInput.value.length;

            if (descriptionLength > 100) {
                alert("Błąd: Pole 'Opis jedzenia' nie może przekraczać 100 znaków.");
                descriptionInput.value = descriptionInput.value.substring(0, 100); // Ucinamy tekst do 100 znaków
            }
        }

        // Przypisanie funkcji do zdarzenia 'input' dla pól 'name' i 'description'
        document.getElementById('name').addEventListener('input', checkNameLength);
        document.getElementById('description').addEventListener('input', checkDescriptionLength);
    </script>

</body>
</html>










