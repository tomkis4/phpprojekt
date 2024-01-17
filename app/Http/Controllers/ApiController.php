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

    public function downloadCatImages()
    {
        $apiKey = 'live_Kg8HqvTiYpHdztHFk3w6RiVaptksun4cHmjtX90wKZ6qVKz1ZZ47wNizOntIlACC';
        $response = Http::get('https://api.thecatapi.com/v1/images/search?limit=10', [
            'api_key' => $apiKey,
        ]);

        $catImages = $response->json();

        $zip = new \ZipArchive();
        $zipFileName = 'cat_images.zip';
        $zipFilePath = storage_path($zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE)) {
            foreach ($catImages as $catImage) {
                $imageUrl = $catImage['url'];
                $imageData = file_get_contents($imageUrl);
                $fileName = uniqid('cat_') . '.jpg';
                $zip->addFromString($fileName, $imageData);
            }

            $zip->close();

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }
//hej hej hej wesołych świąt padawanie
        return response()->json(['message' => 'Failed to create zip file'], 500);
    }
}