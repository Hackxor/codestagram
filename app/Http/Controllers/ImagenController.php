<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request){
        // identificando tipo de imagen
        $imagen=$request->file('file');
        // añadiendo nombre aleatorio y la extension a la imagen
        $nombreImagen = Str::uuid() . '.' . $imagen->extension();
        // mandando la imagen a servidor y asignando tamaños de la imagen
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000,1000);
        // añadiendo ruta a las imagenes
        $imagenPath = public_path('uploads'). '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
