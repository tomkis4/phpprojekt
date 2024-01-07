@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Additional Content') }}</div>

                <div class="card-body">
                    <!-- Dodatkowa zawartość do wyświetlenia na stronie home -->
                    <p>Place your additional content here.</p>

                    <!-- Dodane przyciski -->
                    <div class="d-flex justify-content-between">
                        <!-- Przycisk "Przejdź do lodówki" -->
                        <form action="{{ route('fridge') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Przejdź do lodówki</button>
                        </form>

                        <!-- Przycisk "Słodkie kotki" -->
                        <form action="{{ route('fun') }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success">Słodkie kotki</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

