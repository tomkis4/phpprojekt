<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Pobierz jedzenie (możesz dostosować to do swojego modelu danych)
        $foods = ['Mleko', 'Jajka', 'Ser'];

        return view('home', compact('foods'));
    }

    /**
     * Dodaj jedzenie do lodówki.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFood(Request $request)
    {
        // Walidacja formularza
        $request->validate([
            'foodName' => 'required|string|max:255',
        ]);

        // Dodaj jedzenie do lodówki (możesz dostosować to do swojego modelu danych)
        // Na razie dodajmy do tablicy $foods
        $foods[] = $request->input('foodName');

        // Przekieruj z powrotem na stronę lodówki z nowym jedzeniem
        return redirect()->route('fridge')->with('foods', $foods);
    }
}
