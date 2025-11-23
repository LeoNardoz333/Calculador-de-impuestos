<div class="w-100 d-flex justify-content-center">
    <img class="m-auto" style="width: 45%;" src="{{ asset('icons/cuenta verde.png') }}" alt="">
</div>
<div class="text-center mt-2 mb-3">
    <label class="titulos-negritas">Iniciar sesión</label>
</div>
<div class="mt-2">
    <label class="login">Usuario:</label>
</div>
<div>
    <input type="text" class="form-control" name="usuario">
</div>
@error('usuario')
    <p class="text text-danger text-center">{{ $message }}</p>
@enderror
<div class="mt-2">
    <label class="login">Contraseña:</label>
</div>
<div class="position-relative">
    <input class="form-control" type="password" id="password" name="password">
    <button class="btn ojo end-0" id="togglePassword" type="button" data-show="{{ asset('icons/showPass.png') }}"
        data-hide="{{ asset('icons/hidePass.png') }}">
        <img src="{{ asset('icons/showPass.png') }}" alt="ShowConfirmPassword" id="ShowConfirmPassword">
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
