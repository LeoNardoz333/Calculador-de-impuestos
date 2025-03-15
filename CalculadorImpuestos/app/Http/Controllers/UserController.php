<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user)
            return response()->json(['mensaje' => 'El usuario no existe'], 404);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|min:2|regex:/^[A-Za-z+ÁÉÍÓÚáéíóúÑñ\s]+$/u',
            'apellido' => 'required|string|max:150|regex:/^[A-Za-z+ÁÉÍÓÚáéíóúÑñ\s]+$/u',
            'usuario' => 'required|string|max:12',
            'password' => 'required|string|min:6|max:20|confirmed',
            'password_confirmation' => 'required|string|min:6|max:20',
            'permisos' => 'required|string',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        return redirect()->route('V_login-usuarios')->with('success', 'Usuario creado exitosamente');
        /*
                @if(session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif 
        */
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(!$user)
            return response()->json(['message' => 'El usuario no existe'],404);

       $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:150',                
            'usuario' => 'required|string|max:8',
            'password' => 'required|string|min:6|max:20',
            'confirm-password' => 'required|string|min:6|max:20',
        ]);

        if(isset($validated['contrasena']))
            $validated['contrasena'] = bcrypt($validated['contrasena']);

        $user->update($validated);
        return response()->json($user);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user)
            return response()->json(['message'=>'El usuario no existe'], 404);

        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
