<?php
// app/Http/Controllers/ApiController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getCatImages()
    {
        $apiKey = 'live_Kg8HqvTiYpHdztHFk3w6RiVaptksun4cHmjtX90wKZ6qVKz1ZZ47wNizOntIlACC';
        $response = Http::get('https://api.thecatapi.com/v1/images/search?limit=10', [
            'api_key' => $apiKey,
        ]);

        $catImages = $response->json();

        return view('fun', compact('catImages'));
    }

    public function downloadCatImages()
    {
        // Logika do pobrania obrazów kotów
        $apiKey = 'live_Kg8HqvTiYpHdztHFk3w6RiVaptksun4cHmjtX90wKZ6qVKz1ZZ47wNizOntIlACC';
        $response = Http::get('https://api.thecatapi.com/v1/images/search?limit=10', [
            'api_key' => $apiKey,
        ]);

        $catImages = $response->json();

        // Logika do zapisywania obrazów w C:\zaliczenie\pobrane
        $downloadPath = 'C:\zaliczenie\pobrane\\';
        foreach ($catImages as $catImage) {
            $imageUrl = $catImage['url'];
            $imageData = file_get_contents($imageUrl);
            $fileName = uniqid('cat_') . '.jpg';
            file_put_contents($downloadPath . $fileName, $imageData);
        }

        // Przykład: Zwracamy JSON z informacją o pomyślnym pobraniu i zapisaniu obrazów
        return response()->json(['message' => 'Images downloaded and saved successfully']);
    }
}






