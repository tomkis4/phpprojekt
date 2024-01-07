<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lodówka</title>
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
    <h1>Zarządzanie lodówką</h1>
    
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

    <!-- Formularz wylogowania -->
    <form class="logout-btn" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Wyloguj się</button>
    </form>

    <!-- Przycisk do /fun -->
    <a href="{{ route('fun') }}" class="fun-btn">Słodkie kotki</a>
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










