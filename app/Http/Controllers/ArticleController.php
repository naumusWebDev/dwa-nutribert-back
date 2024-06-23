<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imagen
        ]);

        // Procesar la imagen destacada si se envió
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Almacenar la imagen en la carpeta public/images dentro de storage
            $imagePath = $image->storeAs('public/images', $imageName);

            // Obtener la URL de la imagen almacenada
            $imageUrl = Storage::url($imagePath);

            // Asignar el nombre del archivo de imagen al artículo
            $validatedData['featured_image'] = $imageName;
        }

        // Crear el artículo con los datos validados
        $article = Article::create($validatedData);

        return response()->json(['message' => 'Artículo creado correctamente.', 'data' => $article], 201);
    }
}
