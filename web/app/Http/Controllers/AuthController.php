<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use App\Services\MongoService;

class AuthController extends Controller
{
    /**
     * Servicio de MongoDB inyectado.
     *
     * @var MongoService
     */
    protected MongoService $mongoService;
    
    public function __construct(MongoService $mongoService)
    {
        $this->mongoService = $mongoService;
    }
    
    public function attempt(Request $request)
    {
        #dd($request->all());
        $validated = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $key = 'login-attemps-' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'password' => ['Demasiados intentos. Inténtalo de nuevo en unos minutos.'],
            ]);
        }

        if (Auth::attempt([
            'usuario' => $validated['usuario'],
            'password' => $validated['password']
        ], $request->filled('remember'))) {
            RateLimiter::clear($key);
            $request->session()->regenerate();                                  #document, field, filter
            $usuario = $this->mongoService->getDocument("users", "usuario", $validated['usuario']);
            if ($usuario->permisos == 'admin' && $request->permisos == 'admin')
                return redirect()->intended(route('v_menu-admins'));
            else if ($usuario->permisos == 'usuario' && $request->permisos == 'user')
                return redirect()->intended(route('v_menu-usuarios'));
            else if ($usuario->permisos == 'admin' && $request->permisos == 'user') {
                Auth::logout();
                return back()->withErrors(['usuario' => 'Las credenciales son incorrectas.']);
            } else if ($usuario->permisos == 'usuario' && $request->permisos == 'admin') {
                Auth::logout();
                return back()->withErrors(['usuario' => 'Este usuario no cuenta con permisos de administrador.']);
            } else {
                Auth::logout();
                return back()->withErrors(['usuario' => 'Las credenciales son incorrectas.']);
            }
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
