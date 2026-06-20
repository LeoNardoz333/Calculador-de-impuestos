<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;
use App\Enums\UserRole;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            ...$request->validated(),
            'role' => UserRole::TAXPAYER,
        ]);

        return redirect()
            ->route('auth.users.login')
            ->with('success', 'Usuario registrado exitosamente. Por favor, inicie sesión.');
    }

    public function login(Request $request)
    {
        $routes = [
            UserRole::ADMIN => 'admins.dashboard',
            UserRole::TAXPAYER => 'users.dashboard',
            UserRole::ACCOUNTANT => 'accountants.dashboard',
        ];

        $validated = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $key = 'login-attempts-' . $request->ip() . '-' . $validated['login'];

        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'login' => ['Demasiados intentos. Inténtalo de nuevo en unos minutos.'],
            ]);
        }

        $field = filter_var($validated['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([
            $field => $validated['login'],
            'password' => $validated['password']
        ], $request->boolean('remember'))) {

            RateLimiter::clear($key);
            $request->session()->regenerate();
            $user = Auth::user();

            return match ($user->role) {
                UserRole::ADMIN => redirect()->intended('admins/dashboard'),
                UserRole::TAXPAYER => redirect()->route('users.dashboard'),
                UserRole::ACCOUNTANT => redirect()->route('accountants.dashboard'),
                
                default => tap(Auth::logout(), fn() =>
                    back()->withErrors(['login' => 'Rol inválido.'])
                ),
            };
        }

        RateLimiter::hit($key, 60);
        return back()->withErrors(['login' => 'Las credenciales son incorrectas.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
