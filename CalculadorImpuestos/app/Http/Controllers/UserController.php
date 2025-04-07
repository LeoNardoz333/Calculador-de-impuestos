<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;

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
            'nombre' => 'required|string|max:30|min:2|regex:/^[A-Za-z+ÁÉÍÓÚáéíóúÑñ\s]+$/u',
            'apellido' => 'required|string|max:30|min:2|regex:/^[A-Za-z+ÁÉÍÓÚáéíóúÑñ\s]+$/u',
            'usuario' => 'required|string|max:12|min:3|unique:users,usuario',
            'password' => 'required|string|min:6|max:20|confirmed',
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

    public function validarLogin(Request $request)
    {
        #dd($request->all());
        $validated = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('usuario', $validated['usuario'])->first();
        
        $key = 'login-attemps-' . $request->ip();
        if(RateLimiter::tooManyAttempts($key, 5)){
            throw ValidationException::withMessages([
                'password' => ['Demasiados intentos. Inténtalo de nuevo en uno minutos.'],
            ]);
        }

        if(Auth::attempt([
            'usuario' => $validated['usuario'],
            'password' => $validated['password']
        ], $request->filled('remember'))) {
            RateLimiter::clear($key);
            $request->session()->regenerate();
            return redirect()->intended(route('v_menu-usuarios'));
        }

        RateLimiter::hit($key, 60);
        return back()->withErrors(['usuario' => 'Las credenciales son incorrectas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
