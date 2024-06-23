<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();

        // Return users as JSON response
        return response()->json($users);
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente.'], 200);
    }
}
