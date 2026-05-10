@props(['permissions', 'loginTitle'])
<input type="hidden" name="permisos" value="{{ $permissions }}">
<div class="text-center mt-2 mb-3">
    <label class="titulos-negritas">{{ $loginTitle }}</label>
</div>
<div class="mt-2">
    <label class="login">Usuario:</label>
</div>
<div>
    <input type="text" class="form-control login-form-input-text" name="usuario" 
    placeholder="Ingresa el nombre de usuario" value="{{ old('usuario') }}">
</div>
@error('usuario')
    <p class="text text-danger text-center">{{ $message }}</p>
@enderror
<div class="mt-2">
    <label class="login">Contraseña:</label>
</div>
<div class="position-relative">
    <input class="form-control login-form-input-text" type="password" id="password" 
    name="password" placeholder="Ingresa la contraseña" value="{{ old('password') }}">
    <button class="btn ojo end-0" id="togglePassword" type="button">
        <i class="bi bi-eye-fill ojo ojo-login-color" id="iconPassword"></i>
    </button>
</div>
@error('password')
    <p class="text text-danger text-center">{{ $message }}</p>
@enderror
<div class="mt-4">
    <button type="submit" class="form-control btn btn-success">Iniciar sesión</button>
</div>
<div class="w-100 form-check d-flex align-items-center justify-content-center mt-2">
    <input type="checkbox" id="remember" class="form-check-input me-2" name="remember">
    <label for="remember" class="form-check-label" style="padding-top: 3px;">Recuérdame</label>
</div>
