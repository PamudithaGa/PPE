<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class ImageController extends Controller
{
    public function getImage($filename)
    {
        $path = public_path('img/' . $filename);

        if (!file_exists($path)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        return response()->file($path, [
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => mime_content_type($path)
        ]);
    }
}
