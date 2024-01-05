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
            transition: transform 0.3s ease; /* Dodajemy animację dla właściwości transform */
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

        /* Styl dla uchwytów (drzwiczek lodówki) */
        .handle {
            width: 20px;
            height: 80px;
            background-color: #a9a9a9; /* Szary kolor */
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 5px;
            cursor: pointer; /* Dodajemy kursor wskazujący na to, że element jest interaktywny */
            transition: left 0.3s ease; /* Dodajemy animację dla właściwości left */
        }

        /* Pozycjonowanie uchwytów */
        .handle-left {
            left: 0;
        }

        .handle-right {
            right: 0;
        }

        /* Dodatkowe style dla otwartej lodówki */
        .fridge.open .fridge-section {
            transform: translateX(-50%);
        }

        .fridge.open .handle-left {
            left: -20px;
        }

        .fridge.open .handle-right {
            right: -20px;
        }
    </style>
</head>
<body>
    <h1>Zarządzanie lodówką</h1>
    
    <div class="fridge" id="fridge">
        <div class="freezer"></div>
        <div class="fridge-section">
            <!-- Formularz dodawania jedzenia -->
            <form action="{{ route('addFood') }}" method="post">
                @csrf
                <label for="foodName">Nazwa jedzenia:</label>
                <input type="text" id="foodName" name="foodName" required>
                <button type="submit">Dodaj jedzenie</button>
            </form>

            <!-- Lista jedzenia w lodówce -->
            @if(count($foods) > 0)
                <ul>
                    @foreach ($foods as $food)
                        <li>{{ $food->name }} - {{ $food->description }}</li>
                    @endforeach
                </ul>
            @else
                <p>Brak dostępnego jedzenia w lodówce.</p>
            @endif
        </div>
        <div class="handle handle-left" id="leftHandle"></div>
        <div class="handle handle-right" id="rightHandle"></div>
    </div>

    <script>
        document.getElementById("leftHandle").addEventListener("click", toggleFridge);
        document.getElementById("rightHandle").addEventListener("click", toggleFridge);

        function toggleFridge() {
            var fridge = document.getElementById("fridge");
            var handles = document.querySelectorAll('.handle'); /* Znajdujemy wszystkie uchwyty */

            fridge.classList.toggle("open"); /* Dodajemy lub usuwamy klasę, aby otworzyć lub zamknąć lodówkę */

            /* Dodatkowa obsługa zdarzeń dla uchwytów, aby były dostępne do ponownego kliknięcia */
            handles.forEach(function (handle) {
                handle.style.pointerEvents = handle.style.pointerEvents === 'none' ? 'auto' : 'none';
            });
        }
    </script>
</body>
</html>


