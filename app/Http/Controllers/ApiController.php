<?php

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
}




