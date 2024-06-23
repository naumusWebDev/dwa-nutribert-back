<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::all();
        return response()->json($messages, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefono' => 'nullable|string|max:15',
            'mensaje' => 'required|string|max:255',
        ]);

        $message = ContactMessage::create($validatedData);

        return response()->json([
            'message' => 'Mensaje creado correctamente.',
            'data' => $message
        ], 201);
    }

    public function destroy($id)
    {
        $message = ContactMessage::find($id);

        if (!$message) {
            return response()->json([
                'message' => 'Mensaje no encontrado.'
            ], 404);
        }

        $message->delete();

        return response()->json([
            'message' => 'Mensaje eliminado correctamente.'
        ], 200);
    }
}
