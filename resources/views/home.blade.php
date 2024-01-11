@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Udało się pomyślnie zalogować!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <!-- Dodatkowa zawartość do wyświetlenia na stronie home -->
                    <p> Wybierz co chcesz przeglądać</p>

                    <!-- Dodane przyciski -->
                    <div class="d-flex justify-content-between">
                        <!-- Przycisk "Przejdź do lodówki"  po lewjej-->
                        <form action="{{ route('fridge') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Przejdź do lodówki</button>
                        </form>

                        <!-- Przycisk do magnesów -->
                        <form action="{{ route('fun') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success">Magnesy na lodówkę</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

