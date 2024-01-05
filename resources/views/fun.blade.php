<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrazy kotów</title>
</head>
<body>
    <h1>Obrazy kotów</h1>

    @if(isset($catImages) && is_array($catImages))
        @foreach ($catImages as $catImage)
            <img src="{{ $catImage['url'] }}" alt="Kot">
        @endforeach
    @else
        <p>Brak dostępnych obrazów kotów.</p>
    @endif
</body>
</html>
