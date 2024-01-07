<!-- resources/views/fun.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Fun Page') }}</div>

                <div class="card-body">
                    <!-- Zawartość strony /fun -->
                    @if(auth()->check())
                        <!-- Warunek sprawdzający, czy użytkownik jest zalogowany -->
                        <style>
                            /* Styl dla zalogowanego użytkownika na stronie /fun */
                            body {
                                background-color: #00ff00; /* Zielone tło */
                            }
                        </style>
                    @endif

                    <h1>Obrazy kotów</h1>

                    @if(isset($catImages) && is_array($catImages))
                        @foreach ($catImages as $catImage)
                            <img src="{{ $catImage['url'] }}" alt="Kot">
                        @endforeach
                    @else
                        <p>Brak dostępnych obrazów kotów.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ... Twój istniejący skrypt JavaScript ...
</script>

@endsection

