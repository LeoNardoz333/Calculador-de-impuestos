<form method="POST" action="{{ route('login') }}" class="w-100">
    @csrf
    <div class="text-center mt-2 mb-3">
        <h2 class="bold-title-login">Inicio de sesión</h2>
    </div>

    <div class="mt-2">
        <label class="login" for="username">Usuario:</label>
    </div>

    <div>
        <input type="text" class="form-control login-form-input-text" id="username" name="username"
            autocomplete="username" autofocus required placeholder="Ingresa el nombre de usuario"
            value="{{ old('username') }}">
    </div>

    @error('username')
        <p class="text text-danger text-center">{{ $message }}</p>
    @enderror

    <div class="mt-2">
        <label class="login" for="password">Contraseña:</label>
    </div>

    <div class="position-relative">
        <input class="form-control login-form-input-text" type="password" id="password" autocomplete="current-password"
            required name="password" placeholder="Ingresa la contraseña">

        <button class="absolute-input-icon end-0" id="togglePassword" type="button" aria-label="Mostrar contraseña">
            <i class="bi bi-eye-fill absolute-input-icon auth-eye-color" id="iconPassword"></i>
        </button>
    </div>

    @error('password')
        <p class="text text-danger text-center">{{ $message }}</p>
    @enderror

    <div class="mt-4">
        <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>
    </div>

    <div class="w-100 form-check d-flex align-items-center justify-content-center mt-2">
        <input type="checkbox" id="remember" class="form-check-input me-2" name="remember">

        <label for="remember" class="form-check-label pt-2">Recuérdame</label>
    </div>
</form>
