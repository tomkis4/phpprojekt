<?php

// app/Http/Controllers/FridgeController.php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FridgeController extends Controller
{
    public function showFridge()
    {
        $foods = Food::all();
        return view('fridge', ['foods' => $foods]);
    }

    public function addFood(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'description' => 'nullable|max:100',

        ]);

        Food::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('fridge')->with('success', 'Food added successfully!');
    }

    public function takeFood($foodIndex)
    {
        $food = Food::findOrFail($foodIndex);
        $food->delete(); // Lub $food->update(['taken' => true]); jeśli chcesz oznaczyć jedzenie jako zabrane

        return redirect()->route('fridge')->with('success', 'Food taken from the fridge!');
    }
}




