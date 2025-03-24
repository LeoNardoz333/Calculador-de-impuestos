<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/Botones.css'])
        @vite(['resources/css/Fuentes.css'])
        @vite(['resources/css/Recuadros.css'])
        @vite(['resources/css/Iconos.css'])
        @vite(['resources/js/f_login.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title>Registrarse</title>
    </head>
        <body style="background-color:rgb(189, 235, 203);">
            @include('layouts.menu-admins-users')
            <div class="recuadro-blanco pt-5 pb-4 mt-4">
                <div class="row mb-2">
                    <div class="col-12 text-center mb-2">
                        <label class="titulos-negritas">Completa los datos para crear tu cuenta</label>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                        <div class="col-12">
                            <label class="login">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                             value="{{ old('nombre') }}">
                        </div>
                </div>
                @error('nombre') <p class="text text-danger">{{ $message }}</p>
                @enderror
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="login">Apellido(s):</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"
                        value="{{ old('apellido') }}">
                    </div>
                </div>
                @error('apellido') <p class="text text-danger">{{ $message }}</p>
                @enderror
                <div class="row mt-2 mb-2">
                    <div class="col-12">
                        <label class="login">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usuario" id="usuario"
                        value="{{ old('usuario') }}">
                    </div>
                </div>
                @error('usuario') <p class="text text-danger">{{ $message }}</p>
                @enderror
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="login">Contraseña:</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password" id="password">
                            <button class="btn ojo position-absolute end-0" type="button" id="togglePassword"
                            data-show="{{ asset('icons/showPass.png') }}" data-hide="{{ asset('icons/hidePass.png') }}">
                                <img src="{{ asset('icons/showPass.png') }}" alt="ShowPassword" id="showPassword">
                            </button>
                        </div>
                    </div>
                </div>
                @error('password') <p class="text text-danger">{{ $message }}</p>
                @enderror
                <div class="row mb-2">
                    <div class="col-12">
                        <label class="login">Confirmar contraseña:</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" name="password_confirmation"
                             id="password_confirmation">
                            <button class="btn ojo position-absolute end-0" type="button" id="confirmPassword"
                            data-show="{{ asset('icons/showPass.png') }}" data-hide="{{ asset('icons/hidePass.png') }}">
                                <img src="{{ asset('icons/showPass.png') }}" alt="ShowConfirmPassword" id="showConfirmPassword">
                            </button>
                        </div>
                    </div>
                </div>
                @error('password_confirmation') <p class="text text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="permisos" value="usuario" hidden>
                <div class="row mt-4 d-flex justify-content-between align-items-center flex-column flex-md-row">
                    <div class="col-12 col-md-auto mb-2 mb-md-0 text-center">
                        <a href=" {{ url()->previous() }}  " class="regresar w-100 w-md-auto">Regresar</a>
                    </div>
                    <div class="col-12 col-md-auto text-center">
                        <button type="submit" class="btn btn-success w-100 w-md-auto">Crear cuenta</button>
                </div>
                    </form>
                </div>
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            
            <script>
                //Clicking on the eye icon to show and hide the password
                document.addEventListener("DOMContentLoaded", function(){
                    document.getElementById("togglePassword")
                    .addEventListener("click", function () {
                        togglePasswordVisibility("password", "togglePassword");
                    });
                    document.getElementById("confirmPassword").addEventListener("click", function (){
                        togglePasswordVisibility("password_confirmation", "confirmPassword");
                    });
                });
            </script>
        </body>
</html>