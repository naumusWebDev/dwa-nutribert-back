<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    // Método para almacenar una nueva cita
    public function store(Request $request)
    {
        $data = $request->validate([
            'dia' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'notas' => 'nullable|string',
        ]);

        $cita = Cita::create($data);

        return response()->json(['message' => 'Cita creada correctamente.', 'data' => $cita], 201);
    }

    // Método para obtener todas las citas
    public function index()
    {
        $citas = Cita::all();
        return response()->json($citas, 200);
    }
    public function destroy($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada.'], 404);
        }

        $cita->delete();

        return response()->json(['message' => 'Cita eliminada correctamente.'], 200);
    }
}

