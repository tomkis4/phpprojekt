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





