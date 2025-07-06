<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Iniciar Sesión</title>
    @vite(['resources/css/Recuadros.css'])
    @vite(['resources/css/Iconos.css'])
    @vite(['resources/css/Botones.css'])
    @vite(['resources/css/Fuentes.css'])
    @vite(['resources/js/f_login.js'])
</head>
<body style="background-color: rgb(189, 235, 203);">
    <div class="d-flex flex-column vh-100">
        <div class="w-100">
            @include('layouts.menu-admins-users')
        </div>
        <div class="recuadro-blanco-login m-auto pb-4 pt-5">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert" 
                id="alertSuccess">{{ session('success') }}</div>
            @endif
            <div class="mb-2">
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <div class="w-100 d-flex justify-content-center">
                        <img class="m-auto" style="width: 45%;" src="{{ asset('icons/cuenta verde.png') }}" alt="">
                    </div>
                    <div class="text-center mt-2 mb-3">
                        <label class="titulos-negritas">Login - Administradores</label>
                    </div>
                    <div class="mt-2">
                        <label class="login">Usuario:</label>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="usuario">
                    </div>
                    @error('usuario') <p class="text text-danger text-center">{{ $message }}</p>
                    @enderror
                    <div class="mt-2">
                        <label class="login">Contraseña:</label>
                    </div>
                    <div class="position-relative">
                        <input class="form-control" type="password" id="password" name="password">
                        <button class="btn ojo end-0" id="togglePassword" type="button"
                        data-show="{{ asset('icons/showPass.png') }}" data-hide="{{ asset('icons/hidePass.png') }}">
                            <img src="{{ asset('icons/showPass.png') }}" alt="ShowConfirmPassword" id="ShowConfirmPassword">
                        </button>
                    </div>
                    @error('password') <p class="text text-danger text-center">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        <button type="submit" class="form-control btn btn-success">Iniciar sesión</button>
                    </div>
                    <div class="w-100 form-check d-flex align-items-center justify-content-center mt-2">
                        <input type="checkbox" id="remember" class="form-check-input me-2"
                        name="remember">
                        <label for="remember" class="form-check-label" style="padding-top: 3px;">Recuérdame</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            document.getElementById("togglePassword").
            addEventListener("click", function(){
                togglePasswordVisibility("password", "togglePassword");
            });
        });
    </script>
</body>
</html>